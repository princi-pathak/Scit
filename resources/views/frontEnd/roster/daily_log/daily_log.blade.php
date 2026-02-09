<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
@extends('frontEnd.layouts.master')
@section('title', 'Daily Log')
@section('content')

    @include('frontEnd.roster.common.roster_header')
    <style>
        ul.trendClass-list {
            max-height: 300px;
            overflow-y: auto;
            min-height: 100px;
        }
    </style>
    <main class="page-content">
        <div class="container-fluid">

            <div class="topHeaderCont">
                <div>
                    <h1>Daily Log</h1>
                    <p class="header-subtitle">Record visitors, appointments, and activities</p>
                </div>
                <div class="header-actions addnewicons">
                    <button class="btn allBtnUseColor addFirstEntryModal" data-toggle="modal"
                        data-target="#AddFirstEntry"><i class='bxdm  bx-plus'></i> Add Entry</button>
                </div>
            </div>


            <div class="sectionWhiteBgAllUse">
                <div class="dailyLogsdateSec">
                    <div class="date-slider">
                        <button class="nav-btn prev-btn"><i class='bx  bx-chevron-left'></i> Previous</button>

                        <div class="changeDateSlide">
                            <div class="date-display">
                                <div class="date-inner">
                                    <span class="dateIcon"><i class='bx  bx-calendar'></i> </span>
                                    <span class="day-text">{{date('l')}}</span>,
                                    <span class="full-date">{{date('F d, Y')}}</span>
                                </div>
                            </div>
                            <input type="date" class="date-picker form-control dateSearch">
                        </div>

                        <button class="nav-btn next-btn">Next <i class='bx  bx-chevron-right'></i> </button>

                    </div>
                </div>
            </div>


            <div class="rota_dashboard-cards simpleCard">
                <div class="rota_dash-card blue">
                    <div class="rota_dash-left">
                        <p class="rota_title">Total Entries</p>
                        <h2 class="rota_count" id="total">0</h2>
                    </div>
                </div>

                <div class="rota_dash-card orangeClr">
                    <div class="rota_dash-left">
                        <p class="rota_title">Visitors</p>
                        <h2 class="rota_count greenText" id="visitorsCount">0</h2>
                    </div>
                </div>

                <div class="rota_dash-card green">
                    <div class="rota_dash-left">
                        <p class="rota_title">Outings</p>
                        <h2 class="rota_count orangeText" id="outingsCount">0</h2>
                    </div>
                </div>

                <div class="rota_dash-card redClr">
                    <div class="rota_dash-left">
                        <p class="rota_title">Follow-ups Required</p>
                        <h2 class="rota_count" id="followUpCount">0</h2>
                    </div>
                </div>

            </div>


            <div class="calendarTabs leaveRequesttabs m-t-20">
                <div class="tabs">
                    <div class="input-group searchWithtabs">
                        <span class="input-group-addon btn-white"><i class="fa fa-search"></i></span>
                        <input type="text" class="form-control searchDailyLog" placeholder="Search entries...">
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
                        <button class="tab" data-tab="dailyLogAllAddEntry">
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
                            <div class="carePlanWrapper" id="renderAllHtmlData">

                            </div>
                            <div id="allPagination"></div>
                        </div>
                    </div>

                    <!-- daily log list view -->

                    <div class="content dailyLogList" id="inactiveCarer">
                        <div class="p-4 rtcozCardInDe rounded8 bgWhite">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex gap-4 w100">
                                    <div class="bgIconStaffT rounded50 pinkBadges">
                                        <i class="fa fa-archive f20"></i>
                                    </div>
                                    <div class="w100">
                                        <h5 class="h5Head">
                                            John Milton
                                        </h5>
                                        <p class="textGray fs13">
                                            He is the ceo of the company
                                        </p>

                                        <div class="d-flex gap-3 mb-3 align-items-center">
                                            <div class="inORoutTime">
                                                <span><i class="bx bx-clock"></i></span>
                                                <span class="gayClrIcon">In:</span>
                                                <span>11:31</span>
                                                <span class="gayClrIcon"><i class="bx bx-arrow-right"></i></span>
                                                <span class="gayClrIcon">Out:</span>
                                                <span>00:31</span>
                                            </div>
                                            <p class="textGray fs13 mb-0">
                                                <i class="bx bx-user"></i>
                                                Mrs Eleanor Margaret Vance
                                            </p>
                                        </div>
                                        <div>
                                            <p class="fs13"> <span class="font700 fas13">Purpose :</span> <span
                                                    class="textGray">Study matterial content searching</span> </p>
                                            <p class="textGray fs13">ther eis problem when i research</p>
                                            <div class="bg-orange-50 p-3 rounded8 w100">
                                                <p class="fs13 orangeIcon mb-0"> <i class="bx bx-alert-circle f18"></i>
                                                    <span class="font700 middleAlign">Follow-up required :
                                                    </span><span class="middleAlign"> Follow us for more detail</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex gap-3">
                                    <div>
                                        <span class="careBadg pinkBadges">Nurse</span>
                                    </div>
                                    <div class="planActions">
                                        <button type="button" class="editRosterDailyLog ms-0">
                                            <i class="bx bx-pencil"></i>
                                        </button>
                                    </div>
                                    <div class="planActions">

                                        <button class="danger delete_rosterDailyLog ms-0">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- daily log list view end-->


                    <div class="content" id="dailyLogVisitors">
                        <div class="leave-card addEntryDetails">
                            <div class="carePlanWrapper" id="renderVisitorHtmlData">

                            </div>
                            <div id="visitorsPagination"></div>
                        </div>
                    </div>
                    <div class="content" id="dailyLogOutings">
                        <div class="leave-card addEntryDetails">
                            <div class="carePlanWrapper" id="renderOutingsHtmlData">

                            </div>
                            <div id="outingsPagination"></div>
                        </div>
                    </div>
                    <div class="content" id="dailyLogMedical">
                        <div class="leave-card addEntryDetails">
                            <div class="carePlanWrapper" id="renderMedicalHtmlData">

                            </div>
                            <div id="medicalsPagination"></div>
                        </div>
                    </div>
                    <div class="content" id="dailyLogFamily">
                        <div class="leave-card addEntryDetails">
                            <div class="carePlanWrapper" id="renderFamilyHtmlData">

                            </div>
                            <div id="familiesPagination"></div>
                        </div>
                    </div>
                </div>
            </div>







        </div>












        <!-- AddFirstEntry -->

        <!-- add Carer Modal -->
        <div class="modal fade leaveCommunStyle" id="AddFirstEntry" tabindex="1" role="dialog"
            aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="logEntryModalTitle">Add Log Entry</h4>
                    </div>
                    <div class="modal-body approveLeaveModal">
                        <div class="carer-form">
                            <form id="dailyLogForm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Date</label>
                                        <input type="date" class="form-control" id="entry_date" name="date"
                                            value="{{ date('Y-m-d') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Entry Type *</label>
                                        <div class="trendClass-select small" id="entryTypeDiv" tabindex="0">
                                            <span class="current" id="entry_type_id" name="entry_type_id">Select</span>
                                            <ul class="trendClass-list">
                                                @foreach($categorys as $category)
                                                    <li class="trendClass-option" disabled>— {{ $category->category }} —</li>
                                                    @foreach($category->subCategorys as $sub)
                                                        <li class="trendClass-option" data-value="{{ $sub->id }}"
                                                            data-icon="{{ $sub->icon }}" data-color="{{ $sub->color }}">
                                                            {{ $sub->sub_cat }}
                                                        </li>
                                                    @endforeach

                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- blue form -->
                                    <div class="col-lg-12">
                                        <div class="outgoingForm">
                                            <div class="bg-blue-50 blueDailyForm p-4 rounded8 m-t-10">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <h6 class="h6Head darkBlueTextp">
                                                            Outing Details
                                                        </h6>

                                                    </div>
                                                    <div class="col-lg-12 m-t-10">
                                                        <label>Client *
                                                        </label>
                                                        <div class="trendClass-select small has-value">
                                                            <span class="current">
                                                                Outing - Hospital Visit
                                                            </span>
                                                            <ul class="trendClass-list">
                                                                <li class="trendClass-option" disabled="">— Select —</li>
                                                                <li class="trendClass-option">
                                                                    General Visitor
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 m-t-5">
                                                        <label>Destination</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="e.g., Dr Smith's Surgery, ABC School, Town Centre">
                                                    </div>
                                                    <div class="col-lg-12 m-t-10">
                                                        <label>Transport </label>
                                                        <div class="trendClass-select small has-value">
                                                            <span class="current">
                                                                Abmulance
                                                            </span>
                                                            <ul class="trendClass-list">
                                                                <li class="trendClass-option" disabled="">- Select -</li>
                                                                <li class="trendClass-option">
                                                                    Mini Bus
                                                                </li>
                                                                <li class="trendClass-option">
                                                                    car
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 m-t-10">
                                                        <label>Accompanying Staff </label>
                                                    </div>

                                                    <div class="col-lg-6 m-t-10">
                                                        <div class="addDailyCheck">
                                                            <label for="acc1">
                                                                <input type="checkbox" id="acc1">
                                                                Shaheem Navad</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 m-t-10">
                                                        <div class="addDailyCheck">
                                                            <label for="acc2">
                                                                <input type="checkbox" id="acc2">
                                                                Naveed Sharma</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 m-t-10">
                                                        <div class="addDailyCheck">
                                                            <label for="risk1">
                                                                <input type="checkbox" id="risk1">
                                                                <strong>Risk assessment completed for this
                                                                    outing</strong></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12  m-t-10">
                                                        <label>Outing Outcome / Summary</label>
                                                        <textarea name="notes" class="form-control" rows="3" cols="20"
                                                            placeholder="How did the outing go? Any issues or concerns?"
                                                            maxlength="1000"></textarea>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 m-t-10">
                                                <label for="">Departure Time (Left)</label>
                                                <input type="time" class="form-control">
                                            </div>
                                            <div class="col-lg-6 m-t-10">
                                                <label for="">Return Time (Back)</label>
                                                <input type="time" class="form-control">
                                            </div>
                                            <div class="col-lg-12 m-t-10">
                                                <label for="">Purpose of outing</label>
                                                <input type="text" class="form-control" placeholder="Reason for the outing">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- blue form end-->
                                    <div class="col-md-12 mt-5">
                                        <label>Visitor Name *</label>
                                        <input type="text" id="visitor_name" name="visitor_name" required
                                            class="form-control">
                                    </div>
                                    <div class="col-md-12  m-t-10">
                                        <label>Organization / Company</label>
                                        <input type="text" id="org_company" name="org_company" required
                                            class="form-control">
                                    </div>
                                    <div class="col-md-12  m-t-10">
                                        <label>Related Client (optional)</label>
                                        <div class="trendClass-select small" id="clientDiv" tabindex="0">
                                            <span class="current" id="client_id" name="client_id">Select</span>
                                            <ul class="trendClass-list">
                                                @foreach($client as $clientVal)
                                                    <li class="trendClass-option" data-value="{{$clientVal->id}}">
                                                        {{$clientVal->name}}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6  m-t-10">
                                        <label>Arrival Time (In)</label>
                                        <input type="time" class="form-control" id="arrival_time" name="arrival_time"
                                            required>
                                    </div>
                                    <div class="col-md-6  m-t-10">
                                        <label>Departure Time (Out)</label>
                                        <input type="time" class="form-control" id="departure_time" name="departure_time"
                                            required>
                                    </div>
                                    <div class="col-md-12  m-t-10">
                                        <label>Purpose of Visit</label>
                                        <input type="text" class="form-control" id="purpose_visit" name="purpose_visit"
                                            required placeholder="Reason for the visit">
                                    </div>
                                    <div class="col-md-12  m-t-10">
                                        <label>Notes</label>
                                        <textarea name="notes" id="notes" class="form-control" rows="5" cols="20"
                                            placeholder="Additional notes or observations" maxlength="1000"></textarea>
                                    </div>
                                </div>

                                <div class="overtime followUpAction ">
                                    <label>
                                        <input type="checkbox" name="available_for_overtime" id="available_for_overtime"
                                            value="0"> Follow-up action required
                                    </label>
                                    <div class="extraHours12 followUpDetails" style="display: none;">
                                        <label>Follow-up Details</label>
                                        <textarea name="follow_details" id="follow_details" class="form-control" rows="2"
                                            cols="20" placeholder="What needs to be done?" maxlength="1000"></textarea>
                                    </div>
                                </div>

                                <div class="actions">
                                    <input type="hidden" id="dailylog_id" name="id">
                                    <button type="button" class="cancel" data-dismiss="modal"
                                        aria-hidden="true">Cancel</button>
                                    <button type="button" class="submit submit_EntryData">Add Entry</button>
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
            let currentDate = new Date();
            const dayText = document.querySelector(".day-text");
            const fullDate = document.querySelector(".full-date");
            const dateInner = document.querySelector(".date-inner");
            const datePicker = document.querySelector(".date-picker");

            function formatDate(date) {
                const options = {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                const parts = date.toLocaleDateString('en-US', options).split(',');
                return {
                    day: parts[0],
                    full: parts.slice(1).join(',').trim()
                };
            }

            function updateDate(direction = "next") {
                dateInner.style.transform = direction === "next" ?
                    "translateX(-100%)" :
                    "translateX(100%)";
                dateInner.style.opacity = "0";

                setTimeout(() => {
                    let new_date = currentDate.toLocaleDateString('en-CA');
                    $(".searchDailyLog").val('');
                    loadDailyLogs(undefined, new_date);
                    const formatted = formatDate(currentDate);
                    console.log(formatted)
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

        <!-- select js -->
        <script>
            document.querySelectorAll(".trendClass-select").forEach(select => {
                const current = select.querySelector(".current");
                const options = select.querySelectorAll(".trendClass-option");

                // 🔹 initial state (muted if Select)
                if (current.textContent.trim().toLowerCase() === "select") {
                    select.classList.remove("has-value");
                }

                // Toggle dropdown
                select.addEventListener("click", e => {
                    select.classList.toggle("open");
                });

                // Option click
                options.forEach(option => {
                    option.addEventListener("click", e => {
                        e.stopPropagation();
                        // if (option.classList.contains("disabled")) return;
                        if (option.hasAttribute("disabled")) return;

                        options.forEach(o => o.classList.remove("selected"));
                        option.classList.add("selected");

                        current.innerHTML = option.innerHTML;
                        current.setAttribute('data-id', option.getAttribute('data-value'));

                        // ✅ change color logic
                        if (current.textContent.trim().toLowerCase() === "select") {
                            select.classList.remove("has-value"); // muted
                        } else {
                            select.classList.add("has-value"); // black
                        }

                        select.classList.remove("open");
                    });
                });
            });

            // Close on outside click
            document.addEventListener("click", e => {
                document.querySelectorAll(".trendClass-select.open").forEach(openSelect => {
                    if (!openSelect.contains(e.target)) {
                        openSelect.classList.remove("open");
                    }
                });
            });
        </script>

        <!-- select end -->
        <script>
            $(document).on('click', '#available_for_overtime', function () {
                if ($('#available_for_overtime').is(':checked')) {
                    $('.followUpDetails').show();
                    $('#available_for_overtime').val(1);
                } else {
                    var dailylog_id = $("#dailylog_id").val();
                    $('.followUpDetails').hide();
                    if (!dailylog_id) {
                        $("#follow_details").val('');
                    }
                    $("#available_for_overtime").val(0);
                }
            });
            $(document).on('click', '.submit_EntryData', function () {
                $(".submit_EntryData").attr('disabled', 'diabled');
                var entry_date = $("#entry_date");
                var entry_type_id = $("#entry_type_id").attr('data-id');
                var visitor_name = $("#visitor_name");
                var org_company = $("#org_company");
                var client_id = $("#client_id").attr('data-id');
                var arrival_time = $("#arrival_time");
                var departure_time = $("#departure_time");
                var purpose_visit = $("#purpose_visit");
                var notes = $("#notes");
                var available_for_overtime = $("#available_for_overtime").val();
                var follow_details = $("#follow_details");
                var dailylog_id = $("#dailylog_id").val();
                var url = "{{ url('/roster/save-daily-log') }}";
                if (dailylog_id) {
                    url = "{{ url('/roster/edit-daily-log') }}";
                }

                if (entry_date.val() == '') {
                    entry_date.css('border', '1px solid red').focus();
                    return false;
                } else if (entry_type_id == '' || entry_type_id == undefined) {
                    entry_date.css('border', '');
                    $("#entryTypeDiv").css('border', '1px solid red').focus();
                    return false;
                } else if (visitor_name.val() == '') {
                    $("#entryTypeDiv").css('border', '');
                    visitor_name.css('border', '1px solid red').focus();
                    return false;
                } else {
                    visitor_name.css('border', '');
                    $.ajax({
                        url: url,
                        type: "post",
                        data: {
                            date: entry_date.val(),
                            entry_type_id: entry_type_id,
                            visitor_name: visitor_name.val(),
                            org_company: org_company.val(),
                            client_id: client_id,
                            arrival_time: arrival_time.val(),
                            departure_time: departure_time.val(),
                            purpose_visit: purpose_visit.val(),
                            notes: notes.val(),
                            available_for_overtime: available_for_overtime,
                            follow_details: follow_details.val(),
                            id: dailylog_id,
                            _token: "{{csrf_token()}}"
                        },
                        success: function (res) {
                            console.log(res);
                            if (typeof isAuthenticated === "function") {
                                if (isAuthenticated(res) == false) {
                                    return false;
                                }
                            }
                            if (res.success == false) {
                                alert(res.errors);
                            } else if (res.success == true) {
                                location.reload();
                            } else {
                                alert("Something went wrong");
                            }
                        }
                    });
                }
            });
            $(document).on('click', '.editRosterDailyLog', function () {
                $("#logEntryModalTitle").text("Edit Log Entry");
                $(".submit_EntryData").text("Edit Entry");
                $("#AddFirstEntry").modal("show");
                var id = $(this).data('id');
                var date = $(this).data('date');
                var visitor_name = $(this).data('visitor_name');
                var entry_type_id = $(this).data('entry_type_id');
                var org_company = $(this).data('org_company');
                var purpose_visit = $(this).data('purpose_visit');
                var client_id = $(this).data('client_id');
                var arrival_time = $(this).data('arrival_time');
                var departure_time = $(this).data('departure_time');
                var notes = $(this).data('notes');
                var available_for_overtime = $(this).data('available_for_overtime');
                var follow_details = $(this).data('follow_details');

                $("#dailylog_id").val(id);
                let entryType = document.getElementById('entry_type_id');
                let entryTypeList = entryType.nextElementSibling;
                var entry_type_idElement = $("#entry_type_id");
                dropdownSelect(entryTypeList, entry_type_id, entry_type_idElement);

                $("#visitor_name").val(visitor_name);
                $("#org_company").val(org_company);

                let relatedClient = document.getElementById('client_id');
                let clientList = relatedClient.nextElementSibling;
                let client_idElment = $("#client_id");
                dropdownSelect(clientList, client_id, client_idElment);

                $("#arrival_time").val(arrival_time);
                $("#departure_time").val(departure_time);
                $("#purpose_visit").val(purpose_visit);
                $("#notes").val(notes);
                $("#available_for_overtime").val(available_for_overtime);
                if (available_for_overtime == 1) {
                    $('.followUpDetails').show();
                    $("#available_for_overtime").prop('checked', true);
                } else {
                    $('.followUpDetails').hide();
                    $("#available_for_overtime").prop('checked', false);
                }

                $("#follow_details").val(follow_details);

            });

            function dropdownSelect(list, selectedId, elementDiv) {
                list.querySelectorAll('.trendClass-option[data-value]').forEach(function (el) {
                    if (el.dataset.value == selectedId) {
                        elementDiv.attr('data-id', selectedId)
                        elementDiv.text(el.innerText.trim());
                    }
                });
            }
            // $('#entry_date').datepicker({
            //     format: 'dd-mm-yyyy'
            // });
            $(document).on('click', '.addFirstEntryModal', function () {
                $("#dailyLogForm")[0].reset();
                $("#entry_type_id").removeAttr('data-id').text("Select");
                $("#client_id").removeAttr('data-id').text("Select");
                $("#available_for_overtime").val(0).prop('checked', false);
                $(".followUpDetails").hide();
                $("#logEntryModalTitle").text("Add Log Entry");
                $(".submit_EntryData").text("Add Entry");
            });
            $(document).on('click', '.delete_rosterDailyLog', function () {
                if (confirm("Are you sure to delete?")) {
                    var id = $(this).data('id');
                    $.ajax({
                        url: "{{ url('/roster/daily-log-delete') }}",
                        type: "post",
                        data: {
                            id: id,
                            _token: "{{csrf_token()}}"
                        },
                        success: function (res) {
                            console.log(res);
                            if (typeof isAuthenticated === "function") {
                                if (isAuthenticated(res) == false) {
                                    return false;
                                }
                            }
                            if (res.success == false) {
                                alert(res.errors);
                            } else {
                                location.reload();
                            }
                        }
                    });
                }
            });
            $(document).on('keyup', '.searchDailyLog', function () {
                loadDailyLogs(undefined, undefined, $(this).val());
            });
            $(document).on('change', '.dateSearch', function () {
                $(".searchDailyLog").val('');
                loadDailyLogs(undefined, $(this).val());
            })
        </script>
        <script>
            $(document).ready(function () {
                loadDailyLogs();
            });
            var old_date = '';
            var old_search = '';

            function loadDailyLogs(pageUrl = '{{ url("/roster/daily-log-loadData") }}', date = null, search = null) {
                if (date) {
                    old_date = date;
                }
                if (old_date) {
                    date = old_date;
                }
                // if(search){
                //     old_search = search;
                // }
                // if(old_search){
                //     search=old_search;
                // }
                $.ajax({
                    url: pageUrl,
                    type: "post",
                    data: {
                        date: date,
                        search_dailyLog: search,
                        _token: "{{csrf_token()}}"
                    },
                    success: function (res) {
                        console.log(res);
                        if (typeof isAuthenticated === "function") {
                            if (isAuthenticated(res) == false) {
                                return false;
                            }
                        }
                        if (res.success == false) {
                            alert(res.errors);
                        } else {
                            $("#total").text(res.total);
                            $("#visitorsCount").text(res.visitorsCount);
                            $("#outingsCount").text(res.outingsCount);
                            $("#followUpCount").text(res.followUpCount);
                            var allHtmlData = res.allHtmlData;
                            var visitorsHtmlData = res.visitorsHtmlData;
                            var outingsHtmlData = res.outingsHtmlData;
                            var medicalHtmlData = res.medicalHtmlData;
                            var falmilyHtmlData = res.falmilyHtmlData;
                            var no_data = `<div class="">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="leave-card">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="leavebanktabCont blankdesign">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <i class="fa fa-calendar-o"></i>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <h4>No entries for this day</h4>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <p>Record visitors, appointments, and other activities</p>                       
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <button class="btn allbuttonDarkClr addFirstEntryModal"  data-toggle="modal" data-target="#AddFirstEntry"><i class="bxdm  bx-plus"></i>  Add First Entry</button>                               
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>`;
                            if (allHtmlData.length == 0) {
                                $("#renderAllHtmlData").html(no_data);
                            } else {
                                $("#renderAllHtmlData").html(allHtmlData);
                                renderPagination('all', res.pagination.all_pagination);
                            }
                            if (visitorsHtmlData.length == 0) {
                                $("#renderVisitorHtmlData").html(no_data);
                            } else {
                                $("#renderVisitorHtmlData").html(visitorsHtmlData);
                                renderPagination('visitors', res.pagination.visitors_pagination);
                            }
                            if (outingsHtmlData.length == 0) {
                                $("#renderOutingsHtmlData").html(no_data);
                            } else {
                                $("#renderOutingsHtmlData").html(outingsHtmlData);
                                renderPagination('outings', res.pagination.outings_pagination);
                            }
                            if (medicalHtmlData.length == 0) {
                                $("#renderMedicalHtmlData").html(no_data);
                            } else {
                                $("#renderMedicalHtmlData").html(medicalHtmlData);
                                renderPagination('medicals', res.pagination.medical_pagination);
                            }
                            if (falmilyHtmlData.length == 0) {
                                $("#renderFamilyHtmlData").html(no_data);
                            } else {
                                $("#renderFamilyHtmlData").html(falmilyHtmlData);
                                renderPagination('families', res.pagination.family_pagination);
                            }

                        }
                    }
                });
            }

            function renderPagination(tab, pagination) {
                var paginationControls = $("#" + tab + "Pagination");
                paginationControls.empty();
                if (pagination.prev_page_url) {
                    paginationControls.append('<button class="profileDrop" onclick="loadDailyLogs( \'' + pagination.prev_page_url + '\')">Previous</button>');
                }
                if (pagination.next_page_url) {
                    paginationControls.append('<button class="profileDrop" onclick="loadDailyLogs( \'' + pagination.next_page_url + '\')">Next</button>');
                }
            }
        </script>
@endsection
</main>