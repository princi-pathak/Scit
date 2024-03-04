<?php

namespace App\Http\Controllers\Rota;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rota, App\User, App\RotaShift, App\RotaAssignEmployee,App\LeaveType, App\Staffleaves ; 
use Session, DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class RotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('welcome');
        $leave['sickness'] = Staffleaves::where('is_deleted', 1 )->where('leave_status', 1)->where('leave_type', 2)->where('user_id', 15)->count();
        $leave['lateness'] = Staffleaves::where('is_deleted', 1 )->where('leave_status', 1)->where('leave_type', 3)->where('user_id', 15)->count();

        $date_min_three = Carbon::parse('Now -3 days')->format('Y-m-d');
        $annual1 =  Staffleaves::where('start_date', '<=', $date_min_three)->where('end_date', '>=', $date_min_three)->where('leave_type', 1)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $sickness1 = Staffleaves::where('start_date', '<=', $date_min_three)->where('end_date', '>=', $date_min_three)->where('leave_type', 2)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $lateness1 =  Staffleaves::where('start_date', '=', $date_min_three)->where('leave_type', 3)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $other1 =  Staffleaves::where('start_date', '<=', $date_min_three)->where('end_date', '>=', $date_min_three)->where('leave_type', 4)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $leave['total_leave_min_three'] = $annual1 + $sickness1 + $lateness1 + $other1;

        $date_min_two = Carbon::parse('Now -2 days')->format('Y-m-d');
        $annual2 =  Staffleaves::where('start_date', '<=', $date_min_two)->where('end_date', '>=', $date_min_two)->where('leave_type', 1)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $sickness2 = Staffleaves::where('start_date', '<=', $date_min_two)->where('end_date', '>=', $date_min_two)->where('leave_type', 2)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $lateness2 =  Staffleaves::where('start_date', '=', $date_min_two)->where('leave_type', 3)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $other2 =  Staffleaves::where('start_date', '<=', $date_min_two)->where('end_date', '>=', $date_min_two)->where('leave_type', 4)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $leave['total_leave_min_two'] =  $annual2 + $sickness2 + $lateness2 + $other2;

        $date_min_one = Carbon::parse('Now -1 days')->format('Y-m-d');
        $annual3 =  Staffleaves::where('start_date', '<=', $date_min_one)->where('end_date', '>=', $date_min_one)->where('leave_type', 1)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $sickness3 = Staffleaves::where('start_date', '<=', $date_min_one)->where('end_date', '>=', $date_min_one)->where('leave_type', 2)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $lateness3 =  Staffleaves::where('start_date', '=', $date_min_one)->where('leave_type', 3)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $other3 =  Staffleaves::where('start_date', '<=', $date_min_one)->where('end_date', '>=', $date_min_one)->where('leave_type', 4)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $leave['total_leave_min_one'] =  $annual3 + $sickness3 + $lateness3 + $other3;

        $date_current = Carbon::now()->format('Y-m-d');
        $annual4 =  Staffleaves::where('start_date', '<=', $date_current)->where('end_date', '>=', $date_current)->where('leave_type', 1)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $sickness4 = Staffleaves::where('start_date', '<=', $date_current)->where('end_date', '>=', $date_current)->where('leave_type', 2)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $lateness4 =  Staffleaves::where('start_date', '=', $date_current)->where('leave_type', 3)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $other4 =  Staffleaves::where('start_date', '<=', $date_current)->where('end_date', '>=', $date_current)->where('leave_type', 4)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $leave['total_leave_current'] =  $annual4 + $sickness4 + $lateness4 +$other4;

        $date_plus_one = Carbon::parse('Now +1 days')->format('Y-m-d');
        $annual5 =  Staffleaves::where('start_date', '<=', $date_plus_one)->where('end_date', '>=', $date_plus_one)->where('leave_type', 1)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $sickness5 = Staffleaves::where('start_date', '<=', $date_plus_one)->where('end_date', '>=', $date_plus_one)->where('leave_type', 2)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $lateness5 =  Staffleaves::where('start_date', '=', $date_plus_one)->where('leave_type', 3)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $other5 =  Staffleaves::where('start_date', '<=', $date_plus_one)->where('end_date', '>=', $date_plus_one)->where('leave_type', 4)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $leave['total_leave_plus_one'] =  $annual5 +$sickness5 + $lateness5 + $lateness5 + $other5;

        $date_plus_two = Carbon::parse('Now +2 days')->format('Y-m-d');
        $annual6 =  Staffleaves::where('start_date', '<=', $date_plus_two)->where('end_date', '>=', $date_plus_one)->where('leave_type', 1)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $sickness6 = Staffleaves::where('start_date', '<=', $date_plus_two)->where('end_date', '>=', $date_plus_two)->where('leave_type', 2)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $lateness6 =  Staffleaves::where('start_date', '=', $date_plus_two)->where('leave_type', 3)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $other6 =  Staffleaves::where('start_date', '<=', $date_plus_two)->where('end_date', '>=', $date_plus_two)->where('leave_type', 4)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $leave['total_leave_plus_two'] =  $annual6 + $sickness6 + $lateness6 + $other6;

        $date_plus_three = Carbon::parse('Now +3 days')->format('Y-m-d');
        $annual7 =  Staffleaves::where('start_date', '<=', $date_plus_three)->where('end_date', '>=', $date_plus_three)->where('leave_type', 1)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $sickness7 = Staffleaves::where('start_date', '<=', $date_plus_three)->where('end_date', '>=', $date_plus_three)->where('leave_type', 2)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $lateness7 =  Staffleaves::where('start_date', '=', $date_plus_three)->where('leave_type', 3)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $other7 =  Staffleaves::where('start_date', '<=', $date_plus_three)->where('end_date', '>=', $date_plus_three)->where('leave_type', 4)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $leave['total_leave_plus_three'] =  $annual7 + $sickness7 + $lateness7 + $other7;

        
        return view('rotaStaff.StaffDashboard', ['sidebar' => 'dashborad'], $leave);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $current_month =  Carbon::now()->format('m');
        $current_year = Carbon::now()->format('Y');

        $previous_month_data = Carbon::now()->endOfMonth()->subMonth()->toDateString();
        $priormonth = date ('m', strtotime ( '-1 month' , strtotime ( $previous_month_data )));
        $prioryear = date('Y', strtotime($previous_month_data));

        $rota = Rota::where('deleted_status', 1)->get(); 
        $arr = array();
        $active_publish_rota= 0;
        $active_unpublish_rota= 0;
        $old_publish_rota = 0;
        $old_unpublish_rota = 0;
        $old = array();
        foreach($rota as $rotas){
            $convert_date = strtotime($rotas->created_at);
            $month = date('m',$convert_date);
            $year = date('Y',$convert_date);
            if($current_year == $year){
                if( $current_month == $month){
                    $arr[] = $rotas;
                    if($rotas->status === 1){
                        $active_publish_rota++;
                    } if($rotas->status === 0) {
                        $active_unpublish_rota++;
                    }
                }
            }
            if($prioryear == $year){
                if( $priormonth == $month){
                    $old[] = $rotas;
                    if($rotas->status === 1){
                        $old_publish_rota++;
                    } if($rotas->status === 0) {
                        $old_unpublish_rota++;
                    }
                }
            }
           
        }         
        $data['active_rota'] =  $arr;
        $data['old_rota'] =  $old; 
        $data['sidebar'] = 'rota';
        $data['active_publish_rota_count'] = $active_publish_rota;
        $data['active_unpublish_rota_count'] = $active_unpublish_rota;
        $data['old_publish_rota_count'] = $old_publish_rota;
        $data['old_unpublish_rota_count'] = $old_unpublish_rota;
      
        return view('rotaStaff.rotaView', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $rota_name = $request->rota_name;
        // Rota::where('rota_name', $request->)->get();
        $date = $request->start_date;
        $date = strtotime($date);
        $last_date = $request->rotaPeriodLength-1;
        $date = strtotime("+".(int)$last_date." day", $date);
        $date = date('Y-m-d', $date);
        $rota_data = array(
            'user_id' => 15,
            'rota_name' => $request->rota_name,
            'rota_duration' => $request->rotaPeriodLength,
            'rota_start_date' => $request->start_date,
            'rota_end_date' => $date,
            'rota_view' =>2,
            'status' => 0,
            'deleted_status' => 1,                  //deleted record status 1 for active 0 for deleted
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s")
        );
        $rota = Rota::insert($rota_data);
        return redirect('/rota-planner');  
    }

    public function get_all_users_edit(){
      $data = User::where('home_id', 1)->orderBy('id', 'DESC')->get();
      echo json_encode($data);
    }

    public function rota_calender_view(){
        $data['user'] = User::where('home_id',1)->get();
        $data['sidebar'] = 'rota';
        $data['rota'] =   Rota::where('deleted_status', 1)->orderBy('id','DESC')->take(1)->get();
        $rota =   Rota::where('deleted_status', 1)->orderBy('id','DESC')->take(1)->get();
        foreach($rota as $rotaView){
           $rota_view_id =  $rotaView->rota_view;
        }
      
        if($rota_view_id === 1){
            return view('rotaStaff.rota_table', $data);
        }
        if($rota_view_id === 2){
            return view('rotaStaff.rota_timeline', $data);
        }
        if($rota_view_id === 3){
            echo "3";
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_shift_data(Request $request)
    {
        $data = RotaShift::where('id', $request->delete_shift_id)
          ->update([
              'status' => 0
              ]);
          echo json_encode($data);
    }

    public function get_all_users(Request $request){
      // $data['users'] = User::where('home_id', 1)->orderBy('name', 'DESC')->where('is_deleted', 0)->get();
      $user = User::where('home_id', 1)->orderBy('name', 'DESC')->where('is_deleted', 0)->get();
      $leave = array();
      $complete_hours = array();
      
      $now = Carbon::now()->format('Y-m-d');
      foreach($user as $users){
        $leave[] =  Staffleaves::where('user_id', $users->id)->where('start_date', '<=', $now)->where('end_date', '>=', $now)->where('leave_status', 1)->where('is_deleted', 1)->get();

        $selected = RotaAssignEmployee::where('rota_id', $request->rota_id)->where('emp_id', $users->id)->where('status', 1)->get();
        $time_total = 0;
        foreach($selected as $selected_user){
          $time = Carbon::parse($selected_user['total_hours'])->format('H');
          $time_total = $time_total + (int)$time;
        }
        $total_users = array();
        if($time_total > 40 ){

        }else {
          $total_users['id'] =  $users->id;
          $total_users['name'] =  $users->name;
         
          array_push($complete_hours, $total_users);
        }  
      }
      $data['users'] = $complete_hours;
      $data['leave'] =$leave;
      echo json_encode($data);
    }

    public function assign_rota_users(Request $request){
        $rota = $request->rota_id;
        if(isset($rota)){
            $get_rota =  $request->rota_id;
        } else {
            $get_rota =  $request->edit_rota_id;
        }

        if(!$request->break_time){
          $break = 0;
        } else {
          $break = $request->break_time;
        }
       
        
        $shift_data = array(
            'rota_id' =>  $get_rota,
            'user_id' => 15,
            'shift_time' => "7",
            'rota_day_date' => Carbon::parse($request->rota_shift_day_date)->format('Y-m-d'),
            'shift_start_time' => $request->start_date,
            'shift_end_time' => $request->end_date,
            'break' => $break,
            'description' => $request->shift_notes,
            'status' =>1,
            'shift_color' => 'black',
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s")
        );
        
        $rota_shift = RotaShift::insert($shift_data);
        $latestShiftId = RotaShift::latest()->first();

        $start = new Carbon($request->start_date); 
        $end = new Carbon($request->end_date); 

        $shift_hours = $start->diff($end)->format('%H:%I:%S');;

        for ($i=0; $i < count($request->user_ids); $i++) { 
            $assignedUsersRota = array(
                'rota_id' => $get_rota,
                'user_id' => 15,
                'shift_id' => $latestShiftId->id,
                'emp_id' => $request->user_ids[$i],
                'total_hours' => $shift_hours,
                'status' =>1,
                'created_at'=>date("Y-m-d H:i:s"),
                'updated_at'=>date("Y-m-d H:i:s")
            );
            $rota_shift = RotaAssignEmployee::insert($assignedUsersRota);
        }

        $data['rotaShift'] = RotaShift::where('id',$latestShiftId->id)->where('status', 1)->get();

        $list_emp = RotaAssignEmployee::where('rota_id', $get_rota)->where('shift_id', $latestShiftId->id)->where('status', 1)->get();
        $userdata = array();
        
        foreach($list_emp as $emp_ids){
            $userdata[] = User::where('id', $emp_ids->emp_id)->get();
        }
        $data['user_name'] = $userdata;
        echo json_encode($data);
    }
    function update_rota_name(Request $request){
        $data = Rota::where('id', $request->rota_id)
        ->update([
            'rota_name' => $request->rota_name
            ]);
        echo json_encode($data);
    }

    function publish_rota_employee(Request $request){
        $data = Rota::where('id', $request->publish_rota_id)
        ->update([
            'status' => 1
            ]);
        echo json_encode($data);
    }

    function unpublish_rota_employee(Request $request){
        $data = Rota::where('id', $request->unpublish_rota_id)
        ->update([
            'status' => 0
            ]);
        echo json_encode($data);
    }


    function calender_view(){
        //get all data for calender
        $leave = Staffleaves::where('is_deleted', 1 )->where('staff_leaves.leave_status', 1)->get();
        $recordArray = array();
        foreach($leave as $value){
            $leave_name = LeaveType::where('id', $value->leave_type)->pluck('leave_name'); 
            $leave_color = LeaveType::where('id', $value->leave_type)->pluck('color'); 
            $user_name  =  User::where('id', $value->user_id)->pluck('name');
            $arr['title'] =  $user_name;
            $arr['color'] =  $leave_color[0];
            $arr['start'] = $value->start_date;
            $arr['end'] = $value->end_date;
            array_push($recordArray,$arr);
        }
        $data['pending_leave'] = DB::table('staff_leaves')
                            ->join('user', 'staff_leaves.user_id', '=', 'user.id')
                            ->join('leave_type', 'leave_type.id', '=', 'staff_leaves.leave_type')
                            ->select('leave_type.leave_name','leave_type.color','leave_type.id as leavetype_id','user.name','user.id as user_id','staff_leaves.start_date', 'staff_leaves.end_date','staff_leaves.id as staffleave_id', 'staff_leaves.days', 'staff_leaves.notes')
                            ->where('staff_leaves.is_deleted', 1 )
                            ->where('staff_leaves.leave_status', 0)
                            ->get();

        $data['count'] = DB::table('staff_leaves')->where('staff_leaves.is_deleted', 1 )->where('staff_leaves.leave_status', 0)->count();
        $data['calander']=json_encode($recordArray);
        return view('rotaStaff.calender', ['sidebar' => 'calender'], $data);
    }

    function annual_leave_view($id){
        $data['leave'] = $id;
        $data['sidebar'] = '';
        $data['leavetype'] = LeaveType::where('status', 1)->get();
        $data['users'] = User::where('home_id', 1)->get();
       
        return view('rotaStaff.add_leave', $data);
    }

    function get_all_users_search(Request $request){
      // $data['users'] = User::where('home_id', 1)->Where('name', 'like', '%' . $request->search_data . '%')->orderBy('name', 'DESC')->where('is_deleted', 0)->get();
      $user = User::where('home_id', 1)->Where('name', 'like', '%' . $request->search_data . '%')->orderBy('id', 'DESC')->where('is_deleted', 0)->get();
      $leave = array();
      $complete_hours = array();
      
      $now = Carbon::now()->format('Y-m-d');
      foreach($user as $users){
        $leave[] =  Staffleaves::where('user_id', $users->id)->where('start_date', '<=', $now)->where('end_date', '>=', $now)->where('leave_status', 1)->where('is_deleted', 1)->get();

        $selected = RotaAssignEmployee::where('rota_id', $request->rota_id)->where('emp_id', $users->id)->where('status', 1)->get();
        $time_total = 0;
        foreach($selected as $selected_user){
          $time = Carbon::parse($selected_user['total_hours'])->format('H');
          $time_total = $time_total + (int)$time;
        }
        $total_users = array();
        if($time_total > 40 ){

        }else {
          $total_users['id'] =  $users->id;
          $total_users['name'] =  $users->name;
         
          array_push($complete_hours,$total_users);
        }
          
      }
      $data['users'] = $complete_hours;
      $data['leave'] =$leave;
      echo json_encode($data);
    }


    function delete_rota_employee(Request $request){
        $data = Rota::where('id', $request->id)
        ->update([
            'deleted_status' => 0
            ]);
        echo json_encode($data);
    }


    function edit_rota($id){
        $rota = Rota::where('id', $id)->get();
        $data['sidebar'] = 'rota';
        $latestUser = Rota::latest()->first();
        foreach($rota as $rota_data){
           $view = $rota_data->rota_view;
        }


        $data['pass_rota_id'] = $id; 
        $data['rota'] = Rota::where('id', $id)->get();
        if($view == 1){
            return view('rotaStaff.rota_table', $data);
        }
        if($view == 2){
            return view('rotaStaff.edit_rota_timeline', $data);
        }
        if($view == 3){
            echo "3";
        }
    }

    function publish_unpublish_rota(Request $request){

      
        if($request->rota_status == 1)
        {
            $data = Rota::where('id', $request->rota_id)
            ->update([
                'status' => 0
                ]);
            echo "unpublished";
        }   
        if($request->rota_status == 0 ){
            $data = Rota::where('id', $request->rota_id)
            ->update([
                'status' => 1
                ]);
                echo "published";
        }
    }

    function add_leave(Request $request){
      
        if($request->ongoingLeave == "yes"){
            $ongoingLeave = 1;
        }else {
            $ongoingLeave = 0;
        }

        if(empty($request->start_date)){
            $date = $request->late_date;
            $request->end_date = null;
            $date = $request->late_date;
        } else {
            $date = $request->start_date;
        }
        // dd($date);
        // $data = $request->validate([
        //     'type' => 'required',
        //     'title' => 'required',
        //     'description' => 'required',
        //     'base_capacity' => 'required',
        //     'max_occupancy' => 'required',
        // ]);
        if(empty($request->late_time)){
            $late_time = null;
        }else{
            $late_time = $request->late_time;
        }
        if(empty($request->missed_days)){
            $missed_working_days = null;
        }else{
            $missed_working_days = $request->missed_days;
        }

        
        $add_leave = array(
            'user_id' => (int)$request->employee_list,
            'leave_type' => (int)$request->leave_type,
            'ongoing_absence' => $ongoingLeave,
            'start_date' => $date,
            'start_date_full_half' => (int)$request->start_date_full_half,
            'end_date' => $request->end_date,
            'end_date_full_half' => (int)$request->end_date_full_half,
            'late_by' => $late_time,
            'notes' => $request->notes,
            'days' => $missed_working_days,
            'leave_status' => 0,
            'is_deleted' => 1,
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s")  
        );
        $data = Staffleaves::insert($add_leave);
        return redirect('/pending-request');
       
    }

    function leave_pending(){
        $data['last_leave'] = Staffleaves::latest()->first();
        $last_leave = Staffleaves::latest()->first();
        $user = User::where('id', $last_leave->user_id)->get();
        foreach($user as $user_data){
            $user_name = $user_data->name;
        }
        $data['username'] = $user_name;
        $data['sidebar'] = 'action';
        return view('rotaStaff.leave_pending', $data);
    }

    function date_validation_for_user(Request $request){
        $request->start_date_input;
        $staff_leaves = Staffleaves::where('is_deleted', 1)->where('user_id', $request->start_id)->get();
        $arr = array();
        foreach($staff_leaves as $staff_leave ){
            $period = \Carbon\CarbonPeriod::create($staff_leave->start_date, $staff_leave->end_date);
            foreach ($period as $date) {
                // echo $date->format('Y-m-d');
                if($request->start_date_input == $date->format('Y-m-d')){
                    $arr[] =  \Carbon\Carbon::parse($staff_leave->start_date)->format('D, jS M');
                    $arr[] =  \Carbon\Carbon::parse($staff_leave->end_date)->format('D, jS M');
                }
            }
            $dates = $period->toArray(); 
        }
        echo json_encode($arr);
    }

    // function get_all_leave(){
    //     $data['leaves'] = Staffleaves::where('user_id', 15)->get();
    //     echo json_encode($data);   
    // }

    function employee_view(){
        $data['sidebar'] = 'employee';
        $data['user'] = User::where('home_id', 1)->get();
        return view('rotaStaff.employee', $data);
    }

    function get_rota_employee(Request $request){

      $recordArray = array();
      $rota = array();

      $rota_data = Rota::where('id', $request->id)->where('deleted_status', 1)->get();
    
      foreach($rota_data as $rotaData){
        $rotaShift = RotaShift::where('rota_id' ,$request->id)->where('status', 1)->get();
       
          foreach($rotaShift as $rotaShifts){
            $user = RotaAssignEmployee::where('rota_id' ,$request->id)->where('shift_id', $rotaShifts->id)->where('status', 1)->get();
            // dd($user);
            foreach($user as $users){

                $rota['name'] = User::where('home_id',1)->where('id', $users->emp_id)->where('is_deleted', 0)->pluck('name');
                $rota['user_id'] = $users->emp_id;
                $rota['rota_day_date'] =  $rotaShifts->rota_day_date;
                $rota['shift_start_time'] = $rotaShifts->shift_start_time;
                $rota['shift_end_time'] = $rotaShifts->shift_end_time;
                $rota['total_hours'] = $rotaShifts->total_hours;
                $rota['break'] = $rotaShifts->break;
                $rota['rota_start_date'] = $rotaData->rota_start_date;
                $rota['rota_end_date'] = $rotaData->rota_end_date;
                array_push($recordArray, $rota);

            } 
         }
          
      }
          // $rota = DB::table('rota')
          //   ->join('rota_assign_employees', 'rota_assign_employees.rota_id', '=', 'rota.id')
          //   ->join('user', 'user.id', '=', 'rota_assign_employees.emp_id')
          //   ->join('rota_shift','rota_shift.rota_id','=', 'rota_assign_employees.rota_id')
          //   ->select('rota.id','rota.rota_start_date','rota.rota_end_date','rota_assign_employees.id as rota_assign_id','user.id as users_id','user.name','rota_shift.break','rota_shift.shift_start_time','rota_shift.shift_end_time','rota_assign_employees.total_hours','rota_shift.rota_day_date')
          //   ->where('rota.id', $request->id)
          //   ->get();
         
        echo json_encode($recordArray); 
    }

    function get_all_shift(Request $request){
        $data = Rota::where('id', $request->id)->pluck('rota_start_date');
        $data = \Carbon\Carbon::parse($data[0])->format('d/m/Y');
        echo json_encode($data);
    }

    function edit_shift_data_get(Request $request ){
         
        // $rota = DB::table('rota_shift')
        // ->join('rota_assign_employees', 'rota_assign_employees.shift_id', '=', 'rota_shift.id')
        // ->select('rota_shift.id','rota_assign_employees.id', 'rota_shift.rota_day_date', 'rota_shift.shift_start_time', 'rota_shift.shift_end_time', 'rota_shift.break','rota_shift.description')
        // ->where('rota_shift.rota_id', $request->rota_id)
        // ->where('rota_assign_employees.emp_id', 'rota_assign_employees.user_id')
        // ->get();

        $rota = DB::table('rota_assign_employees')
        ->join('rota_shift', 'rota_assign_employees.shift_id', '=', 'rota_shift.id')
        ->select('rota_shift.id as rota_shift_id','rota_assign_employees.id as assigned_id', 'rota_shift.rota_day_date', 'rota_shift.shift_start_time', 'rota_shift.shift_end_time', 'rota_shift.break','rota_shift.description')
        ->where('rota_assign_employees.rota_id', $request->rota_id)
        ->where('rota_assign_employees.emp_id', $request->user_id)
        ->get();

        echo json_encode($rota); 
    }

    function update_shift_data(Request $request){
       
        $edit_rota_id = $request->edit_rota_id;
        $edit_shift_id = $request->edit_shift_id;
        $update_user_id = $request->update_user_id;
        $rotashift = array(
          'rota_day_date' => $request->updtate_date_of_shift,
          'shift_start_time' => $request->update_shift_start_time,
          'shift_end_time' => $request->update_shift_end_time,
          'break' => $request->update_break,
          'description' => $request->description
        );

        RotaShift::where('id', $request->rota_shift_id)
        ->update($rotashift);

        $data = RotaAssignEmployee::where('id', $request->assigned_user_id)
        ->update(['emp_id' => $request->update_user_id]);

        echo json_encode($data);
    }

    function approve_leave(Request $request){
        $result = Staffleaves::where('id',$request->id)->update(['leave_status'=> 1]);
        echo json_encode($result);
    }

    function get_leave_record_for_1_week(Request $request){
        
        $date = carbon::parse($request->date)->format('Y-m-d');

        $data['annual'] =  Staffleaves::where('start_date', '<=', $date)->where('end_date', '>=', $date)->where('leave_type', 1)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $data['sickness'] = Staffleaves::where('start_date', '<=', $date)->where('end_date', '>=', $date)->where('leave_type', 2)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $data['lateness'] =  Staffleaves::where('start_date', '=', $date)->where('leave_type', 3)->where('is_deleted', 1)->where('leave_status', 1)->count();
        $data['other'] =  Staffleaves::where('start_date', '<=', $date)->where('end_date', '>=', $date)->where('leave_type', 4)->where('is_deleted', 1)->where('leave_status', 1)->count();

        echo json_encode($data);
    }

    function get_record_of_rota(Request $request){
        $data = Rota::where('deleted_status', 1)->orWhere('rota_name', 'like', '%' . $request->search_name . '%')->get();
        echo json_encode($data);
    }

    function get_all_rota_data(){
      $arr_active = array();
      $arr_inactive = array();
      $active_publish_rota= 0;
      $active_unpublish_rota= 0;
      $old_publish_rota = 0;
      $old_unpublish_rota = 0;
      $old_active = array();
      $old_inactive = array();
      $old = array();

      $current_date = Carbon::now()->format('Y-m-d');

      $new_rota = Rota::where('deleted_status', 1)->where('rota_start_date', '>=', $current_date)->where('rota_end_date', '>=', $current_date)->orderBy('rota_name', 'ASC')->get(); 
      foreach($new_rota as $new_rotas){
          if($new_rotas->status === 1){
              $count_emp_active = RotaAssignEmployee::where(['rota_id' => $new_rotas->id, 'status'=> 1])->count();
              $rota_start_end_time = RotaShift::where('rota_id', $new_rotas->id)->where('status', 1)->get();
              $hours = 0; $minutes = 0;
              foreach($rota_start_end_time as $rota_start_end_times){
                  $startTime = \Carbon\Carbon::parse($rota_start_end_times->shift_start_time);
                  $finishTime = \Carbon\Carbon::parse($rota_start_end_times->shift_end_time);
                  $duration = $finishTime->diff($startTime)->format('%H:%i:%s');
                  $totaltime = \Carbon\Carbon::parse($duration)->addMinutes($rota_start_end_times->break)->format('h:i:m');
                  $hours += \Carbon\Carbon::parse($totaltime)->format('h');
                  $minutes += \Carbon\Carbon::parse($totaltime)->format('i');
              }
              
              $time_hour = date('G', mktime($hours, $minutes));
              $time_min = date('i', mktime($hours, $minutes));
              $total_hours_min_one =   $time_hour ." hrs ". $time_min. " mins";

              $arr_active[] = "<div  class='parent_div my-2'>
              <div class='d-flex justify-content-between'>
                <div class='d-flex flex-column align-items-center justify-content-center col-md-2 date_of_shift_rota'>
                  <div> ".Carbon::parse($new_rotas->rota_start_date)->format('D')." </div>
                  <div class=''>".Carbon::parse($new_rotas->rota_start_date)->format('j M')."</div>
                </div>
                <div class='col-md-10 px-2'>
                  <div class='d-flex justify-content-between align-items-center'>
                    <div>
                      <a href=". url('/edit_rota',$new_rotas->id )." class='rota_shift_employee_name'> ".$new_rotas->rota_name."</a>
                    </div>
                    <div class='dropdown'>
                      <button class='my-2 d-flex justify-content-center align-items-center three_dot_btn' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                        <span class='dropbtn'>
                          <svg width='32' class='dropbtn' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'>
                            <circle cx='16' class='dropbtn' cy='24' r='2'></circle>
                            <circle cx='16' class='dropbtn' cy='16' r='2'></circle>
                            <circle cx='16' class='dropbtn' cy='8' r='2'></circle>
                          </svg>
                        </span>
                      </button>
                      <div class='dropdown-menu dropdown-content'>
                        <ul>
                            <li>
                              <span class='edit-icon dropdown_icon'><i class='fa fa-pencil' aria-hidden='true'></i></span>
                              <a href=".url('/edit_rota', $new_rotas->id ).">Edit</a>
                            </li>
                            <li>  
                              <span class='i-icon dropdown_icon'><i class='fa fa-info-circle' aria-hidden='true'></i></span>
                              <a onclick='RotaView($new_rotas->id,`$new_rotas->rota_name`)'>View</a>
                            </li>
                            <li>
                              <span class='edit-icon dropdown_icon'><i class='fa fa-pencil' aria-hidden='true'></i></span>
                              <a onclick='renamedata($new_rotas->id, `$new_rotas->rota_name`)'>Rename</a> 
                            </li>
                            <li>
                              <span class='tick-icon dropdown_icon'><i class='fa fa-check' aria-hidden='true'></i></span>
                              <a onclick='unpublishRotaEmployee($new_rotas->id,`$new_rotas->rota_name`)'>Unpublish</a>
                            </li>
                            <li>
                              <span class='delete-icon dropdown_icon'><i class='fa fa-trash' aria-hidden='true'></i></span>
                              <a onclick='DeleteRotaEmployee($new_rotas->id, `$new_rotas->rota_name`)' class='delete_btn'>Delete</a>
                            </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class='d-flex'>
                    <div class='pe-3'>Total: ".$total_hours_min_one." (Incl. breaks)</div>
                    <div class='order-1'>".$new_rotas->rota_duration." days<span class='px-2'></span><span>
                      ".$count_emp_active." employees</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>";
              $active_publish_rota++;
            } if($new_rotas->status === 0) {

                $rota_start_end_time = RotaShift::where('rota_id', $new_rotas->id)->where('status', 0)->get();
                $hours = 0; $minutes = 0;
                foreach($rota_start_end_time as $rota_start_end_times){
                    $startTime = \Carbon\Carbon::parse($rota_start_end_times->shift_start_time);
                    $finishTime = \Carbon\Carbon::parse($rota_start_end_times->shift_end_time);
                    $duration = $finishTime->diff($startTime)->format('%H:%i:%s');
                    $totaltime = \Carbon\Carbon::parse($duration)->addMinutes($rota_start_end_times->break)->format('h:i:m');
                    $hours += \Carbon\Carbon::parse($totaltime)->format('h');
                    $minutes += \Carbon\Carbon::parse($totaltime)->format('i');
                }
                
                $time_hour = date('G', mktime($hours, $minutes));
                $time_min = date('i', mktime($hours, $minutes));
                $total_hours_min_two =   $time_hour ." hrs ". $time_min. " mins";

                $count_emp_inactive = RotaAssignEmployee::where(['rota_id' => $new_rotas->id, 'status'=> 1])->count();

                $arr_inactive[] = "<div  class='parent_div my-2'>
                <div class='d-flex justify-content-between'>
                  <div class='d-flex flex-column align-items-center justify-content-center col-md-2 date_of_shift_rota'>
                    <div> ".Carbon::parse($new_rotas->rota_start_date)->format('D')." </div>
                    <div class=''>".Carbon::parse($new_rotas->rota_start_date)->format('j M')."</div>
                  </div>
                  <div class='col-md-10 px-2'>
                    <div class='d-flex justify-content-between align-items-center'>
                      <div>
                        <a href=". url('/edit_rota',$new_rotas->id )." class='rota_shift_employee_name'> ".$new_rotas->rota_name."</a>
                      </div>
                      <div class='dropdown'>
                        <button class='my-2 d-flex justify-content-center align-items-center three_dot_btn' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                          <span class='dropbtn'>
                            <svg width='32' class='dropbtn' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'>
                              <circle cx='16' class='dropbtn' cy='24' r='2'></circle>
                              <circle cx='16' class='dropbtn' cy='16' r='2'></circle>
                              <circle cx='16' class='dropbtn' cy='8' r='2'></circle>
                            </svg>
                          </span>
                        </button>
                        <div class='dropdown-menu dropdown-content'>
                          <ul>
                              <li>
                                <span class='edit-icon dropdown_icon'>
                                <svg width='32' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg' class='fill-primary-400 group-active/listitem:fill-white group-disabled/listitem:fill-link-disabled'><path d='M28 9.5C28 6.487 25.512 4 22.5 4C21.038 4 19.637 4.575 18.613 5.612L5.463 18.762C4.513 19.712 4 20.962 4 22.3V27C4 27.55 4.45 28 5 28H9.713C11.051 28 12.301 27.475 13.25 26.538L26.4 13.388C27.425 12.363 28 10.963 28 9.5ZM11.825 25.125C11.262 25.688 10.5 26 9.7 26H6V22.288C6 21.488 6.313 20.738 6.875 20.163L16.813 10.225L21.763 15.175L11.825 25.125ZM24.975 11.975L23.187 13.762L18.237 8.812L20.025 7.025C20.675 6.375 21.575 6 22.5 6C24.425 6 26 7.575 26 9.5C26 10.425 25.625 11.325 24.975 11.975Z'></path></svg>
                                </span>
                                <a href=".url('/edit_rota', $new_rotas->id ) . ">Edit</a>
                              </li>
                              <li>  
                                <span class='i-icon dropdown_icon'><i class='fa fa-info-circle' aria-hidden='true'></i></span>
                                <a onclick='RotaView($new_rotas->id,`$new_rotas->rota_name`)'>View</a>
                              </li>
                              <li>
                                <span class='edit-icon dropdown_icon'><i class='fa fa-pencil' aria-hidden='true'></i></span>
                                <a onclick='renamedata($new_rotas->id, `$new_rotas->rota_name`)'>Rename</a> 
                              </li>
                              <li>
                                <span class='tick-icon dropdown_icon'><i class='fa fa-check' aria-hidden='true'></i></span>
                                <a onclick='publishRotaEmployee($new_rotas->id,`$new_rotas->rota_name`)'>Publish</a>
                              </li>
                              <li>
                                <span class='delete-icon dropdown_icon'><i class='fa fa-trash' aria-hidden='true'></i></span>
                                <a onclick='DeleteRotaEmployee($new_rotas->id,`$new_rotas->rota_name`)' class='delete_btn'>Delete</a>
                              </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class='d-flex'>
                      <div class='pe-3'>Total: ".$total_hours_min_two."  (Incl. breaks)</div>
                      <div class='order-1'>".$new_rotas->rota_duration." days<span class='px-2'></span><span>
                        ".$count_emp_inactive." employees</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>";
                $active_unpublish_rota++;
            }
          
      }


      $old_rota = Rota::where('deleted_status', 1)->where('rota_end_date', '<', $current_date)->orderBy('rota_name', 'ASC')->get(); 
      foreach($old_rota as $old_rotas){
        if($old_rotas->status === 1){
          $count_emp_active = RotaAssignEmployee::where(['rota_id' => $old_rotas->id, 'status'=> 1])->count();
          $rota_start_end_time = RotaShift::where('rota_id', $old_rotas->id)->where('status', 1)->get();
          $hours = 0; $minutes = 0;
          foreach($rota_start_end_time as $rota_start_end_times){
              $startTime = \Carbon\Carbon::parse($rota_start_end_times->shift_start_time);
              $finishTime = \Carbon\Carbon::parse($rota_start_end_times->shift_end_time);
              $duration = $finishTime->diff($startTime)->format('%H:%i:%s');
              $totaltime = \Carbon\Carbon::parse($duration)->addMinutes($rota_start_end_times->break)->format('h:i:m');
              $hours += \Carbon\Carbon::parse($totaltime)->format('h');
              $minutes += \Carbon\Carbon::parse($totaltime)->format('i');
          }
          
          $time_hour = date('G', mktime($hours, $minutes));
          $time_min = date('i', mktime($hours, $minutes));
          $total_hours_min_one =   $time_hour ." hrs ". $time_min. " mins";

          $old_active[] = "<div  class='parent_div my-2'>
          <div class='d-flex justify-content-between'>
            <div class='d-flex flex-column align-items-center justify-content-center col-md-2 date_of_shift_rota'>
              <div> ".Carbon::parse($old_rotas->rota_start_date)->format('D')." </div>
              <div class=''>".Carbon::parse($old_rotas->rota_start_date)->format('j M')."</div>
            </div>
            <div class='col-md-10 px-2'>
              <div class='d-flex justify-content-between align-items-center'>
                <div>
                  <a href=". url('/edit_rota',$old_rotas->id )." class='rota_shift_employee_name'> ".$old_rotas->rota_name."</a>
                </div>
                <div class='dropdown'>
                  <button class='my-2 d-flex justify-content-center align-items-center three_dot_btn' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                    <span class='dropbtn'>
                      <svg width='32' class='dropbtn' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'>
                        <circle cx='16' class='dropbtn' cy='24' r='2'></circle>
                        <circle cx='16' class='dropbtn' cy='16' r='2'></circle>
                        <circle cx='16' class='dropbtn' cy='8' r='2'></circle>
                      </svg>
                    </span>
                  </button>
                  <div class='dropdown-menu dropdown-content'>
                    <ul>
                        <li>
                          <span class='edit-icon dropdown_icon'><i class='fa fa-pencil' aria-hidden='true'></i></span>
                          <a href=".url('/edit_rota', $old_rotas->id ).">Edit</a>
                        </li>
                        <li>  
                          <span class='i-icon dropdown_icon'><i class='fa fa-info-circle' aria-hidden='true'></i></span>
                          <a onclick='RotaView($old_rotas->id,`$old_rotas->rota_name`)'>View</a>
                        </li>
                        <li>
                          <span class='edit-icon dropdown_icon'><i class='fa fa-pencil' aria-hidden='true'></i></span>
                          <a onclick='renamedata($old_rotas->id, `$old_rotas->rota_name`)'>Rename</a> 
                        </li>
                        <li>
                          <span class='tick-icon dropdown_icon'><i class='fa fa-check' aria-hidden='true'></i></span>
                          <a onclick='unpublishRotaEmployee($old_rotas->id,`$old_rotas->rota_name`)'>Unpublish</a>
                        </li>
                        <li>
                          <span class='delete-icon dropdown_icon'><i class='fa fa-trash' aria-hidden='true'></i></span>
                          <a onclick='DeleteRotaEmployee($old_rotas->id, `$old_rotas->rota_name`)' class='delete_btn'>Delete</a>
                        </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class='d-flex'>
                <div class='pe-3'>Total: ".$total_hours_min_one." (Incl. breaks)</div>
                <div class='order-1'>".$old_rotas->rota_duration." days<span class='px-2'></span><span>
                  ".$count_emp_active." employees</span>
                </div>
              </div>
            </div>
          </div>
        </div>";
          $old_publish_rota++;
        } if($old_rotas->status === 0) {

            $rota_start_end_time = RotaShift::where('rota_id', $old_rotas->id)->where('status', 0)->get();
            $hours = 0; $minutes = 0;
            foreach($rota_start_end_time as $rota_start_end_times){
                $startTime = \Carbon\Carbon::parse($rota_start_end_times->shift_start_time);
                $finishTime = \Carbon\Carbon::parse($rota_start_end_times->shift_end_time);
                $duration = $finishTime->diff($startTime)->format('%H:%i:%s');
                $totaltime = \Carbon\Carbon::parse($duration)->addMinutes($rota_start_end_times->break)->format('h:i:m');
                $hours += \Carbon\Carbon::parse($totaltime)->format('h');
                $minutes += \Carbon\Carbon::parse($totaltime)->format('i');
            }
            
            $time_hour = date('G', mktime($hours, $minutes));
            $time_min = date('i', mktime($hours, $minutes));
            $total_hours_min_two =   $time_hour ." hrs ". $time_min. " mins";

            $count_emp_inactive = RotaAssignEmployee::where(['rota_id' => $old_rotas->id, 'status'=> 1])->count();

            $old_inactive[] = "<div  class='parent_div my-2'>
            <div class='d-flex justify-content-between'>
              <div class='d-flex flex-column align-items-center justify-content-center col-md-2 date_of_shift_rota'>
                <div> ".Carbon::parse($old_rotas->rota_start_date)->format('D')." </div>
                <div class=''>".Carbon::parse($old_rotas->rota_start_date)->format('j M')."</div>
              </div>
              <div class='col-md-10 px-2'>
                <div class='d-flex justify-content-between align-items-center'>
                  <div>
                    <a href=". url('/edit_rota',$old_rotas->id )." class='rota_shift_employee_name'> ".$old_rotas->rota_name."</a>
                  </div>
                  <div class='dropdown'>
                    <button class='my-2 d-flex justify-content-center align-items-center three_dot_btn' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                      <span class='dropbtn'>
                        <svg width='32' class='dropbtn' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'>
                          <circle cx='16' class='dropbtn' cy='24' r='2'></circle>
                          <circle cx='16' class='dropbtn' cy='16' r='2'></circle>
                          <circle cx='16' class='dropbtn' cy='8' r='2'></circle>
                        </svg>
                      </span>
                    </button>
                    <div class='dropdown-menu dropdown-content'>
                      <ul>
                          <li>
                            <span class='edit-icon dropdown_icon'><i class='fa fa-pencil' aria-hidden='true'></i></span>
                            <a href=".url('/edit_rota', $old_rotas->id ) . ">Edit</a>
                          </li>
                          <li>  
                            <span class='i-icon dropdown_icon'><i class='fa fa-info-circle' aria-hidden='true'></i></span>
                            <a onclick='RotaView($old_rotas->id,`$old_rotas->rota_name`)'>View</a>
                          </li>
                          <li>
                            <span class='edit-icon dropdown_icon'><i class='fa fa-pencil' aria-hidden='true'></i></span>
                            <a onclick='renamedata($old_rotas->id, `$old_rotas->rota_name`)'>Rename</a> 
                          </li>
                          <li>
                            <span class='tick-icon dropdown_icon'><i class='fa fa-check' aria-hidden='true'></i></span>
                            <a onclick='publishRotaEmployee($old_rotas->id,`$old_rotas->rota_name`)'>Publish</a>
                          </li>
                          <li>
                            <span class='delete-icon dropdown_icon'><i class='fa fa-trash' aria-hidden='true'></i></span>
                            <a onclick='DeleteRotaEmployee($old_rotas->id,`$old_rotas->rota_name`)' class='delete_btn'>Delete</a>
                          </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class='d-flex'>
                  <div class='pe-3'>Total: ".$total_hours_min_two."  (Incl. breaks)</div>
                  <div class='order-1'>".$old_rotas->rota_duration." days<span class='px-2'></span><span>
                    ".$count_emp_inactive." employees</span>
                  </div>
                </div>
              </div>
            </div>
          </div>";
            $old_unpublish_rota++;
        }
      }
    
    
      $data['new_active'] =  $arr_active;
      $data['new_inactive'] =  $arr_inactive;
      $data['old_active'] =  $old_active; 
      $data['old_inactive'] =  $old_inactive; 
      $data['sidebar'] = 'rota';
      $data['active_publish_rota_count'] = $active_publish_rota;
      $data['active_unpublish_rota_count'] = $active_unpublish_rota;
      $data['old_publish_rota_count'] = $old_publish_rota;
      $data['old_unpublish_rota_count'] = $old_unpublish_rota;

      echo json_encode($data);
  }
}
