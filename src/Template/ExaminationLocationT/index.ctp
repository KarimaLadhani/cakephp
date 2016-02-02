<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Examination Location T'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="examinationLocationT index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Exam_Location_ID') ?></th>
            <th><?= $this->Paginator->sort('Exam_ID') ?></th>
            <th><?= $this->Paginator->sort('System_Date_Time') ?></th>
            <th><?= $this->Paginator->sort('Location_Name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($examinationLocationT as $examinationLocationT): ?>
        <tr>
            <td><?= $this->Number->format($examinationLocationT->Exam_Location_ID) ?></td>
            <td><?= $this->Number->format($examinationLocationT->Exam_ID) ?></td>
            <td><?= h($examinationLocationT->System_Date_Time) ?></td>
            <td><?= h($examinationLocationT->Location_Name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $examinationLocationT->Exam_Location_ID]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $examinationLocationT->Exam_Location_ID]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $examinationLocationT->Exam_Location_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $examinationLocationT->Exam_Location_ID)]) ?>
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
