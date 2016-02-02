<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Volunteer Material Sent Info T'), ['action' => 'edit', $volunteerMaterialSentInfoT->Volunteer_Material_Sent_Info_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Volunteer Material Sent Info T'), ['action' => 'delete', $volunteerMaterialSentInfoT->Volunteer_Material_Sent_Info_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $volunteerMaterialSentInfoT->Volunteer_Material_Sent_Info_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Volunteer Material Sent Info T'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Volunteer Material Sent Info T'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="volunteerMaterialSentInfoT view large-10 medium-9 columns">
    <h2><?= h($volunteerMaterialSentInfoT->Volunteer_Material_Sent_Info_ID) ?></h2>
    <div class="row">
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Volunteer Material Sent Info ID') ?></h6>
            <p><?= $this->Number->format($volunteerMaterialSentInfoT->Volunteer_Material_Sent_Info_ID) ?></p>
            <h6 class="subheader"><?= __('Volunteer ID') ?></h6>
            <p><?= $this->Number->format($volunteerMaterialSentInfoT->Volunteer_ID) ?></p>
            <h6 class="subheader"><?= __('Volunteer Application ID') ?></h6>
            <p><?= $this->Number->format($volunteerMaterialSentInfoT->Volunteer_Application_ID) ?></p>
            <h6 class="subheader"><?= __('Level') ?></h6>
            <p><?= $this->Number->format($volunteerMaterialSentInfoT->Level) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Volunteer Material Sent Date') ?></h6>
            <p><?= h($volunteerMaterialSentInfoT->Volunteer_Material_Sent_Date) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Note') ?></h6>
            <?= $this->Text->autoParagraph(h($volunteerMaterialSentInfoT->Note)); ?>

        </div>
    </div>
</div>
