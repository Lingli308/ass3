<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Product Model
 *
 * @property \App\Model\Table\ProductImageTable&\Cake\ORM\Association\HasMany $ProductImage
 * @property \App\Model\Table\CategoryTable&\Cake\ORM\Association\BelongsToMany $Category
 *
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductTable extends Table
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

        $this->setTable('product');
        $this->setDisplayField('p_id');
        $this->setPrimaryKey('p_id');

        $this->hasMany('ProductImage', [
            'foreignKey' => 'product_id'
        ]);
        $this->belongsToMany('Category', [
            'foreignKey' => 'product_id',
            'targetForeignKey' => 'category_id',
            'joinTable' => 'product_category'
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
            ->integer('p_id')
            ->allowEmptyString('p_id', null, 'create');

        $validator
            ->scalar('p_name')
            ->maxLength('p_name', 30)
            ->requirePresence('p_name', 'create')
            ->notEmptyString('p_name');

        $validator
            ->scalar('p_purchase_price_money')
            ->maxLength('p_purchase_price_money', 40)
            ->requirePresence('p_purchase_price_money', 'create')
            ->notEmptyString('p_purchase_price_money');

        $validator
            ->scalar('p_sale_price_money')
            ->maxLength('p_sale_price_money', 40)
            ->requirePresence('p_sale_price_money', 'create')
            ->notEmptyString('p_sale_price_money');

        $validator
            ->scalar('p_country_of_origin')
            ->maxLength('p_country_of_origin', 40)
            ->requirePresence('p_country_of_origin', 'create')
            ->notEmptyString('p_country_of_origin');

        return $validator;
    }
}
