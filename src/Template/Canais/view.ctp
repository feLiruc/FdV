<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $canal
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Canal'), ['action' => 'edit', $canal->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Canal'), ['action' => 'delete', $canal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $canal->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Canais'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Canal'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="canais view large-9 medium-8 columns content">
    <h3><?= h($canal->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($canal->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($canal->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($canal->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($canal->modified) ?></td>
        </tr>
    </table>
</div>
