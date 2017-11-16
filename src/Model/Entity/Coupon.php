<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Coupon Entity
 *
 * @property int $id
 * @property string $coupon_title
 * @property string $coupon_description
 * @property \Cake\I18n\FrozenTime $start_date
 * @property \Cake\I18n\FrozenTime $end_date
 * @property float $price
 * @property string $image_url
 * @property int $sold
 * @property string $tags
 * @property int $count_search_total
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\SearchStat[] $search_stats
 */
class Coupon extends Entity
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
        'coupon_title' => true,
        'coupon_description' => true,
        'start_date' => true,
        'end_date' => true,
        'price' => true,
        'image_url' => true,
        'sold' => true,
        'tags' => true,
        'count_search_total' => true,
        'created' => true,
        'modified' => true,
        'search_stats' => true
    ];
}
