<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CmsPage;
use Carbon\Carbon;
use DataTables;

class CmsPageController extends Controller
{
    public function index(Request $request) {
		if ($request->ajax()) {
			$cmsPages = CmsPage::get();
			return Datatables::of($cmsPages)
				->addColumn('action', function ($page) {
					$btn = '<a href="/admin/cms-page/edit/'.$page->id.'" class="" title="Edit"><i class="fa fa-edit"></i></a><a href="/admin.cms-page.delete/'.$page->id.'" class="" title="Delete"><i class="fa fa-trash"></i></a>';
					return $btn;
				})->editColumn('created_at', function ($page) {
					return [
						'display' => Carbon::parse($page->created_at)->format('d-m-Y h:i A'),
						'timestamp' => $page->created_at
					];
				})->editColumn('status', function ($page) {
					return $page->status == 1 ? 'Active' : 'Deactive';
				})
				->make(true);
		}
		return view('admin.cms-page.list');
	}
	public function add() {
		$parentPage = CmsPage::where('parent_id',0)->pluck('title','id'); 
		return view('admin.cms-page.add',compact('parentPage'));
	}
	public function store(Request $request) {
		$request_data = $request->all();
		$request->validate([
			'title'    => 'required|regex:/^[\pL\s]+$/u|unique:cms_pages,title',
            'slug'   => 'required|unique:cms_pages,slug',
            'content' => 'required',
			//'status'  => 'required|boolean',
		]);
		$data = CmsPage::create([
			'title'=>$request_data['title'],
			'slug'=>trim($request_data['slug']),
			'content'=>$request_data['content'],
			'status'=>isset($request_data['status']) ? $request_data['status'] : 1,
		]);
		return redirect()->route('admin.cms-page')->with('success', 'Cms page created Successfully !');
	}
	public function edit($id) {
		$page = CmsPage::where('id',$id)->first();
		if($page) {
			$parentPage = CmsPage::where('parent_id',0)->pluck('title','id');
			return view('admin.cms-page.edit',compact('page','parentPage'));
		} else {
			abort(404);
		}
	}
	public function update(Request $request) {
		$request_data = $request->all();
		$request->validate([
			'id' =>	'required',
			'title' => 'required|regex:/^[\pL\s]+$/u|unique:cms_pages,title,'.$request->id,
            'slug' => 'required|unique:cms_pages,slug,'.$request->id,
            'content' => 'required',
			'status'  => 'required|boolean',
		]);
		$cmsPage = CmsPage::updateOrCreate(
		[	'id' =>$request_data['id']
		],[
			'title'=>$request_data['title'],
			'slug'=>trim($request_data['slug']),
			'content'=>$request_data['content'],
			'status'=>isset($request_data['status']) ? $request_data['status'] : 1 
		]);
		if($cmsPage) {
			return redirect()->route('admin.cms-page')->with('success', 'Cms page updated successfully !');
		} else {
			return redirect()->back()->with('error', 'Failer to updated cms page !');
		}
		
	}
	public function delete($id) {
		$CmsPage = CmsPage::where('id',$id)->first();
		if($CmsPage) {
			return redirect()->back()->with('success', 'Cms page deleted successfully !');
		} else {
			return redirect()->back()->with('error', 'Failed to delete cms page!');
		}	
	}
}
