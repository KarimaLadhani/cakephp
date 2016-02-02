<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Volunteer Knowledge T'), ['action' => 'edit', $volunteerKnowledgeT->Volunteer_Knowledge_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Volunteer Knowledge T'), ['action' => 'delete', $volunteerKnowledgeT->Volunteer_Knowledge_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $volunteerKnowledgeT->Volunteer_Knowledge_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Volunteer Knowledge T'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Volunteer Knowledge T'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="volunteerKnowledgeT view large-10 medium-9 columns">
    <h2><?= h($volunteerKnowledgeT->Volunteer_Knowledge_ID) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Knowledge Area') ?></h6>
            <p><?= h($volunteerKnowledgeT->Knowledge_Area) ?></p>
            <h6 class="subheader"><?= __('Knowledge Level') ?></h6>
            <p><?= h($volunteerKnowledgeT->Knowledge_Level) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Volunteer Knowledge ID') ?></h6>
            <p><?= $this->Number->format($volunteerKnowledgeT->Volunteer_Knowledge_ID) ?></p>
            <h6 class="subheader"><?= __('Volunteer ID') ?></h6>
            <p><?= $this->Number->format($volunteerKnowledgeT->Volunteer_ID) ?></p>
            <h6 class="subheader"><?= __('Volunteer Application ID') ?></h6>
            <p><?= $this->Number->format($volunteerKnowledgeT->Volunteer_Application_ID) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Note') ?></h6>
            <?= $this->Text->autoParagraph(h($volunteerKnowledgeT->Note)); ?>

        </div>
    </div>
</div>
