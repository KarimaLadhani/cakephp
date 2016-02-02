<div class="actions columns large-2 medium-3">
    <h5><?= __('The CEP Institute') ?></h5>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Home'), ['action' => 'dashboard' ]) ?></li>
		<li><?= $this->Html->link(__('Change Login/Password'), ['action' => 'usereditlogin' ]) ?></li>
        <li><?= $this->Html->link(__('Edit User Profile'), ['action' => 'usereditprofile']) ?></li>
        <li><?= $this->Html->link(__('Change Work Information'), ['action' =>'changeworkinfo']) ?></li>
        <li><?= $this->Html->link(__('Register for Exam'), ['action' =>'registerexam']) ?></li>
        <li><?= $this->Html->link(__('View Exam History'), ['action' => 'viewexamhistory']) ?></li>
        <li><?= $this->Html->link(__('Logout'), ['controller'=>'IndividualT','action' => 'logout']) ?></li>               
    </ul>
</div>
<div class="large-10 medium-9 columns">
   <h4><?= h(__('Welcome '.h($results->First_Name).h(' '). h($results->Middle_Initial).h(' ').h($results->Last_Name))) ?></h4>           
     <table cellpadding="0" cellspacing="0">
     <thead>
        <tr> <td><h5 style='color:#15848F'><?= 'Personal Information'  ?></h5></td><td></td></tr>
     </thead>
     <tbody>
      <tr><td><h6 class="subheader"><?= __('Primary Email Address:') ?></td><td><?= h($results->Email_Address) ?></td></tr>            
      <tr><td><h6 class="subheader"><?= __('Primary (Preferred) Contact Information:')  ?></h6></td><td><?= h($results->Address1).h(' '.$results->Address2).h($results->City).h(', ').h($results->Postal_Code) .h(' '.$results->Country) ?></td></tr>  
      <tr><td><h6 class="subheader"><?= __('Primary Phone: ') ?></h6></td><td><?= $results->Home_Phone ?></td></tr>  
      
      <?php
      if($results->Mobile_Phone) 
      echo "<tr><td><h6 class='subheader'>Mobile Phone:</h6></td><td>$results->Mobile_Phone</td></tr>";
      else
      echo "<tr><td><h6 class='subheader'>Mobile Phone:</h6></td><td>---</td></tr>  ";   
   	  ?>   		 
     </tbody>
     </table> 
     
     <table cellpadding="0" cellspacing="0">
     <thead>
        <tr><th> <h5 style='color:#15848F'><?= 'Work Information' ?></h5></th><td></td></tr>        
     </thead>
     <tbody>
     <tr><td>     
     <?php 
            if(!empty($results->workInfo) && $results->workInfo[0]->Individual_Company) {
            echo "<h6 class='subheader'>Company:</h6></td><td>";
            echo $results->workInfo[0]->Individual_Company;
            echo "</td>";
            }
            else
            echo "<h6 class='subheader'>Company:</h6></td><td>---</td>";                  
      ?>
     </td></tr>
      <tr><td>      
     <?php 
            if(!empty($results->workInfo) && $results->workInfo[0]->Individual_Title) {            
            echo "<h6 class='subheader'>Title:</h6></td><td>";
            echo $results->workInfo[0]->Individual_Title;
            echo "</td>";
            }
            else
            echo "<h6 class='subheader'>Title:</h6></td><td>---</td>";                  
             ?>
     </td></tr>
     <tr><td>          
     <?php 
            if(!empty($results->workInfo) && $results->workInfo[0]->Individual_Department) 
            {
            echo "<h6 class='subheader'>Department:</h6></td><td>";
            echo $results->workInfo[0]->Individual_Department;
            echo "</td>";
            }else
            echo "<h6 class='subheader'>Department:</h6></td><td>---</td>";                  
             ?>
     </td></tr>
     
     <tr><td>          
     <?php 
            if(!empty($results->workInfo) && $results->workInfo[0]->Work_Address1) {
            echo "<h6 class='subheader'>Work Address:</h6></td><td><span>";
            echo $results->workInfo[0]->Work_Address1;
            echo "</span><span>";
            echo $results->workInfo[0]->Work_Address2.' ';
            echo "</span><span>";
            echo $results->workInfo[0]->Work_City.' ';
            echo "</span><span>";
            echo $results->workInfo[0]->Work_Postal_Code.' ';
            echo "</span><span>";
            echo $results->workInfo[0]->Work_State.' ';
            echo "</span><span>";
            echo $results->workInfo[0]->Work_Country.' ';
            echo "</span></td>";
            }
            else
            echo "<h6 class='subheader'>Work Address:</h6></td><td>---</td>";
             ?>
     </td></tr>
     <tr><td>
     <?php 
            if(!empty($results->workInfo) && $results->workInfo[0]->Work_Phone){ 
            echo "<h6 class='subheader'>Work Phone:</h6></td><td>";
            echo $results->workInfo[0]->Work_Phone;
            echo "</td>";
            }
            else
            echo "<h6 class='subheader'>Work Phone:</h6></td><td>---</td>";
             ?>
     </td></tr>
     </tbody>
     </table> 
      <!-- THE FOLLOWING HOLD THE REGISTRATION INFORMATION-->
     <table cellpadding="0" cellspacing="0">
     <thead>
        <tr> <td><h5 style='color:#15848F'><?= 'Registration Information'  ?></h5></td><td></td></tr>
     </thead>
     <tbody>
      <?php 
      echo "<tr><td><h6 class='subheader'>Status:</h6></td><td>$status</td></tr>";
      echo "<tr><td><h6 class='subheader'>Exam Registration Status:</h6></td><td>$examstatus</td></tr>";      
      ?>	
     </tbody>
     </table>    
           
     <!-- THE FOLLOWING HOLD THE RECENT EXAM INFORMATION-->
     <table cellpadding="0" cellspacing="0">
     <thead>
        <tr> <td><h5 style='color:#15848F'><?= 'Recent Exam Information'  ?></h5></td><td></td></tr>
     </thead>
     <tbody>
      <?php
      if(!empty($recentexaminfo->Exam_Level)) 
      echo "<tr><td><h6 class='subheader'>Exam Level:</h6></td><td>$recentexaminfo->Exam_Level</td></tr>";
      else
      echo "<tr><td><h6 class='subheader'>Exam Level:</h6></td><td>---</td></tr>  ";   
   	  ?>   		 
   	  <?php
      if(!empty($recentexaminfo->Exam_Date)) 
      echo "<tr><td><h6 class='subheader'>Exam Date:</h6></td><td>$recentexaminfo->Exam_Date</td></tr>";
      else
      echo "<tr><td><h6 class='subheader'>Exam Date:</h6></td><td>---</td></tr>  ";   
   	  ?>   	
   	  <?php
      if(!empty($recentexaminfo->examRegistrationInfo[0]->Location)){ 
	      echo "<tr><td><h6 class='subheader'>Exam Location:</h6></td><td>";
	      echo $recentexaminfo->examRegistrationInfo[0]->Location;
	      echo "</td></tr>";
      }
      else
      echo "<tr><td><h6 class='subheader'>Exam Location:</h6></td><td>---</td></tr>  ";   
   	  ?>      	  
   	  <?php
      if(!empty($recentexaminfo->examRegistrationInfo[0]->Outcome)){ 
	      echo "<tr><td><h6 class='subheader'>Exam Outcome:</h6></td><td>";
	      echo $recentexaminfo->examRegistrationInfo[0]->Outcome;
	      echo "</td></tr>";
      }
      else
      echo "<tr><td><h6 class='subheader'>Exam Outcome:</h6></td><td>---</td></tr>  ";   
	
	 
	  if(!empty($recentexaminfo->examRegistrationInfo[0]->Outcome) && strcmp(strtoupper($recentexaminfo->examRegistrationInfo[0]->Outcome),"FAIL")==0)
	  {	  
	  	echo "<tr><td><h6 class='subheader'>Retake Exam Option:</h6></td><td>";	  
	  	?>	  	
	  	<?= $this->Html->link(__('Retake Exam'), ['action' =>'retakeexam']) ?>
	  	<?php
	  	echo "</td></tr>"; 
	  }
	  
	    if(!empty($recentexaminfo->examRegistrationInfo[0]->Outcome) && (strcmp(strtoupper($recentexaminfo->examRegistrationInfo[0]->Outcome),"NOT YET TAKEN")==0 || strcmp(strtoupper($recentexaminfo->examRegistrationInfo[0]->Outcome),"DEFERRED")==0))
	  {	  
	  	echo "<tr><td><h6 class='subheader'>Defer Exam Option:</h6></td><td>";	  
	  	?>	  	
	  	<?= $this->Html->link(__('Defer Exam'), ['action' =>'deferexam']) ?>
	  	<?php
	  	echo "</td></tr>"; 
	  }
	  
   	  ?>
   	  
     </tbody>
     </table>    	
        </div>
    </div>    
