<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Metas Model
 *
 * @property \App\Model\Table\CanaisTable|\Cake\ORM\Association\BelongsTo $Canais
 * @property \App\Model\Table\CulturasTable|\Cake\ORM\Association\BelongsTo $Culturas
 * @property \App\Model\Table\FamiliasTable|\Cake\ORM\Association\BelongsToMany $Familias
 * @property \App\Model\Table\MetasFamiliasTable|\Cake\ORM\Association\HasMany $MetasFamilias
 *
 * @method \App\Model\Entity\Meta get($primaryKey, $options = [])
 * @method \App\Model\Entity\Meta newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Meta[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Meta|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Meta|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Meta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Meta[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Meta findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MetasTable extends Table
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

        $this->setTable('metas');
        $this->setDisplayField('descricao');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Canais', [
            'foreignKey' => 'canal_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Culturas', [
            'foreignKey' => 'cultura_id'
        ]);
        $this->belongsToMany('Familias', [
            'foreignKey' => 'meta_id',
            'targetForeignKey' => 'familia_id',
            'joinTable' => 'metas_familias'
        ]);
        $this->hasMany('MetasFamilias', [
            'foreignKey' => 'meta_id'
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
        $rules->add($rules->existsIn(['cultura_id'], 'Culturas'));

        return $rules;
    }
}
