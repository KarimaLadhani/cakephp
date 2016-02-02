<div class="actions columns large-2 medium-3">
    <h5><?= __('The CEP Institute') ?></h5>
    <ul class="side-nav">	        
        <li><?= $this->Html->link(__('Home'), ['controller'=>'AdministratorT','action' => 'menuboard']) ?></li>
        <li><?= $this->Html->link(__('Create Exams'), ['controller'=>'ExaminationT','action' => 'createexam']) ?></li>
         <li><?= $this->Html->link(__('Display Exams'), ['controller'=>'ExaminationT','action' => 'displayexam']) ?></li>
        <li><?= $this->Html->link(__('Logout'), ['controller'=>'AdministratorT','action' => 'logout']) ?></li>               
    </ul>
</div>



<div class="examinationT view large-10 medium-9 columns">
    <h4 class="subheader"><?= __('Registered Students For Exams') ?></h4>    
    <table cellpadding="0" cellspacing="0">
        <tr>
            <td><b><?= __('Student ID') ?></b></td>
            <td><b><?= __('Reg ID') ?><b></td>
            <td><b><?= __('First Name') ?><b></td>
            <td><b><?= __('Last Name') ?><b></td>
            <td><b><?= __('Email') ?><b></td>
            <td><b><?= __('Location') ?><b></td>
            <td><b><?= __('Date Materials Sent') ?><b></td>
            <td><b><?= __('Reg Complete') ?><b></td>
            <td><b><?= __('Score') ?><b></td>     
            <td><b><?= __('Outcome') ?><b></td>
           <!-- <td><b><?= __('Edit Reg. Info') ?><b></td>
            <td><b><?= __('Edit Score') ?><b></td> -->       
        </tr>
        
         <?php 
        foreach ($results as $result): 
        
        echo "<tr>                	
            <td>$result->Student_ID </a></td>
            <td>$result->Registration_ID</td>
            <td>".$result->ind['First_Name']."</td>
            <td>".$result->ind['Last_Name']."</td>
            <td style='word-wrap:break-word'>".$result->ind['Email_Address']."</td>
            <td>$result->Location</td>
            <td>$result->Date_Materials_Sent</td>
            <td>$result->Registration_Complete_Flag</td>    
            <td>$result->Raw_Passing_Score</td>  
            <td>$result->Outcome</td>
            <!-- <td><a href='/register'>Reg Info</a></td>    
            <td><a href='/register'>Edit Score</a></td> -->  
 	
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

