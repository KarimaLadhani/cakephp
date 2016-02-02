<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CeApplicationTFixture
 *
 */
class CeApplicationTFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'ce_application_t';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'Ce_Application_ID' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'Cep_ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Application_Date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'Payment_Type' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Payer_Name' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Check_Number' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Check_Date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'Check_Name' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Verisign_Transaction_Number' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Verisign_Address_Line1' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Verisign_Address_Line2' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Payment_Execution_Date_Time' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'Amount_Charged' => ['type' => 'decimal', 'length' => 19, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'Amount_Paid' => ['type' => 'decimal', 'length' => 19, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'Approval_Flag' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Approval_Date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'New_Due_Date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'Extension' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Date_Recertified' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'Application_Already_Submitted' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Times_Submitted' => ['type' => 'integer', 'length' => 2, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Resubmission_Flag' => ['type' => 'string', 'length' => 5, 'null' => false, 'default' => 'OFF', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Note' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'Application_ID_Index' => ['type' => 'index', 'columns' => ['Ce_Application_ID'], 'length' => []],
            'Ce_Application_fk1' => ['type' => 'index', 'columns' => ['Cep_ID'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['Ce_Application_ID'], 'length' => []],
            'Ce_Application_fk1' => ['type' => 'foreign', 'columns' => ['Cep_ID'], 'references' => ['cep_t', 'Cep_ID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'Ce_Application_ID' => 1,
            'Cep_ID' => 1,
            'Application_Date' => '2015-12-01',
            'Payment_Type' => 'Lorem ipsum dolor sit amet',
            'Payer_Name' => 'Lorem ipsum dolor sit amet',
            'Check_Number' => 'Lorem ipsum dolor sit amet',
            'Check_Date' => '2015-12-01',
            'Check_Name' => 'Lorem ipsum dolor sit amet',
            'Verisign_Transaction_Number' => 'Lorem ipsum dolor sit amet',
            'Verisign_Address_Line1' => 'Lorem ipsum dolor sit amet',
            'Verisign_Address_Line2' => 'Lorem ipsum dolor sit amet',
            'Payment_Execution_Date_Time' => '2015-12-01',
            'Amount_Charged' => '',
            'Amount_Paid' => '',
            'Approval_Flag' => 'Lorem ip',
            'Approval_Date' => '2015-12-01',
            'New_Due_Date' => '2015-12-01',
            'Extension' => 'Lorem ip',
            'Date_Recertified' => '2015-12-01',
            'Application_Already_Submitted' => 'Lorem ipsum dolor sit amet',
            'Times_Submitted' => 1,
            'Resubmission_Flag' => 'Lor',
            'Note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
        ],
    ];
}
