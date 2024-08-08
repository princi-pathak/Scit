<?php

namespace App\traits;

use Illuminate\Http\Request;

use DB;
use Session;
trait ActionTrait 

{
    public function status_change_trait($data)
    {
        if($data['status'] == 1){
            $status=0;
        }else {
            $status=1;
        }
        try {
            $update = DB::table($data['table'])->where('id', $data['id'])->update(['status' => $status]);
        } catch (\Exception $e) {
            return response()->json(['success'=>'false','message' => $e->getMessage()], 500);
        }
        if($update){
            return 1;
        }else {
            return 0;
        }

    }

}