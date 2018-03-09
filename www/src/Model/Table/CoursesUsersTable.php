<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CoursesUsers Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CoursesTable|\Cake\ORM\Association\BelongsTo $Courses
 *
 * @method \App\Model\Entity\CoursesUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\CoursesUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CoursesUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CoursesUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CoursesUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CoursesUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CoursesUser findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CoursesUsersTable extends Table
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

        $this->setTable('courses_users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Courses', [
            'foreignKey' => 'course_id'
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
            ->allowEmpty('id', 'create');

        $validator
            ->integer('days_attended')
            ->allowEmpty('days_attended');

        $validator
            ->numeric('score')
            ->allowEmpty('score');

        $validator
            ->scalar('grade')
            ->maxLength('grade', 1)
            ->allowEmpty('grade');

        $validator
            ->scalar('status')
            ->maxLength('status', 1)
            ->allowEmpty('status');

        $validator
            ->dateTime('modifed')
            ->allowEmpty('modifed');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['course_id'], 'Courses'));

        return $rules;
    }
}
