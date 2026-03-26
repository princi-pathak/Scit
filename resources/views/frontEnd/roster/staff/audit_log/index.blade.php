<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
@extends('frontEnd.layouts.master')
@section('title', 'Audit Log')
@section('content')
@include('frontEnd.roster.common.roster_header')
<main class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="staffHeaderp">
                    <div>
                        <h1 class="mainTitlep"> Audit Log</h1>
                        <p class="header-subtitle mb-0">Complete system audit trail for regulatory compliance</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection