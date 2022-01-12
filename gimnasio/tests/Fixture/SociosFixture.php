<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SociosFixture
 */
class SociosFixture extends TestFixture
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
                'id_socio' => 1,
                'nombre' => 'Lorem ipsum dolor sit amet',
                'telefono' => 1,
                'email' => 'Lorem ipsum dolor sit amet',
                'tipo_cuenta' => 'Lorem ipsum dolor sit amet',
                'id_rol' => 1,
                'id_entrenador' => 1,
                'suspendido' => 1,
                'cuenta_banco' => 'Lorem ipsum dolor sit amet',
                'usuario' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
