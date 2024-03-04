@include('rotaStaff.components.header')
@include('rotaStaff.pyrll_user_prfile_tmplte')
@include('rotaStaff.pyrll_stylsheet')
<style>
  .srch_bar{
    width: fit-content;
    float: left;
  }
  .srch_bar input{
    width: 320px;
    float: left;
  }
  .srch_button{
    width: 80px;
    float: left;
    height: 40px;
  }
  .srch_n_btn_prnt{
    margin: 20px 0px 10px 0px;
    width: 100%;
    float: left;
  }
  .view_p_pge{
    float: left;
  }
  .view{
    float: left;
    width: 50px;
    height: 36px;
    margin-top: 10px;
  }
  .slct{
    float: left;
  }
  .perpge{
    float: left;
    height: 36px;
    width: 100px;
    margin-left: 10px;
  }
</style>
<div class = "srch_n_btn_prnt">
  <div class = "srch_bar"">
    <input type = "search" style = "height: 40px; width: 450px;">
  </div>
  <div class="rptble_btn_2" style = "--bckgrnd_clr: rgb(61,176,241); --wdth_prcntge: 60px; --margin_: 0px 460px 0px 12px;">
    <a href="{{ url('/123') }}">  Search</a>
  </div>
  <div class = "view_p_pge"> 
    <div class = "view">
      View
    </div>
    <div class = "slct">
      <select style="width: 80px; height: 45px;">
        <option value= "10">10</option>
        <option value= "20">20</option>
        <option value= "30">30</option>
        <option value= "40">40</option>
        <option value= "50">50</option>
      </select>
    </div>
    <div class = "perpge">
      <div style="width: 100px; margin-top: 10px;">
        per page
      </div>
    </div>
  </div>
</div>
<div>
  <div class="rptble_btn_2" style = "--bckgrnd_clr: rgb(61,176,241); --wdth_prcntge: 90px; --brdr_clr: rgb(61,176,241); --margin_: 5px">
    <a href="{{ url('/123') }}">  Move</a>
  </div>
  <div class="rptble_btn_2" style = "--bckgrnd_clr: rgb(61,176,241); --wdth_prcntge: 90px; --brdr_clr: rgb(61,176,241); --margin_: 5px">
    <a href="{{ url('/123') }}">  Hide</a>
  </div>
    <div class="rptble_btn_2" style = "--bckgrnd_clr: rgb(61,176,241); --wdth_prcntge: 90px; --brdr_clr: rgb(61,176,241); --margin_: 5px">
    <a href="{{ url('/123') }}">  Show</a>
  </div>
  <div class="rptble_btn_2" style = "--bckgrnd_clr: rgb(61,176,241); --wdth_prcntge: 90px; --brdr_clr: rgb(61,176,241); --margin_: 5px">
    <a href="{{ url('/123') }}">  Notify</a>
  </div>
  <div class="rptble_btn_2" style = "--bckgrnd_clr: rgb(61,176,241); --wdth_prcntge: 90px; --brdr_clr: rgb(61,176,241); --margin_: 5px 530px 5px 5px">
    <a href="{{ url('/123') }}">  Download</a>
  </div>
  <div class="rptble_btn_2" style = "--bckgrnd_clr: rgb(61,176,241); --wdth_prcntge: 90px; --brdr_clr: rgb(61,176,241); --margin_: 5px">
    <a href="{{ url('/123') }}">  Upload</a>
  </div>
  <div class="rptble_btn_2" style = "--bckgrnd_clr: rgb(61,176,241); --wdth_prcntge: 90px; --brdr_clr: rgb(61,176,241); --margin_: 5px">
    <a href="{{ url('/123') }}">  New folder</a>
  </div>

