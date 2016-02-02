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
<?= $this->Form->create(null,['url'=>'https://pilot-payflowlink.paypal.com','type'=>'post']) ?>
<?= $this->Form->input('LOGIN', ['type' => 'hidden','name'=>'LOGIN', 'value' => 'cepicapstone2']); ?>
<?= $this->Form->input('PARTNER', ['type' => 'hidden','name'=>'PARTNER', 'value' => 'PayPal']); ?>
<?= $this->Form->input('AMOUNT', ['type' => 'hidden','name'=>'AMOUNT', 'value' => h($fee)]); ?>
<?= $this->Form->input('TYPE', ['type' => 'hidden','name'=>'TYPE', 'value' =>'S']); ?>
<?= $this->Form->input('USER1', ['type' => 'hidden','name'=>'USER1', 'value' =>h($randregid)]); ?>
<?= $this->Form->input('USER2', ['type' => 'hidden','name'=>'USER2', 'value' =>h($date)]); ?>
<?= $this->Form->input('USER3', ['type' => 'hidden','name'=>'USER3', 'value' =>h($location)]); ?>
<?= $this->Form->input('USER4', ['type' => 'hidden','name'=>'USER4', 'value' =>h($level)]); ?>
<?= $this->Form->input('USER5', ['type' => 'hidden','name'=>'USER5', 'value' =>h($studentId)]); ?>
<?= $this->Form->input('USER9', ['type' => 'hidden','name'=>'USER9', 'value' =>'exam']); ?>
<?= $this->Form->input('SHOWCONFIRM', ['type' => 'hidden','name'=>'SHOWCONFIRM', 'value' =>'False']); ?>
<fieldset>
<legend><?= __('<b><font size="3", color="#93191B">Important: Please read carefully</font></b>') ?></legend>
<p>To complete your registration, click the <b>Pay button</b> below. You will be redirected to Verisign.Your registration is <b>not complete</b> until you receive the confirmation page.
If you do not receive the confirmation page, please contact the CEPI at (408) 554-2187 or cepi@scu.edu.</p>
<?= $this->Form->button('Pay',array('name' => 'ok')); ?>
</fieldset>
<?= $this->Form->end() ?>
</div>
