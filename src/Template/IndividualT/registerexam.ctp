<script>
$(function() {
$("select[data-val^=paymentcode]")
  .change(function () {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;    
  	//paymentcode587
    var selectedId=$(this).attr('data-val');
    var inputcode="paycodeinput"+selectedId.substring(11); 
  	if(valueSelected=='paycode'){
  	$('#'+selectedId).show();   	  	 	
  	$('#'+inputcode).attr('required','true');	
  	}
  	else{
  	$('#'+selectedId).hide();
  	$('#'+inputcode).removeAttr('required');
  	}
  
  });    
    });
   </script>
<div class="actions columns large-2 medium-3">
    <h5><?= __('The CEP Institute') ?></h5>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Home'), ['action' => 'dashboard']) ?></li>
		<li><?= $this->Html->link(__('Change Login/Password'), ['action' => 'usereditlogin' ]) ?></li>
        <li><?= $this->Html->link(__('Edit User Profile'), ['action' => 'usereditprofile']) ?></li>
        <li><?= $this->Html->link(__('Change Work Information'), ['action' => 'changeworkinfo']) ?></li>
        <li><?= $this->Html->link(__('Register for Exam'), ['action' =>'registerexam']) ?></li>
        <li><?= $this->Html->link(__('View Exam History'), ['action' => 'viewexamhistory']) ?></li>
        <li><?= $this->Html->link(__('Logout'), ['controller'=>'IndividualT','action' => 'logout']) ?></li>               
    </ul>
</div>
<div class=topmargin></div>
<div class="users form">
<fieldset>
<legend><?= __('<b><font size="3", color="#93191B">Exam Options:</font><font size="2", color="#93191B"> Please choose from the following exams</font></b>') ?></legend>
<?php foreach ($results as $exam): ?>
<?= $this->Form->create($exam->Exam_ID) ?>     
<div>
	 <fieldset>
	        <legend><?= __('<b><font size="2">Exam Date is '.h(date('l, F d, Y',strtotime($exam->Exam_Date))).'</font></b>'  ) ?></legend>
	        <legend><?= __('<b><font size="2", color=red>Registration deadline is '.h(date('l, F d, Y',strtotime($exam->Registration_Deadline))).'</font></b>' ) ?></legend>
	      <br>        
	        <?= $this->Form->hidden('exam',array('type'=>'text','label'=>'exam','value'=> h($exam->Exam_ID)  )); ?>
	        <?= $this->Form->input('locations',array('type'=>'select','label'=>'Exam Location Selection','options'=> h($examloc[$exam->Exam_ID]))); ?>
	 		<?= $this->Form->input('examregoptions'.h($exam->Exam_ID),array('label'=>'','type'=>'select', 'multiple'=>'checkbox',
	           'options'=>array('disabled'=>'I require disability accomodations', 
	           'satadmission'=>'I require non Saturday admission',
	           'releaseInfo'=>'	I would like to release my name, phone number,email address and course level to other CEP Institute students interested in exam preparation study groups'
	           ))); ?>
	        <?= $this->Form->input('payment',array('type'=>'select','label'=>'Type of Payment','data-val'=>'paymentcode'.h($exam->Exam_ID),
	        														'value'=>'credit','options'=>['credit'=>'Credit Card','check'=>'Check','paycode'=>'Payment Code'])); ?>     	        
			<div id='paymentcode<?= h($exam->Exam_ID)?>' style='display:none'>
					<?= $this->Form->input('paycodeinput'.h($exam->Exam_ID),array('type'=>'text','label'=>'Enter Payment Code:','id'=>'paycodeinput'. h($exam->Exam_ID)     )); ?>
					<legend><?= __('<b><font size="2", color="#93191B">I understand that by registering with a company-issued payment code this registration is the property of the company.The sponsoring company can cancel the registration without my consent. 
																	I also understand that the company can require the release of my exam results to a designated representative of the company.
	 																To comply with FERPA regulations, please complete the release form located at (<a href="/content/Release_form_2014.pdf" target="blank">Release Form</a>) and return it to the CEPI. </font></b>') ?></legend>
					</br>
					<legend><?= __('<b><font size="2", color="red">NOTE: If you do not agree to these terms and conditions, you must register using a personal credit card or personal check.</font></b>') ?></legend>
			</div>
	<?= $this->Form->button(('Register'),array('name' => 'ok')); ?>
	<?= $this->Form->button(('Back'),array('name' => 'cancel')); ?>
	</fieldset>
</div> 
<?= $this->Form->end() ?>
<?php endforeach; ?>
</fieldset>
</div>




