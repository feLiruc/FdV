<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MetasFamilia Entity
 *
 * @property int $id
 * @property int $meta_id
 * @property int $familia_id
 * @property int $volume
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Meta $meta
 * @property \App\Model\Entity\Familia $familia
 */
class MetasFamilia extends Entity
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
        'meta_id' => true,
        'familia_id' => true,
        'volume' => true,
        'created' => true,
        'modified' => true,
        'meta' => true,
        'familia' => true
    ];
}
