<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cultura $cultura
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cultura->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cultura->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Culturas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Canais'), ['controller' => 'Canais', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Canal'), ['controller' => 'Canais', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Metas'), ['controller' => 'Metas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Meta'), ['controller' => 'Metas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="culturas form large-9 medium-8 columns content">
    <?= $this->Form->create($cultura) ?>
    <fieldset>
        <legend><?= __('Edit Cultura') ?></legend>
        <?php
            echo $this->Form->control('descricao');
            echo $this->Form->control('canal_id', ['options' => $canais]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
