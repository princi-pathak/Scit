@include('rotaStaff.components.header')
@include('rotaStaff.pyrll_stylsheet')
<style>
.top_bar{
  background-color: rgb(255, 80, 0);
  width: 98%;
  height: 56px;
  border-radius: 5px;
  color: white;
  margin: 0px 0px 20px 11px;
}
.circle{
 height:80px;
 width:80px;
 background-color: rgb(61, 176, 241);;
 border-radius:80px;
}
.pyrll_person{
  float: left;
  width: 100%;
  margin-left: 10px;
}
.pyrll_profs_parent {
  position: relative;
  float: left;
  width: 30%;
}
.pyrll_profs_child {
  position: absolute;
  top: 0;
  left: 16;
  top: 20;
}
.pyrl_info_title{
  font-size: 24px;
  font-weight: 600;
  margin: 24px 0px 16px;
}
.top_bar_txt{
  margin-top: 15px;
}
.line_below_ttle{
  margin-bottom: 20px;
}
.employees{
  width: 40%;
  float: left;
  overflow-y: scroll;
}
.title_1{
  width: 100%;
  background-color: rgb(216,227,235);
  margin-bottom: 8px;
  height: 36px;
  padding-top: 5px;
}
.employees_n_details_prnt{
  width: 100%
}
.title_2{
  width: 100%;
  background-color: rgb(188,203,214);
  height: 36px;
  padding-top: 5px;
  margin-bottom: 20px;
}
.title_3{
  width: 97.5%;
  height: 36px;
  background-color: rgb(216,227,235);
  float: left;
  padding: 5px 0px 0px 10px;
  margin-bottom: 20px;
}
.personal{
  float: left;
  width: 100%;
  margin: 0px 0px 25px 10px;
}

