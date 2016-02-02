<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Student T'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="studentT index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Student_ID') ?></th>
            <th><?= $this->Paginator->sort('Purpose_For_Enrollment') ?></th>
            <th><?= $this->Paginator->sort('Referred_By') ?></th>
            <th><?= $this->Paginator->sort('Highest_Education_Level') ?></th>
            <th><?= $this->Paginator->sort('Highest_Level_Passed') ?></th>
            <th><?= $this->Paginator->sort('Last_Update_Date_Time') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($studentT as $studentT): ?>
        <tr>
            <td><?= $this->Number->format($studentT->Student_ID) ?></td>
            <td><?= h($studentT->Purpose_For_Enrollment) ?></td>
            <td><?= h($studentT->Referred_By) ?></td>
            <td><?= h($studentT->Highest_Education_Level) ?></td>
            <td><?= $this->Number->format($studentT->Highest_Level_Passed) ?></td>
            <td><?= h($studentT->Last_Update_Date_Time) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $studentT->Student_ID]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $studentT->Student_ID]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $studentT->Student_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $studentT->Student_ID)]) ?>
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
