<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Volunteer Interest T'), ['action' => 'edit', $volunteerInterestT->Volunteer_Interest_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Volunteer Interest T'), ['action' => 'delete', $volunteerInterestT->Volunteer_Interest_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $volunteerInterestT->Volunteer_Interest_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Volunteer Interest T'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Volunteer Interest T'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="volunteerInterestT view large-10 medium-9 columns">
    <h2><?= h($volunteerInterestT->Volunteer_Interest_ID) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Interest Type') ?></h6>
            <p><?= h($volunteerInterestT->Interest_Type) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Volunteer Interest ID') ?></h6>
            <p><?= $this->Number->format($volunteerInterestT->Volunteer_Interest_ID) ?></p>
            <h6 class="subheader"><?= __('Volunteer ID') ?></h6>
            <p><?= $this->Number->format($volunteerInterestT->Volunteer_ID) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Note') ?></h6>
            <?= $this->Text->autoParagraph(h($volunteerInterestT->Note)); ?>

        </div>
    </div>
</div>
