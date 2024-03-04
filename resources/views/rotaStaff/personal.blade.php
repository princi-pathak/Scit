@include('rotaStaff.components.header')
@include('rotaStaff.pyrll_user_prfile_tmplte')
<style>
.cntct_info{
  font: sans serif, 550, 20px
  float: left;
  width: 100%;
  margin: 30px 0px;
}
.lft_clmn{
  float: left;
  width: 25%;
}
.rght_clmn{
  float: left;
  width: 75%;
}
.cntct_info_para{
  margin-bottom: 20px;
}
.twkrfo_texarea{
  margin-top: 40px;
}
</style>
<div class = "cntct_info">
  Contact information
</div>
<div class = "">
  <div class = "lft_clmn">
    <div class = "cntct_info_para">
      <span style = "font-weight: 550";>Account email<br></span>
      <span style = "color: #697D8C">cb.craigbirch.cb@gmail.com</span>
    </div>
    <div class = "cntct_info_para">
      <span style = "font-weight: 550";>Home phone<br></span>
      <span style = "color: #697D8C">Not specified</span>
    </div>
    <div class = "cntct_info_para">
      <span style = "font-weight: 550";>Work phone<br></span>
      <span style = "color: #697D8C">Not specified</span>
    </div>
  </div>

  <div class = "rght_clmn">
    <div class = "cntct_info_para">
      <span style = "font-weight: 550">Personal email<br></span>
      <span style = "color: #697D8C">Not specified</span>
    </div>
    <div class = "cntct_info_para">
      <span style = "font-weight: 550">Mobile phone<br></span>
      <span style = "color: #697D8C">Not specified</span>
    </div>
    <div class = "cntct_info_para">
      <span style = "font-weight: 550">Work extension<br></span>
      <span style = "color: #697D8C">  Not specified</span>
    </div>
  </div>
</div>

<div class = "cntct_info">
  Personal information
</div>
<div class = "">
  <div class = "lft_clmn">
    <div class = "cntct_info_para">
      <span style = "font-weight: 550">Account email<br></span>
      <span style = "color: #697D8C"> cb.craigbirch.cb@gmail.com</span>
    </div>
    <div class = "cntct_info_para">
      <span style = "font-weight: 550">Home phone<br></span>
      <span style = "color: #697D8C">Not specified</span>
    </div>
    <div class = "cntct_info_para">
      <span style = "font-weight: 550">Work phone<br></span>
      <span style = "color: #697D8C">Not specified</span>
    </div>
    <div class ="cntct_info_para">
      <span style = "font-weight: 550">Address<br></span>
      <span style = "color: #697D8C">n/a</span>
    </div>
  </div>

  <div class = "rght_clmn">
    <div class = "cntct_info_para">
      <span style = "font-weight: 550">Personal email<br></span>
      <span style = "color: #697D8C">Not specified</span>
    </div>
    <div class = "cntct_info_para">
      <span style = "font-weight: 550">Mobile phone<br></span>
      <span style = "color: #697D8C">Not specified</span>
    </div>
    <div class = "cntct_info_para">
      <span style = "font-weight: 550">Work extension<br></span>
      <span style = "color: #697D8C">Not specified</span>
    </div>
  </div>
</div>

<div class = "cntct_info">
  Medical information
</div>

<div class = "lft_clmn">
  <div class = "cntct_info_para">
    COVID-19 vaccinated?<br><br>
  </div>
  <div class = "cntct_info_para">
    Add notes
  </div>
</div>

<div class = "rght_clmn">
  <div class = "cntct_info_para">
    <select>
      <option value = "Yes">Yes</option>
      <option value = "No">No</option>
      <option value = "Not specified"> Not specified</option>
      <option value = "Pending">Pending</option>
      <option value = "Excempt">Excempt</option>
      <option value = "Prefer not to say">Prefer not to say</option>
    </select>
      <div class = "twkrfo_texarea"><textarea></textarea>


    </div>
  </div>
</div>



