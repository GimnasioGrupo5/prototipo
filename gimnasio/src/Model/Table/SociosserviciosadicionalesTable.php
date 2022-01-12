<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sociosserviciosadicionales Model
 *
 * @method \App\Model\Entity\Sociosserviciosadicionale newEmptyEntity()
 * @method \App\Model\Entity\Sociosserviciosadicionale newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Sociosserviciosadicionale[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sociosserviciosadicionale get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sociosserviciosadicionale findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Sociosserviciosadicionale patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sociosserviciosadicionale[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sociosserviciosadicionale|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sociosserviciosadicionale saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sociosserviciosadicionale[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sociosserviciosadicionale[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sociosserviciosadicionale[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sociosserviciosadicionale[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SociosserviciosadicionalesTable extends Table
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

        $this->setTable('sociosserviciosadicionales');
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
            ->integer('id_servicio')
            ->requirePresence('id_servicio', 'create')
            ->notEmptyString('id_servicio');

        $validator
            ->date('fecha')
            ->requirePresence('fecha', 'create')
            ->notEmptyDate('fecha');

        return $validator;
    }
}
