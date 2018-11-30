<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Familia[]|\Cake\Collection\CollectionInterface $familias
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Familia'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Canais'), ['controller' => 'Canais', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Canal'), ['controller' => 'Canais', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Metas'), ['controller' => 'Metas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Meta'), ['controller' => 'Metas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="familias index large-9 medium-8 columns content">
    <h3><?= __('Familias') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descricao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('canal_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($familias as $familia): ?>
            <tr>
                <td><?= $this->Number->format($familia->id) ?></td>
                <td><?= h($familia->descricao) ?></td>
                <td><?= $familia->has('canal') ? $this->Html->link($familia->canal->name, ['controller' => 'Canais', 'action' => 'view', $familia->canal->id]) : '' ?></td>
                <td><?= h($familia->created) ?></td>
                <td><?= h($familia->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $familia->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $familia->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $familia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $familia->id)]) ?>
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
