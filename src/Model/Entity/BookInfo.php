<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BookInfo Entity
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $authors
 * @property int|null $isbn_10
 * @property int|null $isbn_13
 * @property string|null $image_links
 * @property string|null $description
 * @property string|null $published_date
 * @property int|null $page_count
 *
 * @property \App\Model\Entity\Favorite[] $favorites
 */
class BookInfo extends Entity
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
        'title' => true,
        'authors' => true,
        'isbn_10' => true,
        'isbn_13' => true,
        'image_links' => true,
        'description' => true,
        'published_date' => true,
        'page_count' => true,
        'favorites' => true,
    ];
}
