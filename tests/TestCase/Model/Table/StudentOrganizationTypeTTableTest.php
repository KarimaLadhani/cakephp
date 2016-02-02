<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StudentOrganizationTypeTTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StudentOrganizationTypeTTable Test Case
 */
class StudentOrganizationTypeTTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.student_organization_type_t'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('StudentOrganizationTypeT') ? [] : ['className' => 'App\Model\Table\StudentOrganizationTypeTTable'];
        $this->StudentOrganizationTypeT = TableRegistry::get('StudentOrganizationTypeT', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StudentOrganizationTypeT);

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
