<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Monitores Model
 *
 * @method \App\Model\Entity\Monitore newEmptyEntity()
 * @method \App\Model\Entity\Monitore newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Monitore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Monitore get($primaryKey, $options = [])
 * @method \App\Model\Entity\Monitore findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Monitore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Monitore[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Monitore|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Monitore saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Monitore[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Monitore[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Monitore[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Monitore[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MonitoresTable extends Table
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

        $this->setTable('monitores');
        $this->setDisplayField('id_monitor');
        $this->setPrimaryKey('id_monitor');
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
            ->integer('id_monitor')
            ->allowEmptyString('id_monitor', null, 'create');

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
            ->integer('turno')
            ->requirePresence('turno', 'create')
            ->notEmptyString('turno');

        $validator
            ->integer('actividad_especialista')
            ->requirePresence('actividad_especialista', 'create')
            ->notEmptyString('actividad_especialista');

        return $validator;
    }
}
