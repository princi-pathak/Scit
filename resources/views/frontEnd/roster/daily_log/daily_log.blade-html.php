<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
@extends('frontEnd.layouts.master')
@section('title','Client')
@section('content')

@include('frontEnd.roster.common.roster_header')
<main class="page-content">
    <div class="container-fluid">

        <div class="topHeaderCont">
            <div>
                <h1>Daily Log</h1>
                <p class="header-subtitle">Record visitors, appointments, and activities</p>
            </div>
            <div class="header-actions addnewicons">
                <button class="btn allBtnUseColor" data-toggle="modal" data-target="#AddFirstEntry"><i class='bxdm  bx-plus'></i>  Add Entry</button>
            </div>
        </div>
        

        <div class="sectionWhiteBgAllUse">
            <div class="dailyLogsdateSec">
                <div class="date-slider">
                    <button class="nav-btn prev-btn"><i class='bx  bx-chevron-left'></i>  Previous</button>
                  
                    <div class="changeDateSlide">
                        <div class="date-display">
                            <div class="date-inner">
                                <span class="dateIcon"><i class='bx  bx-calendar'></i> </span>
                                <span class="day-text">Friday</span>,
                                <span class="full-date">January 16, 2026</span>
                            </div>                        
                        </div>
                        <input type="date" class="date-picker form-control"> 
                    </div>

                    <button class="nav-btn next-btn">Next <i class='bx  bx-chevron-right'></i> </button>

                </div>
            </div>
        </div>


        <div class="rota_dashboard-cards simpleCard">
            <div class="rota_dash-card blue">
                <div class="rota_dash-left">                    
                    <h2 class="rota_count">37</h2>
                    <p class="rota_title">Total Entries</p>
                </div>
            </div>

            <div class="rota_dash-card orangeClr">
                <div class="rota_dash-left">                    
                    <h2 class="rota_count greenText">36</h2>
                    <p class="rota_title">Visitors</p>
                </div>
            </div>

            <div class="rota_dash-card green">
                <div class="rota_dash-left">                    
                    <h2 class="rota_count orangeText">0</h2>
                    <p class="rota_title">Outings</p>
                </div>
            </div>

            <div class="rota_dash-card redClr">
                <div class="rota_dash-left">                    
                    <h2 class="rota_count blueText">1</h2>
                    <p class="rota_title">Follow-ups Required</p>
                </div>
            </div>

        </div>


        <div class="calendarTabs leaveRequesttabs m-t-20">
            <div class="tabs">
                <div class="input-group searchWithtabs">
                    <span class="input-group-addon btn-white"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Username">
                </div>
                <button class="tab active" data-tab="dailyLogAllAddEntry">
                    All
                </button>
                <button class="tab" data-tab="dailyLogVisitors">
                    Visitors
                </button>
                <button class="tab" data-tab="dailyLogOutings">
                    Outings
                </button>
                <button class="tab" data-tab="dailyLogMedical">
                    Medical
                </button>
                <button class="tab" data-tab="dailyLogFamily">
                    Family
                </button>
                <div class="timelineTab">
                    <button class="tab" data-tab="inactiveCarer">
                        Timeline
                    </button>
                    <button class="tab" data-tab="inactiveCarer">
                        List
                    </button>
                </div>
            </div>

            <div class="tab-content carertabcontent">
                <div class="content active" id="dailyLogAllAddEntry">
                    <div class="leave-card addEntryDetails">
                        <div class="carePlanWrapper">

                            <div class="stepTimelineContentBx">
                                <div class="entryCardbxTimeline">
                                    <div class="step-timeline">
                                        <div class="step-item">
                                            <span class="step-dot">13</span>
                                        </div>

                                        <div class="step-item active">
                                            <span class="step-dot">14</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="entryCardbx">
                                    <div class="planCard">
                                        <div class="planTop">
                                            <div class="planTitle">
                                                <span class="heartIcon blueLightclr"><i class='bx  bx-group'></i></span>
                                                Mickal
                                                <span class="roundBtntag blueLightclr">Visitor</span>
                                                <div class="inORoutTime">
                                                    <span><i class='bx  bx-clock'></i> </span>
                                                    <span class="gayClrIcon">In:</span>
                                                    <span> 16:21</span>
                                                    <span class="gayClrIcon"><i class='bx  bx-arrow-right'></i> </span>
                                                    <span class="gayClrIcon">Out:</span>
                                                    <span>05:25</span>                                     
                                                </div>
                                            </div>
                                            <div class="planActions">
                                                <button><i class="bx  bx-pencil"></i> </button>
                                                <button class="danger"><i class="bx  bx-trash"></i> </button>
                                            </div>
                                        </div>
                                        <div class="AddFirstDetailsEntry">
                                            <div class="planFooter">
                                                <span> webnnob</span>
                                            </div>
                                            <div class="planFooter">
                                                <span> Purpose of VisitPurpose of Visit</span>
                                            </div>
                                            <div class="planFooter">
                                                <span> Additional notes or observations</span>
                                            </div>
                                            <div class="planFooter">
                                                <span class="redalrttext"><i class='bx  bx-alert-circle'></i>  Follow-up: What needs to be done? </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="planCard">
                                        <div class="planTop">
                                            <div class="planTitle">
                                                <span class="heartIcon greenLightClr"><i class='bx  bx-group'></i></span>
                                                Mickal
                                                <span class="roundBtntag greenLightClr">Visitor</span>
                                                <div class="inORoutTime">
                                                    <span><i class='bx  bx-clock'></i> </span>
                                                    <span class="gayClrIcon">In:</span>
                                                    <span> 16:21</span>
                                                    <span class="gayClrIcon"><i class='bx  bx-arrow-right'></i> </span>
                                                    <span class="gayClrIcon">Out:</span>
                                                    <span>05:25</span>                                     
                                                </div>
                                            </div>
                                            <div class="planActions">
                                                <button><i class="bx  bx-pencil"></i> </button>
                                                <button class="danger"><i class="bx  bx-trash"></i> </button>
                                            </div>
                                        </div>
                                        <div class="AddFirstDetailsEntry">
                                            <div class="planFooter">
                                                <span> webnnob</span>
                                            </div>
                                            <div class="planFooter">
                                                <span> Purpose of VisitPurpose of Visit</span>
                                            </div>
                                            <div class="planFooter">
                                                <span> Additional notes or observations</span>
                                            </div>
                                            <div class="planFooter">
                                                <span class="redalrttext"><i class='bx  bx-alert-circle'></i>  Follow-up: What needs to be done? </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div> 
                <div class="content" id="dailyLogVisitors">
                    <div class="">
                        <div class="leave-card">
                            <div class="leavebanktabCont blankdesign">
                                <i class="fa fa-calendar-o"></i>
                                <h4>No entries for this day</h4>
                                <p>Record visitors, appointments, and other activities</p>                       
                                <button class="btn allbuttonDarkClr"  data-toggle="modal" data-target="#AddFirstEntry"><i class="bxdm  bx-plus"></i>  Add First Entry</button>                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content" id="dailyLogOutings">                       
                    <div class="">
                        <div class="leave-card">
                            <div class="leavebanktabCont blankdesign">
                                <i class="fa fa-calendar-o"></i>
                                <h4>No entries for this day</h4>
                                <p>Record visitors, appointments, and other activities</p>                       
                                <button class="btn allbuttonDarkClr"  data-toggle="modal" data-target="#AddFirstEntry"><i class="bxdm  bx-plus"></i>  Add First Entry</button>                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content" id="dailyLogMedical">                       
                    <div class="">
                        <div class="leave-card">
                            <div class="leavebanktabCont blankdesign">
                                <i class="fa fa-calendar-o"></i>
                                <h4>No entries for this day</h4>
                                <p>Record visitors, appointments, and other activities</p>                       
                                <button class="btn allbuttonDarkClr"  data-toggle="modal" data-target="#AddFirstEntry"><i class="bxdm  bx-plus"></i>  Add First Entry</button>                               
                            </div>
                        </div>
                    </div>
                </div>   
                <div class="content" id="dailyLogFamily">                       
                    <div class="">
                        <div class="leave-card">
                            <div class="leavebanktabCont blankdesign">
                                <i class="fa fa-calendar-o"></i>
                                <h4>No entries for this day</h4>
                                <p>Record visitors, appointments, and other activities</p>                       
                                <button class="btn allbuttonDarkClr"  data-toggle="modal" data-target="#AddFirstEntry"><i class="bxdm  bx-plus"></i>  Add First Entry</button>                               
                            </div>
                        </div>
                    </div>
                </div>     
            </div>
        </div>
       


   



    </div>












