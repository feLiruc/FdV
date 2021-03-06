<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Familia $familia
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Familia'), ['action' => 'edit', $familia->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Familia'), ['action' => 'delete', $familia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $familia->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Familias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Familia'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Canais'), ['controller' => 'Canais', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Canal'), ['controller' => 'Canais', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Metas'), ['controller' => 'Metas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Meta'), ['controller' => 'Metas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="familias view large-9 medium-8 columns content">
    <h3><?= h($familia->descricao) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($familia->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Canal') ?></th>
            <td><?= $familia->has('canal') ? $this->Html->link($familia->canal->name, ['controller' => 'Canais', 'action' => 'view', $familia->canal->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($familia->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($familia->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($familia->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Metas') ?></h4>
        <?php if (!empty($familia->metas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Descricao') ?></th>
                <th scope="col"><?= __('Canal Id') ?></th>
                <th scope="col"><?= __('Cultura Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($familia->metas as $metas): ?>
            <tr>
                <td><?= h($metas->id) ?></td>
                <td><?= h($metas->descricao) ?></td>
                <td><?= h($metas->canal_id) ?></td>
                <td><?= h($metas->cultura_id) ?></td>
                <td><?= h($metas->created) ?></td>
                <td><?= h($metas->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Metas', 'action' => 'view', $metas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Metas', 'action' => 'edit', $metas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Metas', 'action' => 'delete', $metas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $metas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
