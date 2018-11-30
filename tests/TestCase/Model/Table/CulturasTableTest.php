<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CulturasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CulturasTable Test Case
 */
class CulturasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CulturasTable
     */
    public $Culturas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.culturas',
        'app.canais',
        'app.metas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Culturas') ? [] : ['className' => CulturasTable::class];
        $this->Culturas = TableRegistry::getTableLocator()->get('Culturas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Culturas);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
