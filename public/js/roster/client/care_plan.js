$(document).on('click','#saveClientCarePlanBtn',function(){
    var checkClientCarePlanError = 0;
    $('.checkClientCarePlan').each(function(){
        if($(this).val() == '' || $(this).val() == undefined){
            checkClientCarePlanError = 1;
            $(this).css('border','1px solid red').focus();
            return false;
        }else{
            checkClientCarePlanError = 0;
            $(this).css('border','');
        }
    });
    if(checkClientCarePlanError == 1){
        return false;
    }else{
        var data = new FormData($("#clientCarePlanForm")[0]);
        data.append('client_id', client_id);
        $.ajax({
            type: "POST",
            url: clientCarePlanSaveUrl,
            data: data,
            async: false,
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                console.log(response);
                if (typeof isAuthenticated === "function") {
                    if (isAuthenticated(response) == false) {
                        return false;
                    }
                } 
                if(response.success === true){
                    $("#clientCarePlanForm")[0].reset();
                    $("#addcreateCarePlanModal").hide();
                    $('.ajax-alert-suc').show();
                    $('.msg').text(response.message);
                    setTimeout(function(){
                        // $(".notification-box").fadeOut();
                        // $('.msg').text("");
                        location.reload();
                    }, 5000);
                }
            },
            error: function (xhr, status, error) {
                var errorMessage = xhr.status + ': ' + xhr.statusText;
                alert('Error - ' + errorMessage + "\nMessage: " + error);
            }
        });
    }
        
});

