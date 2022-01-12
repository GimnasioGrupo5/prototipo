<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ServiciosadicionalesFixture
 */
class ServiciosadicionalesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id_servicio' => 1,
                'nombre' => 'Lorem ipsum dolor sit amet',
                'precio' => 'Lorem ipsum dolor ',
                'id_centro' => 1,
            ],
        ];
        parent::init();
    }
}
