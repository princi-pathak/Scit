@include('rotaStaff.components.header')
@include('rotaStaff.pyrll_user_prfile_tmplte')
<style>
.exp_wrapper{
  height: 1000px;
}
.ovrtme_bxes{
 float: left;
 width: 48%;
 height: 200px;
 border: solid 1px rgb(216,227,235);
 margin: 0px 8px;
}
.ovrtme_tp_tbs{
 float: left;
 width: 100%;
 height: 50px;
 background-color: rgb(235,247,255);
 padding: 15px 0px 0px 15px;
}
.tab_ttle{
  float: left;
  width: 50%;
}
.sction_ttle{
  font-size: 21;
  font-weight: 550;
}
.panel {
  padding: 0 18px;
  background-color: white;
  display: none;
  overflow: hidden;
  margin-bottom: 20px;
}
.indiv_coll{
  margin-bottom: 20px;
}
</style>

<div class = "tab_ttle_n_btn">
  <div class = "tab_ttle">
    <h3> Overtime </h3>
  </div>
  <div class= "tab_btn">
    <div class="rptble_btn_2" style = "--bckgrnd_clr: blue; --wdth_prcntge: 10%; --brdr_clr: yellow; --margin_: 5px">
      <a href="{{ url('/123') }}">  Log overtime</a>
    </div>
  </div>
</div>
<div class = "ovrtme_bxes_prnt">
  <div class = "ovrtme_bxes">
    <div class = "ovrtme_tp_tbs">
     Time off in lieu (TOIL)
    </div>
      &nbsp&nbsp&nbsp&nbsp TOIL logged &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      TOIL taken &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp TOIL balance<br>
      &nbsp&nbsp&nbsp&nbsp 0h 0m &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      0h 0m &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 0h 0m<br>
      <span style = "color: rgb(146,165,179); font-size: 14px;"> &nbsp&nbsp&nbsp&nbsp No approved claims &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp No TOIL absences &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Available to take</span>
    <div class="rptble_btn_2">
      <a href="{{ url('/123') }}"> Use TOIL</a>
    </div>
  </div>

  <div class = "ovrtme_bxes">
    <div class = "ovrtme_tp_tbs">
     Payable
    </div>
      &nbsp&nbsp&nbsp&nbsp TOIL logged &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      TOIL taken &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp TOIL balance<br>
      &nbsp&nbsp&nbsp&nbsp 0h 0m &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      0h 0m &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 0h 0m<br>
      <span style = "color: rgb(146,165,179); font-size: 14px;"> &nbsp&nbsp&nbsp&nbsp No approved claims &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp No TOIL absences &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Available to take</span>
    </div>
  </div>
</div>

<div class = "exp_wrapper">
  <div class = "indiv_coll">
    <button class="accordion"><div class = "sction_ttle"> Current and future (0) </div><span style = "font-weight: 600; font-size: 14;">(Click to expand).</span></button>
      <div class="panel">
        <p>
          <div class = "pncil_rght_prnt">
            <div class = "pncil_rght">
              <a href = "edit_rle_info"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
            </div>
          </div>
          <div class = "lft_rle_info_clmn">
            Job title<br><br>
            Contract type<br><br>
            Team(s)<br><br>
            Reports to<br><br>
            Probation required:<br><br>
            Notice period
          </div>
          <div class = "rght_rle_info_clmn">
            service manager<br><br>
            Full-Time<br><br>
            team 1<br><br>
            Tommy Cashen, michael carter<br><br>
            No<br><br>
            7 weeks
          </div>
        <br><br><br><br><br><br><br><br><br><br><br>
      </p>
    </div>
  </div>

  <div class = "indiv_coll">
    <button class="accordion"><div class = "sction_ttle"> History (0) </div><span style = "font-weight: 600; font-size: 14;">(Click to expand).</span></button>
      <div class="panel">
        <p>
          <div class = "pncil_rght_prnt">
            <div class = "pncil_rght">
              <a href = "edit_rle_info"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
            </div>
          </div>
          <div class = "lft_rle_info_clmn">
            Job title<br><br>
            Contract type<br><br>
            Team(s)<br><br>
            Reports to<br><br>
            Probation required:<br><br>
            Notice period
          </div>
          <div class = "rght_rle_info_clmn">
            service manager<br><br>
            Full-Time<br><br>
            team 1<br><br>
            Tommy Cashen, michael carter<br><br>
            No<br><br>
            7 weeks
          </div>
        <br><br><br><br><br><br><br><br><br><br><br>
      </p>
    </div>
  </div>

  <div class = "indiv_coll">
    <button class="accordion"><div class = "sction_ttle"> Cancelled (0) </div><span style = "font-weight: 600; font-size: 14;">(Click to expand).</span></button>
      <div class="panel">
        <p>
          <div class = "pncil_rght_prnt">
            <div class = "pncil_rght">
            <a href = "edit_rle_info"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
          </div>
          <div class = "lft_rle_info_clmn">
            Job title<br><br>
            Contract type<br><br>
            Team(s)<br><br>
            Reports to<br><br>
            Probation required:<br><br>
            Notice period
          </div>
          <div class = "rght_rle_info_clmn">
            service manager<br><br>
            Full-Time<br><br>
            team 1<br><br>
            Tommy Cashen, michael carter<br><br>
            No<br><br>
            7 weeks
          </div>
        <br><br><br><br><br><br><br><br><br><br><br>
      </p>
    </div>
  </div>
</div>

<script>
  var acc = document.getElementsByClassName("accordion");
  var i;

  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
      /* Toggle between adding and removing the "active" class,
      to highlight the button that controls the panel */
      this.classList.toggle("active");

      /* Toggle between hiding and showing the active panel */
      var panel = this.nextElementSibling;
      if (panel.style.display === "block") {
        panel.style.display = "none";
      } else {
        panel.style.display = "block";
      }
    });
  }
</script>