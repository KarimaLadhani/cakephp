<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CeApplicationT Entity.
 */
class CeApplicationT extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'Cep_ID' => true,
        'Application_Date' => true,
        'Payment_Type' => true,
        'Payer_Name' => true,
        'Check_Number' => true,
        'Check_Date' => true,
        'Check_Name' => true,
        'Verisign_Transaction_Number' => true,
        'Verisign_Address_Line1' => true,
        'Verisign_Address_Line2' => true,
        'Payment_Execution_Date_Time' => true,
        'Amount_Charged' => true,
        'Amount_Paid' => true,
        'Approval_Flag' => true,
        'Approval_Date' => true,
        'New_Due_Date' => true,
        'Extension' => true,
        'Date_Recertified' => true,
        'Application_Already_Submitted' => true,
        'Times_Submitted' => true,
        'Resubmission_Flag' => true,
        'Note' => true,
    ];
}
