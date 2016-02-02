<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Contact Correspondence T'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="contactCorrespondenceT index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Contact_Correspondence_ID') ?></th>
            <th><?= $this->Paginator->sort('Contact_ID') ?></th>
            <th><?= $this->Paginator->sort('Correspondence_Type') ?></th>
            <th><?= $this->Paginator->sort('Correspondence_Date') ?></th>
            <th><?= $this->Paginator->sort('Correspondence_Time') ?></th>
            <th><?= $this->Paginator->sort('Subject') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($contactCorrespondenceT as $contactCorrespondenceT): ?>
        <tr>
            <td><?= $this->Number->format($contactCorrespondenceT->Contact_Correspondence_ID) ?></td>
            <td><?= $this->Number->format($contactCorrespondenceT->Contact_ID) ?></td>
            <td><?= h($contactCorrespondenceT->Correspondence_Type) ?></td>
            <td><?= h($contactCorrespondenceT->Correspondence_Date) ?></td>
            <td><?= h($contactCorrespondenceT->Correspondence_Time) ?></td>
            <td><?= h($contactCorrespondenceT->Subject) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $contactCorrespondenceT->Contact_Correspondence_ID]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contactCorrespondenceT->Contact_Correspondence_ID]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contactCorrespondenceT->Contact_Correspondence_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $contactCorrespondenceT->Contact_Correspondence_ID)]) ?>
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
