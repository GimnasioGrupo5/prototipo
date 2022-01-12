<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tipoactividades Model
 *
 * @method \App\Model\Entity\Tipoactividade newEmptyEntity()
 * @method \App\Model\Entity\Tipoactividade newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Tipoactividade[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tipoactividade get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tipoactividade findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Tipoactividade patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tipoactividade[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tipoactividade|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tipoactividade saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tipoactividade[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tipoactividade[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tipoactividade[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tipoactividade[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TipoactividadesTable extends Table
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

        $this->setTable('tipoactividades');
        $this->setDisplayField('id_actividad');
        $this->setPrimaryKey('id_actividad');
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
            ->integer('id_actividad')
            ->allowEmptyString('id_actividad', null, 'create');

        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 200)
            ->requirePresence('nombre', 'create')
            ->notEmptyString('nombre');

        $validator
            ->scalar('tipo')
            ->maxLength('tipo', 150)
            ->requirePresence('tipo', 'create')
            ->notEmptyString('tipo');

        return $validator;
    }
}
