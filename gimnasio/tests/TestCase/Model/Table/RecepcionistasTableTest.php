<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecepcionistasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecepcionistasTable Test Case
 */
class RecepcionistasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RecepcionistasTable
     */
    protected $Recepcionistas;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Recepcionistas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Recepcionistas') ? [] : ['className' => RecepcionistasTable::class];
        $this->Recepcionistas = $this->getTableLocator()->get('Recepcionistas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Recepcionistas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RecepcionistasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
