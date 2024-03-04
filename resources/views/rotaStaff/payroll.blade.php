@include('rotaStaff.components.header')
@include('rotaStaff.pyrll_stylsheet')
<style>
.cntnt_box{
  margin: 25px 0px 20px;
  padding-top: 10px;
  border-style: solid;
  border-color: #3DB0F7;
  border-width: 2px;
  border-radius: 5px;
}
.top_band{
  background-color: rgb(61, 176, 241);
  height: 75px;
  padding: 10px 10px 0px 0px;
  padding-top: 10px;
  padding-left: 10px;
  margin-bottom: 20px;
  border-radius: 5px;
}
.top_lft_btn_prnt{
  float: left;
  width: 100%;
  margin-bottom: 80px;
}
.top_lft_btn_chld{
  margin-top: 4px;
  float: left;
  width: 40%;
  text-align: center;
}
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}
/* Hide default HTML checkbox */
.switch input {
  width: 0;
  height: 0;
}
/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
}
.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
}
input:checked + .slider {
  background-color: #2196F3;
}
input:checked + .slider:before {
  transform: translateX(26px);
}
/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}
.slider.round:before {
  border-radius: 50%;
}
.tggle_swtch_n_txt{
  width: 550px;
  height: 50px;
  margin-top: 10px;
}
.tggle_swtch{
  width:80px;
  float: left;
  padding-top: 10px;
}
.tggle_txt {
  width:50%;
  float:left;
  padding-top: 15px;
  overflow: hidden;
  white-space: nowrap;
}
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}
/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: rgb(161, 169, 179);
}
/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}
/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}
/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}
/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}
/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
.chckbxes{
  float:left;
  width:5%;
  display: inline-block;
}
.indi_chckbxes{
  margin: 23px 0px 110px 0px;
}
.pyrll_rprts{
  float:left;
  width: 80%;
  padding: 50px 0px 0px 40px;
  font-size: 14;
  flex:1;
  height: 50%;
}
.pyrll_pair{
  height: 10%;
}
.individ_pyrll_rprts{
  width:50%;
  float:left;
  margin-bottom: 30px;
}
.pyrll_rprt_sbttles{
  font-size: 20;
  font-weight: 600;
}
.mployee_btn{
  float: left;
  width: 90px;
  height: 36px;
  background-color: rgb(247, 247, 249);
  color: rgb(61, 176, 241);
  border-width: 2px;
  border-style: solid;
  border-color: rgb(61, 176, 241);
  font-size: 15px;
  font-weight: bold;
  text-align: center;
  margin: 21px 0px 0px 28px;
  padding-top: 3px;
}
.dwnld_btn{
  float: left;
  width: 90px;
  height: 36px;
  color: rgb(61, 176, 241);
  font-size: 15px;
  margin: 10px 0px 0px 28px;
}
.pnding_absnce_prnt{
  width: 100%;
  padding-bottom: 80px;
}
.pnding_absnce_nmbr_outr{
  float: left;
  width: 13%;
  height: 48px;
  text-align: center;
  background-color: rgb(204,255,230);
  margin: 16px 10px 0px 10px;
  padding-top: 10px;
  font-size: 28px;
}
.rptble_btn_2{
  float: left;
  width: 30%;
  background-color: rgb(61, 176, 241);
  padding: 5px 1px;
  color: #fff;
  border-radius: 5px;
  font-size: 15px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: clip;
  text-align: center;
  margin-left: 30px;
}
.pyrll_profs_child {
  position: absolute;
  top: 0;
  left: 16;
  top: 20;
}
.pyrll_profs_parent {
  position: relative;
  float: left;
  width: 27%;
  height: 100%;
  margin: 16px 0px 0px 8px;
}
.circle{
  height:80px;
  width:80px;
  background-color: rgb(61, 176, 241);
  border-radius: 80px;
}
.pyrll_person{
  float: left;
  width: 33%;
  height:  120px;
  border-style: solid;
  border-thickness: 3px;
  border-color: rgb(245,245,245) rgb(231,231,231) rgb(215,215,215);
}
.pyrll_pair{
  width: 100%;
}
.prmssions_edit_btn{
  width: 4%;
  height: 35px;
  background-color: rgb(61, 176, 241);
  padding: 5px 1px;
  color: #fff;
  border-radius: 5px;
  font-size: 15px;
  text-align: center;
}
.slct_rprts_txt{
  float: left;
  margin-top: 20px;
  width: 100%;
}
.pyrll_group{
  height: 135px;
  padding-top: 5px:
  margin-bottom: 15px;
}
.pyrll_profs_txt{
  font-size: 13px;
  margin: 0px 0px 5px 80px;
  width: 73%;
  height: 100%;
}
.bffr_slab{
  width: 100%
  float: left;
  height: 84px;
}
.pyrll_people{
  height: 235px;
  margin-bottom: 50px;
}
.dscrption{
  margin-bottom: 20px;
}
.rprt_archive{
  float: left;
  height: auto;
  margin: 20px 0px 10px;
}
.pge_ttle{

}
*{
    margin:0;
    padding:0;
    box-sizing: border-box;
}
body{
    min-height:100vh;
    display:grid;
    place-items:center;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}
