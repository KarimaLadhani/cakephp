<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Volunteer Knowledge T'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="volunteerKnowledgeT index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Volunteer_Knowledge_ID') ?></th>
            <th><?= $this->Paginator->sort('Volunteer_ID') ?></th>
            <th><?= $this->Paginator->sort('Knowledge_Area') ?></th>
            <th><?= $this->Paginator->sort('Knowledge_Level') ?></th>
            <th><?= $this->Paginator->sort('Volunteer_Application_ID') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($volunteerKnowledgeT as $volunteerKnowledgeT): ?>
        <tr>
            <td><?= $this->Number->format($volunteerKnowledgeT->Volunteer_Knowledge_ID) ?></td>
            <td><?= $this->Number->format($volunteerKnowledgeT->Volunteer_ID) ?></td>
            <td><?= h($volunteerKnowledgeT->Knowledge_Area) ?></td>
            <td><?= h($volunteerKnowledgeT->Knowledge_Level) ?></td>
            <td><?= $this->Number->format($volunteerKnowledgeT->Volunteer_Application_ID) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $volunteerKnowledgeT->Volunteer_Knowledge_ID]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $volunteerKnowledgeT->Volunteer_Knowledge_ID]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $volunteerKnowledgeT->Volunteer_Knowledge_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $volunteerKnowledgeT->Volunteer_Knowledge_ID)]) ?>
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
