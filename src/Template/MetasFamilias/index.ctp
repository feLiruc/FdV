<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MetasFamilia[]|\Cake\Collection\CollectionInterface $metasFamilias
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Metas Familia'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Metas'), ['controller' => 'Metas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Meta'), ['controller' => 'Metas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Familias'), ['controller' => 'Familias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Familia'), ['controller' => 'Familias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="metasFamilias index large-9 medium-8 columns content">
    <h3><?= __('Metas Familias') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('meta_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('familia_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('volume') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($metasFamilias as $metasFamilia): ?>
            <tr>
                <td><?= $this->Number->format($metasFamilia->id) ?></td>
                <td><?= $metasFamilia->has('meta') ? $this->Html->link($metasFamilia->meta->descricao, ['controller' => 'Metas', 'action' => 'view', $metasFamilia->meta->id]) : '' ?></td>
                <td><?= $metasFamilia->has('familia') ? $this->Html->link($metasFamilia->familia->descricao, ['controller' => 'Familias', 'action' => 'view', $metasFamilia->familia->id]) : '' ?></td>
                <td><?= $this->Number->format($metasFamilia->volume) ?></td>
                <td><?= h($metasFamilia->created) ?></td>
                <td><?= h($metasFamilia->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $metasFamilia->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $metasFamilia->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $metasFamilia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $metasFamilia->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
