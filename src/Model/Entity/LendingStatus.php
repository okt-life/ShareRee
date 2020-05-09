<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LendingStatus Entity
 *
 * @property int $id
 * @property int|null $book_id
 * @property int|null $employee_id
 * @property \Cake\I18n\FrozenDate|null $from_date
 * @property \Cake\I18n\FrozenDate|null $to_date
 * @property \Cake\I18n\FrozenDate|null $created
 * @property bool|null $returned_flag
 *
 * @property \App\Model\Entity\Book $book
 * @property \App\Model\Entity\Employee $employee
 */
class LendingStatus extends Entity
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
        'book_id' => true,
        'employee_id' => true,
        'from_date' => true,
        'to_date' => true,
        'created' => true,
        'returned_flag' => true,
        'book' => true,
        'employee' => true,
    ];
}
