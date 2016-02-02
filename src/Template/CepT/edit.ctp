<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cepT->Cep_ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cepT->Cep_ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cep T'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="cepT form large-10 medium-9 columns">
    <?= $this->Form->create($cepT); ?>
    <fieldset>
        <legend><?= __('Edit Cep T') ?></legend>
        <?php
            echo $this->Form->input('Student_ID');
            echo $this->Form->input('Up_To_Date');
            echo $this->Form->input('Active');
            echo $this->Form->input('Date_Received', array('empty' => true, 'default' => ''));
            echo $this->Form->input('Due_Date', array('empty' => true, 'default' => ''));
            echo $this->Form->input('Note');
            echo $this->Form->input('Display_First_Name');
            echo $this->Form->input('Display_Last_Name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
