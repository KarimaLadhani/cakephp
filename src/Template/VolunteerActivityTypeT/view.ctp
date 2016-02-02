<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Volunteer Activity Type T'), ['action' => 'edit', $volunteerActivityTypeT->Volunteer_Activity_Type_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Volunteer Activity Type T'), ['action' => 'delete', $volunteerActivityTypeT->Volunteer_Activity_Type_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $volunteerActivityTypeT->Volunteer_Activity_Type_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Volunteer Activity Type T'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Volunteer Activity Type T'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="volunteerActivityTypeT view large-10 medium-9 columns">
    <h2><?= h($volunteerActivityTypeT->Volunteer_Activity_Type_ID) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Activity Type') ?></h6>
            <p><?= h($volunteerActivityTypeT->Activity_Type) ?></p>
            <h6 class="subheader"><?= __('Note') ?></h6>
            <p><?= h($volunteerActivityTypeT->Note) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Volunteer Activity Type ID') ?></h6>
            <p><?= $this->Number->format($volunteerActivityTypeT->Volunteer_Activity_Type_ID) ?></p>
            <h6 class="subheader"><?= __('Volunteer ID') ?></h6>
            <p><?= $this->Number->format($volunteerActivityTypeT->Volunteer_ID) ?></p>
            <h6 class="subheader"><?= __('Volunteer Application ID') ?></h6>
            <p><?= $this->Number->format($volunteerActivityTypeT->Volunteer_Application_ID) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Start Particitpation Date') ?></h6>
            <p><?= h($volunteerActivityTypeT->Start_Particitpation_Date) ?></p>
            <h6 class="subheader"><?= __('End Participation Date') ?></h6>
            <p><?= h($volunteerActivityTypeT->End_Participation_Date) ?></p>
        </div>
    </div>
</div>
