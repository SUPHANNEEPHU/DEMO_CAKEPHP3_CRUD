<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NamePrefix $namePrefix
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Name Prefixes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="namePrefixes form large-9 medium-8 columns content">
    <?= $this->Form->create($namePrefix) ?>
    <fieldset>
        <legend><?= __('Add Name Prefix') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('long_name');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
