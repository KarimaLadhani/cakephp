<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Ce Activity List T'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="ceActivityListT index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Ce_Activity_ID') ?></th>
            <th><?= $this->Paginator->sort('Course_Date') ?></th>
            <th><?= $this->Paginator->sort('Provider_Name') ?></th>
            <th><?= $this->Paginator->sort('Course_Title') ?></th>
            <th><?= $this->Paginator->sort('Discipline') ?></th>
            <th><?= $this->Paginator->sort('Others') ?></th>
            <th><?= $this->Paginator->sort('Number_of_Credit_Hours') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($ceActivityListT as $ceActivityListT): ?>
        <tr>
            <td><?= $this->Number->format($ceActivityListT->Ce_Activity_ID) ?></td>
            <td><?= h($ceActivityListT->Course_Date) ?></td>
            <td><?= h($ceActivityListT->Provider_Name) ?></td>
            <td><?= h($ceActivityListT->Course_Title) ?></td>
            <td><?= h($ceActivityListT->Discipline) ?></td>
            <td><?= h($ceActivityListT->Others) ?></td>
            <td><?= $this->Number->format($ceActivityListT->Number_of_Credit_Hours) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $ceActivityListT->Ce_Activity_ID]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ceActivityListT->Ce_Activity_ID]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ceActivityListT->Ce_Activity_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $ceActivityListT->Ce_Activity_ID)]) ?>
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
