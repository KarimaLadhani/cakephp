<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $volunteerActivityT->Volunteer_Activity_ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $volunteerActivityT->Volunteer_Activity_ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Volunteer Activity T'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="volunteerActivityT form large-10 medium-9 columns">
    <?= $this->Form->create($volunteerActivityT); ?>
    <fieldset>
        <legend><?= __('Edit Volunteer Activity T') ?></legend>
        <?php
            echo $this->Form->input('Volunteer_ID');
            echo $this->Form->input('Volunteer_Activity_List_ID');
            echo $this->Form->input('CE_Application_ID');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