$(document).on('click', '.addMoreObjective', function () {
    $('.no-data-card').remove();

    let index = $('#renderLeaveCard .leave-card').length;

    let html = `
    <div class="leave-card">
        <div class="row">
            <div class="col-md-12">
                <div class="ObjectiveEndDelete planActions">
                    <button type="button" class="objectiveNumber">Objective ${index + 1}</button>
                    <button type="button" class="danger removeObjective"><i class="bx bx-trash"></i></button>
                </div>
            </div>

            <div class="col-md-12">
                <label>Morning</label>
                <textarea name="objectives[${index}][obj_morning]" 
                    class="form-control" rows="3"
                    placeholder="What is the care objective?"></textarea>
            </div>

            <div class="col-md-4 m-t-10">
                <label>Target Date</label>
                <input type="date" name="objectives[${index}][target_date]" class="form-control">
            </div>

            <div class="col-md-4 m-t-10">
                <label>Status</label>
                <select name="objectives[${index}][obj_status]" class="form-control">
                    <option value="Not Started">Not Started</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Achieved">Achieved</option>
                    <option value="Revised">Revised</option>
                    <option value="Discontinued">Discontinued</option>
                </select>
            </div>

            <div class="col-md-4 m-t-10">
                <label>Outcome Measures</label>
                <input type="text" name="objectives[${index}][outcome]" 
                    class="form-control" placeholder="How will success be measured?">
            </div>
        </div>
    </div>`;

    $('#renderLeaveCard').append(html);
});
$(document).on('click', '.removeObjective', function () {
    var obj_id = $(this).data('obj_id');
    if(obj_id){
        if(confirm('Are you sure to delete it?')){
            var btn = $(this);
            $.ajax({
                type: "POST",
                url: clientCarePlanObjectiveDeleteUrl,
                data: {id:obj_id,_token:token},
                success: function (response) {
                    console.log(response);
                    if (typeof isAuthenticated === "function") {
                        if (isAuthenticated(response) == false) {
                            return false;
                        }
                    }
                    if(response.success === true){
                        btn.closest('.leave-card').remove();
                        reindexObjectives();
                        checkEmptyState();
                        $('.ajax-alert-suc').show();
                        $('.msg').text(response.message);
                        setTimeout(function(){
                            $(".notification-box").fadeOut();
                            $('.msg').text("");
                            location.reload();
                        }, 5000);
                    }
                },
                error: function (xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert('Error - ' + errorMessage + "\nMessage: " + error);
                }
            });
        }
    }else{
        $(this).closest('.leave-card').remove();
        reindexObjectives();
        checkEmptyState();
    }
});
function reindexObjectives() {
    $('#renderLeaveCard .leave-card').each(function(index) {
        $(this).find('.objectiveNumber').text('Objective ' + (index + 1));
        $(this).find('textarea').attr('name', `objectives[${index}][obj_morning]`);
        $(this).find('input[type="date"]').attr('name', `objectives[${index}][target_date]`);
        $(this).find('select').attr('name', `objectives[${index}][obj_status]`);
        $(this).find('input[type="text"]').attr('name', `objectives[${index}][outcome]`);
    });
}
function checkEmptyState() {
    let count = $('#renderLeaveCard .leave-card').length;
    if (count === 0) {
        let noDataHtml = `
        <div class="no-data-card">
            <div class="noData" style="text-align:center">
                <div>
                    <i class="bx bx-bullseye"></i>
                    <p>No Objective defined yet</p>
                    <button type="button" class="borderBtn addMoreObjective" style="display:unset !important">
                        Add First Objective
                    </button>
                </div>
            </div>
        </div>`;

        $('#renderLeaveCard').html(noDataHtml);
    }
}
// Care plan Task
$(document).on('click','.addMoreTask',function(){
    $('.no-data-card-task').remove();
    let index = $('#renderClientCarePlanTask .leave-card').length;
    let options = '';
    task_category.forEach(cat => {
        options += `<option value="${cat.id}">${cat.title}</option>`;
    });
    let carePlanTaskhtml = `
    <div class="leave-card">
        <div class="row">
            <div class="col-md-12">
                <div class="ObjectiveEndDelete planActions workHoursHeader">
                <div class="flexBw w100">
                    <div>
                        <span class="badge calientCarePlanTaskTitle" id="calientCarePlanTaskTitle_${index}">${task_category[0].title}</span>
                        <span class="borderBadg ms-3 calientCarePlanTaskcarerBadge" style="color:#ea580c;display:none">2 carers</span>

                    </div>
                    <div>
                        <div class="activeCheck">
                            <label><input type="checkbox" name="tasks[${index}][status]" value="1" checked class="taskStatus"> Active</label>
                            <button type="button" class="danger removeTask"><i class="bx bx-trash"></i></button>
                        </div>

                    </div>
                </div>
             </div>
            </div>

            <div class="col-md-6">
                <label>Task Name</label>
                <input type="text" name="tasks[${index}][name]" class="form-control" placeholder="e.g., Morning personal care">
            </div>

            <div class="col-md-6">
                <label>Category</label>
                <select name="tasks[${index}][category_id]" class="form-control carePlanTaskCategory">
                    ${options}
                </select>
            </div>

            <div class="col-md-12 m-t-10">
                <label>Description</label>
                <textarea name="tasks[${index}][description]" class="form-control" placeholder="Describe what needs to be done..."></textarea>
            </div>

            <div class="col-md-4 m-t-10">
                <label>Frequency</label>
                <select name="tasks[${index}][frequency]" class="form-control">
                    <option value="Daily">Daily</option>
                    <option value="Twice Daily">Twice Daily</option>
                    <option value="Weekly">Weekly</option>
                    <option value="As Needed">As Needed</option>
                    <option value="With Each Visit">With Each Visit</option>
                    <option value="Monthly">Monthly</option>
                </select>
            </div>

            <div class="col-md-4 m-t-10">
                <label>Preferred Time</label>
                <input type="time" name="tasks[${index}][time]" class="form-control">
            </div>

            <div class="col-md-4 m-t-10">
                <label>Duration (mins)</label>
                <input type="number" name="tasks[${index}][duration]" class="form-control" value="15">
            </div>

            <div class="col-md-12 m-t-10">
                <label>Special Instructions</label>
                <textarea name="tasks[${index}][instructions]" class="form-control" placeholder="Any special instructions for carers..."></textarea>
            </div>

            <div class="col-md-12 m-t-10">
                <div class="requiresLable">
                    <input type="checkbox" name="tasks[${index}][two_carers]" class="two_carers_checkbox" value="0">
                    <label>Requires two carers</label>
                </div>
            </div>
        </div>
    </div>`;

    $('#renderClientCarePlanTask').append(carePlanTaskhtml);
});
$(document).on('click', '.removeTask', function () {
    var task_id = $(this).data('task_id');
    if(task_id){
        if(confirm('Are you sure to delete it?')){
            var btn = $(this);
            $.ajax({
                type: "POST",
                url: clientCarePlanTaskDeleteUrl,
                data: {id:task_id,_token:token},
                success: function (response) {
                    console.log(response);
                    if (typeof isAuthenticated === "function") {
                        if (isAuthenticated(response) == false) {
                            return false;
                        }
                    }
                    if(response.success === true){
                        btn.closest('.leave-card').remove();
                        checkEmptyCarePlanTaskState();
                        $('.ajax-alert-suc').show();
                        $('.msg').text(response.message);
                        setTimeout(function(){
                            $(".notification-box").fadeOut();
                            $('.msg').text("");
                            location.reload();
                        }, 5000);
                    }
                },
                error: function (xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert('Error - ' + errorMessage + "\nMessage: " + error);
                }
            });
        }
    }else{
        $(this).closest('.leave-card').remove();
        checkEmptyCarePlanTaskState();
    }
    
});
function checkEmptyCarePlanTaskState(){
    let countCarePlanTask = $('#renderClientCarePlanTask .leave-card').length;
    if (countCarePlanTask === 0) {
        let noDataCarePlanTaskHtml = `
        <div class="no-data-card-task">
            <div class="noData" style="text-align:center">
                <div>
                    <i class="bx bx-checklist"></i>
                    <p>No tasks defined yet</p>
                    <button type="button" class="borderBtn addMoreTask" style="display:unset !important">
                        Add First Task
                    </button>
                </div>
            </div>
        </div>`;

        $('#renderClientCarePlanTask').html(noDataCarePlanTaskHtml);
    }
}
$(document).on('change', '.taskStatus', function () {

    let card = $(this).closest('.leave-card');

    if ($(this).is(':checked')) {
        $(this).val(1);
        card.removeClass('inactive-task');
    } else {
        $(this).val(0);
        card.addClass('inactive-task');
    }
});
$(document).on('change','.carePlanTaskCategory',function(){
    let selectedText = $(this).find('option:selected').text();
    let card = $(this).closest('.leave-card');
    card.find('.calientCarePlanTaskTitle').text(selectedText);
});

