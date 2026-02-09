<?php

namespace App\Http\Controllers\frontEnd\Roster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth,DB,Session;
use Illuminate\Support\Facades\Validator;
use App\ServiceUser;
use App\Models\RosterDailyLog;
use App\Models\DailyLogCategory;
use App\Models\DailyLogSubCategory;

class DailyLogController extends Controller
{
    public function index(){
        $home_ids = Auth::user()->home_id;
		$ex_home_ids = explode(',', $home_ids);
		$home_id = $ex_home_ids[0];

        $data['client'] = ServiceUser::select('id','home_id','earning_scheme_label_id','name','user_name','phone_no','date_of_birth','child_type','room_type','current_location','street','care_needs','status','is_deleted')
        ->where(['home_id'=>$home_id,'is_deleted'=>0])->get();
       
        $data['categorys'] = DailyLogCategory::select('id','home_id','category','status')
        ->with(['subCategorys'=>function($q){
            $q->select('id','home_id','daily_cat_id','sub_cat','icon','color','status');
        }])
        ->where('status',1)->get();
        // echo "<pre>";print_r($data['followUpCount']);die;

        return view('frontEnd.roster.daily_log.daily_log',$data);
    }
    public function save_daily_log(Request $request){
        // echo "<pre>";print_r($request->all());die;
         $validator = Validator::make($request->all(), [
            'date'=>'required',
            'entry_type_id'=>'required',
        ]);
        if ($validator->fails()) {
            return [
                'success' => false,
                'errors' => $validator->errors()->first()
            ];
        }
        try{
            DB::beginTransaction();
            $home_ids = Auth::user()->home_id;
            $ex_home_ids = explode(',', $home_ids);
            $home_id = $ex_home_ids[0];
            $requestData = $request->all();
            $requestData['home_id'] = $home_id;
            $requestData['user_id'] = Auth::user()->id;
            $getId = RosterDailyLog::updateOrCreate(['id' => $requestData['id'] ?? null],$requestData);
            DB::commit();
            Session::flash('success','Saved successfully done.');
            return response()->json([
                'success'  => true,
                'message' => "Saved successfully done.",
                'data'=>json_decode('{}')
            ]);

        }catch (\Exception $e) {
            DB::rollBack();
            return [
                'success' => false,
                'message' => 'Error saving SOS Alert: ' . $e->getMessage(),
            ];
        }
    }
    public function daily_log_delete(Request $request){
        $validator = Validator::make($request->all(), [
            'id'=>'required|exists:roster_daily_logs,id',
        ]);
        if ($validator->fails()) {
            return [
                'success' => false,
                'errors' => $validator->errors()->first()
            ];
        }
        $dailyLog = RosterDailyLog::find($request->id);
        $dailyLog->deleted_at = now();
        $dailyLog->save();
        Session::flash('success','Daily Log deleted successfully done.');
        return [
                'success' => true,
                'message' => 'Daily Log deleted successfully done.'
            ];
    }
    public function daily_log_loadData(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $date = $request->date ?? now()->toDateString();
        $home_ids = Auth::user()->home_id;
		$ex_home_ids = explode(',', $home_ids);
		$home_id = $ex_home_ids[0];

        $baseQuery = RosterDailyLog::where('home_id', $home_id)
            ->where('user_id', Auth::id())
            ->whereDate('date', $date)
            ->when($request->filled('search_dailyLog'), function ($q) use ($request) {
                $q->where('visitor_name', 'like', '%' . $request->search_dailyLog . '%');
            });
        $total= (clone $baseQuery)->count();

        $visitorsCount = (clone $baseQuery)
                    ->whereHas('subCategorys', fn($q)=>$q->where('daily_cat_id',1))
                    ->count();

        $outingsCount= (clone $baseQuery)
                    ->whereHas('subCategorys', fn($q)=>$q->where('daily_cat_id',2))
                    ->count();

        $followUpCount= (clone $baseQuery)
                ->where('available_for_overtime',1)
                ->count();

        $allData = (clone $baseQuery)
                ->with(['subCategorys.dailyLogCategory'])
                ->orderByDesc('id')
                ->paginate(50);
        $visitorsData = (clone $baseQuery)
            ->whereHas('subCategorys', function ($q) {
                $q->where('daily_cat_id', 1);
            })
        ->with(['subCategorys.dailyLogCategory'])
        ->orderByDesc('id')
        ->paginate(50);
        
        $outingsData = (clone $baseQuery)
            ->whereHas('subCategorys', function ($q) {
                $q->where('daily_cat_id', 2);
            })
        ->with(['subCategorys.dailyLogCategory'])
        ->orderByDesc('id')
        ->paginate(50);
         $medicalData = (clone $baseQuery)
            ->whereHas('subCategorys', function ($q) {
                $q->where('id', 3);
            })
        ->with(['subCategorys.dailyLogCategory'])
        ->orderByDesc('id')
        ->paginate(50);
        $falmilyData = (clone $baseQuery)
            ->whereHas('subCategorys', function ($q) {
                    $q->where('id', 2);
                })
        ->with(['subCategorys'])
        ->orderByDesc('id')
        ->paginate(50);
        $allHtmlData = $this->htmlDataPrepare($allData);
        $visitorsHtmlData = $this->htmlDataPrepare($visitorsData);
        $outingsHtmlData = $this->htmlDataPrepare($outingsData);
        $medicalHtmlData = $this->htmlDataPrepare($medicalData);
        $falmilyHtmlData = $this->htmlDataPrepare($falmilyData);
       return response()->json([
            'success'=>true,
            'allHtmlData'=>$allHtmlData,
            'visitorsHtmlData'=>$visitorsHtmlData,
            'outingsHtmlData'=>$outingsHtmlData,
            'medicalHtmlData'=>$medicalHtmlData,
            'falmilyHtmlData'=>$falmilyHtmlData,
            'total'=>$total,
            'visitorsCount'=>$visitorsCount,
            'outingsCount'=>$outingsCount,
            'followUpCount'=>$followUpCount,
            'pagination' => [
                'all_pagination' => [
                    'next_page_url' => $allData->nextPageUrl(),
                    'prev_page_url' => $allData->previousPageUrl(),
                ],
                'visitors_pagination' => [
                    'next_page_url' => $visitorsData->nextPageUrl(),
                    'prev_page_url' => $visitorsData->previousPageUrl(),
                ],
                'outings_pagination' => [
                    'next_page_url' => $outingsData->nextPageUrl(),
                    'prev_page_url' => $outingsData->previousPageUrl(),
                ],
                'medical_pagination' => [
                    'next_page_url' => $medicalData->nextPageUrl(),
                    'prev_page_url' => $medicalData->previousPageUrl(),
                ],
                'family_pagination' => [
                    'next_page_url' => $falmilyData->nextPageUrl(),
                    'prev_page_url' => $falmilyData->previousPageUrl(),
                ],
            ],
        ]);
    }
    public function htmlDataPrepare($query){
        // DB::enableQueryLog();
        
        // $queries = DB::getQueryLog();
        // echo "<pre>";print_r($queries);
        $html_data = '';
        foreach ($query as $val) {

            $color = $val->subCategorys->color ?? '#dbeafe';
            $bgColor = $val->subCategorys->background_color ?? '#dbeafe';
            $icon = $val->subCategorys->icon ?? '';
            $subCat = $val->subCategorys->sub_cat ?? '';

            $html_data .= '
            <div class="stepTimelineContentBx">
                <div class="entryCardbxTimeline">
                    <div class="step-timeline">
                        <div class="step-item">
                            <span class="step-dot" 
                                style="color:' . $color . '; background:' . $bgColor . ';">
                                ' . (!empty($val->arrival_time) ? date('H:i', strtotime($val->arrival_time)) : '') . '
                            </span>
                        </div>
                    </div>
                </div>

                <div class="entryCardbx">
                    <div class="planCard">
                        <div class="planTop">
                            <div class="planTitle">
                                <span class="heartIcon blueLightclr" style="color:' . $color . '; background:' . $bgColor . ';"> <i class="' . $icon . '"></i></span>' . ($val->visitor_name ?? '') . '
                                <span class="roundBtntag blueLightclr"
                                    style="color:' . $color . '; background:' . $bgColor . ';">
                                    ' . $subCat . '
                                </span>

                                <div class="inORoutTime">
                                    <span><i class="bx bx-clock"></i></span>';

                                    if (!empty($val->arrival_time)) {
                                        $html_data .= '
                                        <span class="gayClrIcon">In:</span>
                                        <span>' . date('H:i', strtotime($val->arrival_time)) . '</span>
                                        <span class="gayClrIcon"><i class="bx bx-arrow-right"></i></span>';
                                    }

                                    if (!empty($val->departure_time)) {
                                        $html_data .= '
                                        <span class="gayClrIcon">Out:</span>
                                        <span>' . date('H:i', strtotime($val->departure_time)) . '</span>';
                                    }

                                $html_data .= '
                                </div>
                            </div>

                            <div class="planActions">
                                <button type="button" class="editRosterDailyLog"
                                    data-id="' . $val->id . '"
                                    data-date="' . $val->date . '"
                                    data-visitor_name="' . $val->visitor_name . '"
                                    data-entry_type_id="' . $val->entry_type_id . '"
                                    data-org_company="' . $val->org_company . '"
                                    data-purpose_visit="' . $val->purpose_visit . '"
                                    data-client_id="' . $val->client_id . '"
                                    data-arrival_time="' . $val->arrival_time . '"
                                    data-departure_time="' . $val->departure_time . '"
                                    data-notes="' . $val->notes . '"
                                    data-available_for_overtime="' . $val->available_for_overtime . '"
                                    data-follow_details="' . $val->follow_details . '"
                                    data-destination="' . $val->destination . '"
                                    data-transport_id="' . $val->transport_id . '"
                                    data-risk_assessment="' . $val->risk_assessment . '"
                                    data-outing_summary="' . $val->outing_summary . '">
                                    <i class="bx bx-pencil"></i>
                                </button>

                                <button class="danger delete_rosterDailyLog" 
                                    type="button" data-id="' . $val->id . '">
                                    <i class="bx bx-trash"></i>
                                </button>
                            </div>
                        </div>

                        <div class="AddFirstDetailsEntry">
                            <div class="planFooter">
                                <span>' . ($val->org_company ?? '') . '</span>
                            </div>
                            <div class="planFooter">
                                <span>' . ($val->purpose_visit ?? '') . '</span>
                            </div>
                            <div class="planFooter">
                                <span>' . ($val->notes ?? '') . '</span>
                            </div>';

                            if ($val->available_for_overtime == 1) {
                                $html_data .= '
                                <div class="planFooter">
                                    <span class="redalrttext">
                                        <i class="bx bx-alert-circle"></i>
                                        Follow-up: ' . ($val->follow_details ?? 'Required') . '
                                    </span>
                                </div>';
                            }

                        $html_data .= '
                        </div>
                    </div>
                </div>
            </div>';
        }
        return $html_data;
    }
}
