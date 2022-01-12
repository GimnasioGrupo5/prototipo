<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Entrenadore Entity
 *
 * @property int $id_entrenador
 * @property string|null $nombre
 * @property string|null $salario
 * @property int|null $telefono
 * @property \Cake\I18n\FrozenDate|null $fecha_nacimiento
 * @property int $id_rol
 * @property string|null $usuario
 * @property string $horas_libres
 * @property string $horas_reservadas
 */
class Entrenadore extends Entity
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
        'salario' => true,
        'telefono' => true,
        'fecha_nacimiento' => true,
        'id_rol' => true,
        'usuario' => true,
        'horas_libres' => true,
        'horas_reservadas' => true,
    ];
}