.input[type='checkbox'] {
  display: none;
}
.lbl-toggle {
  display: block;
  font-weight: 550;
  text-align: center;
  color: #A77B0E;
  background: #FAE042;
  cursor: pointer;
  border-radius: 7px;
}
.lbl-toggle:hover {
  color: #7C5A0B;
}
.lbl-toggle::before {
  content: ' ';
  display: inline-block;
  border-top: 5px solid transparent;
  border-bottom: 5px solid transparent;
  border-left: 5px solid currentColor;
  vertical-align: middle;
  margin-right: .7rem;
  transform: translateY(-2px);
  transition: transform .2s ease-out;
}
.collapsible-content .content-inner {
  background: rgba(250, 224, 66, .2);
  padding: .5rem 1rem;
}
.collapsible-content {
  max-height: 0px;
  overflow: hidden;
}
.toggle:checked + .lbl-toggle + .collapsible-content {
  max-height: 100vh;
}
.toggle:checked + .lbl-toggle::before {
  transform: rotate(90deg) translateX(-3px);
}
.employee_search{
  margin: 0px 0px 20px 5px;
}
.hr_style{
  float: left;
  width: 100%;
}
.email_sction{
  float: left;
  width: 70%;
  height: 80px;
  margin: 0px 0px 20px 35px;
}
.email_txt{
  float: left;
  width: 50%;
}
.email_icon{
  float: left;
  width: 17%;
  margin-top: 24px;
}
.txt_para{
  margin: 5px 0px 0px 20px;
}
.prsonal_sction{
  margin-left: 17px;
}
.gndr_btn{
  background-color: rgb(247,247,249);
  border-style: solid;
  border-thickness: 1px;
  border-color: rgb(161,169,179);
  height: auto;
  width: auto;
  float: left;
  margin-right: 13px;
  padding: 5px;
  border-radius: 5px;
}
.gndr_opts{
  float: left;
  width: 100%;
}
.details_inp_el{
  margin-bottom: 15px;
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
<div class = "pyrl_info_title">
  Payroll information checker
</div>
<div class = "line_below_ttle">
  Check all your employee information is correct and up to date for your active employees.</span>
</div>
  <div class = "top_bar">
  <i class = "fa-solid fa-triangle-exclamation"></i>
  <div class = "top_bar_txt">
    <i class="fa fa-exclamation"></i>
    14 employees with missing information. Please complete all sections to ensure you have accurate payroll details.
  </div>
</div>

<div class = "employees_n_details_prnt">
  <div class = "employees">
    <div class = "title_1">
      &nbsp&nbsp&nbspEmployees
    </div>
  
    <div class = "employee_search">
      <input type = "search" placeholder="Search">
    </div>
    <div class = "pyrll_person">
      <div class="pyrll_profs_parent">
        <div class="circle"></div>
        <div class="pyrll_profs_child">
          <h2>TC</h2>
        </div>
      </div>
      <div class = "flt_lft_wdth_100_var" style = "--wdth_prcntge: 60%">
        <p>Tommy Cashen</p>
        Director and founder
      </div>
    </div>
    <div class = "hr_style">
      <hr>
    </div>
    <div class = "pyrll_person">
      <div class="pyrll_profs_parent">
        <div class="circle"></div>
        <div class="pyrll_profs_child">
          <h2>TC</h2>
        </div>
      </div>
      <div class = "flt_lft_wdth_100_var" style = "--wdth_prcntge: 60%">
        <p>Daniel Alexander</p>
      </div>
    </div>
    <div class = "hr_style">
      <hr>
    </div>
    <div class = "pyrll_person">
      <div class="pyrll_profs_parent">
        <div class="circle"></div>
        <div class="pyrll_profs_child">
          <h2>TC</h2>
        </div>
      </div>
      <div class = "flt_lft_wdth_100_var" style = "--wdth_prcntge: 60%">
        <p>William Atkins</p>
      </div>
    </div>
    <div class = "hr_style">
      <hr>
    </div>
    <div class = "pyrll_person">
      <div class="pyrll_profs_parent">
        <div class="circle"></div>
        <div class="pyrll_profs_child">
          <h2>TC</h2>
        </div>
      </div>
      <div class = "flt_lft_wdth_100_var" style = "--wdth_prcntge: 60%">
        <p>Craig Birch</p>
        Service Manager
      </div>
    </div>
    <div class = "hr_style">
      <hr>
    </div>
    <div class = "pyrll_person">
      <div class="pyrll_profs_parent">
        <div class="circle"></div>
        <div class="pyrll_profs_child">
          <h2>TC</h2>
        </div>
      </div>
      <div class = "flt_lft_wdth_100_var" style = "--wdth_prcntge: 60%">
        <p>Tommy Cashen</p>
        Director and founder
      </div>
    </div>
    <div class = "hr_style">
      <hr/>
    </div>
  </div>
  <div class = "flt_lft_wdth_100_var" style = "--wdth_prcntge: 60%">
    <div class = "title_2">
      &nbsp&nbsp&nbspDetails
    </div>
    <div class = "pyrll_person">
      <div class="pyrll_profs_parent">
        <div class="circle"></div>
        <div class="pyrll_profs_child">
          <h2>TC</h2>
        </div>
      </div>
      <div class = "flt_lft_wdth_100_var" style = "--wdth_prcntge: 60%">
        <p>Tommy Cashen</p>
        Director and founder
      </div>
    </div>
    <div class = "email_sction">
      <div class = "email_icon">
        <i class="fa fa-envelope fa-2x"></i>
      </div>
      <div class = "email_txt">
        <span style = "font-weight: 500">Email</span><br>
        dan@kabs-fitness.co.uk
      </div>
    </div>
    
    <div class = "prsonal_sction">
      <div class = "title_3">
        Personal
      </div>
      <div class = "personal">
        <div class = "details_inp_el">
          Title<br>
          <select name="alert_status">
            <option value="0">Select 123</option>
            <option value="1">Mr</option>
            <option value="1">Mrs</option>
            <option value="1">Miss</option>
            <option value="1">Ms</option>
            <option value="1">Yes</option>
            <option value="1">Yes</option>
          </select>
        </div>
        <div class = "details_inp_el">
          First Name<br>
          <input type = "text">
        </div>
        <div class = "details_inp_el">
          Middle Name<br>
          <input type = "text">
        </div>
        <div class = "details_inp_el">
          Last Name<br>
          <input type = "text">
        </div>
        <div class = "details_inp_el">
          Date of Birth<br>
          <input type = "date">
        </div>
          Gender<br>
        <div class = "gndr_opts">
          <div class = "gndr_btn">
            Male
          </div>
          <div class = "gndr_btn">
            Female
          </div>
          <div class = "gndr_btn">
            Non-binary
          </div>
          <div class = "gndr_btn">
            Unspecified
          </div>
        </div>
      </div>
    </div>

    <div class = "prsonal_sction">
      <div class = "title_3">
        Home Address
      </div>
      <div class = "personal">
        <div class = "details_inp_el">
          Country<br>
          <select name="alert_status">
            <option disabled="" value="">Select country...</option>
            <option value="United Kingdom">United Kingdom</option>
            <option value="Poland">Poland</option>
            <option value="India">India</option>
            <option value="Ireland">Ireland</option>
            <option value="Romania">Romania</option>
            <option value="" disabled=""></option>
            <option value="Afghanistan">Afghanistan</option>
            <option value="Åland Islands">Åland Islands</option>
            <option value="Albania">Albania</option>
            <option value="Algeria">Algeria</option>
            <option value="American Samoa">American Samoa</option>
            <option value="Andorra">Andorra</option>
            <option value="Angola">Angola</option>
            <option value="Anguilla">Anguilla</option>
            <option value="Antarctica">Antarctica</option>
            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
            <option value="Argentina">Argentina</option>
            <option value="Armenia">Armenia</option>
            <option value="Aruba">Aruba</option>
            <option value="Australia">Australia</option>
            <option value="Austria">Austria</option>
            <option value="Azerbaijan">Azerbaijan</option>
            <option value="Bahamas">Bahamas</option>
            <option value="Bahrain">Bahrain</option>
            <option value="Bangladesh">Bangladesh</option>
            <option value="Barbados">Barbados</option>
            <option value="Belarus">Belarus</option>
            <option value="Belgium">Belgium</option>
            <option value="Belize">Belize</option>
            <option value="Benin">Benin</option>
            <option value="Bermuda">Bermuda</option>
            <option value="Bhutan">Bhutan</option>
            <option value="Bolivia">Bolivia</option>
            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
            <option value="Botswana">Botswana</option>
            <option value="Bouvet Island">Bouvet Island</option>
            <option value="Brazil">Brazil</option>
            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
            <option value="British Virgin Islands">British Virgin Islands</option>
            <option value="Brunei">Brunei</option>
            <option value="Bulgaria">Bulgaria</option>
            <option value="Burkina Faso">Burkina Faso</option>
            <option value="Burundi">Burundi</option>
            <option value="Cambodia">Cambodia</option>
            <option value="Cameroon">Cameroon</option>
            <option value="Canada">Canada</option>
            <option value="Cape Verde">Cape Verde</option>
            <option value="Caribbean Netherlands">Caribbean Netherlands</option>
            <option value="Cayman Islands">Cayman Islands</option>
            <option value="Central African Republic">Central African Republic</option>
            <option value="Chad">Chad</option>
            <option value="Chile">Chile</option>
            <option value="China">China</option>
            <option value="Christmas Island">Christmas Island</option>
            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
            <option value="Colombia">Colombia</option>
            <option value="Comoros">Comoros</option>
            <option value="Cook Islands">Cook Islands</option>
            <option value="Costa Rica">Costa Rica</option>
            <option value="Croatia">Croatia</option>
            <option value="Cuba">Cuba</option>
            <option value="Curaçao">Curaçao</option>
            <option value="Cyprus">Cyprus</option>
            <option value="Czechia">Czechia</option>
            <option value="Denmark">Denmark</option>
            <option value="Djibouti">Djibouti</option>
            <option value="Dominica">Dominica</option>
            <option value="Dominican Republic">Dominican Republic</option>
            <option value="DR Congo">DR Congo</option>
            <option value="Ecuador">Ecuador</option>
            <option value="Egypt">Egypt</option>
            <option value="El Salvador">El Salvador</option>
            <option value="Equatorial Guinea">Equatorial Guinea</option>
            <option value="Eritrea">Eritrea</option>
            <option value="Estonia">Estonia</option>
            <option value="Eswatini">Eswatini</option>
            <option value="Ethiopia">Ethiopia</option>
            <option value="Falkland Islands">Falkland Islands</option>
            <option value="Faroe Islands">Faroe Islands</option>
            <option value="Fiji">Fiji</option>
            <option value="Finland">Finland</option>
            <option value="France">France</option>
            <option value="French Guiana">French Guiana</option>
            <option value="French Polynesia">French Polynesia</option>
            <option value="French Southern and Antarctic Lands">French Southern and Antarctic Lands</option>
            <option value="Gabon">Gabon</option>
            <option value="Gambia">Gambia</option>
            <option value="Georgia">Georgia</option>
            <option value="Germany">Germany</option>
            <option value="Ghana">Ghana</option>
            <option value="Gibraltar">Gibraltar</option>
            <option value="Greece">Greece</option>
            <option value="Greenland">Greenland</option>
            <option value="Grenada">Grenada</option>
            <option value="Guadeloupe">Guadeloupe</option>
            <option value="Guam">Guam</option>
            <option value="Guatemala">Guatemala</option>
            <option value="Guernsey">Guernsey</option>
            <option value="Guinea">Guinea</option>
            <option value="Guinea-Bissau">Guinea-Bissau</option>
            <option value="Guyana">Guyana</option>
            <option value="Haiti">Haiti</option>
            <option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
            <option value="Honduras">Honduras</option>
            <option value="Hong Kong">Hong Kong</option>
            <option value="Hungary">Hungary</option>
            <option value="Iceland">Iceland</option>
            <option value="Indonesia">Indonesia</option>
            <option value="Iran">Iran</option>
            <option value="Iraq">Iraq</option>
            <option value="Isle of Man">Isle of Man</option>
            <option value="Israel">Israel</option>
            <option value="Italy">Italy</option>
            <option value="Ivory Coast">Ivory Coast</option>
            <option value="Jamaica">Jamaica</option>
            <option value="Japan">Japan</option>
            <option value="Jersey">Jersey</option>
            <option value="Jordan">Jordan</option>
            <option value="Kazakhstan">Kazakhstan</option>
            <option value="Kenya">Kenya</option>
            <option value="Kiribati">Kiribati</option>
            <option value="Kosovo">Kosovo</option>
            <option value="Kuwait">Kuwait</option>
            <option value="Kyrgyzstan">Kyrgyzstan</option>
            <option value="Laos">Laos</option>
            <option value="Latvia">Latvia</option>
            <option value="Lebanon">Lebanon</option>
            <option value="Lesotho">Lesotho</option>
            <option value="Liberia">Liberia</option>
            <option value="Libya">Libya</option>
            <option value="Liechtenstein">Liechtenstein</option>
            <option value="Lithuania">Lithuania</option>
            <option value="Luxembourg">Luxembourg</option>
            <option value="Macau">Macau</option>
            <option value="Macedonia">Macedonia</option>
            <option value="Madagascar">Madagascar</option>
            <option value="Malawi">Malawi</option>
            <option value="Malaysia">Malaysia</option>
            <option value="Maldives">Maldives</option>
            <option value="Mali">Mali</option>
            <option value="Malta">Malta</option>
            <option value="Marshall Islands">Marshall Islands</option>
            <option value="Martinique">Martinique</option>
            <option value="Mauritania">Mauritania</option>
            <option value="Mauritius">Mauritius</option>
            <option value="Mayotte">Mayotte</option>
            <option value="Mexico">Mexico</option>
            <option value="Micronesia">Micronesia</option>
            <option value="Moldova">Moldova</option>
            <option value="Monaco">Monaco</option>
            <option value="Mongolia">Mongolia</option>
            <option value="Montenegro">Montenegro</option>
            <option value="Montserrat">Montserrat</option>
            <option value="Morocco">Morocco</option>
            <option value="Mozambique">Mozambique</option>
            <option value="Myanmar">Myanmar</option>
            <option value="Namibia">Namibia</option>
            <option value="Nauru">Nauru</option>
            <option value="Nepal">Nepal</option>
            <option value="Netherlands">Netherlands</option>
            <option value="New Caledonia">New Caledonia</option>
            <option value="New Zealand">New Zealand</option>
            <option value="Nicaragua">Nicaragua</option>
            <option value="Niger">Niger</option>
            <option value="Nigeria">Nigeria</option>
            <option value="Niue">Niue</option>
            <option value="Norfolk Island">Norfolk Island</option>
            <option value="North Korea">North Korea</option>
            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
            <option value="Norway">Norway</option>
            <option value="Oman">Oman</option>
            <option value="Pakistan">Pakistan</option>
            <option value="Palau">Palau</option>
            <option value="Palestine">Palestine</option>
            <option value="Panama">Panama</option>
            <option value="Papua New Guinea">Papua New Guinea</option>
            <option value="Paraguay">Paraguay</option>
            <option value="Peru">Peru</option>
            <option value="Philippines">Philippines</option>
            <option value="Pitcairn Islands">Pitcairn Islands</option>
            <option value="Portugal">Portugal</option>
            <option value="Puerto Rico">Puerto Rico</option>
            <option value="Qatar">Qatar</option>
            <option value="Republic of the Congo">Republic of the Congo</option>
            <option value="Réunion">Réunion</option>
            <option value="Russia">Russia</option>
            <option value="Rwanda">Rwanda</option>
            <option value="Saint Barthélemy">Saint Barthélemy</option>
            <option value="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option>
            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
            <option value="Saint Lucia">Saint Lucia</option>
            <option value="Saint Martin">Saint Martin</option>
            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
            <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
            <option value="Samoa">Samoa</option>
            <option value="San Marino">San Marino</option>
            <option value="São Tomé and Príncipe">São Tomé and Príncipe</option>
            <option value="Saudi Arabia">Saudi Arabia</option>
            <option value="Senegal">Senegal</option>
            <option value="Serbia">Serbia</option>
            <option value="Seychelles">Seychelles</option>
            <option value="Sierra Leone">Sierra Leone</option>
            <option value="Singapore">Singapore</option>
            <option value="Sint Maarten">Sint Maarten</option>
            <option value="Slovakia">Slovakia</option>
            <option value="Slovenia">Slovenia</option>
            <option value="Solomon Islands">Solomon Islands</option>
            <option value="Somalia">Somalia</option>
            <option value="South Africa">South Africa</option>
            <option value="South Georgia">South Georgia</option>
            <option value="South Korea">South Korea</option>
            <option value="South Sudan">South Sudan</option>
            <option value="Spain">Spain</option>
            <option value="Sri Lanka">Sri Lanka</option>
            <option value="Sudan">Sudan</option>
            <option value="Suriname">Suriname</option>
            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
            <option value="Sweden">Sweden</option>
            <option value="Switzerland">Switzerland</option>
            <option value="Syria">Syria</option>
            <option value="Taiwan">Taiwan</option>
            <option value="Tajikistan">Tajikistan</option>
            <option value="Tanzania">Tanzania</option>
            <option value="Thailand">Thailand</option>
            <option value="Timor-Leste">Timor-Leste</option>
            <option value="Togo">Togo</option>
            <option value="Tokelau">Tokelau</option>
            <option value="Tonga">Tonga</option>
            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
            <option value="Tunisia">Tunisia</option>
            <option value="Turkey">Turkey</option>
            <option value="Turkmenistan">Turkmenistan</option>
            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
            <option value="Tuvalu">Tuvalu</option>
            <option value="Uganda">Uganda</option>
            <option value="Ukraine">Ukraine</option>
            <option value="United Arab Emirates">United Arab Emirates</option>
            <option value="United States">United States</option>
            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
            <option value="United States Virgin Islands">United States Virgin Islands</option>
            <option value="Uruguay">Uruguay</option>
            <option value="Uzbekistan">Uzbekistan</option>
            <option value="Vanuatu">Vanuatu</option>
            <option value="Vatican City">Vatican City</option>
            <option value="Venezuela">Venezuela</option>
            <option value="Vietnam">Vietnam</option>
            <option value="Wallis and Futuna">Wallis and Futuna</option>
            <option value="Western Sahara">Western Sahara</option>
            <option value="Yemen">Yemen</option>
            <option value="Zambia">Zambia</option>
            <option value="Zimbabwe">Zimbabwe</option>
          </select>
        </div>

        <div class = "details_inp_el">
          Address 1<br>
          <input type = "text">
        </div>
        <div class = "details_inp_el">
          Address 2<br>
          <input type = "text">
        </div>
        <div class = "details_inp_el">
          Address 3<br>
          <input type = "text">
        </div>
        <div class = "details_inp_el">
          Town/City<br>
          <input type = "text">
        </div>

        County<br>
        <select>
        <option value="Aberdeen City">Aberdeen City</option>
        <option value="Aberdeenshire">Aberdeenshire</option>
        <option value="Angus">Angus</option>
        <option value="Antrim">Antrim</option>
        <option value="Argyll and Bute">Argyll and Bute</option>
        <option value="Armagh">Armagh</option>
        <option value="Avon">Avon</option>
        <option value="Bedfordshire">Bedfordshire</option>
        <option value="Berkshire">Berkshire</option>
        <option value="Blaenau Gwent">Blaenau Gwent</option>
        <option value="Borders">Borders</option>
        <option value="Bridgend">Bridgend</option>
        <option value="Bristol">Bristol</option>
        <option value="Buckinghamshire">Buckinghamshire</option>
        <option value="Caerphilly">Caerphilly</option>
        <option value="Cambridgeshire">Cambridgeshire</option>
        <option value="Cardiff">Cardiff</option>
        <option value="Carmarthenshire">Carmarthenshire</option>
        <option value="Ceredigion">Ceredigion</option>
        <option value="Channel Islands">Channel Islands</option>
        <option value="Cheshire">Cheshire</option>
        <option value="Clackmannan">Clackmannan</option>
        <option value="Cleveland">Cleveland</option>
        <option value="Conwy">Conwy</option>
        <option value="Cornwall">Cornwall</option>
        <option value="Cumbria">Cumbria</option>
        <option value="Denbighshire">Denbighshire</option>
        <option value="Derbyshire">Derbyshire</option>
        <option value="Devon">Devon</option>
        <option value="Dorset">Dorset</option>
        <option value="Down">Down</option>
        <option value="Dumfries and Galloway">Dumfries and Galloway</option>
        <option value="Durham">Durham</option>
        <option value="East Ayrshire">East Ayrshire</option>
        <option value="East Dunbartonshire">East Dunbartonshire</option>
        <option value="East Lothian">East Lothian</option>
        <option value="East Renfrewshire">East Renfrewshire</option>
        <option value="East Riding of Yorkshire">East Riding of Yorkshire</option>
        <option value="East Sussex">East Sussex</option>
        <option value="Edinburgh City">Edinburgh City</option>
        <option value="Essex">Essex</option>
        <option value="Falkirk">Falkirk</option>
        <option value="Fermanagh">Fermanagh</option>
        <option value="Flintshire">Flintshire</option>
        <option value="Glasgow">Glasgow</option>
        <option value="Gloucestershire">Gloucestershire</option>
        <option value="Greater Manchester">Greater Manchester</option>
        <option value="Gwynedd">Gwynedd</option>
        <option value="Hampshire">Hampshire</option>
        <option value="Herefordshire">Herefordshire</option>
        <option value="Hertfordshire">Hertfordshire</option>
        <option value="Highland">Highland</option>
        <option value="Humberside">Humberside</option>
        <option value="Inverclyde">Inverclyde </option>
        <option value="Isle of Anglesey">Isle of Anglesey</option>
        <option value="Isle of Man">Isle of Man</option>
        <option value="Isle of Wight">Isle of Wight</option>
        <option value="Isles of Scilly">Isles of Scilly</option>
        <option value="Kent">Kent</option>
        <option value="Lancashire">Lancashire</option>
        <option value="Leicestershire">Leicestershire</option>
        <option value="Lincolnshire">Lincolnshire</option>
        <option value="London">London</option>
        <option value="Londonderry">Londonderry</option>
        <option value="Merseyside">Merseyside</option>
        <option value="Merthyr Tydfil">Merthyr Tydfil</option>
        <option value="Middlesex">Middlesex</option>
        <option value="Midlothian">Midlothian</option>
        <option value="Monmouthshire">Monmouthshire</option>
        <option value="Moray">Moray</option>
        <option value="Neath Port Talbot">Neath Port Talbot</option>
        <option value="Newport">Newport</option>
        <option value="Norfolk">Norfolk</option>
        <option value="North Ayrshire">North Ayrshire</option>
        <option value="North Lanarkshire">North Lanarkshire</option>
        <option value="North Yorkshire">North Yorkshire</option>
        <option value="Northamptonshire">Northamptonshire</option>
        <option value="Northumberland">Northumberland</option>
        <option value="Nottinghamshire">Nottinghamshire</option>
        <option value="Orkney">Orkney</option>
        <option value="Oxfordshire">Oxfordshire</option>
        <option value="Pembrokeshire">Pembrokeshire</option>
        <option value="Perthshire and Kinross">Perthshire and Kinross</option>
        <option value="Powys">Powys</option>
        <option value="Renfrewshire">Renfrewshire</option>
        <option value="Rhondda Cynon Taff">Rhondda Cynon Taff</option>
        <option value="Roxburghshire">Roxburghshire</option>
        <option value="Rutland">Rutland</option>
        <option value="Shetland">Shetland</option>
        <option value="Shropshire">Shropshire</option>
        <option value="Somerset">Somerset</option>
        <option value="South Ayrshi">South Ayrshire</option>
        <option value="South Lanarkshire">South Lanarkshire</option>
        <option value="South Yorkshire">South Yorkshire</option>
        <option value="Staffordshire">Staffordshire</option>
        <option value="Stirling">Stirling</option>
        <option value="Suffolk">Suffolk</option>
        <option value="Surrey">Surrey</option>
        <option value="Swansea">Swansea</option>
        <option value="The Vale of Glamorgan">The Vale of Glamorgan</option>
        <option value="Torfaen">Torfaen</option>
        <option value="Tyne and Wear">Tyne and Wear</option>
        <option value="Tyrone">Tyrone</option>
        <option value="Warwickshire">Warwickshire</option>
        <option value="West Dunbartonshire">West Dunbartonshire</option>
        <option value="West Lothian">West Lothian</option>
        <option value="West Midlands">West Midlands</option>
        <option value="West Sussex">West Sussex</option>
        <option value="West Yorkshire">West Yorkshire</option>
        <option value="Western Isles">Western Isles</option>
        <option value="Wiltshire">Wiltshire</option>
        <option value="Worcestershire">Worcestershire</option>
        <option value="Wrexham">Wrexham</option>
        </select> <br>
        <br>

        <div class = "details_inp_el">
          Postcode<br>
          <input type = "text">
        </div>
      </div>
    </div>

    <div class = "prsonal_sction">
      <div class = "title_3">
        Employment & financial
      </div>
      <div class = "personal">
        <div class = "details_inp_el">
          Payroll number<br>
          <input type = "text">
        </div>
        <div class = "details_inp_el">
          Salary<br>
          <input type = "text">
        </div>
        <div class = "details_inp_el">
          Tax code<br>
          <input type = "text">
        </div>
        <div class = "details_inp_el">
          National Insurance (NI)<br>
          <input type = "text">
        </div>
        <div class = "details_inp_el">
          Name on account<br>
          <input type = "text">
        </div>
        <div class = "details_inp_el">
          Name of bank<br>
          <input type = "text">
        </div>
        <div class = "details_inp_el">
          Bank branch<br>
          <input type = "text">

        </div>
        <div class = "details_inp_el">
          Account number<br>
          <input type = "text">
        </div>
        <div class = "details_inp_el">
          Sort code<br>
          <input type = "text">
        </div>
      </div>
    </div>

    <div class = "prsonal_sction">
      <div class = "title_3">
        Pension
      </div>
      <div class = "personal">
        <div class = "details_inp_el">
          Pension eligible?<br>
          <select>
            <option value ="No">No</option>
            <option value ="Yes">Yes</option>
          </select>
        </div>
      </div>
    </div>
  </div>
</div>