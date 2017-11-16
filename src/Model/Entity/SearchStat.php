<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SearchStat Entity
 *
 * @property int $id
 * @property int $coupon_id
 * @property string $search_keyword
 * @property int $count_total
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Coupon $coupon
 */
class SearchStat extends Entity
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
        'coupon_id' => true,
        'search_keyword' => true,
        'count_total' => true,
        'created' => true,
        'modified' => true,
        'coupon' => true
    ];
}