.download-btn{
    background-color: DodgerBlue;
    color: white;
    padding: 1rem 2rem;
    font-size: 2rem;
    text-decoration: none;
    border-radius:5px;
}
.download-btn:hover {
    background-color: RoyalBlue;
  }
.evry_othr_rprt{
  background-color: rgb(230,242,249);
  height: 44px;
  padding-top: 10px;
}


</style>
<ul class="nav nav-tabs rotas" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a href = "{{ url('/payroll') }}"><button class="nav-link active" id="activerotas-tab" data-bs-toggle="tab"
    data-bs-target="#activerotas" type="button" role="tab" aria-controls="activerotas"
    aria-selected="true">Payroll Console</button></a>
  </li>
  <li class="nav-item" role="presentation">
    <a href = "{{ url('/information_checker') }}"><button class="nav-link" id="oldrotas-tab" data-bs-toggle="tab" data-bs-target="#oldrotas"
    type="button" role="tab" aria-controls="oldrotas" aria-selected="false">Information Checker</button></a>
  </li>
  <li class="nav-item" role="presentation">
    <a href = "{{ url('/overtime') }}"><button class="nav-link" id="createrota-tab" data-bs-toggle="tab" data-bs-target="#createrota"
    type="button" role="tab" aria-controls="createrota" aria-selected="false">Overtime </button></a>
  </li>
  <li class="nav-item" role="presentation">
    <a href = "{{ url('/payroll_glossary') }}"><button class="nav-link" id="oldrotas-tab" data-bs-toggle="tab" data-bs-target="#oldrotas"
    type="button" role="tab" aria-controls="oldrotas" aria-selected="false">Payroll glossary</button></a>
  </li>
</ul>

