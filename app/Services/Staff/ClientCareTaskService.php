<?php

namespace App\Services\Staff;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\ClientCareTask;
use App\Models\ScheduledShift;

class ClientCareTaskService
{
    
    public function store(array $data): ClientCareTask
    {
        DB::beginTransaction();
        try{
            $data['scheduled_date'] = Carbon::parse($data['scheduled_date'])->format('Y-m-d');
            $clientCareTask = ClientCareTask::updateOrCreate(['id' => $data['id'] ?? null],$data);
            DB::commit();
            return $clientCareTask;
        }catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error saving Client Care Task:', [
                'error' => $e->getMessage(),
                'data'  => $data
            ]);
            throw $e;
        }
        
    }

    
    public function list(array $filters = [])
    {
        // echo "<pre>";print_r($filters);die;
        $query = ClientCareTask::query();

        if (!empty($filters['home_id'])) {
            $query->where('home_id', $filters['home_id']);
        }
        if (!empty($filters['client_id'])) {
            $query->where('client_id', $filters['client_id']);
        }
        if (!empty($filters['user_id'])) {
            $query->where('user_id', $filters['user_id']);
        }

        $tasks = $query
            // ->where('user_id', $filters['user_id'])
            // ->where('client_id', $filters['client_id'])
            ->with('clientTaskCategorys:id,title')
            ->orderBy('task_category_id')
            ->orderBy('id')
            ->paginate(10);
        $groupedTasks = $tasks->getCollection()->groupBy('task_category_id');
        $tasks->setCollection($groupedTasks);
        return $tasks;
    }
    public function details($id){
        return ClientCareTask::find($id);
    }
    public function delete($id){
        DB::beginTransaction();
        try{
            $table = ClientCareTask::find($id);
            $table->delete();
            DB::commit();
            return true;
        }catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error delete Client Care Task:', [
                'error' => $e->getMessage(),
                'data'  => $data
            ]);
            throw $e;
        }
    }
    public function shiftCheck($data){
        $query = ScheduledShift::query();

        if (!empty($data['home_id'])) {
            $query->where('home_id', $data['home_id']);
        }

        if (!empty($data['carer_id'])) {
            $query->where('staff_id', $data['carer_id']);
        }
        $query->whereDate('start_date', '>=', now());
        $query->whereNotExists(function ($q) {
            $q->select(\DB::raw(1))
            ->from('client_care_tasks')
            ->whereColumn('client_care_tasks.shift_id', 'scheduled_shifts.id')
            ->whereNull('client_care_tasks.deleted_at');
        });

        return $query->orderBy('start_date', 'asc')->get();
    }
}
