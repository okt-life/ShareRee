<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BookInfos Model
 *
 * @property \App\Model\Table\FavoritesTable&\Cake\ORM\Association\HasMany $Favorites
 *
 * @method \App\Model\Entity\BookInfo get($primaryKey, $options = [])
 * @method \App\Model\Entity\BookInfo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BookInfo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BookInfo|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BookInfo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BookInfo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BookInfo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BookInfo findOrCreate($search, callable $callback = null, $options = [])
 */
class BookInfosTable extends Table
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

        $this->setTable('book_infos');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->hasMany('Favorites', [
            'foreignKey' => 'book_info_id',
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 350)
            ->allowEmptyString('title');

        $validator
            ->scalar('authors')
            ->maxLength('authors', 255)
            ->allowEmptyString('authors');

        $validator
            ->integer('isbn_10')
            ->allowEmptyString('isbn_10');

        $validator
            ->integer('isbn_13')
            ->allowEmptyString('isbn_13');

        $validator
            ->scalar('image_links')
            ->maxLength('image_links', 255)
            ->allowEmptyFile('image_links');

        $validator
            ->scalar('description')
            ->maxLength('description', 800)
            ->allowEmptyString('description');

        $validator
            ->scalar('published_date')
            ->maxLength('published_date', 20)
            ->allowEmptyString('published_date');

        $validator
            ->integer('page_count')
            ->allowEmptyString('page_count');

        return $validator;
    }
}