<div class = "cntnt_box">
  <div class = "top_band">
      <div class = "pge_ttle">
        <h1> Payroll </h1>
      </div>
  </div>

  <div class= "flt_lft_wdth_100_var" style = "--wdth_prcntge: 60%">
    <h2>Create payroll reports</h2>
    Create essential reports that will support you in providing accurate information to HMRC, and get your payroll processes right.
    <hr style="width: 98%">
    <div class = "pnding_absnce_prnt">
      <div class = "flt_lft_wdth_100_var" style = "--wdth_prcntge: 60%">
        <span style = "font-weight: bold"> Check pending absence requests </span>
        See when employees are taking time off so you can factor this into payroll.
      </div>
      <div class = "pnding_absnce_nmbr_outr">
        0
      </div>
    </div>
    <hr style="width: 98%">
    <div class = "pnding_absnce_prnt">
      <div class = "flt_lft_wdth_100_var" style = "--wdth_prcntge: 60%">
        <span style = "font-weight: bold"> Complete missing employee information </span>
        All your employee information must be accurate and up to date when you run payroll reports.
      </div>
      <div class = "pnding_absnce_nmbr_outr">
        14
      </div>
      <div class = "mployee_btn">
        <a href="{{ url('/information_checker') }}"> Update</a>
      </div>
    </div>
    <hr style="width: 98%">
    Payroll period
    <input type = "date", id = "payrll_priod">
    
    <div class = "tggle_swtch_n_txt">
      <div class="tggle_swtch">
        <label class="switch">
        <input type="checkbox">
        <span class="slider round"></span>
        </label>
      </div>
      <div class = "tggle_txt">
        Include terminated employees?
      </div>
    </div>
    <div class = "slct_rprts_txt">
      <h3>Select reports to support your payroll</h3>
    </div>
    <div class = "chckbxes">
      <div class = "indi_chckbxes">
        &nbsp
        <label class="container">
        <input type="checkbox">
        <span class="checkmark"></span>
        </label>
      </div>
      <div class = "indi_chckbxes">
        &nbsp
        <label class="container">
        <input type="checkbox">
        <span class="checkmark"></span>
        </label>
      </div>
      <div class = "indi_chckbxes">
        &nbsp
        <label class="container">
        <input type="checkbox">
        <span class="checkmark"></span>
        </label>
      </div>
      <div class = "indi_chckbxes">
        &nbsp
        <label class="container">
        <input type="checkbox">
        <span class="checkmark"></span>
        </label>
      </div>
      <div class = "indi_chckbxes">
        &nbsp
        <label class="container">
        <input type="checkbox">
        <span class="checkmark"></span>
        </label>
      </div>
    </div>

    <div class = "pyrll_rprts">
      <div class = "pyrll_pair">
        <div class = "individ_pyrll_rprts">
          <span class = "pyrll_rprt_sbttles">Absence</span><br>
          A breakdown of taken, pending, cancelled and upcoming absences per employee.
        </div>
        <div class = "individ_pyrll_rprts">
          <span class = "pyrll_rprt_sbttles">Annual leave summary</span><br>
          A breakdown of all annual leave taken, pending and upcoming as well as the amount of entitlement remaining.
        </div>
      </div>
      <div class = "pyrll_pair">
        <div class = "individ_pyrll_rprts">
          <span class = "pyrll_rprt_sbttles">Blip timesheet - detailed</span><br>
          A breakdown of every shift and break that has been recorded. This report will include ongoing shifts.
        </div>
        <div class = "individ_pyrll_rprts">
          <span class = "pyrll_rprt_sbttles">Blip timesheet - summary</span><br>
          An overview of completed shifts and break times. This report does not include ongoing shifts.
        </div>
      </div>
      <div class = "pyrll_pair">
        <div class = "individ_pyrll_rprts">
          <span class = "pyrll_rprt_sbttles">Employee information</span><br>
          A summary of the personal and contract information recorded for all employees.
        </div>
        <div class = "individ_pyrll_rprts">
          <span class = "pyrll_rprt_sbttles">Payable overtime</span><br>
          A detailed breakdown of every overtime record approved as payable overtime.
        </div>
      </div>
      <div class = "bffr_slab"></div>
      <div class = "pyrll_pair">
        <div class = "individ_pyrll_rprts">
          <span class = "pyrll_rprt_sbttles">Payroll exceptions</span><br>
          A breakdown of all absence records for all employees that can be used for payroll purposes.
        </div>
        <div class = "individ_pyrll_rprts">
          <span class = "pyrll_rprt_sbttles">Rota - details</span><br>
          A detailed breakdown of every shift and break added to your rota including notes, breaks and payroll details.
        </div>
      </div>
      <div class = "pyrll_pair">
        <div class = "individ_pyrll_rprts">
          <span class = "pyrll_rprt_sbttles">Rota - summary</span>
          A summary of the hours your staff have worked in total and per shift.
        </div>
      </div>
    </div>
    <div class = "chckbxes">
      <div class = "indi_chckbxes">
        &nbsp
        <label class="container">
        <input type="checkbox">
        <span class="checkmark"></span>
        </label>
      </div>
      <div class = "indi_chckbxes">
        &nbsp
        <label class="container">
        <input type="checkbox">
        <span class="checkmark"></span>
        </label>
      </div>
      <div class = "indi_chckbxes">
        &nbsp
        <label class="container">
        <input type="checkbox">
        <span class="checkmark"></span>
        </label>
      </div>
      <div class = "indi_chckbxes">
        &nbsp
        <label class="container">
        <input type="checkbox">
        <span class="checkmark"></span>
        </label>
      </div>
    </div>

    <div class= "top_lft_btn_prnt">
      <div class="rptble_btn_2">
        <a href="{{ url('/123') }}"> Generate payroll reports</a>
      </div>
      <div class="top_lft_btn_chld">
        <a href="{{ url('/123') }}"> View recent reports</a>
      </div>
    </div>

  </div>

    
  <div class= "flt_lft_wdth_100_var" style= "--wdth_prcntge: 40%">
    <div class = "recruitmnt_img">
      <img src = "public/images/payroll_stock_image.jpg" style = "width:432px;height:288px">
    </div>
    <p style = "font-weight: bold">BrightAdvice is here to help </p>
    <p> When you have lots of staff salaries and wages to manage, it’s easy to feel overwhelmed by the pressure of payroll. But Brightadvice's helpline gives
    you expert payroll advice in an instant.</p>
    <p> <span style = "font-weight: bold">Simply call<br>
    0844 892 3927</span><br>
    and select option 2.<br>
    Our UK-based payroll experts are ready to take your call Mon-Fri 9am-5pm.</p>
  </div>
</div>

