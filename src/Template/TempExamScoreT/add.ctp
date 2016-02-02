<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Temp Exam Score T'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="tempExamScoreT form large-10 medium-9 columns">
    <?= $this->Form->create($tempExamScoreT); ?>
    <fieldset>
        <legend><?= __('Add Temp Exam Score T') ?></legend>
        <?php
            echo $this->Form->input('Exam_ID');
            echo $this->Form->input('Raw_Passing_Score');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
