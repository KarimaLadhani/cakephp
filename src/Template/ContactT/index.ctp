<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Contact T'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="contactT index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Contact_ID') ?></th>
            <th><?= $this->Paginator->sort('Region') ?></th>
            <th><?= $this->Paginator->sort('Last_Meeting_Date') ?></th>
            <th><?= $this->Paginator->sort('Referred_By') ?></th>
            <th><?= $this->Paginator->sort('Contact_Type') ?></th>
            <th><?= $this->Paginator->sort('Date_Created') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($contactT as $contactT): ?>
        <tr>
            <td><?= $this->Number->format($contactT->Contact_ID) ?></td>
            <td><?= h($contactT->Region) ?></td>
            <td><?= h($contactT->Last_Meeting_Date) ?></td>
            <td><?= h($contactT->Referred_By) ?></td>
            <td><?= h($contactT->Contact_Type) ?></td>
            <td><?= h($contactT->Date_Created) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $contactT->Contact_ID]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contactT->Contact_ID]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contactT->Contact_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $contactT->Contact_ID)]) ?>
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
