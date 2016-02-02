<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Temp Exam Score T'), ['action' => 'edit', $tempExamScoreT->Student_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Temp Exam Score T'), ['action' => 'delete', $tempExamScoreT->Student_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $tempExamScoreT->Student_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Temp Exam Score T'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Temp Exam Score T'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="tempExamScoreT view large-10 medium-9 columns">
    <h2><?= h($tempExamScoreT->Student_ID) ?></h2>
    <div class="row">
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Student ID') ?></h6>
            <p><?= $this->Number->format($tempExamScoreT->Student_ID) ?></p>
            <h6 class="subheader"><?= __('Exam ID') ?></h6>
            <p><?= $this->Number->format($tempExamScoreT->Exam_ID) ?></p>
            <h6 class="subheader"><?= __('Raw Passing Score') ?></h6>
            <p><?= $this->Number->format($tempExamScoreT->Raw_Passing_Score) ?></p>
        </div>
    </div>
</div>
