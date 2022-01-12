<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Serviciosadicionales Model
 *
 * @method \App\Model\Entity\Serviciosadicionale newEmptyEntity()
 * @method \App\Model\Entity\Serviciosadicionale newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Serviciosadicionale[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Serviciosadicionale get($primaryKey, $options = [])
 * @method \App\Model\Entity\Serviciosadicionale findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Serviciosadicionale patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Serviciosadicionale[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Serviciosadicionale|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Serviciosadicionale saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Serviciosadicionale[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Serviciosadicionale[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Serviciosadicionale[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Serviciosadicionale[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ServiciosadicionalesTable extends Table
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

        $this->setTable('serviciosadicionales');
        $this->setDisplayField('id_servicio');
        $this->setPrimaryKey('id_servicio');
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
            ->integer('id_servicio')
            ->allowEmptyString('id_servicio', null, 'create');

        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 200)
            ->requirePresence('nombre', 'create')
            ->notEmptyString('nombre');

        $validator
            ->scalar('precio')
            ->maxLength('precio', 20)
            ->requirePresence('precio', 'create')
            ->notEmptyString('precio');

        $validator
            ->integer('id_centro')
            ->requirePresence('id_centro', 'create')
            ->notEmptyString('id_centro');

        return $validator;
    }
}
