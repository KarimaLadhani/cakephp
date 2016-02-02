<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $contactT->Contact_ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $contactT->Contact_ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Contact T'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="contactT form large-10 medium-9 columns">
    <?= $this->Form->create($contactT); ?>
    <fieldset>
        <legend><?= __('Edit Contact T') ?></legend>
        <?php
            echo $this->Form->input('Region');
            echo $this->Form->input('Last_Meeting_Date', array('empty' => true, 'default' => ''));
            echo $this->Form->input('Referred_By');
            echo $this->Form->input('Contact_Type');
            echo $this->Form->input('Date_Created', array('empty' => true, 'default' => ''));
            echo $this->Form->input('Note');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
