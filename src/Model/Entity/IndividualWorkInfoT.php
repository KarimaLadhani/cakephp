<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * IndividualWorkInfoT Entity.
 */
class IndividualWorkInfoT extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'Individual_ID' => true,
        'Level' => true,
        'Work_Address1' => true,
        'Work_Address2' => true,
        'Work_City' => true,
        'Work_State' => true,
        'Work_Postal_Code' => true,
        'Work_Country' => true,
        'Work_Phone' => true,
        'Work_Extension' => true,
        'Work_Fax_Number' => true,
        'Individual_Title' => true,
        'Individual_Department' => true,
        'Individual_Company' => true,
        'Company_Type' => true,
        'Is_Current' => true,
        'Work_Start' => true,
        'Work_End' => true,
        'Work_Responsibilities' => true,
        'Note' => true,
        'Last_Update' => true,
        'Release_Consent_Form' => true,
        'Consent_Date' => true,
        'PIndividual_Company' => true,
        'PIndividual_Title' => true,
        'PWork_Start' => true,
        'PWork_End' => true,
        'PWork_City' => true,
        'PState' => true,
        'PWork_Responsibilities' => true,
    ];
}
