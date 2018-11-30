<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Meta $meta
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Metas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Canais'), ['controller' => 'Canais', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Canal'), ['controller' => 'Canais', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Culturas'), ['controller' => 'Culturas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cultura'), ['controller' => 'Culturas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Familias'), ['controller' => 'Familias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Familia'), ['controller' => 'Familias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="metas form large-9 medium-8 columns content">
    <?= $this->Form->create($meta) ?>
    <fieldset>
        <legend><?= __('Add Meta') ?></legend>
        <?php
            echo $this->Form->control('descricao');
            echo $this->Form->control('cultura_id', ['options' => $culturas, 'empty' => '(META GERAL)']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
