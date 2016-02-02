<div class="actions columns large-2 medium-3">
    <h5><?= __('The CEP Institute') ?></h5>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Home'), ['action' => 'dashboard']) ?></li>
		<li><?= $this->Html->link(__('Change Login/Password'), ['action' => 'usereditlogin'  ]) ?></li>
        <li><?= $this->Html->link(__('Edit User Profile'), ['action' => 'usereditprofile']) ?></li>
        <li><?= $this->Html->link(__('Change Work Information'), ['action' => 'changeworkinfo']) ?></li>
        <li><?= $this->Html->link(__('Register for Exam'), ['action' =>'registerexam']) ?></li>
        <li><?= $this->Html->link(__('View Exam History'), ['action' => 'viewexamhistory']) ?></li>
        <li><?= $this->Html->link(__('Logout'), ['controller'=>'IndividualT','action' => 'logout']) ?></li>               
    </ul>
</div>
<div>		
			<h3 class="subheader">Edit Login Information Password</h3>
				<p><i>Leave password fields blank if you only want to change your primary email address.</i></p>						
							<div class="users form">
						<?= $this->Flash->render('auth') ?>
						<?= $this->Form->create() ?>
	    					<fieldset>
	        					<legend><?= __('Change Primary Email Address') ?></legend>
	        					<?= $this->Form->input('Email_Address', ['type' => 'email','name'=>'email','value'=>h($email)]); ?>	        					
	    					</fieldset>	    					
	    					<fieldset>
	        					<legend><?= __('Please enter password of minimum 8 characters') ?></legend>
	        					<?= $this->Form->input('Change_Password', ['type' => 'password','name'=>'passwd']); ?>
	        					<?= $this->Form->input('Repeat_Password',['type' => 'password','name'=>'confirmpasswd']) ?>
	    					</fieldset>
						<?= $this->Form->button(('Submit'),array('name' => 'ok')); ?>
						<?= $this->Form->button(('Back'),array('name' => 'cancel')); ?>
						<?= $this->Form->end() ?>
					</div>			
</div>
	
