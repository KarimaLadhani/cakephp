<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $volunteerKnowledgeT->Volunteer_Knowledge_ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $volunteerKnowledgeT->Volunteer_Knowledge_ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Volunteer Knowledge T'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="volunteerKnowledgeT form large-10 medium-9 columns">
    <?= $this->Form->create($volunteerKnowledgeT); ?>
    <fieldset>
        <legend><?= __('Edit Volunteer Knowledge T') ?></legend>
        <?php
            echo $this->Form->input('Volunteer_ID');
            echo $this->Form->input('Knowledge_Area');
            echo $this->Form->input('Knowledge_Level');
            echo $this->Form->input('Volunteer_Application_ID');
            echo $this->Form->input('Note');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
