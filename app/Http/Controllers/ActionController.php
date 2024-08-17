<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function status_change(Request $request)
    {
        // echo "<pre>";print_r($request->model);die;
        $id = $request->id;
        if($request->status == 1){
            $status=0;
        }else {
            $status=1;
        }
        try {
            if($request->model == "Customer"){
                $modelName = "App\\" . ucfirst($request->model);
            }else{
                $modelName = "App\Models\\" . ucfirst($request->model);
            }
            
            $model = app($modelName);
            $data = $model->find($id);
            $data->status = $status;
            $data->save();
        } catch (\Exception $e) {
            return response()->json(['success'=>'false','message' => $e->getMessage()], 500);
        }
        if($data){
            return 1;
        }else {
            return 0;
        }
        
    }
}
