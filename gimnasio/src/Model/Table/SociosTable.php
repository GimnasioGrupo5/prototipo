<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Socios Model
 *
 * @method \App\Model\Entity\Socio newEmptyEntity()
 * @method \App\Model\Entity\Socio newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Socio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Socio get($primaryKey, $options = [])
 * @method \App\Model\Entity\Socio findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Socio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Socio[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Socio|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Socio saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Socio[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Socio[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Socio[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Socio[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SociosTable extends Table
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

        $this->setTable('socios');
        $this->setDisplayField('id_socio');
        $this->setPrimaryKey('id_socio');
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
            ->integer('id_socio')
            ->allowEmptyString('id_socio', null, 'create');

        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 155)
            ->allowEmptyString('nombre');

        $validator
            ->integer('telefono')
            ->allowEmptyString('telefono');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('tipo_cuenta')
            ->maxLength('tipo_cuenta', 50)
            ->requirePresence('tipo_cuenta', 'create')
            ->notEmptyString('tipo_cuenta');

        $validator
            ->integer('id_rol')
            ->requirePresence('id_rol', 'create')
            ->notEmptyString('id_rol');

        $validator
            ->integer('id_entrenador')
            ->requirePresence('id_entrenador', 'create')
            ->notEmptyString('id_entrenador');

        $validator
            ->boolean('suspendido')
            ->requirePresence('suspendido', 'create')
            ->notEmptyString('suspendido');

        $validator
            ->scalar('cuenta_banco')
            ->maxLength('cuenta_banco', 50)
            ->requirePresence('cuenta_banco', 'create')
            ->notEmptyString('cuenta_banco');

        $validator
            ->scalar('usuario')
            ->maxLength('usuario', 255)
            ->requirePresence('usuario', 'create')
            ->notEmptyString('usuario');

        return $validator;
    }
}
