<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MetasFamilias Model
 *
 * @property \App\Model\Table\MetasTable|\Cake\ORM\Association\BelongsTo $Metas
 * @property \App\Model\Table\FamiliasTable|\Cake\ORM\Association\BelongsTo $Familias
 *
 * @method \App\Model\Entity\MetasFamilia get($primaryKey, $options = [])
 * @method \App\Model\Entity\MetasFamilia newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MetasFamilia[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MetasFamilia|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MetasFamilia|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MetasFamilia patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MetasFamilia[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MetasFamilia findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MetasFamiliasTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('metas_familias');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Metas', [
            'foreignKey' => 'meta_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Familias', [
            'foreignKey' => 'familia_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('volume')
            ->requirePresence('volume', 'create')
            ->notEmpty('volume');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['meta_id'], 'Metas'));
        $rules->add($rules->existsIn(['familia_id'], 'Familias'));

        return $rules;
    }
}
