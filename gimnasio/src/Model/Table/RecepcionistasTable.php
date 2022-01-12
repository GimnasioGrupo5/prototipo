<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Recepcionistas Model
 *
 * @method \App\Model\Entity\Recepcionista newEmptyEntity()
 * @method \App\Model\Entity\Recepcionista newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Recepcionista[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Recepcionista get($primaryKey, $options = [])
 * @method \App\Model\Entity\Recepcionista findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Recepcionista patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Recepcionista[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Recepcionista|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Recepcionista saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Recepcionista[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Recepcionista[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Recepcionista[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Recepcionista[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RecepcionistasTable extends Table
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

        $this->setTable('recepcionistas');
        $this->setDisplayField('id_recepcionista');
        $this->setPrimaryKey('id_recepcionista');
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
            ->integer('id_recepcionista')
            ->allowEmptyString('id_recepcionista', null, 'create');

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
