<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ContactTypeT Entity.
 */
class ContactTypeT extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'Contact_Type' => true,
        'Note' => true,
    ];
}
