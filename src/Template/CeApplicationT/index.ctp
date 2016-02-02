<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Ce Application T'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="ceApplicationT index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Ce_Application_ID') ?></th>
            <th><?= $this->Paginator->sort('Cep_ID') ?></th>
            <th><?= $this->Paginator->sort('Application_Date') ?></th>
            <th><?= $this->Paginator->sort('Payment_Type') ?></th>
            <th><?= $this->Paginator->sort('Payer_Name') ?></th>
            <th><?= $this->Paginator->sort('Check_Number') ?></th>
            <th><?= $this->Paginator->sort('Check_Date') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($ceApplicationT as $ceApplicationT): ?>
        <tr>
            <td><?= $this->Number->format($ceApplicationT->Ce_Application_ID) ?></td>
            <td><?= $this->Number->format($ceApplicationT->Cep_ID) ?></td>
            <td><?= h($ceApplicationT->Application_Date) ?></td>
            <td><?= h($ceApplicationT->Payment_Type) ?></td>
            <td><?= h($ceApplicationT->Payer_Name) ?></td>
            <td><?= h($ceApplicationT->Check_Number) ?></td>
            <td><?= h($ceApplicationT->Check_Date) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $ceApplicationT->Ce_Application_ID]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ceApplicationT->Ce_Application_ID]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ceApplicationT->Ce_Application_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $ceApplicationT->Ce_Application_ID)]) ?>
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
