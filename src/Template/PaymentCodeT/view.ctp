<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Payment Code T'), ['action' => 'edit', $paymentCodeT->Payment_Code_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Payment Code T'), ['action' => 'delete', $paymentCodeT->Payment_Code_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $paymentCodeT->Payment_Code_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Payment Code T'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment Code T'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="paymentCodeT view large-10 medium-9 columns">
    <h2><?= h($paymentCodeT->Payment_Code_ID) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Payment Code') ?></h6>
            <p><?= h($paymentCodeT->Payment_Code) ?></p>
            <h6 class="subheader"><?= __('Disable') ?></h6>
            <p><?= h($paymentCodeT->Disable) ?></p>
            <h6 class="subheader"><?= __('Payment Company') ?></h6>
            <p><?= h($paymentCodeT->Payment_Company) ?></p>
            <h6 class="subheader"><?= __('Send Invoice To') ?></h6>
            <p><?= h($paymentCodeT->Send_Invoice_To) ?></p>
            <h6 class="subheader"><?= __('Check Number') ?></h6>
            <p><?= h($paymentCodeT->Check_Number) ?></p>
            <h6 class="subheader"><?= __('Invoice Number') ?></h6>
            <p><?= h($paymentCodeT->Invoice_Number) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Payment Code ID') ?></h6>
            <p><?= $this->Number->format($paymentCodeT->Payment_Code_ID) ?></p>
            <h6 class="subheader"><?= __('Amount Paid') ?></h6>
            <p><?= $this->Number->format($paymentCodeT->Amount_Paid) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date Disabled') ?></h6>
            <p><?= h($paymentCodeT->Date_Disabled) ?></p>
            <h6 class="subheader"><?= __('Date Paid') ?></h6>
            <p><?= h($paymentCodeT->Date_Paid) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Note') ?></h6>
            <?= $this->Text->autoParagraph(h($paymentCodeT->Note)); ?>

        </div>
    </div>
</div>
