<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $volunteerMaterialSentInfoT->Volunteer_Material_Sent_Info_ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $volunteerMaterialSentInfoT->Volunteer_Material_Sent_Info_ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Volunteer Material Sent Info T'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="volunteerMaterialSentInfoT form large-10 medium-9 columns">
    <?= $this->Form->create($volunteerMaterialSentInfoT); ?>
    <fieldset>
        <legend><?= __('Edit Volunteer Material Sent Info T') ?></legend>
        <?php
            echo $this->Form->input('Volunteer_ID');
            echo $this->Form->input('Volunteer_Material_Sent_Date', array('empty' => true, 'default' => ''));
            echo $this->Form->input('Volunteer_Application_ID');
            echo $this->Form->input('Level');
            echo $this->Form->input('Note');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
