<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Notificacionescitas Model
 *
 * @method \App\Model\Entity\Notificacionescita newEmptyEntity()
 * @method \App\Model\Entity\Notificacionescita newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Notificacionescita[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Notificacionescita get($primaryKey, $options = [])
 * @method \App\Model\Entity\Notificacionescita findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Notificacionescita patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Notificacionescita[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Notificacionescita|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Notificacionescita saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Notificacionescita[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Notificacionescita[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Notificacionescita[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Notificacionescita[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class NotificacionescitasTable extends Table
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

        $this->setTable('notificacionescitas');
        $this->setDisplayField('id_notificacion');
        $this->setPrimaryKey('id_notificacion');
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
            ->integer('id_notificacion')
            ->allowEmptyString('id_notificacion', null, 'create');

        $validator
            ->scalar('id_entrenador')
            ->maxLength('id_entrenador', 120)
            ->requirePresence('id_entrenador', 'create')
            ->notEmptyString('id_entrenador');

        $validator
            ->integer('id_actividad')
            ->requirePresence('id_actividad', 'create')
            ->notEmptyString('id_actividad');

        $validator
            ->scalar('notificacion')
            ->maxLength('notificacion', 255)
            ->requirePresence('notificacion', 'create')
            ->notEmptyString('notificacion');

        $validator
            ->boolean('leida')
            ->requirePresence('leida', 'create')
            ->notEmptyString('leida');

        return $validator;
    }
}
