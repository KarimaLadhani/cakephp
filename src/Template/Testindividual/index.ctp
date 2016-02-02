<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Testindividual'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="testindividual index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Individual_ID') ?></th>
            <th><?= $this->Paginator->sort('First_Name') ?></th>
            <th><?= $this->Paginator->sort('Middle_Initial') ?></th>
            <th><?= $this->Paginator->sort('Last_Name') ?></th>
            <th><?= $this->Paginator->sort('Address1') ?></th>
            <th><?= $this->Paginator->sort('Address2') ?></th>
            <th><?= $this->Paginator->sort('City') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($testindividual as $testindividual): ?>
        <tr>
            <td><?= $this->Number->format($testindividual->Individual_ID) ?></td>
            <td><?= h($testindividual->First_Name) ?></td>
            <td><?= h($testindividual->Middle_Initial) ?></td>
            <td><?= h($testindividual->Last_Name) ?></td>
            <td><?= h($testindividual->Address1) ?></td>
            <td><?= h($testindividual->Address2) ?></td>
            <td><?= h($testindividual->City) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $testindividual->Individual_ID]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $testindividual->Individual_ID]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $testindividual->Individual_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $testindividual->Individual_ID)]) ?>
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
