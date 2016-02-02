<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Uploadregdate'), ['action' => 'edit', $uploadregdate->Registration_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Uploadregdate'), ['action' => 'delete', $uploadregdate->Registration_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $uploadregdate->Registration_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Uploadregdate'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Uploadregdate'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="uploadregdate view large-10 medium-9 columns">
    <h2><?= h($uploadregdate->Registration_ID) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Outcome') ?></h6>
            <p><?= h($uploadregdate->Outcome) ?></p>
            <h6 class="subheader"><?= __('Retest') ?></h6>
            <p><?= h($uploadregdate->Retest) ?></p>
            <h6 class="subheader"><?= __('Payer Name') ?></h6>
            <p><?= h($uploadregdate->Payer_Name) ?></p>
            <h6 class="subheader"><?= __('Payment Type') ?></h6>
            <p><?= h($uploadregdate->Payment_Type) ?></p>
            <h6 class="subheader"><?= __('Check Name') ?></h6>
            <p><?= h($uploadregdate->Check_Name) ?></p>
            <h6 class="subheader"><?= __('Verisign Transaction Number') ?></h6>
            <p><?= h($uploadregdate->Verisign_Transaction_Number) ?></p>
            <h6 class="subheader"><?= __('Verisign Address Line1') ?></h6>
            <p><?= h($uploadregdate->Verisign_Address_Line1) ?></p>
            <h6 class="subheader"><?= __('Verisign Address Line2') ?></h6>
            <p><?= h($uploadregdate->Verisign_Address_Line2) ?></p>
            <h6 class="subheader"><?= __('Disability Accomodations') ?></h6>
            <p><?= h($uploadregdate->Disability_Accomodations) ?></p>
            <h6 class="subheader"><?= __('Alternate Test Site Requirement') ?></h6>
            <p><?= h($uploadregdate->Alternate_Test_Site_Requirement) ?></p>
            <h6 class="subheader"><?= __('Location') ?></h6>
            <p><?= h($uploadregdate->Location) ?></p>
            <h6 class="subheader"><?= __('Registration Complete Flag') ?></h6>
            <p><?= h($uploadregdate->Registration_Complete_Flag) ?></p>
            <h6 class="subheader"><?= __('Mail Confirmation') ?></h6>
            <p><?= h($uploadregdate->Mail_Confirmation) ?></p>
            <h6 class="subheader"><?= __('Status') ?></h6>
            <p><?= h($uploadregdate->Status) ?></p>
            <h6 class="subheader"><?= __('Required Non Saturday Admission') ?></h6>
            <p><?= h($uploadregdate->Required_Non_Saturday_Admission) ?></p>
            <h6 class="subheader"><?= __('Release Contact Info To Others') ?></h6>
            <p><?= h($uploadregdate->Release_Contact_Info_To_Others) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Registration ID') ?></h6>
            <p><?= $this->Number->format($uploadregdate->Registration_ID) ?></p>
            <h6 class="subheader"><?= __('Student ID') ?></h6>
            <p><?= $this->Number->format($uploadregdate->Student_ID) ?></p>
            <h6 class="subheader"><?= __('Exam ID') ?></h6>
            <p><?= $this->Number->format($uploadregdate->Exam_ID) ?></p>
            <h6 class="subheader"><?= __('Check Number') ?></h6>
            <p><?= $this->Number->format($uploadregdate->Check_Number) ?></p>
            <h6 class="subheader"><?= __('Payment Code ID') ?></h6>
            <p><?= $this->Number->format($uploadregdate->Payment_Code_ID) ?></p>
            <h6 class="subheader"><?= __('Amount Charged') ?></h6>
            <p><?= $this->Number->format($uploadregdate->Amount_Charged) ?></p>
            <h6 class="subheader"><?= __('Amount Paid') ?></h6>
            <p><?= $this->Number->format($uploadregdate->Amount_Paid) ?></p>
            <h6 class="subheader"><?= __('Raw Passing Score') ?></h6>
            <p><?= $this->Number->format($uploadregdate->Raw_Passing_Score) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date Materials Sent') ?></h6>
            <p><?= h($uploadregdate->Date_Materials_Sent) ?></p>
            <h6 class="subheader"><?= __('Check Date') ?></h6>
            <p><?= h($uploadregdate->Check_Date) ?></p>
            <h6 class="subheader"><?= __('Payment Execution Date Time') ?></h6>
            <p><?= h($uploadregdate->Payment_Execution_Date_Time) ?></p>
            <h6 class="subheader"><?= __('Date Passed') ?></h6>
            <p><?= h($uploadregdate->Date_Passed) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Note') ?></h6>
            <?= $this->Text->autoParagraph(h($uploadregdate->Note)); ?>

        </div>
    </div>
</div>
