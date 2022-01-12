<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ActividadesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ActividadesTable Test Case
 */
class ActividadesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ActividadesTable
     */
    protected $Actividades;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Actividades',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Actividades') ? [] : ['className' => ActividadesTable::class];
        $this->Actividades = $this->getTableLocator()->get('Actividades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Actividades);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ActividadesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
