@extends('frontEnd.layouts.master')
@section('title', 'Staff Task')
@section('content')
    @include('frontEnd.roster.common.roster_header')
    <main class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="staffHeaderp p-4 gap-5 bgWhite" style="border-bottom:1px solid #ddd">
                        <div>
                            <div class="d-flex gap-3 align-items-center">
                                <i class=" fs23 bx  bx-arrow-left-stroke"></i>
                                <div>

                                    <h1 class="mainTitlep"> Mental Capacity
                                        Assessment & Best Interests Decision (Mental Capacity
                                        Act
                                        2005) - Client</h1>
                                    <p class="header-subtitle mb-0"> <i class="bx bx-calendar f18 me-2"></i> 12 Dec 2025
                                        at
                                        11:00
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <span class="careBadg yellowBadges">Pending</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt20 d-flex justify-content-center">
                <div class="col-lg-10">
                    <div class="emergencyMain p-4">
                        <p class="competeMentalSt"> Complete Mental Capacity Assessment & Best Interests Decision
                            (Mental
                            Capacity
                            Act 2005) during
                            assessment visit</p>
                    </div>

                </div>
            </div>
            <div class="row d-flex justify-content-center mt20">
                <div class="col-lg-10">
                    <div class="emergencyMain aiInciDetaReport rounded8">
                        <div class="cardHeaderp aIInsightsheader p24 rounded8" style="border-bottom:unset">
                            <div>
                                <h2 class="h2Head">
                                    Mental Capacity Assessment & Best Interests Decision (Mental Capacity Act 2005)
                                </h2>
                                <p class="muteText">A comprehensive form for evaluating an individual's mental capacity
                                    regarding specific
                                    decisions and documenting best interests decisions if capacity is found to be lacking.
                                </p>
                                <div class="mt-3">
                                    <span class="careBadg darkBlackBadg healthcare">healthcare</span>
                                </div>
                            </div>
                        </div>
                        <div class="p24">
                            <div class="calendarTabs tabStaffDe">
                                <div class="tabs p-1 pb-4">
                                    <button class="tab active" data-tab="generalTab">
                                        Person & Decision Details

                                    </button>
                                    <button class="tab " data-tab="availabilityTab">
                                        Two-Stage Capacity Test </button>

                                    <button class="tab" data-tab="supervisionsTab">
                                        Best Interests Decision (If Capacity Lacking) </button>
                                    <button class="tab" data-tab="shiftsTab">
                                        Signatures
                                    </button>
                                    <button class="tab" data-tab="documentConTab">
                                        Document Control
                                    </button>

                                </div>

                                <!-- TAB CONTENT -->
                                <div class="occupancyBox bg-blue-50 p-4 rounded8 mt20">
                                    <div class="topRow">
                                        <span class="value textBlue">Form Progress</span>
                                        <span class="value">13%</span>
                                    </div>

                                    <div class="progressBar">
                                        <div class="progressFill" style="width:20%;background:#2563eb">
                                        </div>

                                    </div>
                                    <p class="fs13 textBlue mt-3">1 of 8 questions answered </p>
                                </div>
                                <div class="tab-content carertabcontent mt20">
                                    <div class="content active" id="generalTab">
                                        <h5 class="h5Head">Person & Decision Details</h5>
                                        <div class="mt20">
                                            <label class="formLabel"> Person and Assessment Details <span
                                                    class="redtext">*</span></label>
                                            <div class="tableSTDetail table-responsive js-dynamic-table">
                                                <table class="table">
                                                    <thead>
                                                        <th>Name</th>
                                                        <th>DOB</th>
                                                        <th>Assessor / Role</th>
                                                        <th>Date & Time</th>
                                                        <th>Specific Decision Being Assessed</th>
                                                        <th>Actions</th>
                                                    </thead>

                                                    <tbody>
                                                        <tr class="js-row-template d-none">
                                                            <td><input type="text"></td>
                                                            <td><input type="date"></td>
                                                            <td><input type="text"></td>
                                                            <td><input type="text"></td>
                                                            <td><input type="text"></td>
                                                            <td>
                                                                <div class="deleteIcon delete-row-btn"> <i
                                                                        class="fa fa-trash-o" aria-hidden="true"></i>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td class="text-center" colspan="6"><button
                                                                    class="borderBtn add-row-btn text-center"> <i
                                                                        class="bx bx-plus f20 me-2"></i>
                                                                    Add Row</button></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="content" id="availabilityTab">

                                        <h5 class="h5Head">Two-Stage Capacity Test</h5>
                                        <div class="mt20">
                                            <label class="formLabel">Two-Stage Capacity Test Grid
                                                <span class="redtext">*</span></label>
                                            <div class="tableSTDetail table-responsive js-dynamic-table">
                                                <table class="table">
                                                    <thead>
                                                        <th>Test Element</th>
                                                        <th>Yes</th>
                                                        <th>No</th>
                                                        <th>Evidence / Notes</th>
                                                        <th>Actions</th>
                                                    </thead>

                                                    <tbody>
                                                        <tr class="js-row-template d-none">
                                                            <td><input type="text"></td>
                                                            <td>
                                                                <div class="checkboxp mb-0">

                                                                    <input type="checkbox">
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="checkboxp mb-0">
                                                                    <input type="checkbox">
                                                                </div>
                                                            </td>


                                                            <td><input type="text"></td>

                                                            <td>
                                                                <div class="deleteIcon delete-row-btn"> <i
                                                                        class="fa fa-trash-o" aria-hidden="true"></i>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td class="text-center" colspan="5"><button
                                                                    class="borderBtn add-row-btn text-center"> <i
                                                                        class="bx bx-plus f20 me-2"></i>
                                                                    Add Row</button></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="content" id="supervisionsTab">
                                        <h5 class="h5Head">Best Interests Decision (If Capacity Lacking)
                                        </h5>
                                        <div class="mt20">
                                            <label class="formLabel">Best Interests Decision Log

                                                <span class="redtext">*</span></label>
                                            <div class="tableSTDetail table-responsive js-dynamic-table">
                                                <table class="table">
                                                    <thead>
                                                        <th>People Consulted</th>
                                                        <th>Views / Wishes</th>
                                                        <th>Decision & Least Restrictive Option</th>

                                                        <th>Actions</th>
                                                    </thead>

                                                    <tbody>
                                                        <tr class="js-row-template d-none">
                                                            <td><input type="text"></td>
                                                            <td><input type="text"></td>
                                                            <td><input type="text"></td>


                                                            <td>
                                                                <div class="deleteIcon delete-row-btn"> <i
                                                                        class="fa fa-trash-o" aria-hidden="true"></i>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td class="text-center" colspan="4"><button
                                                                    class="borderBtn add-row-btn text-center"> <i
                                                                        class="bx bx-plus f20 me-2"></i>
                                                                    Add Row</button></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content" id="shiftsTab">
                                        <h5 class="h5Head">Signatures

                                        </h5>
                                        <div class="mt20">
                                            <label class="formLabel">Signature Grid


                                                <span class="redtext">*</span></label>
                                            <div class="tableSTDetail table-responsive js-dynamic-table">
                                                <table class="table">
                                                    <thead>
                                                        <th>Assessor Signature</th>
                                                        <th>Date</th>
                                                        <th>Manager / Witness Signature</th>
                                                        <th>Date</th>
                                                        <th>Actions</th>
                                                    </thead>

                                                    <tbody>
                                                        <tr class="js-row-template d-none">
                                                            <td><input type="text"></td>
                                                            <td><input type="date"></td>
                                                            <td><input type="text"></td>

                                                            <td><input type="date"></td>

                                                            <td>
                                                                <div class="deleteIcon delete-row-btn"> <i
                                                                        class="fa fa-trash-o" aria-hidden="true"></i>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td class="text-center" colspan="5"><button
                                                                    class="borderBtn add-row-btn text-center"> <i
                                                                        class="bx bx-plus f20 me-2"></i>
                                                                    Add Row</button></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content" id="documentConTab">
                                        <h5 class="h5Head">Document Control </h5>
                                        <div class="mt20">

                                            <div class="carer-form mt-0">
                                                <div class="row">
                                                    <div class="col-lg-12"> <label class="formLabel">Organisation
                                                            Name
                                                            <span class="redtext">*</span></label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col-lg-12 m-t-10"> <label class="formLabel">
                                                            Policy Ref <span class="redtext">*</span></label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col-lg-12 m-t-10"> <label class="formLabel">Version <span
                                                                class="redtext">*</span></label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col-lg-12 m-t-10"> <label class="formLabel">Review Date
                                                            <span class="redtext">*</span></label>
                                                        <input type="date" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between flexWrap align-items-center mt20 pt24"
                                    style="border-top:1px solid #ddd">
                                    <div class="d-flex gap-3 flexWrap">
                                        <div>
                                            <button class="borderBtn">Previous</button>
                                        </div>
                                        <div>
                                            <button class="borderBtn">Save Draft</button>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="bgBtn blackBtn">
                                            Next Section
                                        </button>
                                    </div>
                                </div>
                                <!-- END TAB CONTENT -->
                            </div>
                        </div>
                    </div>
                    <div class="emergencyMain p24 rounded8 mt20">
                        <h5 class="h5Head">Complete Task
                        </h5>
                        <div class="mt20">
                            <form action="">

                                <label class="formLabel">Completion Notes</label>
                                <textarea name="morning" required="" class="form-control" rows="3" cols="20"
                                    placeholder="Additional details..."></textarea>
                                <div class="purpleBox p-4 reportyellowBox mt-4">
                                    <div class="d-flex gap-3 align-items-center">
                                        <div>
                                            <i class="darkyellowIc bx bx-alert-circle f20"></i>
                                        </div>
                                        <div class="">
                                            <p class="mb-0" for="safeguarding"> Please complete and submit the form
                                                above before marking this task as complete.
                                            </p>

                                        </div>
                                    </div>

                                </div>
                                <div class="d-flex justify-content-end gap-3 mt20 ">
                                    <div>
                                        <button class="borderBtn">
                                            Save & Exit
                                        </button>
                                    </div>
                                    <div>
                                        <button class="bgBtn pgreenBtn"><i class="bx bx-check-circle me-3 f18"></i>
                                            Mark Complete</button>
                                    </div>
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

        <!-- <script>
                                                                                                                                                                                                                                     document.addEventListener("click", function(e) {

                                                                                                                                                                                                                                         // ADD ROW
                                                                                                                                                                                                                                         if (e.target.closest(".add-row-btn")) {
                                                                                                                                                                                                                                             const wrapper = e.target.closest(".js-dynamic-table");
                                                                                                                                                                                                                                             const tbody = wrapper.querySelector("tbody");
                                                                                                                                                                                                                                             const template = tbody.querySelector(".js-row-template");

                                                                                                                                                                                                                                             const newRow = template.cloneNode(true);

                                                                                                                                                                                                                                             // reset fields (inputs, checkboxes, radios, selects)
                                                                                                                                                                                                                                             newRow.querySelectorAll("input, select, textarea").forEach(el => {
                                                                                                                                                                                                                                                 if (el.type === "checkbox" || el.type === "radio") {
                                                                                                                                                                                                                                                     el.checked = false;
                                                                                                                                                                                                                                                 } else {
                                                                                                                                                                                                                                                     el.value = "";
                                                                                                                                                                                                                                                 }
                                                                                                                                                                                                                                             });

                                                                                                                                                                                                                                             tbody.appendChild(newRow);
                                                                                                                                                                                                                                         }

                                                                                                                                                                                                                                         // DELETE ROW
                                                                                                                                                                                                                                         if (e.target.closest(".delete-row-btn")) {
                                                                                                                                                                                                                                             e.target.closest("tr").remove();
                                                                                                                                                                                                                                         }

                                                                                                                                                                                                                                     });
                                                                                                                                                                                                                                     </script> -->

        <script>
            document.addEventListener("click", function (e) {

                // ADD ROW
                if (e.target.closest(".add-row-btn")) {
                    const wrapper = e.target.closest(".js-dynamic-table");
                    const tbody = wrapper.querySelector("tbody");
                    const template = tbody.querySelector(".js-row-template");

                    if (!template) return; // safety check

                    const newRow = template.cloneNode(true);
                    newRow.classList.remove("js-row-template", "d-none");

                    newRow.querySelectorAll("input, select, textarea").forEach(el => {
                        if (el.type === "checkbox" || el.type === "radio") {
                            el.checked = false;
                        } else {
                            el.value = "";
                        }
                    });

                    tbody.appendChild(newRow);
                }

                // DELETE ROW
                if (e.target.closest(".delete-row-btn")) {
                    const row = e.target.closest("tr");

                    // don't delete template
                    if (!row.classList.contains("js-row-template")) {
                        row.remove();
                    }
                }

            });
        </script>


        <!-- script start -->
        <!-- tab -->

        <!-- tab end -->

        <!-- script end -->
    </main>
@endsection