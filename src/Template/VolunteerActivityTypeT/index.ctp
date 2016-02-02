<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Volunteer Activity Type T'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="volunteerActivityTypeT index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Volunteer_Activity_Type_ID') ?></th>
            <th><?= $this->Paginator->sort('Volunteer_ID') ?></th>
            <th><?= $this->Paginator->sort('Volunteer_Application_ID') ?></th>
            <th><?= $this->Paginator->sort('Activity_Type') ?></th>
            <th><?= $this->Paginator->sort('Start_Particitpation_Date') ?></th>
            <th><?= $this->Paginator->sort('End_Participation_Date') ?></th>
            <th><?= $this->Paginator->sort('Note') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($volunteerActivityTypeT as $volunteerActivityTypeT): ?>
        <tr>
            <td><?= $this->Number->format($volunteerActivityTypeT->Volunteer_Activity_Type_ID) ?></td>
            <td><?= $this->Number->format($volunteerActivityTypeT->Volunteer_ID) ?></td>
            <td><?= $this->Number->format($volunteerActivityTypeT->Volunteer_Application_ID) ?></td>
            <td><?= h($volunteerActivityTypeT->Activity_Type) ?></td>
            <td><?= h($volunteerActivityTypeT->Start_Particitpation_Date) ?></td>
            <td><?= h($volunteerActivityTypeT->End_Participation_Date) ?></td>
            <td><?= h($volunteerActivityTypeT->Note) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $volunteerActivityTypeT->Volunteer_Activity_Type_ID]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $volunteerActivityTypeT->Volunteer_Activity_Type_ID]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $volunteerActivityTypeT->Volunteer_Activity_Type_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $volunteerActivityTypeT->Volunteer_Activity_Type_ID)]) ?>
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
