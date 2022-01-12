<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Directores Model
 *
 * @method \App\Model\Entity\Directore newEmptyEntity()
 * @method \App\Model\Entity\Directore newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Directore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Directore get($primaryKey, $options = [])
 * @method \App\Model\Entity\Directore findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Directore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Directore[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Directore|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Directore saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Directore[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Directore[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Directore[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Directore[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DirectoresTable extends Table
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

        $this->setTable('directores');
        $this->setDisplayField('id_director');
        $this->setPrimaryKey('id_director');
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
            ->integer('id_director')
            ->allowEmptyString('id_director', null, 'create');

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

        return $validator;
    }
}
