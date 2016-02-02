<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Contact Source T'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="contactSourceT form large-10 medium-9 columns">
    <?= $this->Form->create($contactSourceT); ?>
    <fieldset>
        <legend><?= __('Add Contact Source T') ?></legend>
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
