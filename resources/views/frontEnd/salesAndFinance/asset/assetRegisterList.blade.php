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
                            <tr class="text-center">
                              <td>1</td>
                              <td>Frank Flanagan Blinds</td>
                              <td>03/03/2025</td>
                              <td>4133.33</td>
                              <td></td>
                              <td></td>
                              <td>4,133</td>
                              <td>138</td>
                              <td></td>
                              <td>83</td>
                              <td>220</td>
                              <td>3910</td>
                              <td>3910</td>
                            </tr>
                            <tr class="text-center">
                              <td>2</td>
                              <td>Frank Flanagan Blinds</td>
                              <td>03/03/2025</td>
                              <td>4133.33</td>
                              <td></td>
                              <td></td>
                              <td>4,133</td>
                              <td>138</td>
                              <td></td>
                              <td>83</td>
                              <td>220</td>
                              <td>3910</td>
                              <td>3910</td>
                            </tr>
                          </tbody>
                          <tfoot class="table-light">
                            <tr class="text-center">
                              <th colspan="12">Total</th>
                              <th></th>
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
<script src="{{ url('public/js/salesFinance/asset/asset_category.js')}}"></script>
@include('frontEnd.salesAndFinance.jobs.layout.footer')