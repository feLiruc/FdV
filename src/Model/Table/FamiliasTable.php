<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Familias Model
 *
 * @property \App\Model\Table\CanaisTable|\Cake\ORM\Association\BelongsTo $Canais
 * @property \App\Model\Table\MetasTable|\Cake\ORM\Association\BelongsToMany $Metas
 *
 * @method \App\Model\Entity\Familia get($primaryKey, $options = [])
 * @method \App\Model\Entity\Familia newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Familia[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Familia|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Familia|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Familia patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Familia[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Familia findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FamiliasTable extends Table
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

        $this->setTable('familias');
        $this->setDisplayField('descricao');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Canais', [
            'foreignKey' => 'canal_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Metas', [
            'foreignKey' => 'familia_id',
            'targetForeignKey' => 'meta_id',
            'joinTable' => 'metas_familias'
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
            ->scalar('descricao')
            ->maxLength('descricao', 255)
            ->requirePresence('descricao', 'create')
            ->notEmpty('descricao');

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
        $rules->add($rules->existsIn(['canal_id'], 'Canais'));

        return $rules;
    }
}
