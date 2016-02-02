<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Individual Work Info T'), ['action' => 'edit', $individualWorkInfoT->Individual_Work_Info_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Individual Work Info T'), ['action' => 'delete', $individualWorkInfoT->Individual_Work_Info_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $individualWorkInfoT->Individual_Work_Info_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Individual Work Info T'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Individual Work Info T'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="individualWorkInfoT view large-10 medium-9 columns">
    <h2><?= h($individualWorkInfoT->Individual_Work_Info_ID) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Work Address1') ?></h6>
            <p><?= h($individualWorkInfoT->Work_Address1) ?></p>
            <h6 class="subheader"><?= __('Work Address2') ?></h6>
            <p><?= h($individualWorkInfoT->Work_Address2) ?></p>
            <h6 class="subheader"><?= __('Work City') ?></h6>
            <p><?= h($individualWorkInfoT->Work_City) ?></p>
            <h6 class="subheader"><?= __('Work State') ?></h6>
            <p><?= h($individualWorkInfoT->Work_State) ?></p>
            <h6 class="subheader"><?= __('Work Postal Code') ?></h6>
            <p><?= h($individualWorkInfoT->Work_Postal_Code) ?></p>
            <h6 class="subheader"><?= __('Work Country') ?></h6>
            <p><?= h($individualWorkInfoT->Work_Country) ?></p>
            <h6 class="subheader"><?= __('Work Phone') ?></h6>
            <p><?= h($individualWorkInfoT->Work_Phone) ?></p>
            <h6 class="subheader"><?= __('Work Extension') ?></h6>
            <p><?= h($individualWorkInfoT->Work_Extension) ?></p>
            <h6 class="subheader"><?= __('Work Fax Number') ?></h6>
            <p><?= h($individualWorkInfoT->Work_Fax_Number) ?></p>
            <h6 class="subheader"><?= __('Individual Title') ?></h6>
            <p><?= h($individualWorkInfoT->Individual_Title) ?></p>
            <h6 class="subheader"><?= __('Individual Department') ?></h6>
            <p><?= h($individualWorkInfoT->Individual_Department) ?></p>
            <h6 class="subheader"><?= __('Individual Company') ?></h6>
            <p><?= h($individualWorkInfoT->Individual_Company) ?></p>
            <h6 class="subheader"><?= __('Company Type') ?></h6>
            <p><?= h($individualWorkInfoT->Company_Type) ?></p>
            <h6 class="subheader"><?= __('Is Current') ?></h6>
            <p><?= h($individualWorkInfoT->Is_Current) ?></p>
            <h6 class="subheader"><?= __('Work Responsibilities') ?></h6>
            <p><?= h($individualWorkInfoT->Work_Responsibilities) ?></p>
            <h6 class="subheader"><?= __('Release Consent Form') ?></h6>
            <p><?= h($individualWorkInfoT->Release_Consent_Form) ?></p>
            <h6 class="subheader"><?= __('PIndividual Company') ?></h6>
            <p><?= h($individualWorkInfoT->PIndividual_Company) ?></p>
            <h6 class="subheader"><?= __('PIndividual Title') ?></h6>
            <p><?= h($individualWorkInfoT->PIndividual_Title) ?></p>
            <h6 class="subheader"><?= __('PWork City') ?></h6>
            <p><?= h($individualWorkInfoT->PWork_City) ?></p>
            <h6 class="subheader"><?= __('PState') ?></h6>
            <p><?= h($individualWorkInfoT->PState) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Individual Work Info ID') ?></h6>
            <p><?= $this->Number->format($individualWorkInfoT->Individual_Work_Info_ID) ?></p>
            <h6 class="subheader"><?= __('Individual ID') ?></h6>
            <p><?= $this->Number->format($individualWorkInfoT->Individual_ID) ?></p>
            <h6 class="subheader"><?= __('Level') ?></h6>
            <p><?= $this->Number->format($individualWorkInfoT->Level) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Work Start') ?></h6>
            <p><?= h($individualWorkInfoT->Work_Start) ?></p>
            <h6 class="subheader"><?= __('Work End') ?></h6>
            <p><?= h($individualWorkInfoT->Work_End) ?></p>
            <h6 class="subheader"><?= __('Last Update') ?></h6>
            <p><?= h($individualWorkInfoT->Last_Update) ?></p>
            <h6 class="subheader"><?= __('Consent Date') ?></h6>
            <p><?= h($individualWorkInfoT->Consent_Date) ?></p>
            <h6 class="subheader"><?= __('PWork Start') ?></h6>
            <p><?= h($individualWorkInfoT->PWork_Start) ?></p>
            <h6 class="subheader"><?= __('PWork End') ?></h6>
            <p><?= h($individualWorkInfoT->PWork_End) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Note') ?></h6>
            <?= $this->Text->autoParagraph(h($individualWorkInfoT->Note)); ?>

        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('PWork Responsibilities') ?></h6>
            <?= $this->Text->autoParagraph(h($individualWorkInfoT->PWork_Responsibilities)); ?>

        </div>
    </div>
</div>