<div class = "flt_lft_wdth_100_var" style = "--wdth_prcntge: 50%">
  <h4>Payroll permissions</h4>
</div>
<div class = "flt_lft_wdth_100_var" style = "--wdth_prcntge: 30%">
  <p>4</p>
</div>
<div class = "prmssions_edit_btn">
  <a href="{{ url('/123') }}">Edit</a>
</div>
<div class = "dscrption">
  <p>These are all the people in your business who can amend payroll information and run payroll reports.</p>
</div>

<div class = "pyrll_people">
  <div class = "pyrll_group">
    <div class = "pyrll_person">
      <div class="pyrll_profs_parent">
        <div class="circle"></div>
        <div class="pyrll_profs_child">
          <h2>CB</h2>
        </div>
      </div>
      <div class = "pyrll_profs_txt">
        <span style = "font-size: 16px;">Craig Birch</span><br>
        service manager<br>
        <a href="{{ url('/absence') }}"><span style = "color: blue">View full profile</span></a><a href = "{{ url('/employee_quick_view') }}">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i class="fa fa-eye fa-lg"></i><br>
        </a>42 Kemble St
      </div>
    </div>

    <div class = "pyrll_person">
      <div class="pyrll_profs_parent">
        <div class="circle"></div>
        <div class="pyrll_profs_child">
          <h2>MC</h2>
        </div>
      </div>
      <div class = "pyrll_profs_txt">
        <span style = "font-size: 16px;">michael carter</span><br>
        Director & Development manager<br>
        <a href="{{ url('/MC_profile') }}"><span style = "color: blue">View full profile</span></a><a href = "{{ url('/employee_quick_view') }}">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i class="fa fa-eye fa-lg"></i><br>
        </a>
      </div>
    </div>

    <div class = "pyrll_person">
      <div class="pyrll_profs_parent">
        <div class="circle"></div>
        <div class="pyrll_profs_child">
          <h2>MC</h2>
        </div>
      </div>
      <div class = "pyrll_profs_txt">
        <span style = "font-size: 16px;">Michelle Cashen</span><br>
        Director and finance manager<br>
        <a href="{{ url('/MCa_profile') }}"><span style = "color: blue">View full profile</span></a><a href = "{{ url('/employee_quick_view') }}">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i class="fa fa-eye fa-lg"></i><br><br>
        </a>
      </div>
    </div>
  </div>

  <div class = "pyrll_group">
    <div class = "pyrll_person">
      <div class="pyrll_profs_parent">
        <div class="circle"></div>
        <div class="pyrll_profs_child">
          <h2>TC</h2>
        </div>
      </div>
      <div class = "pyrll_profs_txt">
        <span style = "font-size: 16px;">Tommy Cashen</span><br>
        Director and founder<br>
        <a href="{{ url('/TC_profile') }}"><span style = "color: blue">View full profile</span></a><a href = "{{ url('/employee_quick_view') }}">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i class="fa fa-eye fa-lg"></i><br>
        </a>
        Working from home
      </div>
    </div>
  </div>
</div>


<div class = "rprt_archive">
  <h5>Report archive</h5>
  <p> you generate your payroll reports, the payroll navigator automatically saves your important information securely.
  The report archive below lists your last 20 reports, and they’ll show here for 90 days.</p>
  <p><span style = "font-size: 12"><span style = "font-weight: bold">Please note:</span> If you make any changes after you create a report (such as adding new employee absences), this won’t be reflected in the report archive automatically—you’ll need to generate a new report.</span></p>
</div>

<table>
  <tr>
    <th>Report name</th>
    <th>Completed</th>
    <th>Start date</th>
    <th>End date</th>
    <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
  </tr>
  <tr>
      <td><div class="evry_othr_rprt">Annual leave summary</div></td>
      <td><div class="evry_othr_rprt">25 Sep 2023, 14:35</div></td>
      <td><div class="evry_othr_rprt">18 Oct 2023</div></td>
      <td><div class="evry_othr_rprt">18 Oct 2023</div></td>
      <td><div class="evry_othr_rprt"><a href = "resources\views\rotaStaff\download_image.png" download="proposed_file_name"><div class="dwnld_btn">Download</div></a></div></td>
    </div>
  </tr>
  <tr>
    <td>Absence</td>
    <td>25 Sep 2023, 14:35</td>
    <td>01 Sep 2023</td>
    <td>30 Sep 2023</td>
    <td><a href = "resources\views\rotaStaff\download_image.png" download="proposed_file_name"><div class="dwnld_btn">Download</div></a></td>
  </tr>
</table>