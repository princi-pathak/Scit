@include('rotaStaff.components.header')
@include('rotaStaff.pyrll_stylsheet')
<style>
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
  margin-top: 20px;
}
.inbetween_block{
  width: 100%;
  float: left;
  height: 20px;
}
.ttle{
  font-size: 20px;
  font-weight: 500;
  margin-top: 20px;
}
.intro_txt{
  margin-top: 20px;
}
</style>

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

<div class = "ttle">
  Payroll glossary
</div>

<div class = "intro_txt">
  We’ve put together this glossary of key payroll terms to help you understand the most important ones to you and your business.
</div>

<div class = "inbetween_block"></div>

<button class="accordion">Attachment of Earnings Order (AEO) <span style = "font-weight: 600; font-size: 14;">(Click to expand).</span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
      An AEO is a court order to deduct pay from an employee’s wages. You may be asked to do this if your employee owes a debt. This money is sent directly to the court and is used to pay back your employee’s creditors.
    </div> 
  </p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">Auto enrolment <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
      This is a government initiative that requires UK employers to put qualifying staff into a workplace pension scheme.
    </div> 
  </p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">Construction Industry Scheme (CIS) <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
      Under the CIS, contractors deduct money from a subcontractor’s pay and pass this on to HMRC. The deductions count towards the subcontractor’s tax and National Insurance contributions.    </div> 
  </p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">Direct Earnings Attachment (DEA) <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
      Sometimes an employee may owe money to the Department for Work and Pensions (DWP). This can happen if the DWP overpays certain benefits to your employee. In this case, you may be asked to deduct money from their wages. This is known as a Direct Earnings Attachment (DEA).
    </div> 
  </p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">Employer Payment Submission (EPS) <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
      You use an EPS to tell HMRC any values that can’t go on a Full Payment Submission. For example, you would submit an EPS if you made no payments to any employees in a tax month.
    </div> 
  </p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">Furlough pay <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
    <p>Under the Job Retention Scheme (JRS) you can claim grants to cover up to 80% of a furloughed employee’s wages. The scheme is open until the end of April 2021.</p>

    <p>Currently, you don’t have to top up your staff’s pay. However, you do need to pay National Insurance and employer pension contributions. The Government will review the scheme in January 2021, so these rules may change.</p>

    <p>Remember, you can use BrightHR’s furlough navigator to help you manage all your furlough processes.<p>
   </div> 
  </p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">Gender Pay Gap Reporting (GPGR) <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
      If you have 250 or more staff, then you must report your annual gender pay gaps. This should be based on a ‘snapshot date’. For public sector organisations, this is the 31st of March. For private and voluntary sector organisations, it is the 5th of April.
    </div> 
  </p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">Gross pay <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
      This is the total amount of money an employee gets before deductions.
    </div> 
  </p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">HM Revenue & Customs (HMRC) <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
      This is the department of the UK Government responsible for collecting taxes and paying state support. HMRC oversees regulatory regimes, such as the National Minimum Wage/National Living Wage. It also issues National Insurance numbers.
    </div> 
  </p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">Holiday pay <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
      Most workers have the right to paid holiday each year. This is known as ‘statutory leave entitlement’ or ‘annual leave’. The amount you pay staff during this time is known as ‘holiday pay’.
    </div> 
  </p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">Lower Earnings Limit for National Insurance (LEL) <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
      The Lower Earnings Limit (LEL) is set each tax year by the Government. People who earn below LEL do not pay National Insurance. Even if an employee earns more than the LEL, they don’t need to pay Primary Class One National Insurance contributions until their earnings reach the primary threshold. The LEL limit is reviewed annually.
    </div> 
  </p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">Mileage allowance payments (MAP) <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
      If your business pays an amount towards an employee’s mileage costs, these reimbursements are called Mileage Allowance Payments (MAP).
    </div> 
  </p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">National Insurance <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
      This is a compulsory deduction from employees’ pay. It allows benefits and services for people in the UK, such as the National Health Service (NHS).
   </div> 
  </p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">National Minimum/Living Wage <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
      This is the minimum hourly pay that almost all workers are entitled to. The amount depends on the worker’s age and whether they are an apprentice.
    </div> 
  </p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">Net pay <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
      This is the total amount of money an employee gets after all deductions are made.
    </div> 
  </p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">P6 Tax code notice <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
      A P6 notice provides details of an employee’s tax code. HMRC issues this to employers.
    </div> 
  </p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">P9: Tax code notice <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
      HMRC will issue a P9 notice to inform you when an employees’ tax code has changed.
    </div> 
  </p>
</div>
<div class = "inbetween_block">
</div>

<button class="accordion">P11D <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
      <p>You must use a P11D to tell HMRC the value of any benefits you give to employees that effectively increase their income. This includes things like a company car. Your employee will pay tax on most benefits, while you pay Class 1A National Insurance Contributions.</p>
      <p>You must give employees a copy of their P11D to use when completing a self-assessment tax return. Banks and building societies may also accept P11D forms as proof of extra income. Your employee might need this if they apply for a loan or a mortgage.</p>
    </div>
