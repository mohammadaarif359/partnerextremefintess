<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\CommonCode;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ModuleExport;
use Illuminate\Support\Facades\{View,Response};

class ModuleController extends Controller
{
	use CommonCode;
	public function index(Request $request,$module) {
		$model = $this->ModelName($module);
		$data = $model::get();
		$headings = $model->getFillable();
		if ($request->ajax()) {
            $u          = new $model;
            $data = $u->getAllUsers($request['filter']);

            return Response::json(['data' => View::make('admin.module.list-data', compact('data'))->render(), 'pages' => View::make('admin.module.pagination', compact('data'))->render()]);
        }
		return view('admin.module.list',compact('data','headings','module'));
	}
	public function export(Request $request,$module)
    {
		$model = $this->ModelName($model);
		$query = $model::select("id","name","email","mobile","status","created_at")->get();
		$heading = array("id","name","email","mobile","status","created_at");	
		return Excel::download(
            new ModuleExport($model,$query,$heading),
            'moduel.xlsx'
        );
    }
}