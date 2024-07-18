<div class="btn-group">
    <a href="{{ url('admin/sales-finance/leads/add') }}">
        <button id="editable-sample_new" class="btn btn-primary">Add Lead <i class="fa fa-plus"></i></button>
    </a>
    <a href="{{ url('admin/sales-finance/leads') }}">
        <button id="editable-sample_new" class="btn btn-primary">All Leads ({{ App\Lead::getAllLeadCount() }})</button>
    </a>
    <a href="{{ url('admin/sales-finance/leads/unassigned') }}">
        <button id="editable-sample_new" class="btn btn-primary">Unassigned ({{ App\Lead::getUnassignedCount() }})</button>
    </a>
    <a href="{{ url('admin/sales-finance/leads/rejected') }}">
        <button id="editable-sample_new" class="btn btn-primary">Rejected ({{ App\Lead::getRejectedCount() }})</button>
    </a>
    <a href="{{ url('admin/sales-finance/leads/authorization') }}">
        <button id="editable-sample_new" class="btn btn-primary">Authorization ()</button>
    </a>
    <a href="{{ url('admin/sales-finance/leads/converted') }}">
        <button id="editable-sample_new" class="btn btn-primary">Converted ()</button>
    </a>
    <a href="{{ url('admin/sales-finance/leads/tasks') }}">
        <button id="editable-sample_new" class="btn btn-primary">Tasks </button>
    </a>
</div>