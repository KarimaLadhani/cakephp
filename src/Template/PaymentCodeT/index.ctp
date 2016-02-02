<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Payment Code T'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="paymentCodeT index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Payment_Code_ID') ?></th>
            <th><?= $this->Paginator->sort('Payment_Code') ?></th>
            <th><?= $this->Paginator->sort('Disable') ?></th>
            <th><?= $this->Paginator->sort('Date_Disabled') ?></th>
            <th><?= $this->Paginator->sort('Payment_Company') ?></th>
            <th><?= $this->Paginator->sort('Send_Invoice_To') ?></th>
            <th><?= $this->Paginator->sort('Date_Paid') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($paymentCodeT as $paymentCodeT): ?>
        <tr>
            <td><?= $this->Number->format($paymentCodeT->Payment_Code_ID) ?></td>
            <td><?= h($paymentCodeT->Payment_Code) ?></td>
            <td><?= h($paymentCodeT->Disable) ?></td>
            <td><?= h($paymentCodeT->Date_Disabled) ?></td>
            <td><?= h($paymentCodeT->Payment_Company) ?></td>
            <td><?= h($paymentCodeT->Send_Invoice_To) ?></td>
            <td><?= h($paymentCodeT->Date_Paid) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $paymentCodeT->Payment_Code_ID]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $paymentCodeT->Payment_Code_ID]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $paymentCodeT->Payment_Code_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $paymentCodeT->Payment_Code_ID)]) ?>
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
