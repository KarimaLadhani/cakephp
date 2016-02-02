<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Individual Work Info T'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="individualWorkInfoT index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Individual_Work_Info_ID') ?></th>
            <th><?= $this->Paginator->sort('Individual_ID') ?></th>
            <th><?= $this->Paginator->sort('Level') ?></th>
            <th><?= $this->Paginator->sort('Work_Address1') ?></th>
            <th><?= $this->Paginator->sort('Work_Address2') ?></th>
            <th><?= $this->Paginator->sort('Work_City') ?></th>
            <th><?= $this->Paginator->sort('Work_State') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($individualWorkInfoT as $individualWorkInfoT): ?>
        <tr>
            <td><?= $this->Number->format($individualWorkInfoT->Individual_Work_Info_ID) ?></td>
            <td><?= $this->Number->format($individualWorkInfoT->Individual_ID) ?></td>
            <td><?= $this->Number->format($individualWorkInfoT->Level) ?></td>
            <td><?= h($individualWorkInfoT->Work_Address1) ?></td>
            <td><?= h($individualWorkInfoT->Work_Address2) ?></td>
            <td><?= h($individualWorkInfoT->Work_City) ?></td>
            <td><?= h($individualWorkInfoT->Work_State) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $individualWorkInfoT->Individual_Work_Info_ID]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $individualWorkInfoT->Individual_Work_Info_ID]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $individualWorkInfoT->Individual_Work_Info_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $individualWorkInfoT->Individual_Work_Info_ID)]) ?>
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
