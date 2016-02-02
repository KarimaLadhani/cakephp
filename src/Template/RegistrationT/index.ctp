<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Registration T'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="registrationT index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Registration_ID') ?></th>
            <th><?= $this->Paginator->sort('Student_ID') ?></th>
            <th><?= $this->Paginator->sort('Exam_ID') ?></th>
            <th><?= $this->Paginator->sort('Outcome') ?></th>
            <th><?= $this->Paginator->sort('Date_Materials_Sent') ?></th>
            <th><?= $this->Paginator->sort('Retest') ?></th>
            <th><?= $this->Paginator->sort('Payer_Name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($registrationT as $registrationT): ?>
        <tr>
            <td><?= $this->Number->format($registrationT->Registration_ID) ?></td>
            <td><?= $this->Number->format($registrationT->Student_ID) ?></td>
            <td><?= $this->Number->format($registrationT->Exam_ID) ?></td>
            <td><?= h($registrationT->Outcome) ?></td>
            <td><?= h($registrationT->Date_Materials_Sent) ?></td>
            <td><?= h($registrationT->Retest) ?></td>
            <td><?= h($registrationT->Payer_Name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $registrationT->Registration_ID]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $registrationT->Registration_ID]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $registrationT->Registration_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $registrationT->Registration_ID)]) ?>
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