$(document).on('click','.addMoreMedication',function(){
    $('.no-data-card-medication').remove();
    let index = $('#renderClientCarePlanMedical .leave-card').length;
    let carePlanMedicationhtml = `
    <div class="leave-card">
        <div class="row">
            <div class="col-md-12">
                <div class="ObjectiveEndDelete planActions workHoursHeader">
                <div class="flexBw w100">
                    <div>
                        <span class="badge"><i class='bx  bx-pill'></i> </span>
                        <span class="careBadg ms-3 orangeBages prnbadge" style="display:none">PRN</span>
                    </div>

                     <div>
                     <div class="activeCheck">
                        <button class="danger removeMedication" type="button"><i class="bx  bx-trash"></i> </button>
                    </div>
                    </div>
                </div>
                    
                    
                </div>
            </div>
            <div class="col-md-4">
                <label>Medication Name</label>
                <input type="text" name="medication[${index}][medi_name]" class="form-control" placeholder="e.g., Paracetamol">
            </div>

            <div class="col-md-4">
                <label>Dose</label>
                <input type="text" name="medication[${index}][dose]" class="form-control" placeholder="e.g., 500mg">
            </div>
            <div class="col-md-4">
                <label>Frequency</label>
                <input type="text" name="medication[${index}][frequency]" class="form-control" placeholder="e.g., Twice daily">
            </div>

            <div class="col-md-6  m-t-10">
                <label>Purpose</label>
                <input type="text" name="medication[${index}][purpose]" class="form-control" placeholder="What is this medication for?">
            </div>
            <div class="col-md-6 m-t-10">
                <div class="requiresLable">
                    <input type="checkbox" id="PRN" class="mediPrn" name="medication[${index}][prn]" value="0">
                    <label for="PRN">PRN (as needed)</label>
                </div>
            </div>
            <div class="col-md-12  m-t-10">
                <label>Special Instructions</label>
                <input type="text" name="medication[${index}][special_instructions]" class="form-control" placeholder="e.g., Take with food">
            </div>
        </div>
    </div>`;

    $('#renderClientCarePlanMedical').append(carePlanMedicationhtml);
});
$(document).on('click', '.removeMedication', function () {
    var medi_id = $(this).data('medi_id');
    if(medi_id){
       if(confirm('Are you sure to delete it?')){
            var btn = $(this);
            $.ajax({
                type: "POST",
                url: clientCarePlanMedicalDeleteUrl,
                data: {id:medi_id,_token:token},
                success: function (response) {
                    console.log(response);
                    if (typeof isAuthenticated === "function") {
                        if (isAuthenticated(response) == false) {
                            return false;
                        }
                    }
                    if(response.success === true){
                        btn.closest('.leave-card').remove();
                        checkEmptyCarePlanMedicationState();
                        $('.ajax-alert-suc').show();
                        $('.msg').text(response.message);
                        setTimeout(function(){
                            $(".notification-box").fadeOut();
                            $('.msg').text("");
                            location.reload();
                        }, 5000);
                    }
                },
                error: function (xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert('Error - ' + errorMessage + "\nMessage: " + error);
                }
            });
        }
    }else{
        $(this).closest('.leave-card').remove();
        checkEmptyCarePlanMedicationState();
    }
    
});
function checkEmptyCarePlanMedicationState(){
    let countCarePlanMedication = $('#renderClientCarePlanMedical .leave-card').length;
    if (countCarePlanMedication === 0) {
        let noDataCarePlanMedicationHtml = `
        <div class="no-data-card-medication">
            <div class="noData" style="text-align:center">
                <div>
                    <i class="bx bx-pill"></i>
                    <p>No medications recorded</p>
                </div>
            </div>
        </div>`;

        $('#renderClientCarePlanMedical').html(noDataCarePlanMedicationHtml);
    }
}
$(document).on('click','.addMoreClientPlanRisk',function(){
    $('.no-data-card-risk').remove();
    let index = $('#renderClientCarePlanRisk .leave-card').length;
    let carePlanRiskhtml = `
        <div class="leave-card">
            <div class="row">
                <div class="col-md-12">
                    <div class="ObjectiveEndDelete planActions">
                        <button class="objectiveNumber">Risk ${index +1}</button>
                        <button type="button" class="danger removeRisk"><i class="bx  bx-trash"></i> </button>
                    </div>
                </div>
                <div class="col-md-12 ">
                    <label>Risk Description</label>
                    <input type="text" name="risk[${index}][description]" class="form-control">
                </div>
                <div class="col-md-6 m-t-10">
                    <label>Likelihood</label>
                    <select class="form-control" name="risk[${index}][likelihood]">
                        <option value="Low">Low</option>
                        <option value="Medium">Medium</option>
                        <option value="Heigh">Heigh</option>
                    </select>
                </div>
                <div class="col-md-6 m-t-10">
                    <label>Impact</label>
                    <select class="form-control" name="risk[${index}][impact]">
                        <option value="Low">Low</option>
                        <option value="Medium">Medium</option>
                        <option value="Heigh">Heigh</option>
                    </select>
                </div>
                <div class="col-md-12 m-t-10">
                    <label>Control Measures</label>
                    <textarea name="risk[${index}][control_measures]" class="form-control" rows="3" cols="20" placeholder="How is this risk being managed?"></textarea>
                </div>
            </div>
        </div>`;

    $('#renderClientCarePlanRisk').append(carePlanRiskhtml);
});
$(document).on('click', '.removeRisk', function () {
    var risk_id = $(this).data('risk_id');
    if(risk_id){
        if(confirm('Are you sure to delete it?')){
            var btn = $(this);
            $.ajax({
                type: "POST",
                url: clientCarePlanRiskDeleteUrl,
                data: {id:risk_id,_token:token},
                success: function (response) {
                    console.log(response);
                    if (typeof isAuthenticated === "function") {
                        if (isAuthenticated(response) == false) {
                            return false;
                        }
                    }
                    if(response.success === true){
                        btn.closest('.leave-card').remove();
                        reindexRiskObjectives();
                        checkEmptyRiskState();
                        $('.ajax-alert-suc').show();
                        $('.msg').text(response.message);
                        setTimeout(function(){
                            $(".notification-box").fadeOut();
                            $('.msg').text("");
                            location.reload();
                        }, 5000);
                    }
                },
                error: function (xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert('Error - ' + errorMessage + "\nMessage: " + error);
                }
            });
        }
    }else{
        $(this).closest('.leave-card').remove();
        reindexRiskObjectives();
        checkEmptyRiskState();
    }
    
});
function reindexRiskObjectives() {
    $('#renderClientCarePlanRisk .leave-card').each(function(index) {
        $(this).find('.objectiveNumber').text('Risk ' + (index + 1));
        $(this).find('input[type="text"]').attr('name', `risk[${index}][description]`);
        $(this).find('select[name*="[likelihood]"]').attr('name', `risk[${index}][likelihood]`);
        $(this).find('select[name*="[impact]"]').attr('name', `risk[${index}][impact]`);
        $(this).find('textarea').attr('name', `risk[${index}][control_measures]`);
    });
}
function checkEmptyRiskState() {
    let countClientCarePlanRisk = $('#renderClientCarePlanRisk .leave-card').length;
    if (countClientCarePlanRisk === 0) {
        let noClientCarePlanRiskDataHtml = `
            <div class="no-data-card-risk">
                <div class="noData" style="text-align:center">
                    <div>
                        <i class="bx  bx-alert-triangle"></i>
                        <p>No risk factors identified</p>
                    </div>
                </div>
            </div>`;

        $('#renderClientCarePlanRisk').html(noClientCarePlanRiskDataHtml);
    }
}
$(document).on('change','.self_administers',function(){
    if($(this).is(':checked')){
        $(this).val(1);
    }else{
        $(this).val(0);
    }
});
$(document).on('change','.mediPrn',function(){
    let card = $(this).closest('.leave-card');
    if($(this).is(':checked')){
        card.find('.prnbadge').show();
        $(this).val(1);
    }else{
        card.find('.prnbadge').hide();
        $(this).val(0);
    }
});
$(document).on('change','.dnacprCheckbox',function(){
    if($(this).is(':checked')){
        $(this).val(1);
    }else{
        $(this).val(0);
    }
});

