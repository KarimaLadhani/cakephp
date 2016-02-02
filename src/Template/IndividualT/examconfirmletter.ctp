<div class="actions columns large-2 medium-3">
    <h5><?= __('The CEP Institute') ?></h5>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Home'), ['action' => 'dashboard']) ?></li>               
    </ul>
</div>

<div class=topmargin></div>
<div class="users form">
<fieldset>
<legend><?= __('<b><font size="3", color="#93191B">Important: '.h($fname).' '.h($lname).', You are confirmed</font></b>') ?></legend>
 <table cellpadding="0" cellspacing="0">
     <thead>
        <tr> <td><h5 style='color:#15848F'><?= 'Exam Information'  ?></h5></td><td></td></tr>
     </thead>
     <tbody>
      <tr><td><h6 class="subheader"><?= __('Exam Level:') ?></td><td><?= h($level) ?></td></tr>            
      <tr><td><h6 class="subheader"><?= __('Exam Location:')  ?></h6></td><td><?= h($examlocation)?></td></tr>  
      <tr><td><h6 class="subheader"><?= __('Exam Date: ') ?></h6></td><td><?= h($date) ?></td></tr>
      <tr><td><h6 class="subheader"><?= __('Amount Charged: ') ?></h6></td><td><?= '$'.h($amountcharged).'.00'	 ?></td></tr> 
      <tr><td><h6 class="subheader"><?= __('Print Confirmation:')?></h6></td><td>
     <a href="javascript:window.print()">CLICK HERE TO PRINT CONFIRMATION</a> </td>
      </tbody>
      </table>
      <p><font size="2">
            The Certified Equity Professional Institute 
has received your registration for the <b>Level 1 exam on <?= h($date)?> </b>
You have chosen<b> <?= h($examlocation) ?></b> as your test site. 
Please review the Certification Information Handbook posted on our web site at: 
<a href="http://www.scu.edu/business/cepi/">http://www.scu.edu/business/cepi/</a>. You will be held
 responsible for all of the information contained in the handbook, so please familiarize yourself with all 
 of the information.</font></p>
      	
      <p><b><font size='2'>Deferral Notice:</b> Candidates are permitted to defer an exam registration twice. 
      Additional deferrals will incur a full exam registration fee. Please refer to your 
      MyCEP account to determine your deferral status.
	  </p></font>
      
      <?php
$thisYear=date("Y");
$thisMonth=date("m");
$examYear=date('Y', strtotime($date));

