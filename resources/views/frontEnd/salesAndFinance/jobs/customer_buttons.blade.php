<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12 px-3">
        <div class="jobsection">
            <a href="{{ url('/leads/add') }}" class="profileDrop" >New Customer</a>
            <a href="{{ url('/leads/leads') }}" class="profileDrop" >Active Customer <span>(1)</span></a>
            <a href="{{ url('/lead/myLeads') }}" class="profileDrop">Inactive Customer<span>(0)</span></a>
            <a href="{{ url('/leads/unassigned') }}" class="profileDrop">Bulk Delete<span></span></a>
            <a href="" class="profileDrop">Import</a><a href="#!">Click here to download import template</a>
        </div>
    </div>
</div>