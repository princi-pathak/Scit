<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
@extends('frontEnd.layouts.master')
@section('title','Client')
@section('content')

@include('frontEnd.roster.common.roster_header')

 <main class="page-content">
    <div class="container-fluid">
      
            <div class="topHeaderCont">
                <div>
                    <h1>Logan Jones</h1>
                    <p class="header-subtitle"><span>Inactive</span>local authority</p>
                </div>
                <div class="header-actions addnewicons">
                    <button class="btn borderBtn"><i class='bx  bx-edit'></i>  Edit Client</button>  
                    <button class="btn borderBtn"><i class='bx  bx-arrow-in-up-square-half'></i> Import Documents</button>  
                    <button class="btn allBtnUseColor"><i class='bx  bx-sparkles'></i>  Generate Care Plan</button>
                                     
                </div>
            </div>


       <div class="calendarTabs leaveRequesttabs employeeDetailsTabs  m-t-20">
         <div class="clientOverTabs">
               <div class="tabs p-1 ">               
                    <button class="tab active" data-tab="clientDetailsTab">  Details </button>
                    <button class="tab" data-tab="clientOnboardingTab">  Onboarding </button>
                    <button class="tab" data-tab="clientCareTasksTab"> Care Tasks </button>
                    <button class="tab" data-tab="clientAlertsTab">  Alerts </button>
                    <button class="tab" data-tab="clientAIInsightsTab"> AI Insights </button>
                    <button class="tab" data-tab="clientCarePlanTab"> Care Plan </button>
                    <button class="tab" data-tab="clientRiskAssessmentsTab"> Risk Assessments </button>
                    <button class="tab" data-tab="clientMedicationTab"> Medication </button>
                    <button class="tab" data-tab="clientPEEPTab"> PEEP </button>
                    <button class="tab" data-tab="clientRepositioningTab"> Repositioning </button>
                    <button class="tab" data-tab="clientBehaviorTab"> Behavior </button>
                    <button class="tab" data-tab="clientMentalCapacityTab"> Mental Capacity </button>
                    <button class="tab" data-tab="clientDoLSTab"> DoLS </button>
                    <button class="tab" data-tab="clientDNACPRTab"> DNACPR </button>
                    <button class="tab" data-tab="clientSafeguardingTab"> Safeguarding </button>
                    <button class="tab" data-tab="clientConsentTab"> Consent </button>
                    <button class="tab" data-tab="clientEmergencyTab"> Emergency </button>
                    <button class="tab" data-tab="clientDocumentsTab"> Documents </button>
                    <button class="tab" data-tab="clientProgressReportTab"> Progress Report </button>
                </div>
            </div>

            <!-- TAB CONTENT -->
            <div class="tab-content carertabcontent">
                <div class="content active" id="clientDetailsTab">
                    <div class="sectionWhiteBgAllUse">
                        <div class="profile-details-card">
                            <div class="section two-col">
                                <div>
                                    <h3>Client Information</h3>
                                    <div class="item">
                                        <span class="label">Full Name</span>
                                        <span class="value">Logan Jones</span>
                                    </div>
                                    <div class="item">
                                        <span class="label">Date Of Birth</span>
                                        <span class="value">29.10.2009</span>
                                    </div>
                                    <div class="item">
                                        <span class="label">Address</span>
                                        <!-- <span class="value">
                                        Aries House, 60 Garmoyle Road,, Liverpool L15 3JH
                                        </span> -->
                                    </div>
                                </div>

                                <div>
                                    <h3>Care Details</h3>
                                    <div class="item">
                                        <span class="label">Funding Type</span>
                                        <span class="value">Local authority</span>
                                    </div>
                                    <div class="item">
                                        <span class="label">Mobility</span>
                                        <span class="value">independent</span>
                                    </div>
                                    <div class="item carertabcontent">
                                        <span class="label">Care Needs</span>
                                         <div class="sectionCarer">

                                            <div class="tags">
                                                <span> Emotional support (CAMHS)</span>  
                                                <span> Improve school attendance</span> 
                                                <span> Regular ECHP review</span>
                                                <span> Dental hygiene</span>
                                                <span>Medication </span>
                                                <button class="care-more">+10 more</button>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="item">
                                        <span class="label">Medical Notes</span>
                                        <span class="value">Diagnosis of ADHD; currently not on Elvanse due to substance misuse concerns. History of elevated heart rate/shakiness, EKG showed irregularity, blood tests showed high white blood cells (infection) but normal haemoglobin. Refused fasting blood test. Suffers from headaches/migraines, prescribed Zolmitriptan, advised to avoid triggers like cheese, coke, caffeine, chocolate, citrus. Was prescribed Folic Acid for low folate levels but refused to take it. History of dental procedures and fear of dentists. Allergic reaction to eyelash glue containing latex; currently experiencing new skin reactions (around eyes, nose, hairline) and awaiting dermatology referral (48-month waiting list). Has undergone surgery for 4 teeth extractions. Nan has been diagnosed with sundown dementia.</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div> 
                <div class="content" id="clientOnboardingTab">    
                    
                    <div class="leave-card">
                        <div class="leavebanktabCont">
                            <p>No onboarding workflow found for this client </p>
                        </div>
                    </div>

                </div>
                <div class="content" id="clientCareTasksTab">                    
                   <div class="careTaskstbbg sectionWhiteBgAllUse p-0">
                    <header class="panel-heading headingCapitilize careTaskheader"> 
                        <div class="clientHeadung">
                            <div class="onlyheadingmain"><i class='bx bx-checklist'></i> Care Tasks </div>
                        </div>
                        <div class="actions mt-0">
                            <button class="btn borderBtn"> <i class="bx  bx-sparkles"></i> AI Generate from Care Needs</button>
                            <button class="allBtnUseColor"> <i class='bx  bx-plus'></i> Add Task</button>
                        </div>
                    </header>
                        <div class="p-20 p-b-0">
                            <div class="rota_dashboard-cards simpleCard">
                                <div class="rota_dash-card">
                                    <div class="rota_dash-left">
                                        <p class="rota_title">Total Tasks</p>
                                        <h2 class="rota_count">37</h2>
                                    </div>
                                </div>

                                <div class="rota_dash-card orangeClr">
                                    <div class="rota_dash-left">
                                        <p class="rota_title">Critical Priority</p>
                                        <h2 class="rota_count greenText">36</h2>
                                    </div>
                                </div>

                                <div class="rota_dash-card green">
                                    <div class="rota_dash-left">
                                        <p class="rota_title">High Priority</p>
                                        <h2 class="rota_count orangeText">0</h2>
                                    </div>
                                </div>

                                <div class="rota_dash-card redClr">
                                    <div class="rota_dash-left">
                                        <p class="rota_title">Two Staff Required</p>
                                        <h2 class="rota_count">1</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-20 p-t-0">
                            <div class="caretasknameandnumber m-b-10">                                
                                <span >2</span>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="profile-card careTasksCard redborderleft mb-0">
                                        <div class="card-header">
                                            <div class="user">
                                                <div class="info">
                                                    <div class="name"><a href="#!">Emotional support session with counselor</a></div>
                                                    <!-- <div class="role">part time</div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sectionCarer">
                                            <div class="tags">
                                                <span class="radShowbtn">critical</span> 
                                                <span class="inactive">Weekly</span>
                                            </div>
                                        </div>
                                        <div class="details">
                                            <div class="item">
                                                <i class='bx  bx-clock'></i> <span>30 minutes</span>
                                            </div>
                                            <div class="item redalrttext">
                                                <i class='bx  bx-alert-circle'></i> <span>Alerts: Missed</span>
                                            </div>
                                        </div>                                        
                                        <div class="actions">
                                            <button class="edit" data-id="120"> <i class="fa-regular fa-pen-to-square"></i> Edit </button>
                                            <button class="delete" data-id="120"> <i class="fa-regular fa-trash-can"></i> </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">                                    
                                      <div class="profile-card careTasksCard blueborderleft mb-0">
                                        <div class="card-header">
                                            <div class="user">
                                                <div class="info">
                                                    <div class="name"><a href="#!">Daily emotional support check-in</a></div>
                                                    <!-- <div class="role">part time</div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sectionCarer">
                                            <div class="tags">
                                                <span class="yellow">critical</span> 
                                                <span class="inactive">Weekly</span>
                                            </div>
                                        </div>
                                        <div class="details">
                                            <div class="item">
                                                <i class='bx  bx-clock'></i> <span>30 minutes</span>
                                            </div>
                                            <div class="item redalrttext">
                                                <i class='bx  bx-alert-circle'></i> <span>Alerts: Missed</span>
                                            </div>
                                        </div>                                        
                                        <div class="actions">
                                            <button class="edit" data-id="120"> <i class="fa-regular fa-pen-to-square"></i> Edit </button>
                                            <button class="delete" data-id="120"> <i class="fa-regular fa-trash-can"></i> </button>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>    
                        <div class="p-20 p-t-0">
                            <div class="caretasknameandnumber m-b-10">
                                Nutrition
                                <span >3</span>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="profile-card careTasksCard redborderleft m-b-15">
                                        <div class="card-header">
                                            <div class="user">
                                                <div class="info">
                                                    <div class="name"><a href="#!">Meal planning with nutrients focusing on balanced diet</a></div>
                                                    <!-- <div class="role">part time</div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sectionCarer">
                                            <div class="tags">
                                                <span class="yellow">critical</span> 
                                                <span class="inactive">Weekly</span>
                                            </div>
                                        </div>
                                        <div class="details">
                                            <div class="item">
                                                <i class='bx  bx-clock'></i> <span>30 minutes</span>
                                            </div>
                                            <div class="item redalrttext">
                                                <i class='bx  bx-alert-circle'></i> <span>Alerts: Missed</span>
                                            </div>
                                        </div>                                        
                                        <div class="actions">
                                            <button class="edit" data-id="120"> <i class="fa-regular fa-pen-to-square"></i> Edit </button>
                                            <button class="delete" data-id="120"> <i class="fa-regular fa-trash-can"></i> </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                      <div class="profile-card careTasksCard blueborderleft m-b-15">
                                        <div class="card-header">
                                            <div class="user">
                                                <div class="info">
                                                    <div class="name"><a href="#!">Follow healthy diet plan</a></div>
                                                    <!-- <div class="role">part time</div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sectionCarer">
                                            <div class="tags">
                                                <span class="yellow">critical</span> 
                                                <span class="inactive">Weekly</span>
                                            </div>
                                        </div>
                                        <div class="details">
                                            <div class="item">
                                                <i class='bx  bx-clock'></i> <span>30 minutes</span>
                                            </div>
                                            <div class="item redalrttext">
                                                <i class='bx  bx-alert-circle'></i> <span>Alerts: Missed</span>
                                            </div>
                                        </div>                                        
                                        <div class="actions">
                                            <button class="edit" data-id="120"> <i class="fa-regular fa-pen-to-square"></i> Edit </button>
                                            <button class="delete" data-id="120"> <i class="fa-regular fa-trash-can"></i> </button>
                                        </div>
                                    </div>
                                </div>
                                   <div class="col-md-6">
                                      <div class="profile-card careTasksCard blueborderleft m-b-15">
                                        <div class="card-header">
                                            <div class="user">
                                                <div class="info">
                                                    <div class="name"><a href="#!">Follow healthy diet plan</a></div>
                                                    <!-- <div class="role">part time</div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sectionCarer">
                                            <div class="tags">
                                                <span class="yellow">critical</span> 
                                                <span class="inactive">Weekly</span>
                                            </div>
                                        </div>
                                        <div class="details">
                                            <div class="item">
                                                <i class='bx  bx-clock'></i> <span>30 minutes</span>
                                            </div>
                                            <div class="item redalrttext">
                                                <i class='bx  bx-alert-circle'></i> <span>Alerts: Missed</span>
                                            </div>
                                        </div>                                        
                                        <div class="actions">
                                            <button class="edit" data-id="120"> <i class="fa-regular fa-pen-to-square"></i> Edit </button>
                                            <button class="delete" data-id="120"> <i class="fa-regular fa-trash-can"></i> </button>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>                    
                         
                    </div>
                </div>
                <div class="content" id="clientAlertsTab">
                     <div class="careTaskstbbg sectionWhiteBgAllUse p-0">
                        <header class="panel-heading headingCapitilize clntalertheader"> 
                            <div class="clientHeadung">
                                <div class="onlyheadingmain radIconClr"><i class='bx  bx-alert-triangle'></i></i> Client Alerts </div>
                                <p>Manage important alerts and warnings for this client</p>
                            </div>
                           
                            <div class="actions mt-0">
                                <button class="radShowbtn addalertClientDetailsBtn"> <i class='bx  bx-plus'></i> Add alert</button>
                            </div>
                        </header>

                        <div class="p-20">
                            <div class="clientFilterform addalertClientDetailsform" style="border: 2px solid #fdabab; background: #fef2f2;">    
                                
                                <div class="createNewAlert"><i class='bx  bx-alert-triangle'></i></i> Create New Alert </div>
                                
                                <form action="" class="addAlertForm">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Alert Type *</label>
                                                    <select class="form-control">
                                                    <option>Single Day</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Severity *</label>
                                                    <select class="form-control">
                                                    <option>Single Day</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Alert Title *</label>
                                                <input type="text" class="form-control" name="" placeholder="e.g., High Fall Risk - Use Walking Frame">
                                            </div>
                                        </div>
                                      
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Detailed Description *</label>
                                                <textarea name="short_description" required="" class="form-control" rows="3" cols="20" placeholder="Provide detailed information about this alert..."></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Action Required (Optional)</label>
                                                <textarea name="short_description" required="" class="form-control" rows="2" cols="20" placeholder="Specific actions staff should take..."></textarea>
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Expiry Date (Optional)</label>
                                                <input type="date" class="form-control" name="" placeholder="e.g., High Fall Risk - Use Walking Frame">
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="requiresStaff checkbox">
                                                <label>
                                                    <input type="checkbox"> Requires Staff Acknowledgmentt
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Display Alert On (select sections):</label>
                                                <div class="col-md-4">
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" checked> All </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" checked> medication </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                     <div class="checkbox">
                                                        <label><input type="checkbox" checked> dashboard </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" checked> visits </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" checked> care plan </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" checked> schedule </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn radShowbtn " type="submit"> Create Alert </button>
                                            <button class="btn whiteBgBtncolor" type="submit"> Cancel </button>
                                        </div>
                                    </div>
                                </form>
                            </div>     

                            <div class="clientFilterform">
                                <div class="filtersSorting">
                                    <i class='bx bx-filter'></i> Filters & Sorting
                                </div>
                                <form action="" >
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Severity</label>
                                                <select class="form-control">
                                                    <option>All Severities</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control">
                                                    <option>All Status</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Type</label>
                                                <select class="form-control">
                                                    <option>All Type</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Sort By</label>
                                                <select class="form-control">
                                                    <option>Severity</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>




                         <div class="leavebanktabCont">
                            <i class='bx  bx-alert-triangle'></i> 
                            <p>No alerts match the selected filters</p>
                        </div>
                     </div>
                    <!-- <div class="leave-card">
                        <div class="workHoursHeader">
                            <div class="title"><i class="bx  bx-clipboard-detail"></i> Supervision History</div>
                        </div>   
                        <div class="leavebanktabCont">
                            <i class="bx  bx-clipboard-detail"></i>
                            <p>No supervision records</p>
                        </div>
                    </div> -->
                </div>
                <div class="content" id="clientAIInsightsTab">
                    <div class="careTaskstbbg sectionWhiteBgAllUse p-0">
                        <header class="panel-heading headingCapitilize aIInsightsheader"> 
                            <div class="clientHeadung">
                                <div class="onlyheadingmain purpleiconclr"><i class='bx  bx-brain'></i>  AI Care Insights </div>
                            </div>
                        </header>
                        <div class="p-20 p-b-0">
                            <div class="aiCareSection">
                                <label class="useAItoanalyzelabel">Use AI to analyze Logan Jones's data and generate insights</label>
                                <div class="useAIBtns">
                                    <button class="btn aiBtnFst"><i class="bx  bx-sparkles"></i>  Proactive Analysis </button>         
                                    <button class="btn aiBtnSec"><i class="bx bx-file-detail"></i>  Handover Summary </button>         
                                    <button class="btn aiBtnThrd"><i class='bx  bx-trending-up'></i>   Care Plan Review </button> 
                                </div>
                            </div>
                            <div class="p-b-20" style="display: none;">
                                <div class="topHeaderCont">
                                    <div class="proactiveAnalysis">
                                        <span class="badge">Proactive Analysis</span>
                                    </div>
                                    <div class="header-actions addnewicons">
                                        <button class="btn borderBtn"><i class='bx  bx-copy'></i>   Copy</button>  
                                        <button class="btn borderBtn"><i class='bx  bx-arrow-in-up-square-half'></i>   Export</button>  
                                        <button class="btn borderBtn"><i class='bx  bx-edit'></i>  New Analysis</button>              
                                    </div>
                                </div>
                                <div class="riskAssessmentWrap">
                                    <div class="riskHeader">
                                        <span class="riskIcon">⚠</span>
                                        <span class="riskTitle">Risk Assessment: <strong>MEDIUM</strong></span>
                                    </div>

                                    <!-- Risk Item -->
                                    <div class="riskItem">
                                        <p class="riskText">
                                            Lack of defined mobility and cognitive function status could lead to unnoticed complications.
                                        </p>

                                        <span class="riskBadge medium">medium</span>

                                        <div class="riskSection">
                                            <span class="riskSectionTitle">Indicators:</span>
                                            <ul>
                                                <li>No specified mobility level</li>
                                                <li>Cognitive function unspecified</li>
                                            </ul>
                                        </div>

                                        <div class="riskSection">
                                            <span class="riskSectionTitle">Actions:</span>
                                            <ul class="actionList">
                                                <li>Conduct a comprehensive mobility and cognitive assessment to establish baseline functionality.</li>
                                                <li>Regular check-ins to monitor any changes in mobility or cognitive ability.</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Risk Item -->
                                    <div class="riskItem">
                                        <p class="riskText">
                                            Potential for poor dietary compliance affecting health outcomes.
                                        </p>

                                        <span class="riskBadge medium">medium</span>

                                        <div class="riskSection">
                                            <span class="riskSectionTitle">Indicators:</span>
                                            <ul>
                                                <li>Goal to achieve 5 servings of fruits/vegetables daily assessed weekly.</li>
                                                <li>No specific dietary tracking or compliance guidelines noted.</li>
                                            </ul>
                                        </div>

                                        <div class="riskSection">
                                            <span class="riskSectionTitle">Actions:</span>
                                            <ul class="actionList">
                                                <li>Introduce a food diary to track daily servings of fruits and vegetables.</li>
                                                <li>Schedule regular dietary evaluations with a nutritionist.</li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>

                                <div class="proactiveSuggestionsWrap">
                                    <div class="psHeader">
                                        <span class="psIcon">↗</span>
                                        <span class="psTitle">Proactive Suggestions</span>
                                    </div>

                                    <!-- Item -->
                                    <div class="psItem">
                                        <div class="psTop">
                                            <p class="psMainText">
                                                Implement weekly meal planning sessions with Logan to encourage balanced nutrition.
                                            </p>
                                            <span class="psRisk high">high</span>
                                        </div>

                                        <p class="psSubText">
                                            Active involvement can enhance Logan's understanding and compliance with dietary goals.
                                        </p>

                                        <span class="psTag dietary">Dietary</span>
                                    </div>

                                    <!-- Item -->
                                    <div class="psItem">
                                        <div class="psTop">
                                            <p class="psMainText">
                                                Introduce a nightly wind-down routine to promote relaxation before bed.
                                            </p>
                                            <span class="psRisk high">high</span>
                                        </div>

                                        <p class="psSubText">
                                            Establishing habits can significantly improve Logan's likelihood of achieving the sleep goal.
                                        </p>

                                        <span class="psTag sleep">Sleep Management</span>
                                    </div>

                                    <!-- Item -->
                                    <div class="psItem">
                                        <div class="psTop">
                                            <p class="psMainText">
                                                Engage Logan in mindfulness activities or relaxation techniques during counseling sessions.
                                            </p>
                                            <span class="psRisk medium">medium</span>
                                        </div>

                                        <p class="psSubText">
                                            This can complement emotional skill-building and enhance counseling efficacy.
                                        </p>

                                        <span class="psTag emotional">Emotional Management</span>
                                    </div>

                                    <!-- Item -->
                                    <div class="psItem">
                                        <div class="psTop">
                                            <p class="psMainText">
                                                Explore additional resources or tutoring to assist with academic performance and attendance.
                                            </p>
                                            <span class="psRisk medium">medium</span>
                                        </div>

                                        <p class="psSubText">
                                            Supportive measures may counteract potential academic stress and promote increased attendance.
                                        </p>

                                        <span class="psTag education">Educational Support</span>
                                    </div>

                                </div>

                                <div class="careInsightsWrap">

                                    <!-- Patterns Identified -->
                                    <div class="patternsCard">
                                        <h3 class="cardTitle">Patterns Identified</h3>

                                        <div class="patternItem">
                                            <span class="patternBadge">Frequency: Weekly</span>
                                            <span class="patternBadge">Client may struggle to meet attendance and dietary goals, impacting emotional stability.</span>                                           
                                        </div>

                                        <div class="patternItem">
                                            <span class="patternBadge">Frequency: Monthly</span>
                                            <span class="patternBadge">Inconsistencies in sleep patterns may correlate with daytime tiredness and emotional management issues.</span>
                                        </div>

                                        <div class="patternItem">
                                            <span class="patternBadge">Frequency: Bi-annual</span>
                                            <span class="patternBadge">Inconsistencies in sleep patterns may corrs and emotional management issues.</span>
                                        </div>
                                    </div>

                                    <!-- Care Plan Recommendations -->
                                    <div class="carePlanCard">
                                        <h3 class="cardTitle">Care Plan Recommendations</h3>

                                        <div class="careItem">
                                            <span class="careTag green">Mobility and Cognitive Function</span>
                                            <span class="careRisk high">high</span>
                                            <p class="careText">
                                                Add assessments for mobility and cognitive function to the care plan.
                                            </p>
                                        </div>

                                        <div class="careItem">
                                            <span class="careTag green">Dietary Compliance</span>
                                            <span class="careRisk medium">medium</span>
                                            <p class="careText">
                                                Implement a structured dietary assessment program with reminders for fruit/vegetable intake.
                                            </p>
                                        </div>

                                        <div class="careItem">
                                            <span class="careTag green">Sleep Hygiene</span>
                                            <span class="careRisk medium">medium</span>
                                            <p class="careText">
                                                Incorporate sleep tracking tools and behavioral interventions to establish better sleep patterns.
                                            </p>
                                        </div>

                                        <div class="careItem">
                                            <span class="careTag green">Emotional Support</span>
                                            <span class="careRisk medium">medium</span>
                                            <p class="careText">
                                                Ensure that counseling sessions include specific goals for emotional management progress tracking.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-b-20" style="display: none;">
                                <div class="topHeaderCont">
                                    <div class="proactiveAnalysis">
                                        <span class="badge">Handover Summary</span>
                                    </div>
                                    <div class="header-actions addnewicons">
                                        <button class="btn borderBtn"><i class='bx  bx-copy'></i>   Copy</button>  
                                        <button class="btn borderBtn"><i class='bx  bx-arrow-in-up-square-half'></i>   Export</button>  
                                        <button class="btn borderBtn"><i class='bx  bx-edit'></i>  New Analysis</button>              
                                    </div>
                                </div>
                                 <div class="proactiveSuggestionsWrap handoverSummary">
                                    <!-- Item -->
                                    <div class="psItem">
                                        <div class="psTop">
                                            <p class="psMainText">
                                               Overall Status
                                            </p>
                                        </div>
                                        <p class="psSubText">
                                           Logan Jones is currently stable with no active alerts or recent incidents. Medication compliance records indicate no recent administrations.
                                        </p>
                                    </div>  
                                </div>

                                <div class="careInsightsWrap">
                                    <!-- Patterns Identified -->
                                    <div class="patternsCard">
                                        <h3 class="cardTitle">Key Points</h3>

                                        <ul class="space-y-1">
                                            <li class="textSm">• No active alerts or incidents reported.</li>
                                            <li class="textSm">• Medication compliance is at 0/0.</li>
                                            <li class="textSm">• No information found on mobility, key conditions, or mental health.</li>
                                        </ul>
                                    </div>                                   
                                    <div class="careItem m-t-15">
                                        <h3 class="cardTitle">Key Points</h3>
                                        <ul class="space-y-1">
                                            <li class="textSm">• Patient exhibits no signs of distress or changes in condition.</li>
                                        </ul>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-6">
                                            <div class="patternsCard">
                                                <h3 class="cardTitle">Medication Notes</h3>

                                                <ul class="space-y-1">
                                                    <li class="textSm">No recent medications administered; monitor for upcoming schedules.</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="patternsCard">
                                                <h3 class="cardTitle">Behavioral Observations</h3>

                                                <ul class="space-y-1">
                                                    <li class="textSm">No significant behavioral observations documented in the past week.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="patternsCard recommendationsSift m-t-15">
                                        <h3 class="cardTitle">Recommendations for Shift</h3>
                                        <ul class="space-y-1">
                                            <li class="textSm"><i class='bx  bx-check-circle'></i>  Clarify and assess mobility and key conditions during this shift.</li>
                                            <li class="textSm"><i class='bx  bx-check-circle'></i>  Schedule mental health evaluation as soon as possible.</li>
                                            <li class="textSm"><i class='bx  bx-check-circle'></i>  Monitor for any changes in behavior or needs throughout the shift.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="p-b-20" style="">
                                <div class="topHeaderCont">
                                    <div class="proactiveAnalysis">
                                        <span class="badge">Care Plan Review</span>
                                    </div>
                                    <div class="header-actions addnewicons">
                                        <button class="btn borderBtn"><i class='bx  bx-copy'></i>   Copy</button>  
                                        <button class="btn borderBtn"><i class='bx  bx-arrow-in-up-square-half'></i> Export</button>  
                                        <button class="btn borderBtn"><i class='bx  bx-edit'></i>  New Analysis</button>              
                                    </div>
                                </div>
                                 <div class="proactiveSuggestionsWrap handoverSummary">
                                    <!-- Item -->
                                    <div class="psItem">
                                        <div class="psTop">
                                            <p class="psMainText">
                                               Overall Assessment
                                            </p>
                                        </div>
                                        <p class="psSubText">
                                           The current care plan requires adjustments due to limited activity engagement and challenges in meeting initial objectives. Targets should be modified to become more achievable, thereby ensuring Logan feels supported rather than overwhelmed.
                                        </p>
                                    </div>  
                                </div>

                                <div class="careInsightsWrap">

                                    <!-- Care Plan Recommendations -->
                                    <div class="carePlanCard">
                                        <h3 class="cardTitle">Recommended Objectives</h3>

                                        <div class="careItem">
                                            <span class="recommendedTitle">Increase school attendance to 60% by attending at least 3 out of 5 school days weekly due to current attendance challenges.</span>
                                            <span class="careRisk high">high</span>
                                            <p class="careText">
                                                Add assessments for mobility and cognitive function to the care plan.
                                            </p>
                                            <p class="careText">
                                                Target: 2024-01-31
                                            </p>
                                        </div>
                                        <div class="careItem">
                                            <span class="recommendedTitle">Increase school attendance to 60% by attending at least 3 out of 5 school days weekly due to current attendance challenges.</span>
                                            <span class="careRisk high">medium</span>
                                            <p class="careText">
                                                Add assessments for mobility and cognitive function to the care plan.
                                            </p>
                                            <p class="careText">
                                                Target: 2024-01-31
                                            </p>
                                        </div>
                                        <div class="careItem">
                                            <span class="recommendedTitle">Increase school attendance to 60% by attending at least 3 out of 5 school days weekly due to current attendance challenges.</span>
                                            <span class="careRisk high">high</span>
                                            <p class="careText">
                                                Add assessments for mobility and cognitive function to the care plan.
                                            </p>
                                            <p class="careText">
                                                Target: 2024-01-31
                                            </p>
                                        </div>                                       
                                    </div>

                                    <div class="carePlanCard recommendedTasks">
                                        <h3 class="cardTitle">Recommended Tasks</h3>

                                        <div class="careItem">
                                            <span class="recommendedTitle">Prepare relaxing activities before dental visits, such as deep breathing or visualization techniques.</span>
                                            <span class="careRisk high">emotional</span>
                                            <p class="careText">
                                                To address increased anxiety about dental visits and ensure Logan feels comfortable, proactive measures can help reduce stress.
                                            </p>
                                            <p class="careText frequency">
                                                Frequency: as needed
                                            </p>
                                        </div>
                                         <div class="careItem">
                                            <span class="recommendedTitle">Bi-weekly food diary review focusing on achieving 3 servings of fruits and vegetables.</span>
                                            <span class="careRisk high">nutrition</span>
                                            <p class="careText">
                                               This adjustment will provide opportunities to reflect, modify, and improve meal intake without overwhelming Logan.
                                            </p>
                                            <p class="careText Frequency">
                                               Frequency: bi-weekly
                                            </p>
                                        </div>
                                         <div class="careItem">
                                            <span class="recommendedTitle">Establish a check-in discussion post each counseling session to gather feedback and address any concerns Logan might have.</span>
                                            <span class="careRisk high">emotional</span>
                                            <p class="careText">
                                               This additional task will help in tracking Logan's feelings about his counseling sessions and address any issues as they arise.
                                            </p>
                                            <p class="careText Frequency">
                                                Frequency: after each session
                                            </p>
                                        </div>                                       
                                    </div>

                                    <div class="carePlanCard riskAssessmentUpdates">
                                        <h3 class="cardTitle">Risk Assessment Updates</h3>

                                        <div class="careItem">
                                            <span class="recommendedTitle">Increased anxiety about dental visits</span>
                                            <span class="careRisk high">Likelihood: medium</span>
                                            <span class="careRisk high">Impact: high</span>
                                            <p class="careText">
                                                <strong>Control Measures: </strong>  Continue using relaxation techniques and discuss any ongoing concerns about dental visits with the counselor.
                                            </p>
                                        </div>
                                         <div class="careItem">
                                            <span class="recommendedTitle">Inadequate medication adherence due to non-compliance</span>
                                            <span class="careRisk high">Likelihood: medium</span>
                                            <span class="careRisk high">Impact: high</span>
                                            <p class="careText">
                                               <strong> Control Measures: </strong> Expand education efforts and involve family members in motivation and accountability.
                                            </p>
                                        </div>
                                         <div class="careItem">
                                            <span class="recommendedTitle">Potential for social isolation due to lack of after-school activities</span>
                                            <span class="careRisk high">Likelihood: medium</span>
                                            <span class="careRisk high">Impact: high</span>
                                            <p class="careText">
                                               <strong> Control Measures:</strong> Encourage participation in group activities to enhance social skills and reduce anxiety.
                                            </p>
                                        </div>                                       
                                    </div>
                                    
                                   

                                </div>

                                
                            </div>

                        </div>
                    </div>
                </div>
                <div class="content" id="clientCarePlanTab">
                    <div class="carePlanTabCont">
                        <div class="workHoursHeader">
                            <div class="title"><i class='bx  bx-heart'></i>  Documents</div>
                            <div class="actions">
                                <button class="allBtnUseColor" data-toggle="modal" data-target="#addcreateCarePlanModal"> <i class='bx  bx-plus'></i> Create Care Plan</button>
                            </div>
                        </div>

                        <div class="carePlanWrapper">

                            <!-- Active Plan Summary -->
                            <div class="activePlanCard">
                                <div class="activePlanHeader">
                                    <div class="leftInfo">
                                        <span class="activeBadge">Active Plan</span>
                                        <span class="assessedDate">Assessed Dec 19, 2025</span>
                                    </div>
                                    <button class="viewPlanBtn">
                                        View Full Plan <span>›</span>
                                    </button>
                                </div>

                                <div class="activePlanStats">
                                    <div class="statItem">
                                        <span class="statIcon iconblue"><i class='bx  bx-radio-circle-marked'></i> </span>
                                        <div>
                                            <div class="statLabel">Objectives</div>
                                            <div class="statValue">5</div>
                                        </div>
                                    </div>
                                    <div class="statItem">
                                        <span class="statIcon iconpurple"><i class='bx  bx-checklist'></i> </span>
                                        <div>
                                            <div class="statLabel">Tasks</div>
                                            <div class="statValue">5</div>
                                        </div>
                                    </div>
                                    <div class="statItem">
                                        <span class="statIcon iconpink"><i class='bx  bx-pill'></i> </span>
                                        <div>
                                            <div class="statLabel">Medications</div>
                                            <div class="statValue">6</div>
                                        </div>
                                    </div>
                                    <div class="statItem">
                                        <span class="statIcon iconorange"><i class='bx  bx-alert-triangle'></i> </span>
                                        <div>
                                            <div class="statLabel">Risk Factors</div>
                                            <div class="statValue">4</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Care Plan Card -->
                            <div class="planCard">
                                <div class="planTop">
                                    <div class="planTitle">
                                        <span class="heartIcon"><i class='bx  bx-heart'></i></span>
                                        Initial Care Plan
                                        <span class="draftBadge">draft</span>
                                    </div>
                                    <div class="planActions">
                                        <button><i class='bx  bx-eye'></i> </button>
                                        <button><i class='bx  bx-pencil'></i> </button>
                                        <button class="danger"><i class='bx  bx-trash'></i> </button>
                                    </div>
                                </div>

                                <div class="planMeta">
                                    <div><strong>Setting:</strong> residential</div>
                                    <div><strong>Assessed:</strong> Jan 3, 2026</div>
                                    <div><strong>By:</strong> Pratima Pathak</div>
                                    <div><strong>Review:</strong> Apr 3, 2026</div>
                                </div>

                                <div class="planFooter">
                                    <span><i class='bx  bx-radio-circle-marked'></i> 5 objectives</span>
                                    <span><i class='bx  bx-list'></i>  0 tasks</span>
                                    <span><i class='bx  bx-pill'></i> 6 medications</span>
                                </div>
                            </div>

                            <div class="planCard">
                                <div class="planTop">
                                    <div class="planTitle">
                                        <span class="heartIcon"><i class='bx  bx-heart'></i></span>
                                        Initial Care Plan
                                        <span class="draftBadge">draft</span>
                                    </div>

                                    <div class="planActions">
                                        <button><i class='bx  bx-eye'></i> </button>
                                        <button><i class='bx  bx-pencil'></i> </button>
                                        <button class="danger"><i class='bx  bx-trash'></i> </button>
                                    </div>
                                </div>

                                <div class="planMeta">
                                    <div><strong>Setting:</strong> residential</div>
                                    <div><strong>Assessed:</strong> Jan 3, 2026</div>
                                    <div><strong>By:</strong> Pratima Pathak</div>
                                    <div><strong>Review:</strong> Apr 3, 2026</div>
                                </div>

                                <div class="planFooter">
                                    <span><i class='bx  bx-radio-circle-marked'></i> 5 objectives</span>
                                    <span><i class='bx  bx-list'></i>  0 tasks</span>
                                    <span><i class='bx  bx-pill'></i> 6 medications</span>
                                </div>
                            </div>

                            <div class="planCard">
                                <div class="planTop">
                                    <div class="planTitle">
                                        <span class="heartIcon"><i class='bx  bx-heart'></i></span>
                                        Initial Care Plan
                                        <span class="draftBadge">draft</span>
                                    </div>

                                    <div class="planActions">
                                        <button><i class='bx  bx-eye'></i> </button>
                                        <button><i class='bx  bx-pencil'></i> </button>
                                        <button class="danger"><i class='bx  bx-trash'></i> </button>
                                    </div>
                                </div>

                                <div class="planMeta">
                                    <div><strong>Setting:</strong> residential</div>
                                    <div><strong>Assessed:</strong> Jan 3, 2026</div>
                                    <div><strong>By:</strong> Pratima Pathak</div>
                                    <div><strong>Review:</strong> Apr 3, 2026</div>
                                </div>

                                <div class="planFooter">
                                    <span><i class='bx  bx-radio-circle-marked'></i> 5 objectives</span>
                                    <span><i class='bx  bx-list'></i>  0 tasks</span>
                                    <span><i class='bx  bx-pill'></i> 6 medications</span>
                                </div>
                            </div>

                            <div class="planCard">
                                <div class="planTop">
                                    <div class="planTitle">
                                        <span class="heartIcon"><i class='bx  bx-heart'></i></span>
                                        Initial Care Plan
                                        <span class="draftBadge">draft</span>
                                    </div>

                                    <div class="planActions">
                                        <button><i class='bx  bx-eye'></i> </button>
                                        <button><i class='bx  bx-pencil'></i> </button>
                                        <button class="danger"><i class='bx  bx-trash'></i> </button>
                                    </div>
                                </div>

                                <div class="planMeta">
                                    <div><strong>Setting:</strong> residential</div>
                                    <div><strong>Assessed:</strong> Jan 3, 2026</div>
                                    <div><strong>By:</strong> Pratima Pathak</div>
                                    <div><strong>Review:</strong> Apr 3, 2026</div>
                                </div>

                                <div class="planFooter">
                                    <span><i class='bx  bx-radio-circle-marked'></i> 5 objectives</span>
                                    <span><i class='bx  bx-list'></i>  0 tasks</span>
                                    <span><i class='bx  bx-pill'></i> 6 medications</span>
                                </div>
                            </div>

                            <div class="planCard">
                                <div class="planTop">
                                    <div class="planTitle">
                                        <span class="heartIcon"><i class='bx  bx-heart'></i></span>
                                        Initial Care Plan
                                        <span class="draftBadge">draft</span>
                                    </div>

                                    <div class="planActions">
                                        <button><i class='bx  bx-eye'></i> </button>
                                        <button><i class='bx  bx-pencil'></i> </button>
                                        <button class="danger"><i class='bx  bx-trash'></i> </button>
                                    </div>
                                </div>

                                <div class="planMeta">
                                    <div><strong>Setting:</strong> residential</div>
                                    <div><strong>Assessed:</strong> Jan 3, 2026</div>
                                    <div><strong>By:</strong> Pratima Pathak</div>
                                    <div><strong>Review:</strong> Apr 3, 2026</div>
                                </div>

                                <div class="planFooter">
                                    <span><i class='bx  bx-radio-circle-marked'></i> 5 objectives</span>
                                    <span><i class='bx  bx-list'></i>  0 tasks</span>
                                    <span><i class='bx  bx-pill'></i> 6 medications</span>
                                </div>
                            </div>

                            <div class="planCard">
                                <div class="planTop">
                                    <div class="planTitle">
                                        <span class="heartIcon"><i class='bx  bx-heart'></i></span>
                                        Initial Care Plan
                                        <span class="draftBadge">draft</span>
                                    </div>

                                    <div class="planActions">
                                        <button><i class='bx  bx-eye'></i> </button>
                                        <button><i class='bx  bx-pencil'></i> </button>
                                        <button class="danger"><i class='bx  bx-trash'></i> </button>
                                    </div>
                                </div>

                                <div class="planMeta">
                                    <div><strong>Setting:</strong> residential</div>
                                    <div><strong>Assessed:</strong> Jan 3, 2026</div>
                                    <div><strong>By:</strong> Pratima Pathak</div>
                                    <div><strong>Review:</strong> Apr 3, 2026</div>
                                </div>

                                <div class="planFooter">
                                    <span><i class='bx  bx-radio-circle-marked'></i> 5 objectives</span>
                                    <span><i class='bx  bx-list'></i>  0 tasks</span>
                                    <span><i class='bx  bx-pill'></i> 6 medications</span>
                                </div>
                            </div>

                        </div>

                        




                    </div>
                </div>
                <div class="content" id="clientRiskAssessmentsTab">
                    <div class="leave-card">
                        <div class="workHoursHeader">
                            <div class="title">Notes</div>
                            <div class="actions">
                                <button class="allbuttonDarkClr"> <i class='bx bx-file-detail'></i> Add Note</button>
                            </div>
                        </div>
                        <div class="leavebanktabCont">
                            <p>No notes recorded </p>
                        </div>
                    </div>
                </div>       
                <div class="content" id="clientMedicationTab"> 
                    <h2>Medication</h2>
                </div>  
                <div class="content" id="clientPEEPTab"> 
                    <h2>PEEP</h2>
                </div>  
                <div class="content" id="clientRepositioningTab">
                    <h2>Repositioning</h2>
                </div>  
                <div class="content" id="clientBehaviorTab"> 
                    <h2>Behavior</h2>
                </div>  
                <div class="content" id="clientMentalCapacityTab"> 
                   <h2>Capacity</h2>
                </div>  
                <div class="content" id="clientDoLSTab"> 
                   <h2>DoLS</h2>
                </div>  
                <div class="content" id="clientDNACPRTab"> 
                   <h2>DNACPR</h2>
                </div>  
                <div class="content" id="clientSafeguardingTab"> 
                   <h2>Safeguarding</h2>
                </div>  
                <div class="content" id="clientConsentTab"> 
                   <h2>Consent</h2>
                </div>  
                <div class="content" id="clientEmergencyTab">
                    <div class="emergencyMain">
                        <div id="emergencyAller">
                            <div class="emergencyHeader">
                                <div class="emeregencyParent">
                                    <div class="emergencyContent">
                                        <div class="gap-3 d-flex align-items-center radIconClr">
                                            <i class="fas fa-phone-volume"></i>
                                            <h3>Emergency Contacts </h3>
                                        </div>
                                        <p class="mt-1"><small>Manage client emergency contact information</small></p>
                                    </div>
                                    <div class="emergencyBtn">
                                        <button class="borderBtn editBtn">
                                            <i class="fas fa-pencil-alt"></i>
                                            <span> Edit</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="emergencybottom p-4">
                                <div class="userMum">
                                    <div class="d-flex gap-3">
                                        <div class="icon"><i class="fa fa-user-o" aria-hidden="true"></i></div>
                                        <div>
                                            <h2>Carolanne Jones</h2>
                                            <span class="title">Mum</span>
                                        </div>
 
                                    </div>
 
                                </div>
                                <div class="emergencyError">
                                    <p><strong>Priority Contact 1- </strong> - This contact will be reached in case of emergencies</p>
                                </div>
                            </div>
                        </div>
                        <div id="contactWrapper">
                            <div class="contactMain p-4">
                                <div class="d-flex justify-content-between">
                                    <h3>Contact #</h3>
                                    <div class="deleteIcon"> <i class="fa fa-trash-o" aria-hidden="true"></i>
 
                                    </div>
                                </div>
 
                                <div class="emergencyForm">
                                    <div class="row mt-4">
                                        <div class="col-lg-4">
                                            <label class="form-label">Full Name</label>
                                            <input class="form-control" type="text" placeholder="Enter Full Name">
                                        </div>
 
                                        <div class="col-lg-4">
                                            <label class="form-label">Phone Number</label>
                                            <input class="form-control" type="text" placeholder="Enter Phone Number">
                                        </div>
 
                                        <div class="col-lg-4">
                                            <label class="form-label">Relationship</label>
                                            <input class="form-control" type="text" placeholder="Mother">
                                        </div>
                                    </div>
                                </div>
                            </div>
 
                            <div class="formFooter">
                                <div class="contactBtn d-flex gap-4">
                                    <button type="button" id="addContactBtn">
                                        <i class="fa fa-plus me-3"></i>
                                        <span>Add Another Contact</span>
                                    </button>
                                </div>
                                <div style="border-top: 1px solid var(--borderColor); margin-top:20px; padding-top:20px">
 
                                    <div class="d-flex gap-3">
                                        <button class="redBtn">Save Contacts</button>
                                        <button class="borderBtn cancelBtn" onclick="showEmergency()">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>  
                <div class="content" id="clientDocumentsTab"> 
                    <h2>Documents</h2>
                </div>  
                <div class="content" id="clientProgressReportTab"> 
                    <h2>ProgressReport</h2>
                </div>  
            </div>
            <!-- END TAB CONTENT -->
        </div>
       
    </div>


    </div>





    <!-- add Carer Modal -->
        <div class="modal fade leaveCommunStyle" id="addcreateCarePlanModal" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"> <i class="bx  bx-heart"></i> Create Care Plan - Logan Jones</h4>
                    </div>
                    <div class="modal-body heightScrollModal">
                        <div class="carer-form">

                           <div class="availabilityTabs createCarePlanTabs">
                            <!-- TAB HEADER -->
                            <div class="availabilityTabs__nav">
                                <button class="availabilityTabs__tab active" data-target="carePlanOverview"><i class="bx  bx-file-report"></i> Overview</button>
                                <button class="availabilityTabs__tab" data-target="carePlanObjectives"><i class='bx  bx-radio-circle-marked'></i> Objectives</button>
                                <button class="availabilityTabs__tab" data-target="carePlanCareTasks"><i class='bx  bx-checklist'></i>  Care Tasks</button>
                                <button class="availabilityTabs__tab" data-target="carePlanMedication"><i class='bx  bx-pill'></i> Medication</button>
                                <button class="availabilityTabs__tab" data-target="carePlanPreferences"><i class='bx  bx-user'></i>  Preferences</button>
                                <button class="availabilityTabs__tab" data-target="carePlanRisk"><i class='bx  bx-alert-triangle'></i> Risk</button>
                            </div>

                            <!-- TAB CONTENT -->
                            <div class="availabilityTabs__content">

                                <div class="availabilityTabs__panel active" id="carePlanOverview">
                                    <div class="">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Care Setting *</label>
                                                    <select class="form-control">
                                                        <option>Domiciliary Care</option>
                                                        <option>Inactive</option>
                                                    </select>                                                    
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Plan Type </label>
                                                    <select class="form-control">
                                                        <option>Initial Assessment</option>
                                                        <option>Part Time</option>
                                                    </select>                                                    
                                                </div>
                                        
                                                <div class="col-md-4  m-t-10">
                                                    <label>Assessment Date *</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="col-md-4  m-t-10">
                                                    <label>Status</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                    
                                                <div class="col-md-4  m-t-10">
                                                    <label>Assessed By</label>
                                                    <input type="text" class="form-control" placeholder="Staff member name">
                                                </div>
                                                <div class="col-md-6  m-t-10">
                                                    <label>Status</label>
                                                    <select class="form-control">
                                                        <option>Full Time</option>
                                                        <option>Part Time</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <hr>

                                            <div class="address">
                                                <label>Personal Details</label>                                           
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Preferred Name</label>
                                                     <input type="text" class="form-control" value="Logan">                                                   
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Language </label>
                                                     <input type="text" class="form-control" value="English">                                                    
                                                </div>
                                                <div class="col-md-6  m-t-10">
                                                    <label>Religion</label>
                                                     <input type="text" class="form-control" placeholder="Staff member name">                                                   
                                                </div>
                                                <div class="col-md-6  m-t-10">
                                                    <label>Cultural Needs </label>
                                                    <input type="text" class="form-control" placeholder="Staff member name">                                                    
                                                </div>                                        
                                            </div>     
                                            
                                            <hr>

                                            <div class="address">
                                                <label>Daily Routine</label>                                           
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Morning</label>
                                                     <textarea name="morning" required="" class="form-control" rows="3" cols="20" placeholder="Describe morning routine..."></textarea>                                                   
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Afternoon </label>
                                                     <textarea name="afternoon" required="" class="form-control" rows="3" cols="20" placeholder="Describe morning routine..."></textarea>                                                    
                                                </div>
                                                <div class="col-md-6  m-t-10">
                                                    <label>Evening</label>
                                                     <textarea name="evening" required="" class="form-control" rows="3" cols="20" placeholder="Describe morning routine..."></textarea>                                                   
                                                </div>
                                                <div class="col-md-6  m-t-10">
                                                    <label>Night </label>
                                                    <textarea name="night" required="" class="form-control" rows="3" cols="20" placeholder="Describe morning routine..."></textarea>                                                  
                                                </div>                                        
                                            </div> 

                                            <div class="actions">
                                                <button type="button" class="cancel">Cancel</button>
                                                <button type="submit" class="submit">Create Care Plan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="availabilityTabs__panel" id="carePlanObjectives">
                                    <div class="">                                         
                                        <div class="workHoursHeader">
                                            <div class="title"> Care Objectives</div>
                                            <div class="actions mt-0">
                                                <button class="borderBtn"> <i class="bx  bx-plus"></i> Add Objective</button>
                                            </div>
                                        </div>
                                        <form>
                                            <div class="leave-card">                                            
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="ObjectiveEndDelete planActions">
                                                            <button class="objectiveNumber">Objective 1</button>
                                                            <button class="danger"><i class="bx  bx-trash"></i> </button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label>Morning</label>
                                                        <textarea name="morning" required="" class="form-control" rows="3" cols="20" placeholder="Describe morning routine..."></textarea>                                                   
                                                    </div>  
                                                    <div class="col-md-4  m-t-10">
                                                        <label>Target Date</label>
                                                        <input type="date" class="form-control">
                                                    </div>
                                                    <div class="col-md-4  m-t-10">
                                                        <label>Status</label>
                                                        <select class="form-control">
                                                            <option>Not Started</option>
                                                            <option>Part Time</option>
                                                        </select>
                                                    </div>                                    
                                                    <div class="col-md-4  m-t-10">
                                                        <label>Outcome Measures</label>
                                                        <input type="text" class="form-control" placeholder="How will success be measured?">
                                                    </div>                                                
                                                </div>
                                            </div>
                                            <div class="leave-card">                                            
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="ObjectiveEndDelete planActions">
                                                            <button class="objectiveNumber">Objective 1</button>
                                                            <button class="danger"><i class="bx  bx-trash"></i> </button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label>Morning</label>
                                                        <textarea name="morning" required="" class="form-control" rows="3" cols="20" placeholder="Describe morning routine..."></textarea>                                                   
                                                    </div>  
                                                    <div class="col-md-4  m-t-10">
                                                        <label>Target Date</label>
                                                        <input type="date" class="form-control">
                                                    </div>
                                                    <div class="col-md-4  m-t-10">
                                                        <label>Status</label>
                                                        <select class="form-control">
                                                            <option>Not Started</option>
                                                            <option>Part Time</option>
                                                        </select>
                                                    </div>                                    
                                                    <div class="col-md-4  m-t-10">
                                                        <label>Outcome Measures</label>
                                                        <input type="text" class="form-control" placeholder="How will success be measured?">
                                                    </div>                                                
                                                </div>
                                            </div>
                                           
                                            <div class="actions">
                                                <button type="button" class="cancel">Cancel</button>
                                                <button type="submit" class="submit">Create Care Plan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="availabilityTabs__panel" id="carePlanCareTasks">
                                    <div class="">                                         
                                        <div class="workHoursHeader">
                                            <div class="title"> Care Tasks & Interventions</div>
                                            <div class="actions mt-0">
                                                <button class="borderBtn"> <i class="bx  bx-plus"></i> Add Task</button>
                                            </div>
                                        </div>
                                        <form>
                                            <div class="leave-card">                                            
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="ObjectiveEndDelete planActions workHoursHeader">
                                                            <span class="badge">Personal Care</span>
                                                            
                                                            <div class="activeCheck">
                                                                <label><input type="checkbox"> Active</label>
                                                                <button class="danger"><i class="bx  bx-trash"></i> </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                        <label>Task Name</label>
                                                        <input type="date" class="form-control">
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label>Category</label>
                                                        <select class="form-control">
                                                            <option>Not Started</option>
                                                            <option>Part Time</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12  m-t-10">
                                                        <label>Description</label>
                                                        <textarea name="Description" required="" class="form-control" rows="3" cols="20" placeholder="Describe what needs to be done..."></textarea>                                                   
                                                    </div>
                                                                                        
                                                    <div class="col-md-4  m-t-10">
                                                        <label>Frequency</label>
                                                        <select class="form-control">
                                                            <option>Not Started</option>
                                                            <option>Part Time</option>
                                                        </select>
                                                    </div>  
                                                    <div class="col-md-4  m-t-10">
                                                        <label>Preferred Time</label>
                                                        <input type="time" class="form-control" placeholder="">
                                                    </div> 
                                                    <div class="col-md-4  m-t-10">
                                                        <label>Duration (mins)</label>
                                                        <input type="number" class="form-control" value="15">
                                                    </div>
                                                    
                                                    <div class="col-md-12  m-t-10">
                                                        <label>Special Instructions</label>
                                                        <textarea name="Description" required="" class="form-control" rows="3" cols="20" placeholder="Any special instructions for carers..."></textarea>                                                   
                                                    </div>
                                                    <div class="col-md-12 m-t-10">
                                                        <div class="requiresLable">
                                                            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                                            <label for="vehicle1"> Requires two carers</label>        
                                                        </div>                               
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="actions">
                                                <button type="button" class="cancel">Cancel</button>
                                                <button type="submit" class="submit">Create Care Plan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="availabilityTabs__panel" id="carePlanMedication">
                                     <div class="">                                         
                                        <form>
                                        <div class="row">   
                                            <div class="col-md-6">
                                                <div class="requiresLable">
                                                    <input type="checkbox" id="self-administers" name="self-administers" value="Bike">
                                                    <label for="self-administers">Client self-administers medication</label>        
                                                </div> 
                                            </div>                                                                                                                
                                            <div class="col-md-6">
                                                <label>Administration Support Level</label>
                                                <select class="form-control">
                                                    <option>Prompting Only</option>
                                                    <option>Part Time</option>
                                                </select>
                                            </div>  
                                            <div class="col-md-6 m-t-10">
                                                <label>Pharmacy Details</label>
                                                <input type="text" class="form-control" placeholder="Pharmacy name & contact">
                                            </div> 
                                            <div class="col-md-6 m-t-10">
                                                <label>GP Details</label>
                                                <input type="text" class="form-control" placeholder="GP surgery & contact">
                                            </div>
                                            
                                            <div class="col-md-12 m-t-10">
                                                <label>Allergies & Sensitivities</label>
                                                <textarea name="Sensitivities" required="" class="form-control sensitivitiesTextarea" rows="3" cols="20" placeholder="List any known allergies or sensitivities..."></textarea>                                                   
                                            </div>                                            
                                        </div>



                                        <div class="workHoursHeader m-t-15">
                                            <div class="title"> Medications</div>
                                            <div class="actions mt-0">
                                                <button class="borderBtn"> <i class="bx  bx-plus"></i> Add Medication</button>
                                            </div>
                                        </div>
                                            <div class="leave-card">                                            
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="ObjectiveEndDelete planActions workHoursHeader">
                                                            <span class="badge"><i class='bx  bx-link'></i> </span>                                                           
                                                            <div class="activeCheck">
                                                                <button class="danger"><i class="bx  bx-trash"></i> </button>
                                                            </div>
                                                        </div>
                                                    </div>                                                    
                                                    <div class="col-md-4">
                                                        <label>Medication Name</label>
                                                        <input type="date" class="form-control" placeholder="e.g., Paracetamol">
                                                    </div>
                                                
                                                    <div class="col-md-4">
                                                        <label>Dose</label>
                                                        <input type="text" class="form-control" placeholder="e.g., 500mg">
                                                    </div> 
                                                    <div class="col-md-4">
                                                        <label>Frequency</label>
                                                        <input type="text" class="form-control" placeholder="e.g., 500mg">
                                                    </div>
                                                    
                                                    <div class="col-md-6  m-t-10">
                                                        <label>Purpose</label>
                                                        <input type="text" name="purpose" required="" class="form-control" placeholder="What is this medication for?">                                                   
                                                    </div>
                                                    <div class="col-md-6 m-t-10">
                                                        <div class="requiresLable">
                                                            <input type="checkbox" id="PRN" name="PRN" value="Bike">
                                                            <label for="PRN">PRN (as needed)</label>        
                                                        </div>                               
                                                    </div>
                                                    <div class="col-md-12  m-t-10">
                                                        <label>Special Instructions</label>
                                                        <input type="text" class="form-control" placeholder="e.g., Take with food">
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="actions">
                                                <button type="button" class="cancel">Cancel</button>
                                                <button type="submit" class="submit">Create Care Plan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="availabilityTabs__panel" id="carePlanPreferences">
                                    <div class="">
                                         <form>
                                            <div class="row"> 
                                                <div class="col-md-6">
                                                    <label>Likes</label>
                                                    <textarea name="likes" required="" class="form-control" rows="3" cols="20" placeholder="Enter likes (one per line)"></textarea>                                                   
                                                </div> 
                                                 <div class="col-md-6">
                                                    <label>Dislikes</label>
                                                    <textarea name="dislikes" required="" class="form-control" rows="3" cols="20" placeholder="Enter dislikes (one per line)"></textarea>                                                   
                                                </div>
                                                 <div class="col-md-12 m-t-10">
                                                    <label>Hobbies & Interests</label>
                                                    <textarea name="hobbies&Interests" required="" class="form-control" rows="3" cols="20" placeholder="Enter hobbies (one per line)"></textarea>                                                   
                                                </div>
                                                <div class="col-md-6 m-t-10">
                                                    <label>Food Preferences</label>
                                                    <textarea name="foodPreferences" required="" class="form-control" rows="3" cols="20" placeholder="Dietary requirements, favourite foods, etc."></textarea>                                                   
                                                </div>
                                                <div class="col-md-6 m-t-10">
                                                    <label>Personal Care Preferences</label>
                                                    <textarea name="personalCarePreferences" required="" class="form-control" rows="3" cols="20" placeholder="How they like to be supported with personal care..."></textarea>                                                   
                                                </div>
                                                 <div class="col-md-12 m-t-10">
                                                    <label>Communication Preferences</label>
                                                    <textarea name="communicationPreferences" required="" class="form-control" rows="2" cols="20" placeholder="How they prefer to communicate, any aids needed..."></textarea>                                                   
                                                </div>
                                                 <div class="col-md-12 m-t-10">
                                                    <label>Social Preferences</label>
                                                    <textarea name="socialPreferences" required="" class="form-control" rows="2" cols="20" placeholder="Social activities, visitors, alone time preferences..."></textarea>                                                   
                                                </div>
                                            </div>
                                            <div class="actions">
                                                <button type="button" class="cancel">Cancel</button>
                                                <button type="submit" class="submit">Create Care Plan</button>
                                            </div>
                                         </form>
                                    </div>
                                </div>
                                <div class="availabilityTabs__panel" id="carePlanRisk">                                    
                                    <div class="">                                         
                                        <div class="workHoursHeader">
                                            <div class="title"> Risk Factors</div>
                                            <div class="actions mt-0">
                                                <button class="borderBtn"> <i class="bx  bx-plus"></i> Add Risk</button>
                                            </div>
                                        </div>
                                        <form>
                                            <div class="leave-card">                                            
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="ObjectiveEndDelete planActions">
                                                            <button class="objectiveNumber">Risk 1</button>
                                                            <button class="danger"><i class="bx  bx-trash"></i> </button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 ">
                                                        <label>Target Date</label>
                                                        <input type="date" class="form-control">
                                                    </div>                                                     
                                                    <div class="col-md-6 m-t-10">
                                                        <label>Likelihood</label>
                                                        <select class="form-control">
                                                            <option>Low</option>
                                                            <option>Medium</option>
                                                            <option>Heigh</option>
                                                        </select>
                                                    </div>   
                                                    <div class="col-md-6 m-t-10">
                                                        <label>Impact</label>
                                                        <select class="form-control">
                                                            <option>Low</option>
                                                            <option>Medium</option>
                                                            <option>Heigh</option>
                                                        </select>
                                                    </div> 
                                                    <div class="col-md-12 m-t-10">
                                                        <label>Control Measures</label>
                                                        <textarea name="Measures" required="" class="form-control" rows="3" cols="20" placeholder="How is this risk being managed?"></textarea>                                                   
                                                    </div>                                                   
                                                </div>
                                            </div>

                                            <hr>

                                            <div class="row">
                                                <div class="col-md-12">
                                                     <div class="workHoursHeader">
                                                        <div class="title"> Emergency Information</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 ">
                                                    <label>Hospital Preference</label>
                                                    <input type="text" class="form-control" placeholder="Preferred hospital">
                                                </div>                                                     
                                                <div class="col-md-6">
                                                   <div class="requiresLable">
                                                        <input type="checkbox" id="DNACPR" name="DNACPR" value="Bike">
                                                        <label for="DNACPR">DNACPR in place</label>        
                                                    </div>
                                                </div>   
                                                <div class="col-md-12 m-t-10">
                                                    <label>Emergency Protocol</label>
                                                    <textarea name="Emergency" required="" class="form-control" rows="3" cols="20" placeholder="What to do in an emergency..."></textarea>                                                   
                                                </div>                                                   
                                            </div>

                                           
                                            <div class="actions">
                                                <button type="button" class="cancel">Cancel</button>
                                                <button type="submit" class="submit">Create Care Plan</button>
                                            </div>
                                        </form>
                                    </div>                                   
                                </div>

                            </div>
                        </div>
                            <!-- <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Full Name *</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Email *</label>
                                        <input type="email" class="form-control">
                                    </div>
                            
                                    <div class="col-md-6  m-t-10">
                                        <label>Phone *</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6  m-t-10">
                                        <label>Status</label>
                                        <select class="form-control">
                                            <option>Active</option>
                                            <option>Inactive</option>
                                        </select>
                                    </div>
                        
                                    <div class="col-md-6  m-t-10">
                                        <label>Employment Type</label>
                                        <select class="form-control">
                                            <option>Full Time</option>
                                            <option>Part Time</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6  m-t-10">
                                        <label>Hourly Rate (£)</label>
                                        <input type="number" value="15" class="form-control">
                                    </div>
                                </div>

                                <div class="overtime">
                                    <label>
                                        <input type="checkbox">  Available for Overtime
                                    </label>
                                </div>

                                <div class="qualifications">
                                    <h4>Qualifications</h4>
                                    <div class="checkbox-grid">
                                        <label><input type="checkbox"> NVQ Level 2 Health & Social Care</label>
                                        <label><input type="checkbox"> NVQ Level 3 Health & Social Care</label>
                                        <label><input type="checkbox"> First Aid Certificate</label>
                                        <label><input type="checkbox"> Dementia Care Specialist</label>
                                        <label><input type="checkbox"> Medication Administration</label>
                                        <label><input type="checkbox"> Care Certificate</label>
                                        <label><input type="checkbox"> Dementia Care</label>
                                        <label><input type="checkbox"> First Aid</label>
                                    </div>
                                </div>

                                <div class="address">
                                    <label>Address</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="Street">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="City">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="Postcode">
                                        </div>
                                    </div>
                                </div>

                                <div class="emergency m-t-10">
                                    <label>Emergency Contact</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="Name">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="Phone">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="Relationship">
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-10">
                                    <div class="col-md-4">
                                        <label>DBS Certificate Number</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label>DBS Expiry Date</label>
                                        <input type="date" class="form-control">
                                    </div>
                                </div>

                                <div class="actions">
                                    <button type="button" class="cancel">Cancel</button>
                                    <button type="submit" class="submit">Create Carer</button>
                                </div>

                            </form> -->
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
        document.querySelectorAll(".availabilityTabs").forEach(wrapper => {

            const tabs = wrapper.querySelectorAll(".availabilityTabs__tab");
            const panels = wrapper.querySelectorAll(".availabilityTabs__panel");

            tabs.forEach(tab => {
                tab.addEventListener("click", () => {

                    tabs.forEach(t => t.classList.remove("active"));
                    panels.forEach(p => p.classList.remove("active"));

                    tab.classList.add("active");
                    wrapper
                        .querySelector("#" + tab.dataset.target)
                        .classList.add("active");
                });
            });

        });
    </script>

    <script>
        document.querySelectorAll(".availabilityTabs").forEach(wrapper => {

            const tabs = wrapper.querySelectorAll(".availabilityTabs__tab");
            const panels = wrapper.querySelectorAll(".availabilityTabs__panel");

            tabs.forEach(tab => {
                tab.addEventListener("click", () => {

                    tabs.forEach(t => t.classList.remove("active"));
                    panels.forEach(p => p.classList.remove("active"));

                    tab.classList.add("active");
                    wrapper
                        .querySelector("#" + tab.dataset.target)
                        .classList.add("active");
                });
            });

        });
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {

                const toggleBtn = document.querySelector(".addalertClientDetailsBtn");
                const formBox = document.querySelector(".addalertClientDetailsform");

                if (toggleBtn && formBox) {
                    toggleBtn.addEventListener("click", function () {
                        formBox.classList.toggle("active");
                    });
                }

            });
        </script>

        <!-- pratima js start -->
    <script>
        const wrapper = document.getElementById("contactWrapper");
 
        const originalContact = wrapper.querySelector(".contactMain");
        const editBtn = document.querySelector(".editBtn");
 
        document.querySelector(".editBtn").addEventListener("click", function() {
            wrapper.style.display = "block";
            editBtn.style.display = "none"
        });
 
        function showEmergency() {
            wrapper.style.display = "none";
            editBtn.style.display = "block";
 
            wrapper.querySelectorAll(".contactMain").forEach((contact, index) => {
                if (index !== 0) contact.remove(); // Keep first one
            });
            originalContact.querySelectorAll("input").forEach(input => input.value = "");
           
        }
 
        document.getElementById("addContactBtn").addEventListener("click", function() {
            const newContact = originalContact.cloneNode(true);
 
            newContact.querySelectorAll("input").forEach(input => input.value = "");
 
            const footer = wrapper.querySelector(".formFooter");
            wrapper.insertBefore(newContact, footer);
        });
 
 
        wrapper.addEventListener("click", function(e) {
            if (e.target.closest(".deleteIcon")) {
                const contact = e.target.closest(".contactMain");
 
                if (contact !== originalContact) {
                    contact.remove();
                } else {
 
                    contact.querySelectorAll("input").forEach(input => input.value = "");
                }
            }
        });
    </script>
 
    <!-- pratima script -->



@endsection
 </main>
