<div class="actions columns large-2 medium-3">
    <h5><?= __('The CEP Institute') ?></h5>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Home'), ['action' => 'dashboard' ]) ?></li>
		<li><?= $this->Html->link(__('Change Login/Password'), ['action' => 'usereditlogin' ]) ?></li>
        <li><?= $this->Html->link(__('Edit User Profile'), ['action' => 'usereditprofile']) ?></li>
        <li><?= $this->Html->link(__('Change Work Information'), ['action' => 'changeworkinfo']) ?></li>
        <li><?= $this->Html->link(__('Register for Exam'), ['action' =>'registerexam']) ?></li>
        <li><?= $this->Html->link(__('View Exam History'), ['action' => 'viewexamhistory']) ?></li>
        <li><?= $this->Html->link(__('Logout'), ['controller'=>'IndividualT','action' => 'logout']) ?></li>               
    </ul>
</div>
<div class="examinationT view large-10 medium-9 columns">
      
    <div class="related row">
    <div class="column large-12">
    <legend><?= __('<b><font size="3", color="#93191B">Exam History</font></b>') ?></legend></br>           
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Exam Date') ?></th>
            <th><?= __('Exam Level') ?></th>
            <th><?= __('Location') ?></th>
            <th><?= __('Exam Fee') ?></th>
            <th><?= __('Score Received') ?></th>
            <th><?= __('Passing Score') ?></th>
            <th><?= __('Payment Complete') ?></th>
            <th><?= __('Outcome') ?></th>            
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
            <td>".date('m/d/Y', strtotime($result->Exam_Date))."</td>
            <td>$result->Exam_Level</td>
            <td>".$result->examRegistrationInfo[0]->Location."</td>
            <td>".$result->examRegistrationInfo[0]->Amount_Charged."</td>
          	<td>".$result->examRegistrationInfo[0]->Raw_Passing_Score."</td>
            <td>$result->Exam_Passing_Score</td>
            <td>".$result->examRegistrationInfo[0]->Registration_Complete_Flag."</td>    
            <td>".$result->examRegistrationInfo[0]->Outcome."</td>  
        </tr>"
        ?>
        <?php endforeach; ?>
    </table>
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
