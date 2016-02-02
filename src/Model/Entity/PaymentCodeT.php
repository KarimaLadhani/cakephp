<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PaymentCodeT Entity.
 */
class PaymentCodeT extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'Payment_Code' => true,
        'Disable' => true,
        'Date_Disabled' => true,
        'Payment_Company' => true,
        'Send_Invoice_To' => true,
        'Date_Paid' => true,
        'Amount_Paid' => true,
        'Check_Number' => true,
        'Note' => true,
        'Invoice_Number' => true,
    ];
}
