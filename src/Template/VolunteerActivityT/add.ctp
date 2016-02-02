<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Volunteer Activity T'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="volunteerActivityT form large-10 medium-9 columns">
    <?= $this->Form->create($volunteerActivityT); ?>
    <fieldset>
        <legend><?= __('Add Volunteer Activity T') ?></legend>
        <?php
            echo $this->Form->input('Volunteer_ID');
            echo $this->Form->input('Volunteer_Activity_List_ID');
            echo $this->Form->input('CE_Application_ID');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
