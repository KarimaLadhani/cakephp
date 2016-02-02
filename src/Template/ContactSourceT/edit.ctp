<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $contactSourceT->Contact_Source_ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $contactSourceT->Contact_Source_ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Contact Source T'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="contactSourceT form large-10 medium-9 columns">
    <?= $this->Form->create($contactSourceT); ?>
    <fieldset>
        <legend><?= __('Edit Contact Source T') ?></legend>
        <?php
            echo $this->Form->input('Contact_ID');
            echo $this->Form->input('Contact_Source_Where');
            echo $this->Form->input('Contact_Source_When', array('empty' => true, 'default' => ''));
            echo $this->Form->input('Note');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
