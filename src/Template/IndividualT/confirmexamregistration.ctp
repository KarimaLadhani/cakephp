<div class="actions columns large-2 medium-3">
    <h5><?= __('The CEP Institute') ?></h5>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Home'), ['action' => 'dashboard']) ?></li>
		<li><?= $this->Html->link(__('Change Login/Password'), ['action' => 'usereditlogin']) ?></li>
        <li><?= $this->Html->link(__('Edit User Profile'), ['action' => 'usereditprofile']) ?></li>
        <li><?= $this->Html->link(__('Change Work Information'), ['action' => 'changeworkinfo']) ?></li>
        <li><?= $this->Html->link(__('Register for Exam'), ['action' =>'registerexam']) ?></li>
        <li><?= $this->Html->link(__('View Exam History'), ['action' => 'viewexamhistory']) ?></li>
        <li><?= $this->Html->link(__('Logout'), ['controller'=>'IndividualT','action' => 'logout']) ?></li>               
    </ul>
</div>
<div class=topmargin></div>
<div class="users form">
<?= $this->Form->create() ?>
<fieldset>
<legend><?= __('<b><font size="3", color="#93191B">Please confirm that you are registering for the following exam:</font></b>') ?></legend>             
 <table cellpadding="0" cellspacing="0">
     <tbody>
      <tr><td><h6 class="subheader"><?= __('Date:') ?></td><td><?= h($date) ?></td></tr>            
      <tr><td><h6 class="subheader"><?= __('Level:')  ?></h6><td><?= h($level) ?></td></tr>  
      <tr><td><h6 class="subheader"><?= __('Location:') ?></h6></td><td><?= h($location) ?></td></tr>
      <tr><td><h6 class="subheader"><?= __('Disability accomodations required?') ?></h6></td><td><?= h($disabled) ?></td></tr>
      <tr><td><h6 class="subheader"><?= __('Non-Saturday admission required?') ?></h6></td><td><?= h($satadmission) ?></td></tr>
      <tr><td><h6 class="subheader"><?= __('Release authorization for exam study groups?') ?></h6></td><td><?= h($releaseInfo) ?></td></tr>
      <tr><td><h6 class="subheader"><?= __('Registration Fees:') ?></h6></td><td><?= h($fee) ?></td></tr>
	<?php
	if(strcmp($paymentMethod,'paycode')==0)
	 echo "<tr><td><h6 class='subheader'>Payment Code:</h6></td><td>$paymentCode</td></tr>";	 
	?>     
      <tr><td><h6 class="subheader"><?= __('Mailing Address: ') ?></h6></td><td><?= h($selectedAddress) ?></td></tr>
    </tbody>
</table>
	<legend><?= __('<b><font size="3", color="#93191B">To confirm this registration, click on the Confirm button below.To cancel, click on the Cancel button.</font></b>') ?></legend></br>
	<?php	
		if(strcmp($paymentMethod,'check')==0)
			echo "</br><b><font size='3', color='#93191B'>If paying via check, please note that payment is due within 15 days
 			of the date of registration. Registration will not be complete and study materials not sent 
 			until payment is received. Additionally, your registration will be cancelled if payment is not received within 15 days of the
  			date of registration.<br />&nbsp;<br />Please contact the CEPI at <u style='color:blue'>408-554-2187</u> 
  			with any questions.</br></br><span style='color:#8E7A4A'>Checks should be made payable to CEPI and mailed to: 
  			<br />CEPI, Santa Clara University<br /> 500 El Camino Real,<br /> Santa Clara, CA, 95053-0400 </span></font></b>";

		else if (strcmp($paymentMethod,'credit')==0)
			echo "<b><font size='3', color='#93191B'>To complete your registration, click the Confirm button. You will be redirected 
				  to Verisign. Your registration is <u><i>NOT COMPLETE</i></u> until you receive the confirmation page.</br></br><span style='color:#8E7A4A'>If you 
				  do not receive the confirmation page, please contact the CEPI at (408) 554-2187 or cepi@scu.edu.</span></font></b>";
	
	
	
	
	
	
	
	
	
	
	?>

<?= $this->Form->button(('Confirm'),array('name' => 'ok')); ?>
<?= $this->Form->button(('Cancel'),array('name' => 'cancel')); ?>
</fieldset>
<?= $this->Form->end() ?>
</div>
