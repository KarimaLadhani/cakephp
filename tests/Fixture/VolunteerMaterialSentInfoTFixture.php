<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VolunteerMaterialSentInfoTFixture
 *
 */
class VolunteerMaterialSentInfoTFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'volunteer_material_sent_info_t';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'Volunteer_Material_Sent_Info_ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'Volunteer_ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Volunteer_Material_Sent_Date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'Volunteer_Application_ID' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Level' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Note' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'Volunteer_Application_ID_Index' => ['type' => 'index', 'columns' => ['Volunteer_Application_ID'], 'length' => []],
            'Volunteer_Material_Sent_Info_fk1' => ['type' => 'index', 'columns' => ['Volunteer_ID'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['Volunteer_Material_Sent_Info_ID'], 'length' => []],
            'Volunteer_Material_Sent_Info_fk1' => ['type' => 'foreign', 'columns' => ['Volunteer_ID'], 'references' => ['volunteer_t', 'Volunteer_ID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'Volunteer_Material_Sent_Info_fk2' => ['type' => 'foreign', 'columns' => ['Volunteer_Application_ID'], 'references' => ['volunteer_application_t', 'Volunteer_Application_ID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'Volunteer_Material_Sent_Info_ID' => 1,
            'Volunteer_ID' => 1,
            'Volunteer_Material_Sent_Date' => '2015-12-01',
            'Volunteer_Application_ID' => 1,
            'Level' => 1,
            'Note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
        ],
    ];
}
