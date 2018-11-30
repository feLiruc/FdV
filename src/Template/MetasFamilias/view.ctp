<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MetasFamilia $metasFamilia
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Metas Familia'), ['action' => 'edit', $metasFamilia->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Metas Familia'), ['action' => 'delete', $metasFamilia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $metasFamilia->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Metas Familias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Metas Familia'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Metas'), ['controller' => 'Metas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Meta'), ['controller' => 'Metas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Familias'), ['controller' => 'Familias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Familia'), ['controller' => 'Familias', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="metasFamilias view large-9 medium-8 columns content">
    <h3><?= h($metasFamilia->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Meta') ?></th>
            <td><?= $metasFamilia->has('meta') ? $this->Html->link($metasFamilia->meta->descricao, ['controller' => 'Metas', 'action' => 'view', $metasFamilia->meta->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Familia') ?></th>
            <td><?= $metasFamilia->has('familia') ? $this->Html->link($metasFamilia->familia->descricao, ['controller' => 'Familias', 'action' => 'view', $metasFamilia->familia->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($metasFamilia->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Volume') ?></th>
            <td><?= $this->Number->format($metasFamilia->volume) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($metasFamilia->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($metasFamilia->modified) ?></td>
        </tr>
    </table>
</div>
