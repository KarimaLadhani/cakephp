<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $paymentCodeT->Payment_Code_ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $paymentCodeT->Payment_Code_ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Payment Code T'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="paymentCodeT form large-10 medium-9 columns">
    <?= $this->Form->create($paymentCodeT); ?>
    <fieldset>
        <legend><?= __('Edit Payment Code T') ?></legend>
        <?php
            echo $this->Form->input('Payment_Code');
            echo $this->Form->input('Disable');
            echo $this->Form->input('Date_Disabled', array('empty' => true, 'default' => ''));
            echo $this->Form->input('Payment_Company');
            echo $this->Form->input('Send_Invoice_To');
            echo $this->Form->input('Date_Paid', array('empty' => true, 'default' => ''));
            echo $this->Form->input('Amount_Paid');
            echo $this->Form->input('Check_Number');
            echo $this->Form->input('Note');
            echo $this->Form->input('Invoice_Number');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
