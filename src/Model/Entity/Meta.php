<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Meta Entity
 *
 * @property int $id
 * @property string $descricao
 * @property int $canal_id
 * @property int|null $cultura_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Canal $canal
 * @property \App\Model\Entity\Cultura $cultura
 * @property \App\Model\Entity\Familia[] $familias
 * @property \App\Model\Entity\MetasFamilia[] $metasfamilia
 */
class Meta extends Entity
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
        'cultura_id' => true,
        'created' => true,
        'modified' => true,
        'canal' => true,
        'cultura' => true,
        'familias' => true
    ];
}
