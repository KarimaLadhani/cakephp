<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Ce Activity List T'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="ceActivityListT form large-10 medium-9 columns">
    <?= $this->Form->create($ceActivityListT); ?>
    <fieldset>
        <legend><?= __('Add Ce Activity List T') ?></legend>
        <?php
            echo $this->Form->input('Course_Date', array('empty' => true, 'default' => ''));
            echo $this->Form->input('Provider_Name');
            echo $this->Form->input('Course_Title');
            echo $this->Form->input('Discipline');
            echo $this->Form->input('Others');
            echo $this->Form->input('Number_of_Credit_Hours');
            echo $this->Form->input('Note');
            echo $this->Form->input('Is_Active');
            echo $this->Form->input('Event');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
