<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipoactividadesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipoactividadesTable Test Case
 */
class TipoactividadesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TipoactividadesTable
     */
    protected $Tipoactividades;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Tipoactividades',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Tipoactividades') ? [] : ['className' => TipoactividadesTable::class];
        $this->Tipoactividades = $this->getTableLocator()->get('Tipoactividades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Tipoactividades);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TipoactividadesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
