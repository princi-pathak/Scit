<?php

namespace App\Services\Rota;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Carbon;


use App\Models\Rota\StaffWorker;

class StaffWorkerService
{
    public function saveStaffWorkerData(array $data, int $homeId): StaffWorker
    {
        if (!empty($data['DOB'])) {
            $data['DOB'] = Carbon::createFromFormat('d-m-Y', $data['DOB'])->format('Y-m-d');
        }
        if (!empty($data['start_date'])) {
            $data['start_date'] = Carbon::createFromFormat('d-m-Y', $data['start_date'])->format('Y-m-d');
        }
        if (!empty($data['probation_start_date'])) {
            $data['probation_start_date'] = Carbon::createFromFormat('d-m-Y', $data['probation_start_date'])->format('Y-m-d');
        }
        if (!empty($data['probation_end_date'])) {
            $data['probation_end_date'] = Carbon::createFromFormat('d-m-Y', $data['probation_end_date'])->format('Y-m-d');
        }
        if (!empty($data['probation_renew_date'])) {
            $data['probation_renew_date'] = Carbon::createFromFormat('d-m-Y', $data['probation_renew_date'])->format('Y-m-d');
        }
        if (!empty($data['leave_date'])) {
            $data['leave_date'] = Carbon::createFromFormat('d-m-Y', $data['leave_date'])->format('Y-m-d');
        }

        $id = isset($data['staff_id']) ? $data['staff_id'] : null;

        return StaffWorker::updateOrCreate(['id' => $id], array_merge(['home_id' => $homeId], $data));
    }
    public function getStaffWorkerData($homeId)
    {
        return StaffWorker::where('home_id', $homeId)->get();
    }
    public function getStaffWorkerDataById($id)
    {
        return StaffWorker::find($id);
    }
    // public function deleteStaffWorkerData($id)
    // {
    //     return StaffWorker::where('id', $id)->delete();
    // }
    // public function updateStaffWorkerData($id, $data)
    // {
    //     return StaffWorker::where('id', $id)->update($data);
    // }
    // public function getStaffWorkerList($homeId)
    // {
    //     return StaffWorker::where('home_id', $homeId)->get();
    // }
    // public function getStaffWorkerListById($id)
    // {
    //     return StaffWorker::where('id', $id)->first();
    // }
    // public function getStaffWorkerListByHomeId($homeId)
    // {
    //     return StaffWorker::where('home_id', $homeId)->get();
    // }
    // public function getStaffWorkerListByStatus($homeId, $status)
    // {
    //     return StaffWorker::where('home_id', $homeId)->where('status', $status)->get();
    // }
    // public function getStaffWorkerListByStatusAndHomeId($homeId, $status)
    // {
    //     return StaffWorker::where('home_id', $homeId)->where('status', $status)->get();
    // }
    // public function getStaffWorkerListByStatusAndHomeIdAndDate($homeId, $status, $date)
    // {
    //     return StaffWorker::where('home_id', $homeId)->where('status', $status)->where('created_at', '>=', $date)->get();
    // }
    // public function getStaffWorkerListByStatusAndHomeIdAndDateAndTime($homeId, $status, $date, $time)
    // {
    //     return StaffWorker::where('home_id', $homeId)->where('status', $status)->where('created_at', '>=', $date)->where('created_at', '<=', $time)->get();
    // }
    // public function getStaffWorkerListByStatusAndHomeIdAndDateAndTimeAndName($homeId, $status, $date, $time, $name)
    // {
    //     return StaffWorker::where('home_id', $homeId)->where('status', $status)->where('created_at', '>=', $date)->where('created_at', '<=', $time)->where('name', 'like', '%' . $name . '%')->get();
    // }
   
}
