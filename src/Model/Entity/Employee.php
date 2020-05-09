<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employee Entity
 *
 * @property int $id
 * @property string|null $pass
 * @property string|null $name
 * @property int|null $department_id
 * @property int|null $location_id
 *
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\Book[] $books
 * @property \App\Model\Entity\FavoriteTag[] $favorite_tags
 * @property \App\Model\Entity\Favorite[] $favorites
 * @property \App\Model\Entity\LendingStatus[] $lending_statuses
 */
class Employee extends Entity
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
        'pass' => true,
        'name' => true,
        'department_id' => true,
        'location_id' => true,
        'department' => true,
        'location' => true,
        'books' => true,
        'favorite_tags' => true,
        'favorites' => true,
        'lending_statuses' => true,
    ];
}
