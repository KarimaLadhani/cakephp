<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Volunteer Material Sent Info T'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="volunteerMaterialSentInfoT index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Volunteer_Material_Sent_Info_ID') ?></th>
            <th><?= $this->Paginator->sort('Volunteer_ID') ?></th>
            <th><?= $this->Paginator->sort('Volunteer_Material_Sent_Date') ?></th>
            <th><?= $this->Paginator->sort('Volunteer_Application_ID') ?></th>
            <th><?= $this->Paginator->sort('Level') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($volunteerMaterialSentInfoT as $volunteerMaterialSentInfoT): ?>
        <tr>
            <td><?= $this->Number->format($volunteerMaterialSentInfoT->Volunteer_Material_Sent_Info_ID) ?></td>
            <td><?= $this->Number->format($volunteerMaterialSentInfoT->Volunteer_ID) ?></td>
            <td><?= h($volunteerMaterialSentInfoT->Volunteer_Material_Sent_Date) ?></td>
            <td><?= $this->Number->format($volunteerMaterialSentInfoT->Volunteer_Application_ID) ?></td>
            <td><?= $this->Number->format($volunteerMaterialSentInfoT->Level) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $volunteerMaterialSentInfoT->Volunteer_Material_Sent_Info_ID]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $volunteerMaterialSentInfoT->Volunteer_Material_Sent_Info_ID]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $volunteerMaterialSentInfoT->Volunteer_Material_Sent_Info_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $volunteerMaterialSentInfoT->Volunteer_Material_Sent_Info_ID)]) ?>
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
