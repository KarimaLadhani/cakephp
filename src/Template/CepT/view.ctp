<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Cep T'), ['action' => 'edit', $cepT->Cep_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cep T'), ['action' => 'delete', $cepT->Cep_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $cepT->Cep_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Cep T'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cep T'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="cepT view large-10 medium-9 columns">
    <h2><?= h($cepT->Cep_ID) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Up To Date') ?></h6>
            <p><?= h($cepT->Up_To_Date) ?></p>
            <h6 class="subheader"><?= __('Active') ?></h6>
            <p><?= h($cepT->Active) ?></p>
            <h6 class="subheader"><?= __('Display First Name') ?></h6>
            <p><?= h($cepT->Display_First_Name) ?></p>
            <h6 class="subheader"><?= __('Display Last Name') ?></h6>
            <p><?= h($cepT->Display_Last_Name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Cep ID') ?></h6>
            <p><?= $this->Number->format($cepT->Cep_ID) ?></p>
            <h6 class="subheader"><?= __('Student ID') ?></h6>
            <p><?= $this->Number->format($cepT->Student_ID) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date Received') ?></h6>
            <p><?= h($cepT->Date_Received) ?></p>
            <h6 class="subheader"><?= __('Due Date') ?></h6>
            <p><?= h($cepT->Due_Date) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Note') ?></h6>
            <?= $this->Text->autoParagraph(h($cepT->Note)); ?>

        </div>
    </div>
</div>
