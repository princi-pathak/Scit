<style>
.pfp_circ {
  float: left;
  height: 175px;
  width: 175px;
  background: rgb(61,176,241);
  border-radius: 50%;
  display: inline-block;
}
.pfp_lil_circ_prnt {
  position:absolute;
}
.pfp_lil_circ{
  float: left;
  height: 53px;
  width: 53px;
  background: rgb(0,255,0);
  border-radius: 50%;
  display: inline-block;
  margin-top: 123px;
  margin-left: 121px;
}
.pfp_lttrs{
  font-size: 30;
  position:relative;
  margin-left: 65px;
  margin-top: -107px;
}
.pfp_lttrs_prnt{
  position:absolute;
}
.main_prof_txt{
  float: left;
  margin-left: 55px;
}
.pncil_prnt{
  position:absolute;
}
.pncil{
  margin-top: 142px;
 margin-left: 140px;
}
.file_upload{
  height: 53px;
  width: 53px;
  border-radius: 50%;
  margin-left: -65px;
  margin-top: 130px;
}
.file_upload_inner{
  display: none;
}
.hr_gap{
  height: 15px;
}
.sick_icn{
  width: 175px;
  height: 90px;
  background-color: grey;
}
.accordion {
  background-color: #eee;
  color: black;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  text-align: left;
  border: none;
  outline: none;
  transition: 0.4s;
}
/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
.active, .accordion:hover {
  background-color: #ccc;
}
/* Style the accordion panel. Note: hidden by default */
.panel {
  padding: 0 18px;
  background-color: white;
  display: none;
  overflow: hidden;
}
.inbetween_block{
  width: 100%;
  float: left;
  height: 20px;
}
.flt_lft_wdth_100{
  width: 100%;
  float: left;
}
.flt_lft_wdth_100_var{
  float: left;
  width: var(--wdth_prcntge);
}
</style>
<hr>
<div class = "CB_main_prof">
  <div class = "pfp_circ_n_ltters">
    <div class = "pfp_circ">
    </div>
    <div class ="pfp_lil_circ_prnt">
      <label for="pfp_lil_circ_inp" class="pfp_lil_circ"></label>
      <input type="file" id="pfp_lil_circ_inp" style="display: none;"/>
    </div>
    <div class = "pncil_prnt">
      <div class = "pncil">
        <i class = "fa fa-pencil"> </i>
      </div>
    </div>
    <label class = "file_upload">
     <div class = "file_upload_inner">
      <input type = "file"/>
     </div>
    </label>
    <div class = "pfp_lttrs_prnt">
      <div class = "pfp_lttrs">
        CB
      </div>
    </div>
    <div class = "main_prof_txt">
      <p style = "font-size: 20; font-weight: bold" >Craig Birch</p>
      <p> service manager </p>
      <i class = "fa fa-location-arrow"></i>
      HQ<br><br>
      <a href = "{{ url('/payroll') }}"><i class = "fa fa-envelope"></i>&nbsp&nbsp cb.craigbirch.cb@gmail.com</a>
    </div>
  </div>
</div>
<div class = "hr_gap">
</div>
<hr>
<div class = "hr_gap">
</div>
<hr>
<ul class="nav nav-tabs rotas" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a href = "absence"><button class="nav-link active" id="activerotas-tab" data-bs-toggle="tab"
    data-bs-target="#activerotas" type="button" role="tab" aria-controls="activerotas"
    aria-selected="true">Absence</button></a>
  </li>
  <li class="nav-item" role="presentation">
    <a href = "employment"><button class="nav-link" id="oldrotas-tab" data-bs-toggle="tab" data-bs-target="#oldrotas"
    type="button" role="tab" aria-controls="oldrotas" aria-selected="false">Employment</button></a>
  </li>
  <li class="nav-item" role="presentation">
    <a href = "overtime_profile"><button class="nav-link" id="createrota-tab" data-bs-toggle="tab" data-bs-target="#createrota"
    type="button" role="tab" aria-controls="createrota" aria-selected="false">Overtime </button></a>
  </li>
  <li class="nav-item" role="presentation">
    <a href = "personal"><button class="nav-link" id="activerotas-tab" data-bs-toggle="tab"
    data-bs-target="#activerotas" type="button" role="tab" aria-controls="activerotas"
    aria-selected="true">Personal</button></a>
  </li>
  <li class="nav-item" role="presentation">
    <a href = "emergencies"><button class="nav-link" id="oldrotas-tab" data-bs-toggle="tab" data-bs-target="#oldrotas"
    type="button" role="tab" aria-controls="oldrotas" aria-selected="false">Emergencies</button></a>
  </li>
  <li class="nav-item" role="presentation">
    <a href = "document"><button class="nav-link" id="oldrotas-tab" data-bs-toggle="tab" data-bs-target="#oldrotas"
    type="button" role="tab" aria-controls="oldrotas" aria-selected="false">Document</button></a>
  </li>
</ul>
