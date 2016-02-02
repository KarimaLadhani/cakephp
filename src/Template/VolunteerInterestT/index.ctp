<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Volunteer Interest T'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="volunteerInterestT index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Volunteer_Interest_ID') ?></th>
            <th><?= $this->Paginator->sort('Volunteer_ID') ?></th>
            <th><?= $this->Paginator->sort('Interest_Type') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($volunteerInterestT as $volunteerInterestT): ?>
        <tr>
            <td><?= $this->Number->format($volunteerInterestT->Volunteer_Interest_ID) ?></td>
            <td><?= $this->Number->format($volunteerInterestT->Volunteer_ID) ?></td>
            <td><?= h($volunteerInterestT->Interest_Type) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $volunteerInterestT->Volunteer_Interest_ID]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $volunteerInterestT->Volunteer_Interest_ID]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $volunteerInterestT->Volunteer_Interest_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $volunteerInterestT->Volunteer_Interest_ID)]) ?>
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