<!-- AddFirstEntry -->

<!-- add Carer Modal -->
        <div class="modal fade leaveCommunStyle" id="AddFirstEntry" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Log Entry</h4>
                    </div>
                    <div class="modal-body approveLeaveModal">
                    <div class="carer-form">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Date</label>
                                    <input type="date" class="form-control"  id=""  name="" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Visitor Name *</label>
                                    <input type="text" id=""  name="" required class="form-control">
                                </div>
                                <div class="col-md-12 m-t-10">
                                    <label>Entry Type *</label>
                                    <select class="form-control">
                                        <option>General Visitor</option>
                                        <option>Family Visit</option>
                                    </select>
                                </div>                                               
                                <div class="col-md-6  m-t-10">
                                    <label>Organization / Company</label>
                                    <input type="text"  id=""  name="" required class="form-control">
                                </div>
                                <div class="col-md-6  m-t-10">
                                    <label>Purpose of Visit</label>
                                    <input type="text" class="form-control"  id=""  name="" required placeholder="Reason for the visit">
                                </div>
                                <div class="col-md-12  m-t-10">
                                    <label>Related Client (optional)</label>
                                    <select class="form-control">
                                        <option>None</option>
                                        <option>Logan Jones</option>
                                    </select>
                                </div>                       
                                <div class="col-md-6  m-t-10">
                                    <label>Arrival Time (In)</label>
                                    <input type="time" class="form-control" id=""  name="" required >
                                </div>
                                <div class="col-md-6  m-t-10">
                                    <label>Departure Time (Out)</label>
                                    <input type="time" class="form-control" id=""  name="" required>
                                </div>

                                
                                <div class="col-md-12  m-t-10">
                                    <label>Notes</label>
                                   <textarea name="Notes" class="form-control" rows="5" cols="20" placeholder="Additional notes or observations" maxlength="1000"></textarea>
                                </div>
                            </div>

                            <div class="overtime followUpAction ">
                                <label>
                                    <input type="checkbox" name="available_for_overtime" value=""> Follow-up action required
                                </label>
                                <div class="extraHours" style="display: none;">
                                    <label>Follow-up Details</label>
                                     <textarea name="" class="form-control" rows="2" cols="20" placeholder="What needs to be done?" maxlength="1000"></textarea>
                                </div>
                            </div>

                            <!-- <div class="overtime">
                                <label>
                                    <input type="checkbox"> Follow-up action required
                                </label>
                            </div> -->

                            <div class="actions">
                                <button type="button" class="cancel">Cancel</button>
                                <button type="submit" class="submit">Add Entry</button>
                            </div>

                        </form>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>







