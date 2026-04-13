<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
@extends('frontEnd.layouts.master')
@section('title','Audit Templates')
@section('content')
@include('frontEnd.roster.common.roster_header')
<main class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="staffHeaderp flexWrap gap-3">
                    <div>
                        <h1 class="mainTitlep">Audit Templates</h1>
                        <p class="header-subtitle mb-0">Create and manage audit templates</p>
                    </div>
                    <div class="dFlexGap">
                        <button class="borderBtn" type="button"><i class="bx bx-sparkles"></i>Import with AI
                        </button>
                        <button class="bgBtn" type="button" data-toggle="modal" data-target="#createTemplate"><i class="bx bx-plus"></i>Create Template</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="rowDoc_card mt20">
            <div class="mb15">
                <div class="emergencyMain p-4 h100                                                            ">
                    <div class="flexBw">
                        <i class="bx bx-file-detail fs30 blueText"></i>
                        <span class="careBadg darkBlackBadg">Quarterly</span>
                    </div>
                    <h3 class="f18 font600" style="line-height: 1.5;">Weekly Care Home Compliance & Quality Audit</h3>
                    <p class="muteText mb-4">Across health and safety, person-centred care, staffing, documentation, and feedback.</p>
                    <span class="borderBadg">other</span>
                    <div class="dFlexGap mt-4">
                        <div class="flex1">
                            <button class="borderBtn w100" data-toggle="modal" data-target="#editTemplate">Edit</button>
                        </div>
                        <div>
                            <button class="borderBtn deleteHover"> <i class="bx bx-trash redtext"></i> </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb15">
                <div class="emergencyMain p-4 h100                                                            ">
                    <div class="flexBw">
                        <i class="bx bx-file-detail fs30 blueText"></i>
                        <span class="careBadg darkBlackBadg">Quarterly</span>
                    </div>
                    <h3 class="f18 font600" style="line-height: 1.5;">Weekly Care Home Compliance & Quality Audit</h3>
                    <p class="muteText mb-4">A comprehensive audit tool for ensuring care home compliance across health and safety, person-centred care, staffing, documentation, and feedback.</p>
                    <span class="borderBadg">care_plans</span>
                    <div class="dFlexGap mt-4">
                        <div class="flex1">
                            <button class="borderBtn w100" data-toggle="modal" data-target="#editTemplate">Edit</button>
                        </div>
                        <div>
                            <button class="borderBtn deleteHover"> <i class="bx bx-trash redtext"></i> </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb15">
                <div class="emergencyMain p-4 h100                                                            ">
                    <div class="flexBw">
                        <i class="bx bx-file-detail fs30 blueText"></i>
                        <span class="careBadg darkBlackBadg">Quarterly</span>
                    </div>
                    <h3 class="f18 font600" style="line-height: 1.5;">Health and safety, person-centred care, staffing, documentation, and feedback.</p>
                        <span class="borderBadg">hygiene</span>
                        <div class="dFlexGap mt-4">
                            <div class="flex1">
                                <button class="borderBtn w100" data-toggle="modal" data-target="#editTemplate">Edit</button>
                            </div>
                            <div>
                                <button class="borderBtn deleteHover"> <i class="bx bx-trash redtext"></i> </button>
                            </div>
                        </div>
                </div>
            </div>
            <div class="mb15">
                <div class="emergencyMain p-4 h100                                                            ">
                    <div class="flexBw">
                        <i class="bx bx-file-detail fs30 blueText"></i>
                        <span class="careBadg darkBlackBadg">Quarterly</span>
                    </div>
                    <h3 class="f18 font600" style="line-height: 1.5;">Weekly Care Home Compliance & Quality Audit</h3>
                    <p class="muteText mb-4">A comprehensive audit tool for ensuring care home compliance across health and safety, person-centred care, staffing, documentation, and feedback.</p>
                    <span class="borderBadg">hygiene</span>
                    <div class="dFlexGap mt-4">
                        <div class="flex1">
                            <button class="borderBtn w100">Edit</button>
                        </div>
                        <div>
                            <button class="borderBtn deleteHover"> <i class="bx bx-trash redtext"></i> </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb15">
                <div class="emergencyMain p-4 h100                                                            ">
                    <div class="flexBw">
                        <i class="bx bx-file-detail fs30 blueText"></i>
                        <span class="careBadg darkBlackBadg">Quarterly</span>
                    </div>
                    <h3 class="f18 font600" style="line-height: 1.5;">Weekly Care Home Compliance & Quality Audit</h3>
                    <p class="muteText mb-4">A comprehensive audit tool for ensuring care home compliance across health and safety, person-centred care, staffing, documentation, and feedback.</p>
                    <span class="borderBadg">hygiene</span>
                    <div class="dFlexGap mt-4">
                        <div class="flex1">
                            <button class="borderBtn w100">Edit</button>
                        </div>
                        <div>
                            <button class="borderBtn deleteHover"> <i class="bx bx-trash redtext"></i> </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb15">
                <div class="emergencyMain p-4 h100                                                            ">
                    <div class="flexBw">
                        <i class="bx bx-file-detail fs30 blueText"></i>
                        <span class="careBadg darkBlackBadg">Quarterly</span>
                    </div>
                    <h3 class="f18 font600" style="line-height: 1.5;">Weekly Care Home Compliance & Quality Audit</h3>
                    <p class="muteText mb-4">A comprehensive audit tool for ensuring care home compliance across health and safety, person-centred care, staffing, documentation, and feedback.</p>
                    <span class="borderBadg">hygiene</span>
                    <div class="dFlexGap mt-4">
                        <div class="flex1">
                            <button class="borderBtn w100">Edit</button>
                        </div>
                        <div>
                            <button class="borderBtn deleteHover"> <i class="bx bx-trash redtext"></i> </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- create template modal -->
    <div class="modal fade leaveCommunStyle" id="createTemplate" tabindex="1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg pModalScroll">
            <div class="modal-content">
                <div class="modal-header p24">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Create Audit Template
                    </h4>
                </div>
                <div class="modal-body heightScrollModal p24" style="height: unset;">
                    <form action="">
                        <div class="row">
                            <div class="col-md-6 col-sm-6  m-t-10">
                                <label for="">Template Name *</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-6 col-sm-6 m-t-10">
                                <label for="">Audit Type</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Daily</option>
                                    <option value="">Weekly</option>
                                    <option value="">Monthly</option>
                                    <option value="">Quarterly</option>
                                    <option value="">Annual</option>
                                    <option value="">Adhoc</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-6 m-t-10">
                                <label for="">Category</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Medication</option>
                                    <option value="">Hygiene</option>
                                    <option value="">Safety</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-6 m-t-10">
                                <label for="">Language</label>
                                <select name="" id="" class="form-control">
                                    <option value="">English</option>
                                    <option value="">Welsh / Cymraeg</option>
                                </select>
                            </div>
                            <div class="col-md-12 col-sm-12 m-t-10">
                                <label for="">Description</label>
                                <textarea class="form-control" rows="3" name=""></textarea>
                            </div>
                            <div class="col-md-12">
                                <hr class="hrLine">
                            </div>
                            <div class="col-md-12">
                                <h6 class="h6Head">Sections & Checklist Items </h6>
                                <div class="mainSecCheckList">
                                    <input type="text" class="form-control sectionInput" placeholder="Section name">
                                    <button class="bgBtn blackBtn m-t-10 addSectionBtn" type="button">Add Section</button>
                                    <!-- Add Item Section -->
                                    <div class="mt-4 muteBg rounded5 p-3 addItemSec" style="display: none;">
                                        <div>
                                            <label>Add item to <span class="itemSecName">section name</span></label>
                                            <input type="text" class="form-control itemInput" placeholder="Checklist item">
                                        </div>
                                        <div class="dFlexGap m-t-10">
                                            <select class="form-control itemType" style="width:20rem;">
                                                <option value="Yes/No">Yes/No</option>
                                                <option value="Rating">Rating</option>
                                                <option value="Text">Text</option>
                                                <option value="Numeric">Numeric</option>
                                            </select>
                                            <button class="bgBtn blackBtn addItemBtn" type="button">Add Item</button>
                                        </div>
                                    </div>
                                    <!-- Sections -->
                                    <div class="sectionContainer"></div>

                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <div class="dFlexGap justify-content-end mt-4">
                                    <button class="borderBtn" data-dismiss="modal">Cancel </button>
                                    <button class="bgBtn blackBtn">Save Template</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!--  create template modal end-->
    <div class="modal fade leaveCommunStyle" id="editTemplate" tabindex="1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg pModalScroll">
            <div class="modal-content">
                <div class="modal-header p24">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Template </h4>
                </div>
                <div class="modal-body heightScrollModal p24" style="height: unset;">
                    <form action="">
                        <div class="row">
                            <div class="col-md-6 col-sm-6  m-t-10">
                                <label for="">Template Name *</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-6 col-sm-6 m-t-10">
                                <label for="">Audit Type</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Daily</option>
                                    <option value="">Weekly</option>
                                    <option value="">Monthly</option>
                                    <option value="">Quarterly</option>
                                    <option value="">Annual</option>
                                    <option value="">Adhoc</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-6 m-t-10">
                                <label for="">Category</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Medication</option>
                                    <option value="">Hygiene</option>
                                    <option value="">Safety</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-6 m-t-10">
                                <label for="">Language</label>
                                <select name="" id="" class="form-control">
                                    <option value="">English</option>
                                    <option value="">Welsh / Cymraeg</option>
                                </select>
                            </div>

                            <div class="col-md-12 col-sm-12 m-t-10">
                                <label for="">Description</label>
                                <textarea class="form-control" rows="3" name=""></textarea>
                            </div>
                            <div class="col-md-12">
                                <hr class="hrLine">
                            </div>
                            <div class="col-md-12">
                                <h6 class="h6Head">Sections & Checklist Items </h6>
                                <div class="mainSecCheckList">
                                    <input type="text" class="form-control sectionInput" placeholder="Section name">
                                    <button class="bgBtn blackBtn m-t-10 addSectionBtn" type="button">Add Section</button>
                                    <!-- Add Item Section -->
                                    <div class="mt-4 muteBg rounded5 p-3 addItemSec">
                                        <div>
                                            <label>Add item to <span class="itemSecName">section name</span></label>
                                            <input type="text" class="form-control itemInput" placeholder="Checklist item">
                                        </div>
                                        <div class="dFlexGap m-t-10">
                                            <select class="form-control itemType" style="width:20rem;">
                                                <option value="Yes/No">Yes/No</option>
                                                <option value="Rating">Rating</option>
                                                <option value="Text">Text</option>
                                                <option value="Numeric">Numeric</option>
                                            </select>

                                            <button class="bgBtn blackBtn addItemBtn" type="button">Add Item</button>
                                        </div>
                                    </div>
                                    <!-- Sections -->
                                    <div class="sectionContainer"></div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <div class="dFlexGap justify-content-end mt-4">
                                    <button class="borderBtn" data-dismiss="modal">Cancel </button>
                                    <button class="bgBtn blackBtn">Save Template</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--  create template modal end-->

    <script>
        document.querySelectorAll(".addSectionBtn").forEach(btn => {
            btn.addEventListener("click", function() {
                const closeSecCheckList = btn.closest(".mainSecCheckList");
                const input = closeSecCheckList.querySelector(".sectionInput");
                const sectionName = input.value.trim();

                const addItemSec = closeSecCheckList.querySelector(".addItemSec");
                const itemSecName = closeSecCheckList.querySelector(".itemSecName");
                const container = closeSecCheckList.querySelector(".sectionContainer");

                if (!sectionName) {
                    alert("Please enter section name");
                    return;
                }

                const sectionHTML = `
            <div class="sectionBox lightBorderp rounded5 p-3 mt-4">
                <h6 class="h6Head">${sectionName}</h6>
                <ul class="checkListItem"></ul>
            </div>
        `;
                container.insertAdjacentHTML("beforeend", sectionHTML);
                addItemSec.style.display = "block";
                itemSecName.textContent = sectionName;
                input.value = "";
            });
        });
        // Add Item
        document.querySelectorAll(".addItemBtn").forEach(btn => {
            btn.addEventListener("click", function() {
                const closeSecCheckList = btn.closest(".mainSecCheckList");
                const itemInput = closeSecCheckList.querySelector(".itemInput");
                const itemType = closeSecCheckList.querySelector(".itemType");
                const container = closeSecCheckList.querySelector(".sectionContainer");
                const itemValue = itemInput.value.trim();
                const typeValue = itemType.value;
                if (!itemValue) {
                    alert("Enter checklist item");
                    return;
                }
                // always last section inside THIS modal
                const lastSection = container.querySelector(".sectionBox:last-child ul");
                if (!lastSection) {
                    alert("Please add a section first");
                    return;
                }
                const li = document.createElement("li");
                li.className = "muteText";
                li.textContent = `${itemValue} (${typeValue})`;
                lastSection.appendChild(li);
                itemInput.value = "";
            });
        });

        document.addEventListener("keydown", function(e) {
            if (e.key !== "Enter") return;

            const wrapper = e.target.closest(".mainSecCheckList");
            if (!wrapper) return;

            if (e.target.classList.contains("sectionInput")) {
                e.preventDefault();
                wrapper.querySelector(".addSectionBtn").click();
            }

            if (e.target.classList.contains("itemInput")) {
                e.preventDefault();
                wrapper.querySelector(".addItemBtn").click();
            }
        });
    </script>

</main>
@endsection