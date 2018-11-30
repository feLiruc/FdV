<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $canal
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Canais'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="canais form large-9 medium-8 columns content">
    <?= $this->Form->create($canal) ?>
    <fieldset>
        <legend><?= __('Add Canal') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
