
	<div align='center'>
		<table  class="indexpagetable">
			<tr><td><h3 class="h3"> CEPI Information Management System </h3></td>
			</tr>
			<tr><td>
					<table class="indexpagetable">
						<tr><td><h3 class="subheader">Existing users login below</h3></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr><td>
					<div class="users form">
						<?= $this->Flash->render('auth') ?>
						<?= $this->Form->create() ?>
	    					<fieldset>
	        					<legend><?= __('Please enter your username and password') ?></legend>
	        					<?= $this->Form->input('Email_Address', ['type' => 'email','required' => true]); ?>
	        					<?= $this->Form->input('Password',['type' => 'password','required' => true]) ?>
	    					</fieldset>
						<?= $this->Form->button(__('Login')); ?>
						<?= $this->Form->end() ?>
					</div>
				</td>
			</tr>
			<tr><td><div class="topmargin" ></div>
					<table class="indexpagetable">
						<tr><td><h3 class="subheader">If you are a new user or have forgotten your password use the links below:</h3></td>
						</tr>
						<tr><td><a href='/register'>Register as new user</a></td>
						</tr>
						<tr><td><a href="/forgot">Forgot Password (Password Reset)</a></td>
						</tr>
				
					</table>
			</td></tr>
		</table>
	</div>
	<div id="page-index" align="center">
		<p class="bodytext">This site is best viewed with Microsoft Internet Explorer 7.0+ or Firefox 3.0+.  Please visit the links below to download and install the latest version of your browser.</p>
		<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx">Microsoft Internet Explorer</a><br>&nbsp;<br>
		<a href="http://www.mozilla.com/en-US/firefox/ie.html">Firefox</a>
	</div> 

