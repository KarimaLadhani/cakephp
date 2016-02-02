<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Contact Source T'), ['action' => 'edit', $contactSourceT->Contact_Source_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Contact Source T'), ['action' => 'delete', $contactSourceT->Contact_Source_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $contactSourceT->Contact_Source_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Contact Source T'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contact Source T'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="contactSourceT view large-10 medium-9 columns">
    <h2><?= h($contactSourceT->Contact_Source_ID) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Contact Source Where') ?></h6>
            <p><?= h($contactSourceT->Contact_Source_Where) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Contact Source ID') ?></h6>
            <p><?= $this->Number->format($contactSourceT->Contact_Source_ID) ?></p>
            <h6 class="subheader"><?= __('Contact ID') ?></h6>
            <p><?= $this->Number->format($contactSourceT->Contact_ID) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Contact Source When') ?></h6>
            <p><?= h($contactSourceT->Contact_Source_When) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Note') ?></h6>
            <?= $this->Text->autoParagraph(h($contactSourceT->Note)); ?>

        </div>
    </div>
</div>
