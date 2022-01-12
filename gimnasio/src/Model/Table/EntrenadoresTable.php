<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Entrenadores Model
 *
 * @method \App\Model\Entity\Entrenadore newEmptyEntity()
 * @method \App\Model\Entity\Entrenadore newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Entrenadore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Entrenadore get($primaryKey, $options = [])
 * @method \App\Model\Entity\Entrenadore findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Entrenadore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Entrenadore[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Entrenadore|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Entrenadore saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Entrenadore[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Entrenadore[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Entrenadore[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Entrenadore[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class EntrenadoresTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('entrenadores');
        $this->setDisplayField('id_entrenador');
        $this->setPrimaryKey('id_entrenador');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id_entrenador')
            ->allowEmptyString('id_entrenador', null, 'create');

        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 155)
            ->allowEmptyString('nombre');

        $validator
            ->decimal('salario')
            ->allowEmptyString('salario');

        $validator
            ->integer('telefono')
            ->allowEmptyString('telefono');

        $validator
            ->date('fecha_nacimiento')
            ->allowEmptyDate('fecha_nacimiento');

        $validator
            ->integer('id_rol')
            ->requirePresence('id_rol', 'create')
            ->notEmptyString('id_rol');

        $validator
            ->scalar('usuario')
            ->maxLength('usuario', 255)
            ->allowEmptyString('usuario');

        $validator
            ->scalar('horas_libres')
            ->maxLength('horas_libres', 10)
            ->requirePresence('horas_libres', 'create')
            ->notEmptyString('horas_libres');

        $validator
            ->scalar('horas_reservadas')
            ->maxLength('horas_reservadas', 10)
            ->requirePresence('horas_reservadas', 'create')
            ->notEmptyString('horas_reservadas');

        return $validator;
    }
}
