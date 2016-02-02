<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CepTFixture
 *
 */
class CepTFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'cep_t';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'Cep_ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'Student_ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Up_To_Date' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => 'Yes', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Active' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => 'Yes', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Date_Received' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'Due_Date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'Note' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'Display_First_Name' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Display_Last_Name' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'Cep_ID_Index' => ['type' => 'index', 'columns' => ['Cep_ID'], 'length' => []],
            'Cep_fk1' => ['type' => 'index', 'columns' => ['Student_ID'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['Cep_ID'], 'length' => []],
            'Cep_fk1' => ['type' => 'foreign', 'columns' => ['Student_ID'], 'references' => ['student_t', 'Student_ID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'Cep_ID' => 1,
            'Student_ID' => 1,
            'Up_To_Date' => 'Lorem ip',
            'Active' => 'Lorem ip',
            'Date_Received' => '2015-12-01',
            'Due_Date' => '2015-12-01',
            'Note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'Display_First_Name' => 'Lorem ipsum dolor sit amet',
            'Display_Last_Name' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
