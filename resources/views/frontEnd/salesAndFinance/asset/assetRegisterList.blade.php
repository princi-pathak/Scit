@include('frontEnd.salesAndFinance.jobs.layout.header')
<section class="main_section_page px-3 pt-0">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 col-lg-4 col-xl-4">
            <div class="pageTitle">
              <h3>Fixed Asset Register</h3>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="jobsection">
                <div class="d-inline-flex align-items-center ">
                    <div class="nav-item dropdown">
                        <a href="{{url('sales-finance/assets/asset-regiser-add')}}" class="profileDrop">Add</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="maimTable">
                    <div class="printExpt">
                        <div class="prntExpbtn">
                            <a href="#!">Print</a>
                            <a href="#!">Export</a>
                        </div>
                        <div class="searchFilter">
                            <a href="#!" onclick="hideShowDiv()" class="hidebtn">Show Search Filter</a>
                        </div>

                    </div>

                    <div class="searchJobForm" id="divTohide" style="display:none">
                        <form id="search_dataForm" class="p-4">
                          @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row form-group mb-2">
                                        <label class="col-md-2 col-form-label text-end ">Date From:</label>
                                        <div class="col-md-4">
                                            <input type="date" class="form-control editInput" id="edd_startDate" name="start_date">
                                        </div>
                                        <label class="col-md-2 col-form-label text-end ">Date To:</label>
                                        <div class="col-md-4">
                                            <input type="date" class="form-control editInput" id="edd_endDate" name="end_date">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="pageTitleBtn justify-content-center">
                                        <a href="javascript:void(0)" onclick="searchBtn()" class="profileDrop px-3">Search </a>
                                        <!-- <button type="submit" class="profileDrop px-3" onclick="return searchBtn()">Search</button> -->
                                        <a href="javascript:void(0)" onclick="clearBtn('search_dataForm')" class="profileDrop px-3">Clear</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- <div class="markendDelete">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="jobsection">
                                    <a href="javascript:void(0)" id="deleteSelectedRows" class="profileDrop">Delete</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div> -->

                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="newJobForm mt-4">
              <label class="upperlineTitle">Asset </label>
              <div class="extraInformationTab">
                <div class="col-sm-12">
                  <div class="mb-3 row">
                    <div class="col-md-12">
                      <div class="productDetailTable pt-3">
                        <table class="table" id="containerA">
                          <thead class="table-light">
                            <tr class="text-center">
                              <th>#</th>
                              <th class="border-end">Asset Name</th>
                              <th class="border-end">Date</th>
                              <th colspan="4" class="border-end">Cost</th>
                              <th colspan="4" class="border-end">Depreciation</th>
                              <th colspan="2">N.B.V</th>
                              <th colspan="2">Action</th>
                            </tr>
                            <tr class="text-center">
                              <th></th>
                              <th class="border-end"></th>
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
                              <th>C/fwd</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                              $cost_bfwd=0;
                              $cost_disposal=0;
                              $cost_addition=0;
                              $cost_fwd=0;
                              $depreciation_bfwd=0;
                              $depreciation=0;
                              $charge=0;
                              $depreciation_cfwd=0;
                              $nbv_bfwd=0;
                              $nbv_cfwd=0;
                              foreach($list as $key=>$val){
                                $cost_bfwd=$cost_bfwd+$val->cost_bfwd;
                                $cost_disposal=$cost_disposal+$val->cost_disposal;
                                $cost_addition=$cost_addition+$val->cost_addition;
                                $cost_fwd=$cost_fwd+$val->cost_fwd;
                                $depreciation_bfwd=$depreciation_bfwd+$val->depreciation_bfwd;
                                $depreciation=$depreciation+$val->depreciation;
                                $charge=$charge+$val->charge;
                                $depreciation_cfwd=$depreciation_cfwd+$val->depreciation_cfwd;
                                $nbv_bfwd=$nbv_bfwd+$val->nbv_bfwd;
                                $nbv_cfwd=$nbv_cfwd+$val->nbv_cfwd;
                            ?>
                            <tr class="text-center">
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
                              <td>
                                  <div class="d-flex justify-content-end">
                                      <div class="nav-item dropdown">
                                          <a href="#!" class="nav-link dropdown-toggle profileDrop" data-bs-toggle="dropdown" aria-expanded="false">
                                              Action
                                          </a>
                                          <div class="dropdown-menu fade-up m-0" style="z-index:9999">
                                              <a href="#!" class="dropdown-item">Edit</a>
                                              <hr class="dropdown-divider">
                                              <a href="#!" class="dropdown-item">Delete</a>
                                          </div>
                                      </div>
                                  </div>
                              </td>
                            </tr>
                            <?php }?>
                          </tbody>
                          <tfoot class="table-light">
                            <tr class="text-center">
                              <th></th>
                              <th></th>
                              <th>Total:</th>
                              <th>£{{number_format($cost_bfwd, 2)}}</th>
                              <th>£{{number_format($cost_disposal,2)}}</th>
                              <th>£{{number_format($cost_addition,2)}}</th>
                              <th>£{{number_format($cost_fwd,2)}}</th>
                              <th>£{{number_format($depreciation_bfwd,2)}}</th>
                              <th>£{{number_format($depreciation,2)}}</th>
                              <th>£{{number_format($charge,2)}}</th>
                              <th>£{{number_format($depreciation_cfwd,2)}}</th>
                              <th>£{{number_format($nbv_bfwd,2)}}</th>
                              <th>£{{number_format($nbv_cfwd,2)}}</th>
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
        </div>
      </div>
    </section>
<script>
  var searchUrl="{{url('sales-finance/assets/asset-register-search')}}";
</script>
<script src="{{ url('public/js/salesFinance/asset/asset_category.js')}}"></script>
@include('frontEnd.salesAndFinance.jobs.layout.footer')