<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Volunteer Activity List T'), ['action' => 'edit', $volunteerActivityListT->Volunteer_Activity_List_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Volunteer Activity List T'), ['action' => 'delete', $volunteerActivityListT->Volunteer_Activity_List_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $volunteerActivityListT->Volunteer_Activity_List_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Volunteer Activity List T'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Volunteer Activity List T'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="volunteerActivityListT view large-10 medium-9 columns">
    <h2><?= h($volunteerActivityListT->Volunteer_Activity_List_ID) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Title') ?></h6>
            <p><?= h($volunteerActivityListT->Title) ?></p>
            <h6 class="subheader"><?= __('Note') ?></h6>
            <p><?= h($volunteerActivityListT->Note) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Volunteer Activity List ID') ?></h6>
            <p><?= $this->Number->format($volunteerActivityListT->Volunteer_Activity_List_ID) ?></p>
            <h6 class="subheader"><?= __('Hours') ?></h6>
            <p><?= $this->Number->format($volunteerActivityListT->Hours) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date') ?></h6>
            <p><?= h($volunteerActivityListT->Date) ?></p>
        </div>
    </div>
</div>
