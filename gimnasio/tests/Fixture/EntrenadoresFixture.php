<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EntrenadoresFixture
 */
class EntrenadoresFixture extends TestFixture
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
                'id_entrenador' => 1,
                'nombre' => 'Lorem ipsum dolor sit amet',
                'salario' => 1.5,
                'telefono' => 1,
                'fecha_nacimiento' => '2021-12-29',
                'id_rol' => 1,
                'usuario' => 'Lorem ipsum dolor sit amet',
                'horas_libres' => 'Lorem ip',
                'horas_reservadas' => 'Lorem ip',
            ],
        ];
        parent::init();
    }
}
