<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Volunteer Activity T'), ['action' => 'edit', $volunteerActivityT->Volunteer_Activity_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Volunteer Activity T'), ['action' => 'delete', $volunteerActivityT->Volunteer_Activity_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $volunteerActivityT->Volunteer_Activity_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Volunteer Activity T'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Volunteer Activity T'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="volunteerActivityT view large-10 medium-9 columns">
    <h2><?= h($volunteerActivityT->Volunteer_Activity_ID) ?></h2>
    <div class="row">
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Volunteer Activity ID') ?></h6>
            <p><?= $this->Number->format($volunteerActivityT->Volunteer_Activity_ID) ?></p>
            <h6 class="subheader"><?= __('Volunteer ID') ?></h6>
            <p><?= $this->Number->format($volunteerActivityT->Volunteer_ID) ?></p>
            <h6 class="subheader"><?= __('Volunteer Activity List ID') ?></h6>
            <p><?= $this->Number->format($volunteerActivityT->Volunteer_Activity_List_ID) ?></p>
            <h6 class="subheader"><?= __('CE Application ID') ?></h6>
            <p><?= $this->Number->format($volunteerActivityT->CE_Application_ID) ?></p>
        </div>
    </div>
</div>
