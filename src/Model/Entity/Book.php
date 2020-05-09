<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Book Entity
 *
 * @property int $id
 * @property int|null $employee_id
 * @property int|null $book_id
 * @property string|null $comment
 *
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\Book[] $books
 * @property \App\Model\Entity\Favorite[] $favorites
 * @property \App\Model\Entity\LendingStatus[] $lending_statuses
 */
class Book extends Entity
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
        'employee_id' => true,
        'book_id' => true,
        'comment' => true,
        'employee' => true,
        'books' => true,
        'favorites' => true,
        'lending_statuses' => true,
    ];
}
