<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ContactCorrespondenceT Entity.
 */
class ContactCorrespondenceT extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'Contact_ID' => true,
        'Correspondence_Type' => true,
        'Correspondence_Date' => true,
        'Correspondence_Time' => true,
        'Subject' => true,
        'Note' => true,
    ];
}
