<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Actividades Model
 *
 * @method \App\Model\Entity\Actividade newEmptyEntity()
 * @method \App\Model\Entity\Actividade newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Actividade[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Actividade get($primaryKey, $options = [])
 * @method \App\Model\Entity\Actividade findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Actividade patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Actividade[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Actividade|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Actividade saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Actividade[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Actividade[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Actividade[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Actividade[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ActividadesTable extends Table
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

        $this->setTable('actividades');
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
            ->scalar('nombre')
            ->maxLength('nombre', 200)
            ->requirePresence('nombre', 'create')
            ->notEmptyString('nombre');

        $validator
            ->date('fecha')
            ->requirePresence('fecha', 'create')
            ->notEmptyDate('fecha');

        $validator
            ->integer('nota_evaluacion')
            ->requirePresence('nota_evaluacion', 'create')
            ->notEmptyString('nota_evaluacion');

        $validator
            ->scalar('comentario')
            ->maxLength('comentario', 255)
            ->requirePresence('comentario', 'create')
            ->notEmptyString('comentario');

        $validator
            ->boolean('reserva')
            ->requirePresence('reserva', 'create')
            ->notEmptyString('reserva');

        $validator
            ->boolean('asistencia')
            ->requirePresence('asistencia', 'create')
            ->notEmptyString('asistencia');

        $validator
            ->integer('id_sala')
            ->requirePresence('id_sala', 'create')
            ->notEmptyString('id_sala');

        $validator
            ->integer('id_actividad')
            ->requirePresence('id_actividad', 'create')
            ->notEmptyString('id_actividad');

        $validator
            ->integer('id_socio')
            ->requirePresence('id_socio', 'create')
            ->notEmptyString('id_socio');

        $validator
            ->integer('id_monitor')
            ->requirePresence('id_monitor', 'create')
            ->notEmptyString('id_monitor');

        return $validator;
    }
}
