<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $p_id
 * @property string $p_name
 * @property string $p_purchase_price_money
 * @property string $p_sale_price_money
 * @property string $p_country_of_origin
 *
 * @property \App\Model\Entity\ProductImage[] $product_image
 * @property \App\Model\Entity\Category[] $category
 */
class Product extends Entity
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
        'p_name' => true,
        'p_purchase_price_money' => true,
        'p_sale_price_money' => true,
        'p_country_of_origin' => true,
        'product_image' => true,
        'category' => true
    ];
}
