<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Uploadregdate Entity.
 */
class Uploadregdate extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'Student_ID' => true,
        'Exam_ID' => true,
        'Outcome' => true,
        'Date_Materials_Sent' => true,
        'Retest' => true,
        'Payer_Name' => true,
        'Payment_Type' => true,
        'Check_Number' => true,
        'Check_Date' => true,
        'Check_Name' => true,
        'Verisign_Transaction_Number' => true,
        'Verisign_Address_Line1' => true,
        'Verisign_Address_Line2' => true,
        'Payment_Code_ID' => true,
        'Payment_Execution_Date_Time' => true,
        'Amount_Charged' => true,
        'Amount_Paid' => true,
        'Disability_Accomodations' => true,
        'Alternate_Test_Site_Requirement' => true,
        'Location' => true,
        'Registration_Complete_Flag' => true,
        'Mail_Confirmation' => true,
        'Status' => true,
        'Date_Passed' => true,
        'Raw_Passing_Score' => true,
        'Required_Non_Saturday_Admission' => true,
        'Release_Contact_Info_To_Others' => true,
        'Note' => true,
    ];
}
