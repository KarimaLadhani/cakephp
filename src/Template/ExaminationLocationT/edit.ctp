<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $examinationLocationT->Exam_Location_ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $examinationLocationT->Exam_Location_ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Examination Location T'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="examinationLocationT form large-10 medium-9 columns">
    <?= $this->Form->create($examinationLocationT); ?>
    <fieldset>
        <legend><?= __('Edit Examination Location T') ?></legend>
        <?php
            echo $this->Form->input('Exam_ID');
            echo $this->Form->input('System_Date_Time');
            echo $this->Form->input('Location_Name');
            echo $this->Form->input('Note');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
