<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Volunteer Application T'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="volunteerApplicationT form large-10 medium-9 columns">
    <?= $this->Form->create($volunteerApplicationT); ?>
    <fieldset>
        <legend><?= __('Add Volunteer Application T') ?></legend>
        <?php
            echo $this->Form->input('Volunteer_ID');
            echo $this->Form->input('Application_Date', array('empty' => true, 'default' => ''));
            echo $this->Form->input('Application_Approval_Flag');
            echo $this->Form->input('Application_Approval_Date', array('empty' => true, 'default' => ''));
            echo $this->Form->input('Performance_Scale');
            echo $this->Form->input('Note');
            echo $this->Form->input('Rejection_Reason');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