function getCarePlan(pageUrl = clientCarePlanListUrl){
    $.ajax({
        type: "POST",
        url: pageUrl,
        data: {client_id:client_id,_token:token},
        success: function (response) {

            console.log(response);
            // return false;
            if (typeof isAuthenticated === "function") {
                if (isAuthenticated(response) == false) {
                    return false;
                }
            }
            if (response.success === true) {
                var clientAlerttable = $(".carePlanRenderHtmlData");
                clientAlerttable.innerHTML = '';
                var carePlanData = response.data.data;

                let clientCarePlanHtmlData = '';
                    carePlanData.forEach(function(val){
                        
                        let statusBadge ='';
                        let status = '';
                        if(val.status == 0){
                            statusBadge = 'draftBadge';
                            status = 'draft';
                        }else if(val.status == 1){
                            statusBadge = 'greenbadges';
                            status = 'active';
                        }else if(val.status == 2){
                            statusBadge = 'yellowBorderBadg';
                            status = 'under review';
                        }else if(val.status == 3){
                            statusBadge = 'redBorderBadg';
                            status = 'archived';
                        }
                        let reviewDateHtml= '';
                        if(val.review_date){
                            let resolve_date = moment(val.resolve_date).format('MMM DD, YYYY');
                            reviewDateHtml =`<div><strong>Review:</strong> ${resolve_date}</div>`;
                        }
                        let assessment_date = moment(val.assessment_date).format('MMM DD, YYYY');
                        clientCarePlanHtmlData += `<div class="planCard">
                                <div class="planTop">
                                    <div class="planTitle">
                                        <span class="heartIcon"><i class='bx  bx-heart'></i></span>
                                        Initial Care Plan
                                        <span class="${statusBadge}">${status}</span>
                                    </div>
                                    <div class="planActions">
                                        <button class="viewPlanBtn showDetailsCarePlan" type="button" data-id="${val.id}"><i class='bx  bx-eye'></i> </button>
                                        <button type="button" class="editCarePlan" data-id="${val.id}" data-target="#addcreateCarePlanModal" data-toggle="modal"><i class='bx  bx-pencil'></i> </button>
                                        <button class="danger carePlanDelete" type="button" data-id="${val.id}"><i class='bx  bx-trash'></i> </button>
                                    </div>
                                </div>

                                <div class="planMeta">
                                    <div><strong>Setting:</strong> ${val.care_setting}</div>
                                    <div><strong>Assessed:</strong> ${assessment_date}</div>
                                    <div><strong>By:</strong> ${val.assessed_by}</div>
                                    ${reviewDateHtml}
                                </div>

                                <div class="planFooter">
                                    <span><i class='bx  bx-radio-circle-marked'></i> ${val.objectives_count} objectives</span>
                                    <span><i class='bx  bx-list'></i> ${val.tasks_count} tasks</span>
                                    <span><i class='bx  bx-pill'></i> ${val.medications_count} medications</span>
                                </div>
                            </div>`;
                    });
                
                if(response.data.total >0){
                    $(".carePlanRenderHtmlData").html(clientCarePlanHtmlData);
                }else{
                    $(".carePlanRenderHtmlData").html(`<div class="leavebanktabCont">
                            <i class='bx  bx-alert-triangle'></i>
                            <p>No alerts match the selected filters</p>
                        </div>`);
                }
                
                var paginationControls = $(".clientCarePlanPagnation");
                paginationControls.empty();

                if (response.data.prev_page_url) {
                    paginationControls.append(
                        `<button class="profileDrop me-3" onclick="getCarePlan('${response.data.prev_page_url}')">Previous</button>`
                    );
                }
                if (response.data.next_page_url) {
                    paginationControls.append(
                        `<button class="profileDrop" onclick="getCarePlan('${response.data.next_page_url}')">Next</button>`
                    );
                }
            } else {
                alert("Something went wrong");
                return false;
            }
        },
        error: function (xhr, status, error) {
            var errorMessage = xhr.status + ': ' + xhr.statusText;
            alert('Error - ' + errorMessage + "\nMessage: " + error);
        }
    });
}
$(document).on('click','.carePlanDelete',function(){
    if(confirm('Are you sure to delete it?')){
        let btn = $(this);
        let id = btn.data('id');
       $.ajax({
            type: "POST",
            url: clientCarePlanDeleteUrl,
            data: {id:id,_token:token},
            success: function (response) {
                console.log(response);
                if (typeof isAuthenticated === "function") {
                    if (isAuthenticated(response) == false) {
                        return false;
                    }
                }
                if(response.success === true){
                    btn.closest('.planCard').remove();
                    $('.ajax-alert-suc').show();
                    $('.msg').text(response.message);
                    setTimeout(function(){
                        $(".notification-box").fadeOut();
                        $('.msg').text("");

                    }, 5000);
                }
            },
            error: function (xhr, status, error) {
                var errorMessage = xhr.status + ': ' + xhr.statusText;
                alert('Error - ' + errorMessage + "\nMessage: " + error);
            }
        });
    }
});
$(document).on('click','.showDetailsCarePlan',function(){
    let id = $(this).data('id');
    $.ajax({
        type: "POST",
        url: clientCarePlanDetailsUrl,
        data: {id:id,_token:token},
        success: function (response) {
            console.log(response);
            if (typeof isAuthenticated === "function") {
                if (isAuthenticated(response) == false) {
                    return false;
                }
            }
            if(response.success === true){
                var overview_data = response.data[0];
                let assessment_date = moment(overview_data.assessment_date).format('MMMM DD, YYYY');
                let review_date = moment(overview_data.review_date).format('MMMM DD, YYYY');
                let statusBadge ='';
                let status = '';
                if(overview_data.status == 0){
                    statusBadge = 'muteBadges';
                    status = 'draft';
                }else if(overview_data.status == 1){
                    statusBadge = 'greenbadges';
                    status = 'active';
                }else if(overview_data.status == 2){
                    statusBadge = 'yellowBorderBadg';
                    status = 'under review';
                }else if(overview_data.status == 3){
                    statusBadge = 'redBorderBadg';
                    status = 'archived';
                }
                $(".badgeCarePlanDetail").text(status).addClass(statusBadge);
                $(".carePlanAssessmentDate").text(assessment_date);
                $(".carePlanAssessedBy").text(overview_data.assessed_by);
                $(".carePlanReviewDate").text(review_date);
                getObjectiveHtml(overview_data.objectives);
                getTaskHtml(overview_data.tasks);
                getRiskHtml(overview_data.risks);
            }
        },
        error: function (xhr, status, error) {
            var errorMessage = xhr.status + ': ' + xhr.statusText;
            alert('Error - ' + errorMessage + "\nMessage: " + error);
        }
    });
});
function getObjectiveHtml(data){
    let carePlanObjectiveHtml = '';
    $(".carePlanObjectiveHtmlRender").empty();
    var objIndex = 1;
    data.forEach(function(obj){
        let objStatusBadge ='';
        if(obj.obj_status === 'In Progress'){
            objStatusBadge = 'blueBorderBadg';
        }else if(obj.obj_status === 'Not Started'){
            objStatusBadge = 'muteBadges';
        }else if(obj.obj_status === 'Achieved'){
            objStatusBadge = 'greenbadges';
        }else if(obj.obj_status === 'Revised'){
            objStatusBadge = 'yellowBorderBadg';
        }else if(obj.obj_status === 'Discontinued'){
            objStatusBadge = 'redBorderBadg';
        }
        let objectiveText ='';
        if(obj.obj_morning){
            objectiveText = `<p class="objectiveText">
                                ${obj.obj_morning}
                            </p>`;
        }
        let outcome_message = '';
        if(obj.outcome){
            outcome_message = `<p class="metaLine">
                                <strong>Success measures:</strong> ${obj.outcome}
                            </p>`;
        }
        let targetDate = '';
        if(obj.target_date){
            targetDate = `<p class="metaLine">
                                <strong>Target:</strong> ${moment(obj.target_date).format('MMM DD, YYYY')}
                            </p>`;
        }
        carePlanObjectiveHtml+=`<div class="objectiveCard">
                            <div class="objectiveTop">
                                <strong>Objective ${objIndex}</strong>
                                <span class="statusBadge ${objStatusBadge}">${obj.obj_status}</span>
                            </div>
                            ${objectiveText}
                            ${outcome_message}
                            
                        </div>`;
        objIndex++;
    });
    $(".carePlanObjectiveHtmlRender").html(carePlanObjectiveHtml);
}
function getTaskHtml(data){
    let carePlanTasksHtml = '';
    $(".carePlanTaskHtmlRender").empty();
    data.forEach(function(task){
        let task_name ='';
        if(task.name){
            task_name = `<h4>${task.name}</h4>`;
        }
        let description = '';
        if(task.description){
            description = `<p>${task.description}</p>`;
        }
        let instructionBox ='';
        if(task.instructions){
            instructionBox = `<div class="instructionBox">
                                    <strong>Special Instructions:</strong>
                                    ${task.instructions}
                                </div>`;
        }
        let preferredTime ='';
        if(task.time){
            let time = moment(task.time, "HH:mm:ss");
            if (time.isValid()) {
                preferredTime = `<p class="preferredTime">
                    Preferred time: ${time.format('HH:mm')}
                </p>`;
            }
        }
        carePlanTasksHtml+=`<div class="taskCard">
                                <div class="flexBw flex1 mb-3">
                                 <div>
                                    <span class="careBadg">Emotional Support</span>`;
                                    if(task.two_carers == 1){
                                       carePlanTasksHtml+=`<span class="borderBadg ms-3" style="color:#ea580c">2 Carers Required</span>`;
                                    }
                                    
                                 carePlanTasksHtml+=`</div>
                                  <div>
                                <span class="taskTime">🕒 ${task.frequency} · ${task.duration} mins</span>
                                </div>
                                </div>
                                ${task_name}
                                ${description}
                                ${instructionBox}
                                ${preferredTime}
                            </div>`;
    });
    $(".carePlanTaskHtmlRender").html(carePlanTasksHtml);
}
function getRiskHtml(data){
    let carePlanRisksHtml = '';
    $(".carePlanRiskHtmlRender").empty();
    data.forEach(function(risk){
        let likelihoodStatusBadge ='';
        if(risk.likelihood === 'Low'){
            likelihoodStatusBadge = 'greenbadges';
        }else if(risk.likelihood === 'Medium'){
            likelihoodStatusBadge = 'yellowBorderBadg';
        }else if(risk.likelihood === 'Heigh'){
            likelihoodStatusBadge = 'redBorderBadg';
        }
        let impactStatusBadge ='';
        if(risk.impact === 'Low'){
            impactStatusBadge = 'greenbadges';
        }else if(risk.impact === 'Medium'){
            impactStatusBadge = 'yellowBorderBadg';
        }else if(risk.impact === 'Heigh'){
            impactStatusBadge = 'redBorderBadg';
        }
        carePlanRisksHtml+=`<div class="riskCard">
                                <div class="riskTop">
                                    <strong>${risk.description}</strong>

                                    <div class="riskBadges">
                                        <span class="riskBadge ${likelihoodStatusBadge}">Likelihood: ${risk.likelihood}</span>
                                        <span class="riskBadge ${impactStatusBadge}">Impact: ${risk.impact}</span>
                                    </div>
                                </div>`;
                                if(risk.control_measures){
                                    carePlanRisksHtml+=`<div class="controlBox">
                                        <strong>Control Measures:</strong>
                                        ${risk.control_measures}
                                    </div>`;
                                }
                            carePlanRisksHtml+=`</div>`;
    });
    $(".carePlanRiskHtmlRender").html(carePlanRisksHtml);
}

