<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $volunteerActivityListT->Volunteer_Activity_List_ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $volunteerActivityListT->Volunteer_Activity_List_ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Volunteer Activity List T'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="volunteerActivityListT form large-10 medium-9 columns">
    <?= $this->Form->create($volunteerActivityListT); ?>
    <fieldset>
        <legend><?= __('Edit Volunteer Activity List T') ?></legend>
        <?php
            echo $this->Form->input('Title');
            echo $this->Form->input('Date');
            echo $this->Form->input('Hours');
            echo $this->Form->input('Note');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
