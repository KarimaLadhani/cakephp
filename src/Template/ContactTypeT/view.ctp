<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Contact Type T'), ['action' => 'edit', $contactTypeT->Contact_Type_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Contact Type T'), ['action' => 'delete', $contactTypeT->Contact_Type_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $contactTypeT->Contact_Type_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Contact Type T'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contact Type T'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="contactTypeT view large-10 medium-9 columns">
    <h2><?= h($contactTypeT->Contact_Type_ID) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Contact Type') ?></h6>
            <p><?= h($contactTypeT->Contact_Type) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Contact Type ID') ?></h6>
            <p><?= $this->Number->format($contactTypeT->Contact_Type_ID) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Note') ?></h6>
            <?= $this->Text->autoParagraph(h($contactTypeT->Note)); ?>

        </div>
    </div>
</div>
