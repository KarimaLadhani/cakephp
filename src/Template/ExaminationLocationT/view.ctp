<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Examination Location T'), ['action' => 'edit', $examinationLocationT->Exam_Location_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Examination Location T'), ['action' => 'delete', $examinationLocationT->Exam_Location_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $examinationLocationT->Exam_Location_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Examination Location T'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Examination Location T'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="examinationLocationT view large-10 medium-9 columns">
    <h2><?= h($examinationLocationT->Exam_Location_ID) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Location Name') ?></h6>
            <p><?= h($examinationLocationT->Location_Name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Exam Location ID') ?></h6>
            <p><?= $this->Number->format($examinationLocationT->Exam_Location_ID) ?></p>
            <h6 class="subheader"><?= __('Exam ID') ?></h6>
            <p><?= $this->Number->format($examinationLocationT->Exam_ID) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('System Date Time') ?></h6>
            <p><?= h($examinationLocationT->System_Date_Time) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Note') ?></h6>
            <?= $this->Text->autoParagraph(h($examinationLocationT->Note)); ?>

        </div>
    </div>
</div>
