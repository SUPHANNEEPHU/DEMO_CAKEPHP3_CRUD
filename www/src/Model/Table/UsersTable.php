<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\FacultiesTable|\Cake\ORM\Association\BelongsTo $Faculties
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsTo $Roles
 * @property \App\Model\Table\NamePrefixesTable|\Cake\ORM\Association\BelongsTo $NamePrefixes
 * @property \App\Model\Table\CoursesTable|\Cake\ORM\Association\BelongsToMany $Courses
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Faculties', [
            'foreignKey' => 'faculty_id'
        ]);
        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id'
        ]);
        $this->belongsTo('NamePrefixes', [
            'foreignKey' => 'name_prefix_id'
        ]);
        $this->belongsToMany('Courses', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'course_id',
            'joinTable' => 'courses_users'
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
            ->scalar('ref_code')
            ->maxLength('ref_code', 32)
            ->allowEmpty('ref_code');

        $validator
            ->scalar('username')
            ->maxLength('username', 64)
            ->allowEmpty('username');

        $validator
            ->scalar('password')
            ->maxLength('password', 150)
            ->allowEmpty('password');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 150)
            ->allowEmpty('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 150)
            ->allowEmpty('last_name');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->scalar('office_phone')
            ->maxLength('office_phone', 50)
            ->allowEmpty('office_phone');

        $validator
            ->scalar('mobile_phone')
            ->maxLength('mobile_phone', 20)
            ->allowEmpty('mobile_phone');

        $validator
            ->date('birth_date')
            ->allowEmpty('birth_date');

        $validator
            ->scalar('address')
            ->maxLength('address', 50)
            ->allowEmpty('address');

        $validator
            ->scalar('moo')
            ->maxLength('moo', 50)
            ->allowEmpty('moo');

        $validator
            ->scalar('road')
            ->maxLength('road', 50)
            ->allowEmpty('road');

        $validator
            ->scalar('sub_district')
            ->maxLength('sub_district', 50)
            ->allowEmpty('sub_district');

        $validator
            ->scalar('district')
            ->maxLength('district', 50)
            ->allowEmpty('district');

        $validator
            ->scalar('province')
            ->maxLength('province', 50)
            ->allowEmpty('province');

        $validator
            ->scalar('zipcode')
            ->maxLength('zipcode', 50)
            ->allowEmpty('zipcode');

        $validator
            ->scalar('status')
            ->maxLength('status', 1)
            ->allowEmpty('status');

        $validator
            ->scalar('picture_path')
            ->maxLength('picture_path', 200)
            ->allowEmpty('picture_path');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['faculty_id'], 'Faculties'));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));
        $rules->add($rules->existsIn(['name_prefix_id'], 'NamePrefixes'));

        return $rules;
    }
}
