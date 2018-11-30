<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cultura Entity
 *
 * @property int $id
 * @property string $descricao
 * @property int $canal_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Canal $canal
 * @property \App\Model\Entity\Meta[] $metas
 */
class Cultura extends Entity
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
        'descricao' => true,
        'canal_id' => true,
        'created' => true,
        'modified' => true,
        'canal' => true,
        'metas' => true
    ];
}
