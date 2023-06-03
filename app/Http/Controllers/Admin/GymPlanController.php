<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GymPlan;
use App\Exports\GymPlanExport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class GymPlanController extends Controller
{
    public function index(Request $request) {
		$partner_id = (Auth::user()->hasRole('gym-partner')) ?  Auth::user()->partner_id : $request->get('partner_id');
		if ($request->ajax()) {
			$plans = GymPlan::where('partner_id',$partner_id)->get();
			return Datatables::of($plans)
				->addColumn('action', function ($data) {
					$btn = '<a href="/admin/gym-plan/edit/'.$data->id.'" class="" title="Edit"><i class="fa fa-edit"></i></a>';
					return $btn;
				})->editColumn('created_at', function ($data) {
					return [
						'display' => Carbon::parse($data->created_at)->format('d-m-Y h:i A'),
						'timestamp' => $data->created_at
					];
				})->editColumn('status', function ($data) {
					return $data->status == 1 ? 'Active' : 'Deactive';
				})
				->make(true);
		}
		return view('admin.gym-plan.list',compact('partner_id'));
	}
	public function add(Request $request) {
		$partner_id = (Auth::user()->hasRole('gym-partner')) ?  Auth::user()->partner_id : $request->partner_id;
		return view('admin.gym-plan.add',compact('partner_id'));
	}
	public function store(Request $request) {
		$request_data = $request->all();
		//dd($request_data);
		$request->validate([
			'partner_id'=> 'required',
			'title'    => 'required',
			'amount' => 'required|numeric',
            'duration'  => 'required|numeric|max:60',
			//'status'  => 'required|boolean',
		]);
		$file_name = null;
		$plan = GymPlan::create([
			'partner_id'=>$request_data['partner_id'],
			'title'=>$request_data['title'],
			'duration'=>$request_data['duration'],
			'amount'=>$request_data['amount'],
			'description'=>$request_data['description'],
			'status'=>isset($request_data['status']) ? $request_data['status'] : 1,
		]);
		return redirect()->route('admin.gym-plan',['partner_id' => $request_data['partner_id']])->with('success', 'Plan added Successfully !');
	}
	public function edit($id) {
		$data = GymPlan::where('id',$id)->first();
		if($data) {
			return view('admin.gym-plan.edit',compact('data'));
		} else {
			abort(404);
		}
	}
	public function update(Request $request) {
		$request_data = $request->all();
		$request->validate([
			'id' =>	'required',
			'partner_id' => 'required',
			'title' => 'required',
			'amount' => 'required|numeric',
			'duration' => 'required|numeric|max:60',
            'status'  => 'required|boolean',
		]);
		$plan = GymPlan::where('id',$request->id)->first();
		if($plan) {
			$plan->partner_id = $request_data['partner_id'];
			$plan->title = $request_data['title'];
			$plan->duration = $request_data['duration'];
			$plan->amount = $request_data['amount'];
			$plan->description = $request_data['description'];
			$plan->status = $request_data['status'];
 			$plan->save();
			return redirect()->route('admin.gym-plan',['partner_id' => $request_data['partner_id']])->with('success', 'Plan updated successfully !');
		} else {
			return redirect()->back()->with('error', 'Failer to updated plan not found !');
		}
	}
	public function export(Request $request) {
		$partner_id = (Auth::user()->hasRole('gym-partner')) ?  Auth::user()->partner_id : $request->partner_id;
		return Excel::download(new GymPlanExport($partner_id), 'gym-plan.xlsx');
    }
}
