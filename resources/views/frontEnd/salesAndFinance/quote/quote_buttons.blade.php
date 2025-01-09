<div class="row">
    <div class="col-md-8 col-lg-8 col-xl-8 px-3">
        <div class="jobsection">
            <a href="{{ url('/quote/add') }}" class="profileDrop">New Quotes</a>
            <a href="{{ url('/quote/draft') }}" class="profileDrop ">Draft <span>({{ $draftCount }})</span></a> 
            <a href="{{ url('/quote/actioned') }}" class="profileDrop">Actioned<span>({{ $actionedCount}})</span></a>
            <a href="#" class="profileDrop ">Converted<span>(15)</span></a>
            <a href="{{ url('/quote/callBack') }}" class="profileDrop">Call back<span>({{ $callbackCount }})</span></a>
            <a href="{{ url('/quote/accepted') }}" class="profileDrop">Accsepted<span>({{ $acceptedCount }})</span></a>
            <a href="{{ url('/quote/rejected') }}" class="profileDrop">Rejected<span>(2)</span></a>
            <a href="#" class="profileDrop">Sales Appointments</a>
        </div>
    </div>
</div>