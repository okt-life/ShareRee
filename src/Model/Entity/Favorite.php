<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Favorite Entity
 *
 * @property int $id
 * @property int|null $employee_id
 * @property int|null $book_id
 * @property int|null $book_info_id
 *
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\Book $book
 * @property \App\Model\Entity\BookInfo $book_info
 */
class Favorite extends Entity
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
        'book_info_id' => true,
        'employee' => true,
        'book' => true,
        'book_info' => true,
    ];
}
