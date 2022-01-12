<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CentrosFixture
 */
class CentrosFixture extends TestFixture
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
                'id_centro' => 1,
                'nombre' => 'Lorem ipsum dolor sit amet',
                'telefono' => 'Lorem ip',
                'direccion' => 'Lorem ipsum dolor sit amet',
                'id_sede' => 1,
            ],
        ];
        parent::init();
    }
}
