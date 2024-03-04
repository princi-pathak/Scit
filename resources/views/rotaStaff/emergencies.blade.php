@include('rotaStaff.components.header')
@include('rotaStaff.pyrll_user_prfile_tmplte')
@include('rotaStaff.pyrll_stylsheet')
<style>
  .clm_func{
    float: left;
    margin-bottom: 30px; 
  }
  .outr_srch_div{
    width: 120px;
  }
</style>
<hr>

<div class ="add_nw_cntct"> Add at least one emergency contact in case something unexpected happens. </div>
<div class ="btn_wrppr" >
  <div class="rptble_btn_1" style = "--bckgrnd_clr: rgb(61,176,241); --wdth_prcntge: 180px; --brdr_clr: yellow; --margin_: 5px;">
    <a href="{{ url('/123') }}">  Add new contact</a><br>
  </div>
</div>

<div class = "outr_srch_div">
  <div class = "clm_func">
    <div class = "pair"><div class = "txt_lne"> First name </div> <div class = "txt_lne"> <input type = "text"> <br> </div></div>
    <div class = "pair"><div class = "txt_lne"> Last name </div> <div class = "txt_lne"> <input type = "text"> <br> </div></div>
    <div class = "pair"><div class = "txt_lne"> Home phone </div> <div class = "txt_lne"> <input type = "text"> <br> </div></div>
    <div class = "pair"><div class = "txt_lne"> Mobile phone </div> <div class = "txt_lne"> <input type = "text"> <br> </div></div>
    <div class = "pair"><div class = "txt_lne"> Work phone </div> <input type = "text"> <br> </div></div>
    <div class = "pair"><div class = "txt_lne"> Country </div> <input type = "text"> <br> </div>
    <div class = "pair"><div class = "txt_lne"> Address 1 </div> <input type = "text"> <br> </div>
    <div class = "pair"><div class = "txt_lne"> Address 2 </div> <input type = "text"> <input type = "text"> <br> </div>
    <div class = "pair"><div class = "txt_lne"> Address 3 </div> <input type = "text"> <br> </div>
    <div class = "pair"><div class = "txt_lne"> Town/City </div> <input type = "text"> <br> </div>
    <div class = "pair"><div class = "txt_lne"> County </div> <input type = "text"> <br> </div>
    <div class = "pair"><div class = "txt_lne"> Postcode </div> <input type = "text"> <br> </div>                                                                                                                                                                                                                                                                           s
    <div class = "pair"><div class = "txt_lne"> Relationship </div> <input type = "text"> <br> </div>
    <div class = "pair"><div class = "txt_lne"> Primary Contact </div> <input type = "text"> </div>
  </div>
</div>
