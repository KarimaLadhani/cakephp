<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Volunteer Activity List T'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="volunteerActivityListT index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Volunteer_Activity_List_ID') ?></th>
            <th><?= $this->Paginator->sort('Title') ?></th>
            <th><?= $this->Paginator->sort('Date') ?></th>
            <th><?= $this->Paginator->sort('Hours') ?></th>
            <th><?= $this->Paginator->sort('Note') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($volunteerActivityListT as $volunteerActivityListT): ?>
        <tr>
            <td><?= $this->Number->format($volunteerActivityListT->Volunteer_Activity_List_ID) ?></td>
            <td><?= h($volunteerActivityListT->Title) ?></td>
            <td><?= h($volunteerActivityListT->Date) ?></td>
            <td><?= $this->Number->format($volunteerActivityListT->Hours) ?></td>
            <td><?= h($volunteerActivityListT->Note) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $volunteerActivityListT->Volunteer_Activity_List_ID]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $volunteerActivityListT->Volunteer_Activity_List_ID]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $volunteerActivityListT->Volunteer_Activity_List_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $volunteerActivityListT->Volunteer_Activity_List_ID)]) ?>
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
