<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $studentT->Student_ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $studentT->Student_ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Student T'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="studentT form large-10 medium-9 columns">
    <?= $this->Form->create($studentT); ?>
    <fieldset>
        <legend><?= __('Edit Student T') ?></legend>
        <?php
            echo $this->Form->input('Purpose_For_Enrollment');
            echo $this->Form->input('Referred_By');
            echo $this->Form->input('Highest_Education_Level');
            echo $this->Form->input('Highest_Level_Passed');
            echo $this->Form->input('Last_Update_Date_Time');
            echo $this->Form->input('Note');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
