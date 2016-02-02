<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Ce Application T'), ['action' => 'edit', $ceApplicationT->Ce_Application_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ce Application T'), ['action' => 'delete', $ceApplicationT->Ce_Application_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $ceApplicationT->Ce_Application_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Ce Application T'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ce Application T'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="ceApplicationT view large-10 medium-9 columns">
    <h2><?= h($ceApplicationT->Ce_Application_ID) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Payment Type') ?></h6>
            <p><?= h($ceApplicationT->Payment_Type) ?></p>
            <h6 class="subheader"><?= __('Payer Name') ?></h6>
            <p><?= h($ceApplicationT->Payer_Name) ?></p>
            <h6 class="subheader"><?= __('Check Number') ?></h6>
            <p><?= h($ceApplicationT->Check_Number) ?></p>
            <h6 class="subheader"><?= __('Check Name') ?></h6>
            <p><?= h($ceApplicationT->Check_Name) ?></p>
            <h6 class="subheader"><?= __('Verisign Transaction Number') ?></h6>
            <p><?= h($ceApplicationT->Verisign_Transaction_Number) ?></p>
            <h6 class="subheader"><?= __('Verisign Address Line1') ?></h6>
            <p><?= h($ceApplicationT->Verisign_Address_Line1) ?></p>
            <h6 class="subheader"><?= __('Verisign Address Line2') ?></h6>
            <p><?= h($ceApplicationT->Verisign_Address_Line2) ?></p>
            <h6 class="subheader"><?= __('Approval Flag') ?></h6>
            <p><?= h($ceApplicationT->Approval_Flag) ?></p>
            <h6 class="subheader"><?= __('Extension') ?></h6>
            <p><?= h($ceApplicationT->Extension) ?></p>
            <h6 class="subheader"><?= __('Application Already Submitted') ?></h6>
            <p><?= h($ceApplicationT->Application_Already_Submitted) ?></p>
            <h6 class="subheader"><?= __('Resubmission Flag') ?></h6>
            <p><?= h($ceApplicationT->Resubmission_Flag) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Ce Application ID') ?></h6>
            <p><?= $this->Number->format($ceApplicationT->Ce_Application_ID) ?></p>
            <h6 class="subheader"><?= __('Cep ID') ?></h6>
            <p><?= $this->Number->format($ceApplicationT->Cep_ID) ?></p>
            <h6 class="subheader"><?= __('Amount Charged') ?></h6>
            <p><?= $this->Number->format($ceApplicationT->Amount_Charged) ?></p>
            <h6 class="subheader"><?= __('Amount Paid') ?></h6>
            <p><?= $this->Number->format($ceApplicationT->Amount_Paid) ?></p>
            <h6 class="subheader"><?= __('Times Submitted') ?></h6>
            <p><?= $this->Number->format($ceApplicationT->Times_Submitted) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Application Date') ?></h6>
            <p><?= h($ceApplicationT->Application_Date) ?></p>
            <h6 class="subheader"><?= __('Check Date') ?></h6>
            <p><?= h($ceApplicationT->Check_Date) ?></p>
            <h6 class="subheader"><?= __('Payment Execution Date Time') ?></h6>
            <p><?= h($ceApplicationT->Payment_Execution_Date_Time) ?></p>
            <h6 class="subheader"><?= __('Approval Date') ?></h6>
            <p><?= h($ceApplicationT->Approval_Date) ?></p>
            <h6 class="subheader"><?= __('New Due Date') ?></h6>
            <p><?= h($ceApplicationT->New_Due_Date) ?></p>
            <h6 class="subheader"><?= __('Date Recertified') ?></h6>
            <p><?= h($ceApplicationT->Date_Recertified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Note') ?></h6>
            <?= $this->Text->autoParagraph(h($ceApplicationT->Note)); ?>

        </div>
    </div>
</div>
