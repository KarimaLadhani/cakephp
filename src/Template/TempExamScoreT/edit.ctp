<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tempExamScoreT->Student_ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tempExamScoreT->Student_ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Temp Exam Score T'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="tempExamScoreT form large-10 medium-9 columns">
    <?= $this->Form->create($tempExamScoreT); ?>
    <fieldset>
        <legend><?= __('Edit Temp Exam Score T') ?></legend>
        <?php
            echo $this->Form->input('Exam_ID');
            echo $this->Form->input('Raw_Passing_Score');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
