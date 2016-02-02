<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ContactT Entity.
 */
class ContactT extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'Region' => true,
        'Last_Meeting_Date' => true,
        'Referred_By' => true,
        'Contact_Type' => true,
        'Date_Created' => true,
        'Note' => true,
    ];
}
