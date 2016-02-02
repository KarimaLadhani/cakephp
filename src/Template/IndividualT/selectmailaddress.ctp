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
<?= $this->Form->create() ?>

<fieldset>
<legend><?= __('<b><font size="3", color="#93191B">Select Mailing Address</font></b>') ?></legend>

               
<div>
<legend><?= __('<b><font size="2", color=red>Your CEP Exam Study Binder will be shipped via UPS Ground and will require a signature for delivery.<br />
Please choose the address where you prefer that your binder be shipped.</font></b>' ) ?></legend>
 <fieldset>
        <?= $this->Form->radio('shippingAddress', array('home'=>h($primaryAddress),'work'=>h($currentWorkAddress)));?>           
</fieldset>
</div> 


<?= $this->Form->button(('Continue'),array('name' => 'ok')); ?>
<?= $this->Form->button(('Back'),array('name' => 'cancel')); ?>
</fieldset>
<?= $this->Form->end() ?>
</div>
