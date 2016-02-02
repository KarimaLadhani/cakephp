<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Contact Correspondence T'), ['action' => 'edit', $contactCorrespondenceT->Contact_Correspondence_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Contact Correspondence T'), ['action' => 'delete', $contactCorrespondenceT->Contact_Correspondence_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $contactCorrespondenceT->Contact_Correspondence_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Contact Correspondence T'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contact Correspondence T'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="contactCorrespondenceT view large-10 medium-9 columns">
    <h2><?= h($contactCorrespondenceT->Contact_Correspondence_ID) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Correspondence Type') ?></h6>
            <p><?= h($contactCorrespondenceT->Correspondence_Type) ?></p>
            <h6 class="subheader"><?= __('Correspondence Time') ?></h6>
            <p><?= h($contactCorrespondenceT->Correspondence_Time) ?></p>
            <h6 class="subheader"><?= __('Subject') ?></h6>
            <p><?= h($contactCorrespondenceT->Subject) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Contact Correspondence ID') ?></h6>
            <p><?= $this->Number->format($contactCorrespondenceT->Contact_Correspondence_ID) ?></p>
            <h6 class="subheader"><?= __('Contact ID') ?></h6>
            <p><?= $this->Number->format($contactCorrespondenceT->Contact_ID) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Correspondence Date') ?></h6>
            <p><?= h($contactCorrespondenceT->Correspondence_Date) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Note') ?></h6>
            <?= $this->Text->autoParagraph(h($contactCorrespondenceT->Note)); ?>

        </div>
    </div>
</div>
