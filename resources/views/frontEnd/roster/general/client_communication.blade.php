<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
@extends('frontEnd.layouts.master')
@section('title','Client Message')
@section('content')
@include('frontEnd.roster.common.roster_header')
<main class="page-content">
    <div class="container-fluid">
        <div class="chatRow">
            <div class="leftChat">
                <div class="borderBottom">
                    <div class="p-3">
                        <h4 class="font700 mt-3">Client Messages</h4>
                        <div class="input-group mt-3 searchp">
                            <span class="input-group-addon btn-white"><i class="fa fa-search"></i></span>
                            <input type="text" class="form-control" id="searchText" placeholder="Search carers...">
                        </div>
                    </div>
                </div>
                <div style="height: 70vh; overflow:auto">
                    <div class="borderBottom  userItem cursorPointer" data-name="Ned Stark">
                        <div class="dFlexGap p-4">
                            <div>
                                <div class="bgIconStaffT darkBlueGrad rounded50">
                                    <span class="whiteText f18">t</span>
                                </div>
                            </div>
                            <div>
                                <h6 class="h6Head mb-1"> Ned Stark</h6>
                                <p class="mb-0 muchsmallText">No messages
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="borderBottom userItem cursorPointer" data-name="Mayank">
                        <div class="dFlexGap p-4">
                            <div>
                                <div class="bgIconStaffT darkBlueGrad rounded50">
                                    <span class="whiteText f18">t</span>
                                </div>
                            </div>
                            <div>
                                <h6 class="h6Head mb-1"> Mayank</h6>
                                <p class="mb-0 muchsmallText">No messages
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="borderBottom userItem cursorPointer" data-name="Mrs Eleanor Margaret Vance">
                        <div class="dFlexGap p-4">
                            <div>
                                <div class="bgIconStaffT darkBlueGrad rounded50">
                                    <span class="whiteText f18">t</span>
                                </div>
                            </div>
                            <div>
                                <h6 class="h6Head mb-1"> Mrs Eleanor Margaret Vance</h6>
                                <p class="mb-0 muchsmallText">No messages
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="borderBottom userItem cursorPointer" data-name="Mayank1">
                        <div class="dFlexGap p-4">
                            <div>
                                <div class="bgIconStaffT darkBlueGrad rounded50">
                                    <span class="whiteText f18">t</span>
                                </div>
                            </div>
                            <div>
                                <h6 class="h6Head mb-1"> Mayank1</h6>
                                <p class="mb-0 muchsmallText">No messages
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="borderBottom userItem cursorPointer" data-name="Mayank3">
                        <div class="dFlexGap p-4">
                            <div>
                                <div class="bgIconStaffT darkBlueGrad rounded50">
                                    <span class="whiteText f18">t</span>
                                </div>
                            </div>
                            <div>
                                <h6 class="h6Head mb-1"> Mrs Eleanor Margaret Vance</h6>
                                <p class="mb-0 muchsmallText">No messages
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="borderBottom userItem cursorPointer" data-name="Mayank5">
                        <div class="dFlexGap p-4">
                            <div>
                                <div class="bgIconStaffT darkBlueGrad rounded50">
                                    <span class="whiteText f18">t</span>
                                </div>
                            </div>
                            <div>
                                <h6 class="h6Head mb-1"> Mrs Eleanor Margaret Vance</h6>
                                <p class="mb-0 muchsmallText">No messages
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="borderBottom userItem cursorPointer" data-name="Mayank6">
                        <div class="dFlexGap p-4">
                            <div>
                                <div class="bgIconStaffT darkBlueGrad rounded50">
                                    <span class="whiteText f18">t</span>
                                </div>
                            </div>
                            <div>
                                <h6 class="h6Head mb-1"> Mrs Eleanor Margaret Vance</h6>
                                <p class="mb-0 muchsmallText">No messages
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="borderBottom userItem cursorPointer" data-name="Mayank7">
                        <div class="dFlexGap p-4">
                            <div>
                                <div class="bgIconStaffT darkBlueGrad rounded50">
                                    <span class="whiteText f18">t</span>
                                </div>
                            </div>
                            <div>
                                <h6 class="h6Head mb-1"> Mrs Eleanor Margaret Vance</h6>
                                <p class="mb-0 muchsmallText">No messages
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex1">

                <div id="chatBox" class="chatBox d-none">
                    <div class="chatHeader p-3 borderBottom">
                        <div class="flexBw flexWrap gap-3">
                            <div class="dFlexGap">
                                <div>
                                    <div class="bgIconStaffT darkBlueGrad rounded50" style="height: 45px; width:45px">
                                        <span class="fs23 whiteText">T</span>
                                    </div>
                                </div>
                                <div>
                                    <h6 class="h6Head mb-1" id="chatUserName">User Name</h6>
                                    <div class="dFlexGap gap-2">
                                        <p class="mb-0 muteText">Assigned carers:</p>
                                        <span class="borderBadg">Ellese</span>
                                    </div>
                                </div>
                            </div>

                            <div class="dFlexGap flexWrap gap-3">
                                <div>
                                    <button class="borderBtn" type="button" data-toggle="modal" data-target="#bookAppoint"> <i class="bx bx-calendar-week"></i> Book Appointment</button>

                                </div>
                                <div>

                                    <select name="" id="" class="form-control"><i class="bx bx-filter"></i>
                                        <option value="">All Priority</option>
                                        <option value="">Urgent</option>
                                        <option value="">High</option>
                                        <option value="">Low</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="chatBody p-3" id="chatMessages">
                        <!-- messages will come here -->
                        <div class="receiveMsgMain">
                            <div class="receiveBadg">
                                hi i am priya
                            </div>
                            <p class="muchsmallText">Today 4:21 AM</p>
                        </div>
                    </div>

                    <div class="chatFooter p-3">
                        <div class="input-group w100">
                            <div class="dFlexGap">
                                <div class="flex1">
                                    <input
                                        type="text"
                                        id="messageInput"
                                        class="form-control w100"
                                        placeholder="Type message..."
                                        onkeydown="handleKey(event)">
                                </div>
                                <div>
                                    <div>
                                        <button class="bgBtn" onclick="sendMessage()"><i class="bx bx-send"></i></button>
                                    </div>
                                    <div class="mt-2">
                                        <button class="borderBtn"><i class="bx bx-sparkles purpleTextp"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="noData py-5" style="border: unset; border-radius:unset; box-shadow: unset; height:100vh;border:1px solid #ddd; border-left:unset">
                    <div>
                        <i class="bx bx-message"></i>
                        <div class="mt20">

                            <h5 class="h5Head ">Select a Client</h5>
                        </div>
                        <p class="mb-0">Choose a client from the list to view messages</p>
                    </div>
                </div>
            </div>
            <div class="rightInsight p-3">
                <h4 class="font700"> <i class="bx bx-sparkles purpleTextp f18"></i> AI Insights </h4>
                <div class="emergencyMain p24 mt-4">
                    <h6 class="h6Head mb-0">Message Priority</h6>
                    <div class="mt-4 chatPrior">
                        <div class="dFlexGap bottomSpace">
                            <span class="careBadg redBadges">Urgent</span>
                            <div class="progressBar" style="width: 80px;">
                                <div class="progressFill" style="width:10%; background:#dc2626"></div>
                            </div>
                            <p class="mb-0 muteText">0</p>
                        </div>
                        <div class="dFlexGap bottomSpace">
                            <span class="careBadg orangeBages">High</span>
                            <div class="progressBar" style="width: 80px;">
                                <div class="progressFill" style="width:20%; background:#f97316"></div>
                            </div>
                            <p class="mb-0 muteText">1</p>
                        </div>
                        <div class="dFlexGap bottomSpace">
                            <span class="careBadg">Normal</span>
                            <div class="progressBar" style="width: 80px;">
                                <div class="progressFill" style="width:40%; background:#2563eb"></div>
                            </div>
                            <p class="mb-0 muteText">5</p>
                        </div>
                        <div class="dFlexGap bottomSpace">
                            <span class="careBadg muteBadg">Low</span>
                            <div class="progressBar" style="width: 80px;">
                                <div class="progressFill" style="width:70%; background:#9ca3af"></div>
                            </div>
                            <p class="mb-0 muteText">15</p>
                        </div>
                    </div>
                </div>
                <div class="emergencyMain p24 mt-4">
                    <h6 class="h6Head mb-0">Categories</h6>
                    <div class="mt-4">
                        <div class="flexBW bottomSpace">
                            <p class="mb-0 muteText">Other</p>
                            <span class="borderBadg">34</span>
                        </div>
                        <div class="flexBW bottomSpace">
                            <p class="mb-0 muteText">General Query</p>
                            <span class="borderBadg">4</span>
                        </div>
                    </div>
                </div>
                <div class="emergencyMain p24 mt-4">
                    <h6 class="h6Head mb-0">Quick Stats</h6>
                    <div class="mt-4">
                        <div class="flexBW bottomSpace">
                            <p class="mb-0 muteText">Unread Messages</p>
                            <span class="careBadg darkBlueBadg">34</span>
                        </div>
                        <div class="flexBW bottomSpace">
                            <p class="mb-0 muteText">Pending Response</p>
                            <span class="borderBadg">42</span>
                        </div>
                        <div class="flexBW bottomSpace">
                            <p class="mb-0 muteText">Today's Message</p>
                            <span class="borderBadg">2</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- book appoint modal -->
        <div class="modal fade leaveCommunStyle" id="bookAppoint" tabindex="1" role="dialog"
            aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog pModalScroll">
                <div class="modal-content">
                    <div class="modal-header p24">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"> <i class="bx bx-calendar-plus fs23 blueText"></i> Book Appointment for Tywin</h4>
                    </div>
                    <div class="modal-body heightScrollModal p24" style="height: unset;">
                        <form action="">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <label for="">Date</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-md-6 col-sm-6 m-t-10">
                                    <label for="">Shift Type</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Morning</option>
                                        <option value="">Afternoon</option>
                                        <option value="">Evening</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-6 m-t-10">
                                    <label for="">Start Time</label>
                                    <input type="time" class="form-control">
                                </div>
                                <div class="col-md-6 col-sm-6 m-t-10">
                                    <label for="">End Time</label>
                                    <input type="time" class="form-control">
                                </div>
                                <div class="col-md-12 col-sm-12 m-t-10">
                                    <label for="">Assign Carer (Optional)</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Auto-assign later</option>
                                        <option value="">Ellese Rothwell</option>
                                    </select>
                                </div>
                                <div class="col-md-12 col-sm-12 m-t-10">
                                    <label for="">Notes / Service Type</label>
                                    <textarea class="form-control" rows="3" placeholder="Describe the service needed..." name=""></textarea>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <div class="flexBw">
                                        <button class="borderBtn"> <i class="bx bx-sparkles"></i> AI Suggest</button>
                                        <div class="dFlexGap justify-content-end mt-4">
                                            <button class="borderBtn flex1" data-dismiss="modal">Cancel </button>
                                            <button class="bgBtn"> <i class="bx bx-check-circle"></i> Book Appointment</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- book appointment modal -->
    </div>

    <script>
        let currentUser = "";
        let userMessages = {};

        // Click on user item
        document.querySelectorAll(".userItem").forEach(item => {
            item.addEventListener("click", function() {
                const selectedUser = this.getAttribute("data-name");
                document.querySelectorAll(".userItem").forEach(user => {
                    user.classList.remove("active");
                });
                this.classList.add("active");

                if (selectedUser !== currentUser) {
                    if (currentUser) {
                        userMessages[currentUser] = document.getElementById("chatMessages").innerHTML;
                    }

                    currentUser = selectedUser;
                    const chatMessagesDiv = document.getElementById("chatMessages");
                    chatMessagesDiv.innerHTML = userMessages[currentUser] ||
                        `<div class="receiveMsgMain">
                        <div class="receiveBadg">Hello! How can I help you today?</div>
                        <p class="muchsmallText">Today 4:21 AM</p>
                     </div>`;

                    chatMessagesDiv.scrollTop = chatMessagesDiv.scrollHeight;
                }
                document.getElementById("chatBox").classList.remove("d-none");
                document.querySelector(".noData").classList.add("d-none");
                document.getElementById("chatUserName").innerText = currentUser;
            });
        });

        // Send message (Care Team)
        function sendMessage() {
            let input = document.getElementById("messageInput");
            let message = input.value.trim();
            if (message === "" || !currentUser) return;

            let msgHTML = `
            <div class="sentMsgMain">
                <div class="mb-2 badge bg-primary">
                    <div class="dFlexGap mb-3">
                        <i class="bx bx-message fs14"></i>
                        <span class="whiteText">Care Team</span>
                        <span class="careBadg darkBlueBadg">Low</span>
                    </div>
                    <div style="text-align:left">
                        <span class="msg">${message}</span>
                    </div>
                </div>
                <p class="muchsmallText">Today ${new Date().getHours()}:${new Date().getMinutes().toString().padStart(2, '0')}</p>
            </div>`;

            document.getElementById("chatMessages").insertAdjacentHTML('beforeend', msgHTML);
            document.getElementById("chatMessages").scrollTop = document.getElementById("chatMessages").scrollHeight;

            input.value = "";
        }

        // Handle Enter key
        function handleKey(e) {
            if (e.key === "Enter") {
                e.preventDefault();
                sendMessage();
            }
        }

        // Add receive message function (for testing or future use)
        function addReceiveMessage(text) {
            if (!currentUser) return;

            let receiveHTML = `
            <div class="receiveMsgMain">
                <div class="receiveBadg">${text}</div>
                <p class="muchsmallText">Today ${new Date().getHours()}:${new Date().getMinutes().toString().padStart(2, '0')}</p>
            </div>`;

            document.getElementById("chatMessages").insertAdjacentHTML('beforeend', receiveHTML);
            document.getElementById("chatMessages").scrollTop = document.getElementById("chatMessages").scrollHeight;
        }

        // Initialize
        document.addEventListener("DOMContentLoaded", function() {
            const messageInput = document.getElementById("messageInput");
            if (messageInput) {
                messageInput.addEventListener("keydown", handleKey);
            }

            // Optional: Demo - Add a receive message after 1 second
            // setTimeout(() => addReceiveMessage("Hi, I need some help with my booking."), 1000);
        });
    </script>
</main>
@endsection