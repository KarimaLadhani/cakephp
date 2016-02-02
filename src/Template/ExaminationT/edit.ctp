<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $examinationT->Exam_ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $examinationT->Exam_ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Examination T'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="examinationT form large-10 medium-9 columns">
    <?= $this->Form->create($examinationT); ?>
    <fieldset>
        <legend><?= __('Edit Examination T') ?></legend>
        <?php
            echo $this->Form->input('Exam_Level');
            echo $this->Form->input('Exam_Date', array('empty' => true, 'default' => ''));
            echo $this->Form->input('Exam_Year');
            echo $this->Form->input('Enabled');
            echo $this->Form->input('Registration_Deadline', array('empty' => true, 'default' => ''));
            echo $this->Form->input('Deferment_Deadline', array('empty' => true, 'default' => ''));
            echo $this->Form->input('US_Enrollment_Fee');
            echo $this->Form->input('International_Enrollment_Fee');
            echo $this->Form->input('US_Retest_Fee_Current_Year');
            echo $this->Form->input('US_Retest_Fee_Next_Year');
            echo $this->Form->input('US_Deferment_Fee_Before_Deadline');
            echo $this->Form->input('US_Deferment_Fee_After_Deadline');
            echo $this->Form->input('International_Retest_Fee_Current_Year');
            echo $this->Form->input('International_Retest_Fee_Next_Year');
            echo $this->Form->input('International_Deferment_Fee_Before_Deadline');
            echo $this->Form->input('International_Deferment_Fee_After_Deadline');
            echo $this->Form->input('Deferment_Fee_Past_Due_Date');
            echo $this->Form->input('Sample');
            echo $this->Form->input('Exam_Passing_Score');
            echo $this->Form->input('Location_For_Private_Exam');
            echo $this->Form->input('Note');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
