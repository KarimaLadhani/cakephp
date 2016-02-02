<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VolunteerMaterialSentInfoTTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VolunteerMaterialSentInfoTTable Test Case
 */
class VolunteerMaterialSentInfoTTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.volunteer_material_sent_info_t'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VolunteerMaterialSentInfoT') ? [] : ['className' => 'App\Model\Table\VolunteerMaterialSentInfoTTable'];
        $this->VolunteerMaterialSentInfoT = TableRegistry::get('VolunteerMaterialSentInfoT', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VolunteerMaterialSentInfoT);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
