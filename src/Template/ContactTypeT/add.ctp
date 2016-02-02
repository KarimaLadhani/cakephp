<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Contact Type T'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="contactTypeT form large-10 medium-9 columns">
    <?= $this->Form->create($contactTypeT); ?>
    <fieldset>
        <legend><?= __('Add Contact Type T') ?></legend>
        <?php
            echo $this->Form->input('Contact_Type');
            echo $this->Form->input('Note');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
