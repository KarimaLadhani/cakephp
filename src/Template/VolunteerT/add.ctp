<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Volunteer T'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="volunteerT form large-10 medium-9 columns">
    <?= $this->Form->create($volunteerT); ?>
    <fieldset>
        <legend><?= __('Add Volunteer T') ?></legend>
        <?php
            echo $this->Form->input('Cep_ID');
            echo $this->Form->input('College1');
            echo $this->Form->input('Degree1');
            echo $this->Form->input('Major1');
            echo $this->Form->input('College2');
            echo $this->Form->input('Degree2');
            echo $this->Form->input('Major2');
            echo $this->Form->input('Volunteer_Interest');
            echo $this->Form->input('Sample_Item');
            echo $this->Form->input('Approval_Flag');
            echo $this->Form->input('Note');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
