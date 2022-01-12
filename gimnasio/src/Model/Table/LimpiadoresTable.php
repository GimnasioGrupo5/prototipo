<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Limpiadores Model
 *
 * @method \App\Model\Entity\Limpiadore newEmptyEntity()
 * @method \App\Model\Entity\Limpiadore newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Limpiadore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Limpiadore get($primaryKey, $options = [])
 * @method \App\Model\Entity\Limpiadore findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Limpiadore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Limpiadore[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Limpiadore|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Limpiadore saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Limpiadore[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Limpiadore[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Limpiadore[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Limpiadore[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LimpiadoresTable extends Table
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

        $this->setTable('limpiadores');
        $this->setDisplayField('id_limpiador');
        $this->setPrimaryKey('id_limpiador');
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
            ->integer('id_limpiador')
            ->allowEmptyString('id_limpiador', null, 'create');

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
            ->requirePresence('usuario', 'create')
            ->notEmptyString('usuario');

        $validator
            ->scalar('turno')
            ->maxLength('turno', 10)
            ->requirePresence('turno', 'create')
            ->notEmptyString('turno');

        $validator
            ->integer('zona')
            ->requirePresence('zona', 'create')
            ->notEmptyString('zona');

        return $validator;
    }
}
