<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Cep T'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="cepT index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Cep_ID') ?></th>
            <th><?= $this->Paginator->sort('Student_ID') ?></th>
            <th><?= $this->Paginator->sort('Up_To_Date') ?></th>
            <th><?= $this->Paginator->sort('Active') ?></th>
            <th><?= $this->Paginator->sort('Date_Received') ?></th>
            <th><?= $this->Paginator->sort('Due_Date') ?></th>
            <th><?= $this->Paginator->sort('Display_First_Name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($cepT as $cepT): ?>
        <tr>
            <td><?= $this->Number->format($cepT->Cep_ID) ?></td>
            <td><?= $this->Number->format($cepT->Student_ID) ?></td>
            <td><?= h($cepT->Up_To_Date) ?></td>
            <td><?= h($cepT->Active) ?></td>
            <td><?= h($cepT->Date_Received) ?></td>
            <td><?= h($cepT->Due_Date) ?></td>
            <td><?= h($cepT->Display_First_Name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $cepT->Cep_ID]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cepT->Cep_ID]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cepT->Cep_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $cepT->Cep_ID)]) ?>
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