if ($thisYear == $examYear && $thisMonth >= 3)
{
?>
		<p><font size='2'>Your CEPI Course Binder will be shipped to the address you selected during the online registration process, 
		via UPS ground - <font color='red'>and requires a signature for delivery.</font> If you have a preference, 
		please provide the CEPI with the address of where you would like your binder shipped, including any building, 
		department numbers, etc. necessary to facilitate a successful delivery.  Otherwise your binder will be shipped 
		to the primary address you have provided in your profile.</font></p>
		
		<p><font size='2'>While you are waiting for your CEPI course materials, 
		you may purchase the texts below:</font></p>		
		<p><font size='2'><b>Please note:</b> It is the responsibility of the candidate to make 
		sure that all study materials are applicable to the current calendar year. Please note the edition numbers and/or 
		publication dates to ensure you have the correct books, reading lists and binder material.</p></font>

<?php
if($level==1){
?>

		<p><font size='2'>
Items 1, 2 and 5 may be purchased online from NCEO at <a href=\"http://www.nceo.org/cep/\">http://www.nceo.org/cep/</a>. 
Use the discount codes shown for each item to receive the CEP preferred price for these publications.  
Note that Item 4 can be downloaded at no cost from the CEPI website 
<a href=\"http://www.scu.edu/business/cepi/gps_published_research.cfm\">http://www.scu.edu/business/cepi/gps_published_research.cfm</a>.</font></p>

  	<p><font size='2'>1. <i>Selected Issues in Equity Compensation</i>, 12th Edition, ed. S. Rodrick. (Oakland, CA: National Center for Employee Ownership, 2015).   Available from NCEO at <a href=\"http://www.nceo.org/cep/\">http://www.nceo.org/cep/</a></font></p>
   	<p><font size='2'>2. <i>Baker, Alisa J., Wright, Alison, and Chernoff, Pam, <i>The Stock Options Book</i>, 16th Edition. 
   	(Oakland, CA: National Center for Employee Ownership, 2015).  Available from NCEO at <a href=\"http://www.nceo.org/cep/\">http://www.nceo.org/cep/</a>
     </font></p>
    <p><font size='2'>3. <i>Thomas, Kaye A., <i>Consider Your Options</i>, 2014 Edition. (Lisle, IL: Fairmark Press, Inc., 2014).  Available from Amazon.com
      </font></p>
    <p><font size='2'>4. <i>GPS - <i>Employee Stock Purchase Plans</i>, (CEP Institute, 2015).  Available from NCEO at <a href=\"http://www.nceo.org/cep/\">http://www.nceo.org/cep/</a>.  Also available as a free download at <a href=\"www.scu.edu/business/cepi/gps_published_research.cfm\">www.scu.edu/business/cepi/gps_published_research.cfm</a>
    </font></p>
	<p><font size='2'>5. <i>Equity Alternatives: Restricted Stock, Performance Awards, Phantom Stock, SARs, and More.</i>, 13th Edition, ed. S. Rodrick (Oakland, CA: National Center for Employee Ownership, 2015).  Formerly Titled <i>Beyond Stock Options</i>. Available from NCEO at <a href=\"http://www.nceo.org/cep/\">http://www.nceo.org/cep/</a> 
      </font></p>	
      
      
  <?php
  }    
  else if ($level==2){
  ?>
  
  		<p><font size='2'>
Items 1, 2, 5 and 7 may be purchased online from NCEO at <a href=\"http://www.nceo.org/cep/\">http://www.nceo.org/cep/</a>. 
Use the discount codes shown for each item to receive the CEP preferred price for these publications.  
Note that Items 4 and 5 can also be downloaded at no cost from the CEPI website 
<a href=\"http://www.scu.edu/business/cepi/gps_published_research.cfm\">http://www.scu.edu/business/cepi/gps_published_research.cfm</a>.</font></p>
  
  <p><font size='2'>1. <i>Selected Issues in Equity Compensation</i>, 12th Edition, ed. S. Rodrick. (Oakland, CA: National Center for Employee Ownership, 2015).   Available from NCEO at <a href=\"http://www.nceo.org/cep/\">http://www.nceo.org/cep/</a></font></p>
   	<p><font size='2'>2. <i>Baker, Alisa J., Wright, Alison, and Chernoff, Pam, <i>The Stock Options Book</i>, 
   	16th Edition. (Oakland, CA: National Center for Employee Ownership, 2015).  Available from NCEO at 
   	<a href=\"http://www.nceo.org/cep/\">http://www.nceo.org/cep/</a>
     </font></p>
    <p><font size='2'>3. <i>Thomas, Kaye A., <i>Consider Your Options</i>, 2014 Edition. (Lisle, IL: Fairmark Press, Inc., 2014).  Available from Amazon.com
      </font></p>
    <p><font size='2'>4. <i>GPS - <i>Employee Stock Purchase Plans</i>, (CEP Institute, 2015).  Available from NCEO at 
    <a href=\"http://www.nceo.org/cep/\">http://www.nceo.org/cep/</a>.  Also available as a free download at <a href=\"www.scu.edu/business/cepi/gps_published_research.cfm\">www.scu.edu/business/cepi/gps_published_research.cfm</a>    
    </font></p>
	<p><font size='2'>5. <i>Equity Alternatives: Restricted Stock, Performance Awards, Phantom Stock, SARs, and 
	More.</i>, 13th Edition, ed. S. Rodrick (Oakland, CA: National Center for Employee Ownership, 2015).  Formerly Titled <i>Beyond Stock Options</i>. 
	Available from NCEO at <a href=\"http://www.nceo.org/cep/\">http://www.nceo.org/cep/</a> 
      </font></p>	
   <p><font size='2'>6.	GPS - <i>Restricted Stock and Restricted Stock Units</i>, (CEP Institute, 2013). Available from NCEO 
   at <a href=\"http://www.nceo.org/cep/\">http://www.nceo.org/cep/</a>.  Also available as a free download 
   at <a href=\"www.scu.edu/business/cepi/gps_published_research.cfm\">www.scu.edu/business/cepi/gps_published_research.cfm</a>
      </font></p>
    <p><font size='2'>7. <i>Baksa, Barbara, <i>Accounting for Equity Compensation</i>, 12th Edition. (Oakland, CA: 
    National Center for Employee Ownership, 2015).  Available from NCEO at <a href=\"http://www.nceo.org/cep/\">http://www.nceo.org/cep/</a>
     </font></p>
  
  
  <?php
  }
  else if ($level==3){
  ?>
  <p><font size='2'>
Items 1, 2, 5, 7, 8 and 9 may be purchased online from NCEO at <a href=\"http://www.nceo.org/cep/\">http://www.nceo.org/cep/</a>. 
Use the discount codes shown for each item to receive the CEP preferred price for these publications.  
Note that Items 4,5,10 and 11 can also be downloaded at no cost from the CEPI website 
<a href=\"http://www.scu.edu/business/cepi/gps_published_research.cfm\">http://www.scu.edu/business/cepi/gps_published_research.cfm</a>.</font></p>
  
   <p><font size='2'>1. <i>Selected Issues in Equity Compensation</i>, 12th Edition, ed. S. Rodrick. (Oakland, CA: National Center for Employee Ownership, 2015).   Available from NCEO at <a href=\"http://www.nceo.org/cep/\">http://www.nceo.org/cep/</a></font></p>
   	<p><font size='2'>2. <i>Baker, Alisa J., Wright, Alison, and Chernoff, Pam, <i>The Stock Options Book</i>, 16th Edition. 
   	(Oakland, CA: National Center for Employee Ownership, 2015).  Available from NCEO at <a href=\"http://www.nceo.org/cep/\">http://www.nceo.org/cep/</a>
     </font></p>
    <p><font size='2'>3. <i>Thomas, Kaye A., <i>Consider Your Options</i>, 2014 Edition. (Lisle, IL: Fairmark Press, Inc., 2014).  Available from Amazon.com
      </font></p>
    <p><font size='2'>4. <i>GPS - <i>Employee Stock Purchase Plans</i>, (CEP Institute, 2015).  Available from NCEO at <a href=\"http://www.nceo.org/cep/\">http://www.nceo.org/cep/</a>.  Also available as a free download at <a href=\"www.scu.edu/business/cepi/gps_published_research.cfm\">www.scu.edu/business/cepi/gps_published_research.cfm</a>
    </font></p>
	<p><font size='2'>5. <i>Equity Alternatives: Restricted Stock, Performance Awards, Phantom Stock, SARs, and More.</i>, 13th Edition, ed. S. Rodrick (Oakland, CA: National Center for Employee Ownership, 2015).  Formerly Titled <i>Beyond Stock Options</i>. Available from NCEO at <a href=\"http://www.nceo.org/cep/\">http://www.nceo.org/cep/</a> 
      </font></p>	
   <p><font size='2'>6.	GPS - <i>Restricted Stock and Restricted Stock Units</i>, (CEP Institute, 2013). 
   Available from NCEO at <a href=\"http://www.nceo.org/cep/\">http://www.nceo.org/cep/</a>.  Also available 
   as a free download at <a href=\"www.scu.edu/business/cepi/gps_published_research.cfm\">www.scu.edu/business/cepi/gps_published_research.cfm</a>
      </font></p>
    <p><font size='2'>7. <i>Baksa, Barbara, <i>Accounting for Equity Compensation</i>, 12th Edition. (Oakland, CA: National Center for Employee Ownership, 2015).  Available from NCEO at <a href=\"http://www.nceo.org/cep/\">http://www.nceo.org/cep/</a>
     </font></p>
        <p><font size='2'>8. <i>Securities Sources for Equity Compensation</i>, 2014 or 2015 Edition, Certified Equity Professional Institute (Oakland, CA: National Center for Employee Ownership, 2015). Available from NCEO at <a href=\"http://www.nceo.org/cep/\">http://www.nceo.org/cep/</a>
       </font></p>
       <p><font size='2'>9.	<i>Makridis, Takis, <i>Advanced Topics in Equity Compensation Accounting</i>, 5th Edition, (Oakland, CA: National Center for Employee Ownership, 2015).
       </font></p>
      <p><font size='2'>10.	<i>GPS - <i>Global Stock Plans</i>, (CEP Institute, 2009).  Available from NCEO at <a href=\"http://www.nceo.org/cep/\">http://www.nceo.org/cep/</a>.  Also available as a free download at <a href=\"www.scu.edu/business/cepi/gps_published_research.cfm\">www.scu.edu/business/cepi/gps_published_research.cfm</a> 
      </font></p>
       <p><font size='2'>11.	<i>GPS � <i>Performance Awards</i>, (CEP Institute, 2010).  Available from NCEO at <a href=\"http://www.nceo.org/cep/\">http://www.nceo.org/cep/</a>.  Also available as a free download at <a href=\"www.scu.edu/business/cepi/gps_published_research.cfm\">www.scu.edu/business/cepi/gps_published_research.cfm</a>
    </font></p>
     
  <?php
  }
      
 ?>     
      
	<p><font size='2'>Course reviews are often offered by industry organizations throughout the year. Although the CEP Institute
 						makes this information available to candidates, we do not endorse educational programs: it is up to the candidates to 
 						determine whether the program is suitable to their needs. For more information, 
 						please visit: <a href=\"http://www.scu.edu/business/cepi/educational_resources.cfm\">www.scu.edu/business/cepi/educational_resources.cfm</a></font></p>
	<p><font size='2'>Thank you for your interest in the Certified Equity Professional Institute, we look forward to working with you as you move through the certification process.</font></p>
<p><font size='2'>Sincerely,<br>
 
CEP Institute Registrar
</font></p>			
<?php
}
else{
?>
<p><font size='2'><b>Please note:</b> The CEPI updates all study materials on an annual basis.
  		 Materials for 2015 exams will be ready approximately March 1, 2015. Do NOT purchase any of the reference materials for an exam 
  		in 2015 until the CEPI publishes the official material list for 2015. Check the CEPI website at
  		 <a href=\"http://www.scu.edu/business/cepi/cepi_study_materials.cfm\">http://www.scu.edu/business/cepi/cepi_study_materials.cfm</a> for updates. 
  		You will be notified via email when the 2015 study materials are complete. You are responsible for ensuring the CEPI has your correct email address. </td></tr>
Thank you for your interest in the Certified Equity Professional Institute, we look forward to working with you as you move through the certification process.</td></tr>
</font></p>
<p><font size='2'>Sincerely,<br>
 
CEP Institute Registrar
</font></p>
<?php
}
?>
      </tbody>
      </table>

</fieldset>
</div>