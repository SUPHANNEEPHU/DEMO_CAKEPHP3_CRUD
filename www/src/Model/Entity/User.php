<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

use Cake\Auth\DefaultPasswordHasher;


/**
 * User Entity
 *
 * @property int $id
 * @property string $ref_code
 * @property string $username
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $office_phone
 * @property string $mobile_phone
 * @property \Cake\I18n\FrozenDate $birth_date
 * @property string $address
 * @property string $moo
 * @property string $road
 * @property string $sub_district
 * @property string $district
 * @property string $province
 * @property string $zipcode
 * @property string $status
 * @property string $picture_path
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $faculty_id
 * @property int $role_id
 * @property int $name_prefix_id
 *
 * @property \App\Model\Entity\Faculty $faculty
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\NamePrefix $name_prefix
 * @property \App\Model\Entity\Course[] $courses
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'ref_code' => true,
        'username' => true,
        'password' => true,
        'first_name' => true,
        'last_name' => true,
        'email' => true,
        'office_phone' => true,
        'mobile_phone' => true,
        'birth_date' => true,
        'address' => true,
        'moo' => true,
        'road' => true,
        'sub_district' => true,
        'district' => true,
        'province' => true,
        'zipcode' => true,
        'status' => true,
        'picture_path' => true,
        'created' => true,
        'modified' => true,
        'faculty_id' => true,
        'role_id' => true,
        'name_prefix_id' => true,
        'faculty' => true,
        'role' => true,
        'name_prefix' => true,
        'courses' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
   
    protected function _setPassword($password){
        if(strlen($password)>0){
            return(new DefaultPasswordHasher)->hash($password);
        }
    }
}
