<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Administrator T'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="administratorT index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Admin_ID') ?></th>
            <th><?= $this->Paginator->sort('First_Name') ?></th>
            <th><?= $this->Paginator->sort('Last_Name') ?></th>
            <th><?= $this->Paginator->sort('Admin_Username') ?></th>
            <th><?= $this->Paginator->sort('Admin_Password') ?></th>
            <th><?= $this->Paginator->sort('Phone_Number') ?></th>
            <th><?= $this->Paginator->sort('Email_Address') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($administratorT as $administratorT): ?>
        <tr>
            <td><?= $this->Number->format($administratorT->Admin_ID) ?></td>
            <td><?= h($administratorT->First_Name) ?></td>
            <td><?= h($administratorT->Last_Name) ?></td>
            <td><?= h($administratorT->Admin_Username) ?></td>
            <td><?= h($administratorT->Admin_Password) ?></td>
            <td><?= h($administratorT->Phone_Number) ?></td>
            <td><?= h($administratorT->Email_Address) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $administratorT->Admin_ID]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $administratorT->Admin_ID]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $administratorT->Admin_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $administratorT->Admin_ID)]) ?>
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
