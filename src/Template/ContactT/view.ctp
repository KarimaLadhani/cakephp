<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Contact T'), ['action' => 'edit', $contactT->Contact_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Contact T'), ['action' => 'delete', $contactT->Contact_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $contactT->Contact_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Contact T'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contact T'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="contactT view large-10 medium-9 columns">
    <h2><?= h($contactT->Contact_ID) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Region') ?></h6>
            <p><?= h($contactT->Region) ?></p>
            <h6 class="subheader"><?= __('Referred By') ?></h6>
            <p><?= h($contactT->Referred_By) ?></p>
            <h6 class="subheader"><?= __('Contact Type') ?></h6>
            <p><?= h($contactT->Contact_Type) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Contact ID') ?></h6>
            <p><?= $this->Number->format($contactT->Contact_ID) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Last Meeting Date') ?></h6>
            <p><?= h($contactT->Last_Meeting_Date) ?></p>
            <h6 class="subheader"><?= __('Date Created') ?></h6>
            <p><?= h($contactT->Date_Created) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Note') ?></h6>
            <?= $this->Text->autoParagraph(h($contactT->Note)); ?>

        </div>
    </div>
</div>
