<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Answers Model
 *
 * @property \App\Model\Table\QuestionsTable|\Cake\ORM\Association\BelongsTo $Questions
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Answer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Answer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Answer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Answer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Answer|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Answer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Answer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Answer findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AnswersTable extends Table
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

        $this->setTable('answers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Questions', [
            'foreignKey' => 'question_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->nonNegativeInteger('id', 'IDが不正です')
            ->allowEmpty('id', 'create', 'IDが不正です');

        $validator
            ->scalar('body', '回答内容が不正です')
            ->maxLength('body', 140, '回答内容は140字以内で入力してください')
            ->requirePresence('body', 'create', '回答内容が不正です')
            ->notEmpty('body', '回答内容は必ず入力してください');

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
        $rules->add($rules->existsIn(['question_id'], 'Questions', '質問が既に削除されているため回答することが出来ません'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
