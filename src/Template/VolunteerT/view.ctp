<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Volunteer T'), ['action' => 'edit', $volunteerT->Volunteer_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Volunteer T'), ['action' => 'delete', $volunteerT->Volunteer_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $volunteerT->Volunteer_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Volunteer T'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Volunteer T'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="volunteerT view large-10 medium-9 columns">
    <h2><?= h($volunteerT->Volunteer_ID) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('College1') ?></h6>
            <p><?= h($volunteerT->College1) ?></p>
            <h6 class="subheader"><?= __('Degree1') ?></h6>
            <p><?= h($volunteerT->Degree1) ?></p>
            <h6 class="subheader"><?= __('Major1') ?></h6>
            <p><?= h($volunteerT->Major1) ?></p>
            <h6 class="subheader"><?= __('College2') ?></h6>
            <p><?= h($volunteerT->College2) ?></p>
            <h6 class="subheader"><?= __('Degree2') ?></h6>
            <p><?= h($volunteerT->Degree2) ?></p>
            <h6 class="subheader"><?= __('Major2') ?></h6>
            <p><?= h($volunteerT->Major2) ?></p>
            <h6 class="subheader"><?= __('Volunteer Interest') ?></h6>
            <p><?= h($volunteerT->Volunteer_Interest) ?></p>
            <h6 class="subheader"><?= __('Approval Flag') ?></h6>
            <p><?= h($volunteerT->Approval_Flag) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Volunteer ID') ?></h6>
            <p><?= $this->Number->format($volunteerT->Volunteer_ID) ?></p>
            <h6 class="subheader"><?= __('Cep ID') ?></h6>
            <p><?= $this->Number->format($volunteerT->Cep_ID) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Sample Item') ?></h6>
            <?= $this->Text->autoParagraph(h($volunteerT->Sample_Item)); ?>

        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Note') ?></h6>
            <?= $this->Text->autoParagraph(h($volunteerT->Note)); ?>

        </div>
    </div>
</div>
