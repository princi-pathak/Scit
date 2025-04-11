@extends('frontEnd.layouts.master')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title','Fixed Asset Register')
<link rel="stylesheet" type="text/css" href="{{ url('public/frontEnd/jobs/css/custom.css')}}" />
@section('content')

<!--main content start-->
<section class="wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 p-0">
        <div class="panel">
          <header class="panel-heading px-5">
            <h4>Fixed Asset Register</h4>
          </header>
          <div class="panel-body">
            <div class="col-lg-12">
              <div class="jobsection justify-content-end">
                <a href="{{url('sales-finance/assets/asset-regiser-add')}}" class="profileDrop">Add</a>
                <a href="javascript:void(0)" class="profileDrop">Export</a>
                <a href="javascript:void(0)" class="profileDrop">Search </a>
              </div>
              
              <div class="productDetailTable mb-4 table-responsive">
                <table class="table border-top border-bottom tablechange" id="containerB">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th class="border-end">Asset Name</th>
                      <th class="border-end">Date</th>
                      <th colspan="4" class="border-end">Cost</th>
                      <th colspan="4" class="border-end">Depreciation</th>
                      <th colspan="2">N.B.V</th>
                      <th colspan="2">Action</th>
                    </tr>
                    <tr>
                      <th></th>
                      <th class=""></th>
                      <th class="border-end"></th>
                      <th>B/fwd</th>
                      <th>Additions</th>
                      <th>Disposals</th>
                      <th class="border-end">C/fwd</th>
                      <th>B/fwd</th>
                      <th>Disps</th>
                      <th>Charge</th>
                      <th class="border-end">C/fwd</th>
                      <th>B/fwd</th>
                      <th colspan="2" class="text-start">C/fwd</th>
                    </tr>
                  </thead>
                  <tbody id="assetRegisterList">
                    <?php
                    $cost_bfwd = 0;
                    $cost_disposal = 0;
                    $cost_addition = 0;
                    $cost_fwd = 0;
                    $depreciation_bfwd = 0;
                    $depreciation = 0;
                    $charge = 0;
                    $depreciation_cfwd = 0;
                    $nbv_bfwd = 0;
                    $nbv_cfwd = 0;
                    foreach ($list as $key => $val) {
                      $cost_bfwd = $cost_bfwd + $val->cost_bfwd;
                      $cost_disposal = $cost_disposal + $val->cost_disposal;
                      $cost_addition = $cost_addition + $val->cost_addition;
                      $cost_fwd = $cost_fwd + $val->cost_fwd;
                      $depreciation_bfwd = $depreciation_bfwd + $val->depreciation_bfwd;
                      $depreciation = $depreciation + $val->depreciation;
                      $charge = $charge + $val->charge;
                      $depreciation_cfwd = $depreciation_cfwd + $val->depreciation_cfwd;
                      $nbv_bfwd = $nbv_bfwd + $val->nbv_bfwd;
                      $nbv_cfwd = $nbv_cfwd + $val->nbv_cfwd;
                    ?>
                      <tr>
                        <td>{{++$key}}</td>
                        <td>{{$val->asset_name}}</td>
                        <td>{{ date('d/m/Y', strtotime($val->date)) }}</td>
                        <td>{{ $val->cost_bfwd ? '£' . $val->cost_bfwd : '' }}</td>
                        <td>{{ $val->cost_disposal ? '£' . $val->cost_disposal : ''}}</td>
                        <td>{{ $val->cost_addition ? '£' . $val->cost_addition : ''}}</td>
                        <td>{{ $val->cost_fwd ? '£' . $val->cost_fwd : ''}}</td>
                        <td>{{ $val->depreciation_bfwd  ? '£' . $val->depreciation_bfwd : ''}}</td>
                        <td>{{ $val->depreciation  ? '£' . $val->depreciation : ''}}</td>
                        <td>{{ $val->charge  ? '£' . $val->charge : ''}}</td>
                        <td>{{ $val->depreciation_cfwd  ? '£' . $val->depreciation_cfwd : ''}}</td>
                        <td>{{ $val->nbv_bfwd  ? '£' . $val->nbv_bfwd : ''}}</td>
                        <td>{{ $val->nbv_cfwd  ? '£' . $val->nbv_cfwd : ''}}</td>
                        <td> <a href="{{url('sales-finance/assets/asset-register-edit?key=' . base64_encode($val->id))}}" class="openModalBtn"><i class="fa fa-pencil" aria-hidden="true"></i></a> |
                          <a href="#!" class="deleteBtn" data-id="{{$val->id}}"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                        </td>
                        <!-- <td>
                          <div class="d-flex justify-content-end">
                            <div class="nav-item dropdown">
                              <a href="#!" class="nav-link dropdown-toggle profileDrop" data-toggle="dropdown" aria-expanded="false">
                                Action
                              </a>
                              <div class="dropdown-menu fade-up m-0" style="z-index:9999">
                                <a href="{{url('sales-finance/assets/asset-register-edit?key=' . base64_encode($val->id))}}" class="dropdown-item">Edit</a>
                                <hr class="dropdown-divider">
                                <a href="javascript:void(0)" data-id="{{$val->id}}" class="dropdown-item register_delete">Delete</a>
                              </div>
                            </div>
                          </div>
                        </td> -->
                      </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th></th>
                      <th></th>
                      <th>Total:</th>
                      <th id="cost_bfwd">£{{number_format($cost_bfwd, 2)}}</th>
                      <th id="cost_disposal">£{{number_format($cost_disposal,2)}}</th>
                      <th id="cost_addition">£{{number_format($cost_addition,2)}}</th>
                      <th id="cost_fwd">£{{number_format($cost_fwd,2)}}</th>
                      <th id="depreciation_bfwd">£{{number_format($depreciation_bfwd,2)}}</th>
                      <th id="depreciation">£{{number_format($depreciation,2)}}</th>
                      <th id="charge">£{{number_format($charge,2)}}</th>
                      <th id="depreciation_cfwd">£{{number_format($depreciation_cfwd,2)}}</th>
                      <th id="nbv_bfwd">£{{number_format($nbv_bfwd,2)}}</th>
                      <th id="nbv_cfwd" colspan="2" class="text-start">£{{number_format($nbv_cfwd,2)}}</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
          <!-- Button trigger modal -->
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  var searchUrl = "{{url('sales-finance/assets/asset-register-search')}}";
  var deleteAssetRegisterUrl = "{{url('sales-finance/assets/asset-register-delete')}}";
</script>
@endsection
<script src="{{ url('public/js/salesFinance/asset/asset_category.js')}}"></script>