$(document).on('click','.editCarePlan',function(){
    var id = $(this).data('id');
    $.ajax({
        type: "POST",
        url: clientCarePlanDetailsUrl,
        data: {id:id,_token:token},
        success: function (response) {
            console.log(response);
            if (typeof isAuthenticated === "function") {
                if (isAuthenticated(response) == false) {
                    return false;
                }
            }
            if(response.success === true){
                var overview_data = response.data[0];
                // let assessment_date = moment(overview_data.assessment_date).format('MMMM DD, YYYY');
                // let review_date = moment(overview_data.review_date).format('MMMM DD, YYYY');
                // overview
                $("#care_setting").val(overview_data.care_setting);
                $("#plan_type").val(overview_data.plan_type);
                $("#assessment_date").val(overview_data.assessment_date);
                if(overview_data.review_date){
                    $("#carePlanreview_date").val(overview_data.review_date);
                }
                $("#assessed_by").val(overview_data.assessed_by);
                $("#carePlanStatus").val(overview_data.status);
                $("#preferred_name").val(overview_data.preferred_name || '');
                $("#language").val(overview_data.language || '');
                $("#religion").val(overview_data.religion || '');
                $("#cultural_needs").val(overview_data.cultural_needs || '');
                $("#morning").val(overview_data.morning || '');
                $("#afternoon").val(overview_data.afternoon || '');
                $("#evening").val(overview_data.evening || '');
                $("#night").val(overview_data.night || '');
                $("#overview_id").val(overview_data.id);
                
                getObjectiveForm(overview_data.objectives);
                getTaskForm(overview_data.tasks);
                // Pharmacy
                $("#self_administers").val(overview_data.pharmacy.self_administers).prop('checked', overview_data.pharmacy.self_administers == 1);
                $("#administration_support_level").val(overview_data.pharmacy.administration_support_level);
                $("#pharmacy_details").val(overview_data.pharmacy.pharmacy_details || '');
                $("#gp_details").val(overview_data.pharmacy.gp_details || '');
                $("#allergies").text(overview_data.pharmacy.allergies || '');
                $("#pharmacy_id").val(overview_data.pharmacy.id);

                getMedicationForm(overview_data.medications);
                // Preferances
                $("#likes").text(overview_data?.preferences?.likes || '');
                $("#dislikes").text(overview_data?.preferences?.dislikes || '');
                $("#hobbies_interests").text(overview_data?.preferences?.hobbies_interests || '');
                $("#food_preferences").text(overview_data?.preferences?.food_preferences || '');
                $("#personal_care_preferences").text(overview_data?.preferences?.personal_care_preferences || '');
                $("#communication_preferences").text(overview_data?.preferences?.communication_preferences || '');
                $("#social_preferences").text(overview_data?.preferences?.social_preferences || '');
                $("#preferences_id").val(overview_data.preferences.id);
                // Emergency
                $("#emergency_information").val(overview_data.emergency_info.emergency_information);
                $("#dnacpr").val(overview_data.emergency_info.dnacpr).prop('checked', overview_data.emergency_info.dnacpr == 1);
                $("#emergency_protocol").val(overview_data.emergency_info.emergency_protocol);
                $("#emergency_id").val(overview_data.emergency_info.id);
                getRiskForm(overview_data.risks);
            }
        },
        error: function (xhr, status, error) {
            var errorMessage = xhr.status + ': ' + xhr.statusText;
            alert('Error - ' + errorMessage + "\nMessage: " + error);
        }
    });
});
function getObjectiveForm(data){
    // console.log("objective data: ",data);
    data.forEach(function(objVal){
        $('.no-data-card').remove();
        let index = $('#renderLeaveCard .leave-card').length;
        let statusOptions = ['Not Started','In Progress','Achieved','Revised','Discontinued'];

        let optionsHtml = '';

        statusOptions.forEach(status => {
            optionsHtml += `<option value="${status}" ${objVal.obj_status === status ? 'selected' : ''}>${status}</option>`;
        });
        let html = `
            <div class="leave-card">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ObjectiveEndDelete planActions">
                            <button type="button" class="objectiveNumber">Objective ${index + 1}</button>
                            <button type="button" class="danger removeObjective" data-obj_id="${objVal.id}"><i class="bx bx-trash"></i></button>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label>Morning</label>
                        <textarea name="objectives[${index}][obj_morning]" 
                            class="form-control" rows="3"
                            placeholder="What is the care objective?">${objVal.obj_morning || ''}</textarea>
                    </div>

                    <div class="col-md-4 m-t-10">
                        <label>Target Date</label>
                        <input type="date" name="objectives[${index}][target_date]" class="form-control" value="${objVal.target_date || ''}">
                    </div>

                    <div class="col-md-4 m-t-10">
                        <label>Status</label>
                        <select name="objectives[${index}][obj_status]" class="form-control">
                           ${optionsHtml}
                        </select>
                    </div>

                    <div class="col-md-4 m-t-10">
                        <label>Outcome Measures</label>
                        <input type="text" name="objectives[${index}][outcome]" 
                            class="form-control" placeholder="How will success be measured?" value="${objVal.outcome || ''}">
                        
                        <input type="hidden" name="objectives[${index}][obj_id]" 
                            class="form-control" value="${objVal.id}">
                    </div>
                </div>
            </div>`;
            $('#renderLeaveCard').append(html);
    });
}
function getTaskForm(data){
    // console.log("task data: ",data);
    data.forEach(function(taskVal){
        $('.no-data-card-task').remove();
        let index = $('#renderClientCarePlanTask .leave-card').length;
        let options = '';
        let title = '';
        task_category.forEach(cat => {
            let selected = '';
            if(cat.id == taskVal.category_id){
                title = cat.title;
                selected = 'selected';
            }
            options += `<option value="${cat.id}" ${selected}>${cat.title}</option>`;
        });
        let checked = 'unchecked';
        if(taskVal.status){
            checked = `checked`;
        }
        let frequencyOptions = ['Daily','Twice Daily','Weekly','As Needed','With Each Visit','Monthly'];

        let optionsHtml = '';

        frequencyOptions.forEach(status => {
            optionsHtml += `<option value="${status}" ${taskVal.frequency === status ? 'selected' : ''}>${status}</option>`;
        });
        let carerDisplay = `display:none;`;
        if(taskVal.two_carers){
            carerDisplay = ``;
        }
        let carePlanTaskhtml = `
        <div class="leave-card">
            <div class="row">
                <div class="col-md-12">
                    <div class="ObjectiveEndDelete planActions workHoursHeader">
                        <div class="flexBw w100">
                            <div>
                                <span class="badge calientCarePlanTaskTitle" id="calientCarePlanTaskTitle_${index}">${title}</span>
                                <span class="borderBadg ms-3 calientCarePlanTaskcarerBadge" style="color:#ea580c;${carerDisplay}">2 carers</span>
                            </div>
                            <div>
                                <div class="activeCheck">
                                    <label><input type="checkbox" name="tasks[${index}][status]" value="${taskVal.status}" ${checked} class="taskStatus"> Active</label>
                                    <button type="button" class="danger removeTask" data-task_id="${taskVal.id}"><i class="bx bx-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <label>Task Name</label>
                    <input type="text" name="tasks[${index}][name]" value="${taskVal.name || ''}" class="form-control" placeholder="e.g., Morning personal care">
                </div>

                <div class="col-md-6">
                    <label>Category</label>
                    <select name="tasks[${index}][category_id]" class="form-control carePlanTaskCategory">
                        ${options}
                    </select>
                </div>

                <div class="col-md-12 m-t-10">
                    <label>Description</label>
                    <textarea name="tasks[${index}][description]" class="form-control" placeholder="Describe what needs to be done...">${taskVal.description || ''}</textarea>
                </div>

                <div class="col-md-4 m-t-10">
                    <label>Frequency</label>
                    <select name="tasks[${index}][frequency]" class="form-control">
                        ${optionsHtml}
                    </select>
                </div>

                <div class="col-md-4 m-t-10">
                    <label>Preferred Time</label>
                    <input type="time" name="tasks[${index}][time]" class="form-control" value="${taskVal.time || ''}">
                </div>

                <div class="col-md-4 m-t-10">
                    <label>Duration (mins)</label>
                    <input type="number" name="tasks[${index}][duration]" class="form-control" value="${taskVal.duration || 0}">
                </div>

                <div class="col-md-12 m-t-10">
                    <label>Special Instructions</label>
                    <textarea name="tasks[${index}][instructions]" class="form-control" placeholder="Any special instructions for carers...">${taskVal.instructions || ''}</textarea>
                </div>

                <div class="col-md-12 m-t-10">
                    <div class="requiresLable">
                        <input type="checkbox" name="tasks[${index}][two_carers]" class="two_carers_checkbox" value="${taskVal.two_carers}" ${taskVal.two_carers === 1 ? 'checked' : ''}>
                        <label>Requires two carers</label>
                        <input type="hidden" name="tasks[${index}][task_id]" value="${taskVal.id}">
                    </div>
                </div>
            </div>
        </div>`;

        $('#renderClientCarePlanTask').append(carePlanTaskhtml);
    });
}
function getMedicationForm(data){
    // console.log("Medication data: ",data);
    data.forEach(function(mediVal){
        $('.no-data-card-medication').remove();
        let index = $('#renderClientCarePlanMedical .leave-card').length;
        let pnrDisplay = `display:none;`;
        if(mediVal.prn){
            pnrDisplay = ``;
        }
        let carePlanMedicationhtml = `
        <div class="leave-card">
            <div class="row">
                <div class="col-md-12">
                    <div class="ObjectiveEndDelete planActions workHoursHeader">
                        <div class="flexBw w100">
                            <div>
                                <span class="badge"><i class='bx  bx-pill'></i> </span>
                                <span class="careBadg ms-3 orangeBages prnbadge" style="${pnrDisplay}">PRN</span>
                            </div>
                            <div>
                                <div class="activeCheck">
                                    <button class="danger removeMedication" data-medi_id="${mediVal.id}" type="button"><i class="bx  bx-trash"></i> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Medication Name</label>
                    <input type="text" name="medication[${index}][medi_name]" class="form-control" placeholder="e.g., Paracetamol" value="${mediVal.medi_name || ''}">
                </div>

                <div class="col-md-4">
                    <label>Dose</label>
                    <input type="text" name="medication[${index}][dose]" class="form-control" placeholder="e.g., 500mg" value="${mediVal.dose || ''}">
                </div>
                <div class="col-md-4">
                    <label>Frequency</label>
                    <input type="text" name="medication[${index}][frequency]" class="form-control" placeholder="e.g., Twice daily" value="${mediVal.frequency || ''}">
                </div>

                <div class="col-md-6  m-t-10">
                    <label>Purpose</label>
                    <input type="text" name="medication[${index}][purpose]" class="form-control" placeholder="What is this medication for?" value="${mediVal.purpose || ''}">
                </div>
                <div class="col-md-6 m-t-10">
                    <div class="requiresLable">
                        <input type="checkbox" id="PRN" class="mediPrn" name="medication[${index}][prn]" value="${mediVal.prn}" ${mediVal.prn === 1 ? 'checked' : ''}>
                        <label for="PRN">PRN (as needed)</label>
                    </div>
                </div>
                <div class="col-md-12  m-t-10">
                    <label>Special Instructions</label>
                    <input type="text" name="medication[${index}][special_instructions]" class="form-control" placeholder="e.g., Take with food" value="${mediVal.special_instructions || ''}">
                    <input type="hidden" name="medication[${index}][medi_id]" class="form-control" placeholder="e.g., Take with food" value="${mediVal.id}">
                </div>
            </div>
        </div>`;

        $('#renderClientCarePlanMedical').append(carePlanMedicationhtml);
    });
}
function getRiskForm(data){
    // console.log("Risk data: ",data);
    data.forEach(function(riskVal){
        $('.no-data-card-risk').remove();
        let index = $('#renderClientCarePlanRisk .leave-card').length;
        let options = ['Low','Medium','Heigh'];

        let likelihoodoptionsHtml = '';
        let impactoptionsHtml = '';

        options.forEach(status => {
            likelihoodoptionsHtml += `<option value="${status}" ${riskVal.likelihood === status ? 'selected' : ''}>${status}</option>`;
        });
        options.forEach(status => {
            impactoptionsHtml += `<option value="${status}" ${riskVal.impact === status ? 'selected' : ''}>${status}</option>`;
        });
        let carePlanRiskhtml = `
            <div class="leave-card">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ObjectiveEndDelete planActions">
                            <button class="objectiveNumber">Risk ${index +1}</button>
                            <button type="button" class="danger removeRisk" data-risk_id="${riskVal.id}"><i class="bx  bx-trash"></i> </button>
                        </div>
                    </div>
                    <div class="col-md-12 ">
                        <label>Risk Description</label>
                        <input type="text" name="risk[${index}][description]" class="form-control" value="${riskVal.description || ''}">
                    </div>
                    <div class="col-md-6 m-t-10">
                        <label>Likelihood</label>
                        <select class="form-control" name="risk[${index}][likelihood]">
                            ${likelihoodoptionsHtml}
                        </select>
                    </div>
                    <div class="col-md-6 m-t-10">
                        <label>Impact</label>
                        <select class="form-control" name="risk[${index}][impact]">
                            ${impactoptionsHtml}
                        </select>
                    </div>
                    <div class="col-md-12 m-t-10">
                        <label>Control Measures</label>
                        <textarea name="risk[${index}][control_measures]" class="form-control" rows="3" cols="20" placeholder="How is this risk being managed?">${riskVal.control_measures || ''}</textarea>
                        <input type="hidden" name="risk[${index}][risk_id]" value="${riskVal.id}">
                    </div>
                </div>
            </div>`;

        $('#renderClientCarePlanRisk').append(carePlanRiskhtml);
    });
}
$(document).on('change','.two_carers_checkbox',function(){
    let card = $(this).closest('.leave-card');
    if($(this).is(':checked')){
        $(this).val(1);
        card.find('.calientCarePlanTaskcarerBadge').show();
    }else{
        $(this).val(0);
        card.find('.calientCarePlanTaskcarerBadge').hide();
    }
});