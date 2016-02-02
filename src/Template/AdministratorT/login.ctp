
<meta name="Description" id="Description" content="f">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link  rel="stylesheet" media="screen" href="style/template-base-level-2.css">
<link rel="stylesheet" type="text/css" href="style/template-subjectnav.css">
<link rel="stylesheet" type="text/css" href="user.css">
<link REL=StyleSheet HREF="formatStyles.css" TYPE="text/css" MEDIA=screen,print>
<script language="JavaScript" src="gen_validatorv31.js" type="text/javascript"></script>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
if($.browser.msie && $.browser.version=="6.0") {
alert("You appear to be using Internet Explorer 6. MyCEP is not guaranteed to work on IE6 and may result in blank pages. Please upgrade to IE7+ or Mozilla Firefox. There are links at the bottom of the page");
}
</script>
		
	<div align='center'>
		<table  class="indexpagetable">
			<tr><td><h3 class="h3"> CEPI Information Management System - Existing Users login below</h3></td></tr>			
			<tr><td>
					<div class="users form">
						<?= $this->Flash->render('auth') ?>
						<?= $this->Form->create() ?>
	    					<fieldset>
	        					<legend><?= __('Please enter your username and password') ?></legend>
	        					<?= $this->Form->input('Admin_Username', ['type'=>'text','required' => true]); ?>
	        					<?= $this->Form->input('Admin_Password',['type' => 'password','required' => true]) ?>
	    					</fieldset>
						<?= $this->Form->button(__('Login')); ?>
						<?= $this->Form->end() ?>
					</div>
				</td>
			</tr>
		</table>
	</div>	

