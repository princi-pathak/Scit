@include('frontEnd.salesAndFinance.jobs.layout.header')

<section class="main_section_page px-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4 ">
                <div class="pageTitle">
                    <h3>Tasks</h3>
                </div>
            </div>
        </div>

        @include('frontEnd.salesAndFinance.lead.lead_buttons')
        <di class="row">
            <div class="col-lg-12">
                <div class="maimTable">
                    <div class="printExpt">
                        <div class="prntExpbtn">
                            <a href="#!">Print</a>
                            <a href="#!">Export</a>
                        </div>
                        <div class="searchFilter">
                            <a href="#!">Show Search Filter</a>
                        </div>

                    </div>
                    <div class="markendDelete">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="jobsection">
                                    <a href="#" class="profileDrop">Delete</a>
                                    <a href="#" class="profileDrop">Mark As completed</a>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="pageTitleBtn p-0">
                                    <!-- <a href="#" class="profileDrop"> <i class="material-symbols-outlined"> settings </i></a> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <table id="exampleOne" class="display tablechange" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Lead Ref.</th>
                                <th>User</th>
                                <th>Task Type</th>
                                <th>Title</th>
                                <th>Contact Name</th>
                                <th>Contact Phone</th>
                                <th>Notes</th>
                                <th>Creeted By</th>
                                <th>Created On</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($lead_tasks as $value)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ \Carbon\Carbon::parse($value->create_date)->format('d/m/Y') }}  {{ \Carbon\Carbon::parse($value->create_time)->format('m:i') }}</td>
                                    <td>{{ $value->lead_ref }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->lead_task_type_title}}</td>
                                    <td>{{ $value->title }}</td>
                                    <td>{{ $value->contact_name }}</td>
                                    <td>{{ $value->telephone }}</td>
                                    <td>{{ $value->notes }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{  \Carbon\Carbon::parse($value->created_at)->format('d/m/Y h:i') }}</td>
                                    <td><a href="{{ url('/lead/lead_task_delete').'/'.$value->id }}" class="delete"><span style="color: #000;"><i data-toggle="modal" title="Close Task"  data-target="#secondModal" class="fa fa-times open-modal"></i></a> | <a href="{{ url('/leads/edit').'/'.$value->lead_id }}" ><i data-toggle="tooltip" title="View Lead" class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div> <!-- End off main Table -->
            </div>
        </di>
    </div>
</section>

@include('frontEnd.salesAndFinance.jobs.layout.footer')