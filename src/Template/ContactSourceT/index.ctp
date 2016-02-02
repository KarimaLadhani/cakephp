<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Contact Source T'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="contactSourceT index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Contact_Source_ID') ?></th>
            <th><?= $this->Paginator->sort('Contact_ID') ?></th>
            <th><?= $this->Paginator->sort('Contact_Source_Where') ?></th>
            <th><?= $this->Paginator->sort('Contact_Source_When') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($contactSourceT as $contactSourceT): ?>
        <tr>
            <td><?= $this->Number->format($contactSourceT->Contact_Source_ID) ?></td>
            <td><?= $this->Number->format($contactSourceT->Contact_ID) ?></td>
            <td><?= h($contactSourceT->Contact_Source_Where) ?></td>
            <td><?= h($contactSourceT->Contact_Source_When) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $contactSourceT->Contact_Source_ID]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contactSourceT->Contact_Source_ID]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contactSourceT->Contact_Source_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $contactSourceT->Contact_Source_ID)]) ?>
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
