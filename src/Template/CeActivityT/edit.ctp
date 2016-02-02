<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ceActivityT->Ce_Activity_ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ceActivityT->Ce_Activity_ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ce Activity T'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="ceActivityT form large-10 medium-9 columns">
    <?= $this->Form->create($ceActivityT); ?>
    <fieldset>
        <legend><?= __('Edit Ce Activity T') ?></legend>
        <?php
            echo $this->Form->input('Ce_Application_ID');
            echo $this->Form->input('Cep_ID');
            echo $this->Form->input('Course_Date', array('empty' => true, 'default' => ''));
            echo $this->Form->input('Provider_Name');
            echo $this->Form->input('Course_Title');
            echo $this->Form->input('Discipline');
            echo $this->Form->input('Others');
            echo $this->Form->input('Number_of_Credit_Hours');
            echo $this->Form->input('Note');
            echo $this->Form->input('Pre_Approved');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
