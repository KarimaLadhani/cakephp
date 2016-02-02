<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Examination T'), ['action' => 'edit', $examinationT->Exam_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Examination T'), ['action' => 'delete', $examinationT->Exam_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $examinationT->Exam_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Examination T'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Examination T'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="examinationT view large-10 medium-9 columns">
    <h2><?= h($examinationT->Exam_ID) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Enabled') ?></h6>
            <p><?= h($examinationT->Enabled) ?></p>
            <h6 class="subheader"><?= __('Location For Private Exam') ?></h6>
            <p><?= h($examinationT->Location_For_Private_Exam) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Exam ID') ?></h6>
            <p><?= $this->Number->format($examinationT->Exam_ID) ?></p>
            <h6 class="subheader"><?= __('Exam Level') ?></h6>
            <p><?= $this->Number->format($examinationT->Exam_Level) ?></p>
            <h6 class="subheader"><?= __('Exam Year') ?></h6>
            <p><?= $this->Number->format($examinationT->Exam_Year) ?></p>
            <h6 class="subheader"><?= __('US Enrollment Fee') ?></h6>
            <p><?= $this->Number->format($examinationT->US_Enrollment_Fee) ?></p>
            <h6 class="subheader"><?= __('International Enrollment Fee') ?></h6>
            <p><?= $this->Number->format($examinationT->International_Enrollment_Fee) ?></p>
            <h6 class="subheader"><?= __('US Retest Fee Current Year') ?></h6>
            <p><?= $this->Number->format($examinationT->US_Retest_Fee_Current_Year) ?></p>
            <h6 class="subheader"><?= __('US Retest Fee Next Year') ?></h6>
            <p><?= $this->Number->format($examinationT->US_Retest_Fee_Next_Year) ?></p>
            <h6 class="subheader"><?= __('US Deferment Fee Before Deadline') ?></h6>
            <p><?= $this->Number->format($examinationT->US_Deferment_Fee_Before_Deadline) ?></p>
            <h6 class="subheader"><?= __('US Deferment Fee After Deadline') ?></h6>
            <p><?= $this->Number->format($examinationT->US_Deferment_Fee_After_Deadline) ?></p>
            <h6 class="subheader"><?= __('International Retest Fee Current Year') ?></h6>
            <p><?= $this->Number->format($examinationT->International_Retest_Fee_Current_Year) ?></p>
            <h6 class="subheader"><?= __('International Retest Fee Next Year') ?></h6>
            <p><?= $this->Number->format($examinationT->International_Retest_Fee_Next_Year) ?></p>
            <h6 class="subheader"><?= __('International Deferment Fee Before Deadline') ?></h6>
            <p><?= $this->Number->format($examinationT->International_Deferment_Fee_Before_Deadline) ?></p>
            <h6 class="subheader"><?= __('International Deferment Fee After Deadline') ?></h6>
            <p><?= $this->Number->format($examinationT->International_Deferment_Fee_After_Deadline) ?></p>
            <h6 class="subheader"><?= __('Deferment Fee Past Due Date') ?></h6>
            <p><?= $this->Number->format($examinationT->Deferment_Fee_Past_Due_Date) ?></p>
            <h6 class="subheader"><?= __('Exam Passing Score') ?></h6>
            <p><?= $this->Number->format($examinationT->Exam_Passing_Score) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Exam Date') ?></h6>
            <p><?= h($examinationT->Exam_Date) ?></p>
            <h6 class="subheader"><?= __('Registration Deadline') ?></h6>
            <p><?= h($examinationT->Registration_Deadline) ?></p>
            <h6 class="subheader"><?= __('Deferment Deadline') ?></h6>
            <p><?= h($examinationT->Deferment_Deadline) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Sample') ?></h6>
            <?= $this->Text->autoParagraph(h($examinationT->Sample)); ?>

        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Note') ?></h6>
            <?= $this->Text->autoParagraph(h($examinationT->Note)); ?>

        </div>
    </div>
</div>
