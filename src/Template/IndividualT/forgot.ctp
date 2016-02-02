	<div align='center'>
		<table  class="indexpagetable">
			<tr><td>
					<table class="indexpagetable">
						<tr><td><h3 class="subheader">Forgot Password</h3>
						<p><i>A new password will be generated for you and sent to the email address associated with your account.</i></p>						
						</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr><td>
					<div class="users form">
						<?= $this->Flash->render('auth') ?>
						<?= $this->Form->create() ?>
	    					<fieldset>
	        					<legend><?= __('Please enter your E-mail address and Last Name') ?></legend>
	        					<?= $this->Form->input('Email_Address', ['type' => 'email','required' => true]); ?>
	        					<?= $this->Form->input('Last_Name',['required' => true]) ?>
	    					</fieldset>
						<?= $this->Form->button(__('Submit')); ?>
						<?= $this->Form->end() ?>
					</div>
				</td>
			</tr>
		</table>
	</div>
	
