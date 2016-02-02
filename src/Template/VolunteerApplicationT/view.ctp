<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Volunteer Application T'), ['action' => 'edit', $volunteerApplicationT->Volunteer_Application_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Volunteer Application T'), ['action' => 'delete', $volunteerApplicationT->Volunteer_Application_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $volunteerApplicationT->Volunteer_Application_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Volunteer Application T'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Volunteer Application T'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="volunteerApplicationT view large-10 medium-9 columns">
    <h2><?= h($volunteerApplicationT->Volunteer_Application_ID) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Application Approval Flag') ?></h6>
            <p><?= h($volunteerApplicationT->Application_Approval_Flag) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Volunteer Application ID') ?></h6>
            <p><?= $this->Number->format($volunteerApplicationT->Volunteer_Application_ID) ?></p>
            <h6 class="subheader"><?= __('Volunteer ID') ?></h6>
            <p><?= $this->Number->format($volunteerApplicationT->Volunteer_ID) ?></p>
            <h6 class="subheader"><?= __('Performance Scale') ?></h6>
            <p><?= $this->Number->format($volunteerApplicationT->Performance_Scale) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Application Date') ?></h6>
            <p><?= h($volunteerApplicationT->Application_Date) ?></p>
            <h6 class="subheader"><?= __('Application Approval Date') ?></h6>
            <p><?= h($volunteerApplicationT->Application_Approval_Date) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Note') ?></h6>
            <?= $this->Text->autoParagraph(h($volunteerApplicationT->Note)); ?>

        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Rejection Reason') ?></h6>
            <?= $this->Text->autoParagraph(h($volunteerApplicationT->Rejection_Reason)); ?>

        </div>
    </div>
</div>
