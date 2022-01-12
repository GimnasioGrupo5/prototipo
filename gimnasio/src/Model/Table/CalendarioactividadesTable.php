<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Calendarioactividades Model
 *
 * @method \App\Model\Entity\Calendarioactividade newEmptyEntity()
 * @method \App\Model\Entity\Calendarioactividade newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Calendarioactividade[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Calendarioactividade get($primaryKey, $options = [])
 * @method \App\Model\Entity\Calendarioactividade findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Calendarioactividade patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Calendarioactividade[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Calendarioactividade|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Calendarioactividade saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Calendarioactividade[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Calendarioactividade[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Calendarioactividade[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Calendarioactividade[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CalendarioactividadesTable extends Table
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

        $this->setTable('calendarioactividades');
        $this->setDisplayField('id_registro');
        $this->setPrimaryKey('id_registro');
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
            ->integer('id_registro')
            ->allowEmptyString('id_registro', null, 'create');

        $validator
            ->integer('id_actividad')
            ->allowEmptyString('id_actividad');

        $validator
            ->integer('id_sala')
            ->requirePresence('id_sala', 'create')
            ->notEmptyString('id_sala');

        $validator
            ->integer('id_monitor')
            ->requirePresence('id_monitor', 'create')
            ->notEmptyString('id_monitor');

        $validator
            ->date('fecha')
            ->allowEmptyDate('fecha');

        $validator
            ->scalar('horario')
            ->maxLength('horario', 150)
            ->requirePresence('horario', 'create')
            ->notEmptyString('horario');

        $validator
            ->integer('ocupacion')
            ->allowEmptyString('ocupacion');

        return $validator;
    }
}
