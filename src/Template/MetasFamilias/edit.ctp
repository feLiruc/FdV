<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MetasFamilia $metasFamilia
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $metasFamilia->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $metasFamilia->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Metas Familias'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Metas'), ['controller' => 'Metas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Meta'), ['controller' => 'Metas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Familias'), ['controller' => 'Familias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Familia'), ['controller' => 'Familias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="metasFamilias form large-9 medium-8 columns content">
    <?= $this->Form->create($metasFamilia) ?>
    <fieldset>
        <legend><?= __('Edit Metas Familia') ?></legend>
        <?php
            echo $this->Form->control('meta_id', ['options' => $metas]);
            echo $this->Form->control('familia_id', ['options' => $familias]);
            echo $this->Form->control('volume');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