<script>
    const tabs = document.querySelectorAll(".tab");
    const contents = document.querySelectorAll(".content");

    tabs.forEach(tab => {
        tab.addEventListener("click", () => {
            document.querySelector(".tab.active")?.classList.remove("active");
            tab.classList.add("active");

            let tabName = tab.getAttribute("data-tab");

            contents.forEach(content => {
                content.classList.remove("active");
            });

            document.getElementById(tabName).classList.add("active");
        });
    });
</script>

<script>
    let currentDate = new Date("2026-01-16");

    const dayText = document.querySelector(".day-text");
    const fullDate = document.querySelector(".full-date");
    const dateInner = document.querySelector(".date-inner");
    const datePicker = document.querySelector(".date-picker");

    function formatDate(date) {
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const parts = date.toLocaleDateString('en-US', options).split(',');
        return {
            day: parts[0],
            full: parts.slice(1).join(',').trim()
        };
    }

    function updateDate(direction = "next") {
        dateInner.style.transform = direction === "next"
            ? "translateX(-100%)"
            : "translateX(100%)";
        dateInner.style.opacity = "0";

        setTimeout(() => {
            const formatted = formatDate(currentDate);
            dayText.textContent = formatted.day;
            fullDate.textContent = formatted.full;

            dateInner.style.transform = "translateX(0)";
            dateInner.style.opacity = "1";
        }, 300);
    }

    document.querySelector(".next-btn").addEventListener("click", () => {
        currentDate.setDate(currentDate.getDate() + 1);
        updateDate("next");
    });

    document.querySelector(".prev-btn").addEventListener("click", () => {
        currentDate.setDate(currentDate.getDate() - 1);
        updateDate("prev");
    });

    datePicker.addEventListener("change", function () {
        currentDate = new Date(this.value);
        updateDate();
    });
</script>

<script>
    document.querySelectorAll('.step-item').forEach((item, index) => {
    if (index === 1) {
        item.classList.add('active');
    }
});
</script>

@endsection
</main>
