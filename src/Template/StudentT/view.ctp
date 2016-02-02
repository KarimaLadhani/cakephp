<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Student T'), ['action' => 'edit', $studentT->Student_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Student T'), ['action' => 'delete', $studentT->Student_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $studentT->Student_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Student T'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student T'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="studentT view large-10 medium-9 columns">
    <h2><?= h($studentT->Student_ID) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Purpose For Enrollment') ?></h6>
            <p><?= h($studentT->Purpose_For_Enrollment) ?></p>
            <h6 class="subheader"><?= __('Referred By') ?></h6>
            <p><?= h($studentT->Referred_By) ?></p>
            <h6 class="subheader"><?= __('Highest Education Level') ?></h6>
            <p><?= h($studentT->Highest_Education_Level) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Student ID') ?></h6>
            <p><?= $this->Number->format($studentT->Student_ID) ?></p>
            <h6 class="subheader"><?= __('Highest Level Passed') ?></h6>
            <p><?= $this->Number->format($studentT->Highest_Level_Passed) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Last Update Date Time') ?></h6>
            <p><?= h($studentT->Last_Update_Date_Time) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Note') ?></h6>
            <?= $this->Text->autoParagraph(h($studentT->Note)); ?>

        </div>
    </div>
</div>
