<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Meta[]|\Cake\Collection\CollectionInterface $metas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Meta'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Canais'), ['controller' => 'Canais', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Canal'), ['controller' => 'Canais', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Culturas'), ['controller' => 'Culturas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cultura'), ['controller' => 'Culturas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Familias'), ['controller' => 'Familias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Familia'), ['controller' => 'Familias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="metas index large-9 medium-8 columns content">
    <h3><?= __('Metas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col" width="60px"><?= $this->Paginator->sort('id', ['#']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('descricao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('canal_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cultura_id') ?></th>
                <th scope="col">Volume Total</th>
                <th scope="col"><?= $this->Paginator->sort('created', ['Criado em']) ?></th>
                <!-- <th scope="col" class="actions"><?= __('Actions') ?></th> -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($metas as $meta): ?>
            <tr>
                <td><?= $this->Number->format($meta->id) ?></td>
                <td><?= $this->Html->link($meta->descricao, ['action' => 'view', $meta->id]) ?></td>
                <td><?= $meta->canal->name ?></td>
                <td><?= $meta->has('cultura') ? $this->Html->link($meta->cultura->descricao, ['controller' => 'Culturas', 'action' => 'view', $meta->cultura->id]) : '(META GERAL)' ?></td>
                <!-- <td><?php var_dump($meta->metas_familias); ?></td> -->
                <td><?php echo $this->Number->format(array_sum(array_column($meta->metas_familias, 'volume'))); ?></td>
                <td><?= h($meta->created) ?></td>
                <!-- <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $meta->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $meta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meta->id)]) ?>
                </td> -->
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
