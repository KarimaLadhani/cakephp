<div class="actions columns large-2 medium-3">
  <h5><?= __('The CEP Institute') ?></h5>
    <ul class="side-nav">           
        <li><?= $this->Html->link(__('Home'), ['controller'=>'AdministratorT','action' => 'menuboard']) ?></li>
        <li><?= $this->Html->link(__('Logout'), ['controller'=>'AdministratorT','action' => 'logout']) ?></li>

    </ul>
</div>
</div>

<div class="ceApplicationT index large-25 medium-25 columns">
    <div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Display all continuing education applications') ?></h4>    
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Cep ID') ?></th>
            <th><?= __('Ce App ID') ?></th>
            <th><?= __('Application Date') ?></th>
            <th><?= __('Payment Type') ?></th>
            <th><?= __('Due Date') ?></th>
            <th><?= __('Note') ?></th>
            <th><?= __('Application Status') ?></th>
            <th><?= __('Resubmission Flag') ?></th>
            <th><?= __('First Name') ?></th>
            <th><?= __('Last Name') ?></th>
            <th><?= __('Total Hours') ?></th>
            <th><?= __('Activities') ?></th>        
        </tr>
        <?php 
        foreach ($results as $result): 
        $enabled='';
        if(empty($result->Enabled)){
        $enabled='Unknown';
        }else{
        $enabled=$result->Enabled;
        }
        echo "<tr>    
            <td>$result->Cep_ID</td>
            <td>$result->Ce_Application_ID</td>
             <td>".date('m/d/Y', strtotime($result->Application_Date))."</td>
               <td>$result->Payment_Type</td>
               <td>".date('m/d/Y', strtotime($result->New_Due_Date))."</td>
               <td>$result->Note</td>
               <td>$result->Approval_Flag</td>
               <td>$result->Resubmission_Flag</td>
               <td>".$result->ind['First_Name']."</td>
               <td>".$result->ind['Last_Name']."</td>
              <td>".$result->act['Number_of_Credit_Hours']."</td> 
                 
                   
              </tr>"
        ?>
        <?php endforeach; ?>
    </table>
     </div>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
    </div>
</div>
</div> 