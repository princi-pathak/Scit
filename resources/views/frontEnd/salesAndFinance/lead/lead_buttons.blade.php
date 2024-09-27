<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12 px-3">
        <div class="jobsection">
            <a href="{{ url('/leads/add') }}" class="profileDrop" >New Lead</a>
            <a href="{{ url('/leads/leads') }}" class="profileDrop" >All Leads <span>({{ App\Lead::getAllLeadCount(Auth::user()->home_id) }})</span></a>
            <a href="{{ url('/lead/myLeads') }}" class="profileDrop">My Leads<span>({{ App\Lead::getLeadByUser() }})</span></a>
            <a href="{{ url('/leads/unassigned') }}" class="profileDrop">Unassigned<span>({{ App\Lead::getUnassignedCount() }})</span></a>
            <a href="{{ url('/lead/actioned') }}" class="profileDrop">Actioned<span>({{ App\Lead::getActionedLead(Auth::user()->home_id)}})</span></a>
            <a href="{{ url('/lead/rejected') }}" class="profileDrop">Rejected<span>({{ App\Lead::getRejectedCount() }})</span></a>
            <a href="{{ url('/lead/authorization') }}" class="profileDrop">Authorization<span>({{ App\Lead::getAuthorizationCount() }})</span></a>
            <a href="{{ url('/leads/converted') }}" class="profileDrop">Converted <span>({{ App\Customer::getConvertedCustomersCount(Auth::user()->home_id) }})</span></a>
            <a href="{{ url('/lead/searchLead') }}" class="profileDrop">Search Leads</a>
            <a href="{{ url('/leads/tasks') }}" class="profileDrop">Task</a>
        </div>
    </div>
</div>