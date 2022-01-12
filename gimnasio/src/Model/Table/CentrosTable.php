<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Centros Model
 *
 * @method \App\Model\Entity\Centro newEmptyEntity()
 * @method \App\Model\Entity\Centro newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Centro[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Centro get($primaryKey, $options = [])
 * @method \App\Model\Entity\Centro findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Centro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Centro[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Centro|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Centro saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Centro[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Centro[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Centro[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Centro[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CentrosTable extends Table
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

        $this->setTable('centros');
        $this->setDisplayField('id_centro');
        $this->setPrimaryKey('id_centro');
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
            ->integer('id_centro')
            ->allowEmptyString('id_centro', null, 'create');

        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 200)
            ->requirePresence('nombre', 'create')
            ->notEmptyString('nombre');

        $validator
            ->scalar('telefono')
            ->maxLength('telefono', 10)
            ->requirePresence('telefono', 'create')
            ->notEmptyString('telefono');

        $validator
            ->scalar('direccion')
            ->maxLength('direccion', 255)
            ->requirePresence('direccion', 'create')
            ->notEmptyString('direccion');

        $validator
            ->integer('id_sede')
            ->requirePresence('id_sede', 'create')
            ->notEmptyString('id_sede');

        return $validator;
    }
}
