<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CitasentrenadorTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CitasentrenadorTable Test Case
 */
class CitasentrenadorTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CitasentrenadorTable
     */
    protected $Citasentrenador;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Citasentrenador',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Citasentrenador') ? [] : ['className' => CitasentrenadorTable::class];
        $this->Citasentrenador = $this->getTableLocator()->get('Citasentrenador', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Citasentrenador);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CitasentrenadorTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
