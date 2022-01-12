<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Socio Entity
 *
 * @property int $id_socio
 * @property string|null $nombre
 * @property int|null $telefono
 * @property string $email
 * @property string $tipo_cuenta
 * @property int $id_rol
 * @property int $id_entrenador
 * @property bool $suspendido
 * @property string $cuenta_banco
 * @property string $usuario
 */
class Socio extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'nombre' => true,
        'telefono' => true,
        'email' => true,
        'tipo_cuenta' => true,
        'id_rol' => true,
        'id_entrenador' => true,
        'suspendido' => true,
        'cuenta_banco' => true,
        'usuario' => true,
    ];
}
