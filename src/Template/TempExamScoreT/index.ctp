<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Temp Exam Score T'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="tempExamScoreT index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Student_ID') ?></th>
            <th><?= $this->Paginator->sort('Exam_ID') ?></th>
            <th><?= $this->Paginator->sort('Raw_Passing_Score') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($tempExamScoreT as $tempExamScoreT): ?>
        <tr>
            <td><?= $this->Number->format($tempExamScoreT->Student_ID) ?></td>
            <td><?= $this->Number->format($tempExamScoreT->Exam_ID) ?></td>
            <td><?= $this->Number->format($tempExamScoreT->Raw_Passing_Score) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $tempExamScoreT->Student_ID]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tempExamScoreT->Student_ID]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tempExamScoreT->Student_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $tempExamScoreT->Student_ID)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