</p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">P45: Cessation form <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
      You must issue a P45 to an employee when they stop working for you. It shows the employee how much tax they’ve paid on their salary during the tax year.
    </div> 
  </p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">P60: Statement of earnings for the tax year <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
      A P60 shows how much tax an employee has paid on their salary in the tax year. Employees might need this to claim back overpaid tax, apply for tax credits, or provide proof of income when they apply for a loan or a mortgage.
    </div> 
  </p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">Payroll <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
      Payroll is a record of all employees with details of Gross Pay as well as essential PAYE deductions.    </div> 
  </p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">Pensions <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
      <p>A pension gives people an income in retirement. All employers must offer a workplace pension scheme.</p>

      <p>Qualifying employees are enrolled onto this scheme automatically. Monthly pension contributions are then made through an employee’s wages. Employers may also need to make contributions for certain employees. You can find out more about pensions at: https://www.gov.uk/pension-types  </div> 
  </p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">Postgraduate Loan Deductions (PGL) <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
      HMRC might tell an employer to deduct repayments for a Postgraduate Loan (PGL) from an employee. PGL repayments can be either for a postgraduate masters loan or a postgraduate doctoral loan.
    </div> 
  </p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">Primary threshold for National Insurance rates <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
      <p>The primary earnings threshold is the amount at which employees start to pay National Insurance contributions. It is set annually by the Government. </p>

      <p>If an employee earns between the primary threshold and the upper earnings limit, they will pay the standard rate of National Insurance on earnings above the primary threshold.</p>
    </div> 
  </p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">Real Time Information (RTI) <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
    You must send information about tax and other deductions under PAYE to HMRC each time you pay an employee. This is known as Real Time Information.
    </div> 
  </p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">Redundancy pay <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
    <p> If you make an employee redundant, you may need to give them redundancy pay.</p>

    <p> In most cases, employees only have the right to redundancy pay if they have worked for you for more than two years. Redundancy pay varies depending on your employee’s age and length of service.</p>

    <p> If you need to make redundancies, BrightHR’s redundancy navigator helps make this process as straightforward and stress-free as possible.</p>
    </div> 
  </p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">Statutory Adoption Pay (SAP) <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
      <p>>When an employee takes time off to adopt a child, they may be eligible for SAP.</p>
      You pay SAP to the employee in the same way as their usual wages, with tax and National Insurance deducted as normal. SAP starts when an employee goes on adoption leave.
   </div> 
  </p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">Statutory Maternity Pay (SMP) <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
      <p> You must pay SMP to eligible employees on maternity leave. </p>
      <p>You pay SMP to the employee in the same way as their usual wages, with tax and National Insurance deducted as normal. SMP starts when an employee goes on maternity leave.</p>
      </div>
    </p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">Statutory Paternity Pay (SPP) <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
      Employees who take time off when their partner is having a baby, adopting a child or having a baby through surrogacy may be eligible for SPP.
    </div> 
  </p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">Statutory Shared Parental Pay (ShPP) <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
      <p>ShPP is available for eligible employees.</p>

      <p>ShPP is paid to the employee in the same way as their usual wages, with tax and National Insurance deducted as normal. Statutory maternity pay will start when an employee goes on maternity leave.</p>
    </div> 
  </p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">Statutory Sick Pay (SSP) <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
    <p>SSP is the minimum pay you must give to qualifying employees who cannot work due to sickness or illness.</p>

    <p>SSP is separate to your company’s sickness policy. That means you can pay employees more if you want to.</p>

    <p>During the COVID-19 crisis, you may also need to pay SSP to staff who self-isolate. This is subject to eligibility.  </p>  </div> 
  </p>
</div>
<button class="accordion">Student loan deductions <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
    <p>HMRC will tell an employer if they need to start making student loan deductions from an employee’s wages.</p>
    <p>SL1</p>
    <p>HMRC issues this notice to tell employers to start making student loan deductions.</p>

    <p style = "font-weight: 500; font-size: 20px;">SL2</p>
    <p>HMRC issues this notice to tell employers to stop making student loan deductions.</p>
    </div> 
  </p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">Tax code<span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
    An employee’s tax code tells you how much income tax to deduct from their pay. HMRC tells you which tax code to use for an employee so you can collect the right amount of tax.
    </div> 
  </p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">The Pensions Regulator <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
      This is the UK regulator of work-based pension schemes. It provides guidance to employers, trustees, business advisers, and pension specialists on what is expected of them.
    </div> 
  </p>
</div>
<div class = "inbetween_block">
</div>
<button class="accordion">Upper earnings limit for National Insurance rates (UEL) <span style = "font-size: 14"> </span></button>
<div class="panel">
  <p>
    <div class = "crrnt_n_ftre">
      <p>The upper earnings limit is an amount at which the National Insurance contribution rate decreases. It is set annually by the Government.</p>

     <p> Higher earners will pay a lower rate of National Insurance on any earnings above the upper earnings limit. The employer continues to pay the standard rate of employer’s National Insurance on these earnings.</p>
    </div> 
  <p>
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