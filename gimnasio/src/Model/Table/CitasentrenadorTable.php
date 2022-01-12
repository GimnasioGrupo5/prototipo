<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Citasentrenador Model
 *
 * @method \App\Model\Entity\Citasentrenador newEmptyEntity()
 * @method \App\Model\Entity\Citasentrenador newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Citasentrenador[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Citasentrenador get($primaryKey, $options = [])
 * @method \App\Model\Entity\Citasentrenador findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Citasentrenador patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Citasentrenador[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Citasentrenador|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Citasentrenador saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Citasentrenador[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Citasentrenador[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Citasentrenador[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Citasentrenador[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CitasentrenadorTable extends Table
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

        $this->setTable('citasentrenador');
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
            ->integer('id_socio')
            ->requirePresence('id_socio', 'create')
            ->notEmptyString('id_socio');

        $validator
            ->integer('id_entrenador')
            ->requirePresence('id_entrenador', 'create')
            ->notEmptyString('id_entrenador');

        $validator
            ->date('fecha')
            ->requirePresence('fecha', 'create')
            ->notEmptyDate('fecha');

        $validator
            ->time('hora')
            ->requirePresence('hora', 'create')
            ->notEmptyTime('hora');

        return $validator;
    }
}
