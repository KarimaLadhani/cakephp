<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Volunteer T'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="volunteerT index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Volunteer_ID') ?></th>
            <th><?= $this->Paginator->sort('Cep_ID') ?></th>
            <th><?= $this->Paginator->sort('College1') ?></th>
            <th><?= $this->Paginator->sort('Degree1') ?></th>
            <th><?= $this->Paginator->sort('Major1') ?></th>
            <th><?= $this->Paginator->sort('College2') ?></th>
            <th><?= $this->Paginator->sort('Degree2') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($volunteerT as $volunteerT): ?>
        <tr>
            <td><?= $this->Number->format($volunteerT->Volunteer_ID) ?></td>
            <td><?= $this->Number->format($volunteerT->Cep_ID) ?></td>
            <td><?= h($volunteerT->College1) ?></td>
            <td><?= h($volunteerT->Degree1) ?></td>
            <td><?= h($volunteerT->Major1) ?></td>
            <td><?= h($volunteerT->College2) ?></td>
            <td><?= h($volunteerT->Degree2) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $volunteerT->Volunteer_ID]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $volunteerT->Volunteer_ID]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $volunteerT->Volunteer_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $volunteerT->Volunteer_ID)]) ?>
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
