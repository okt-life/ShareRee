<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Favorite $favorite
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $favorite->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $favorite->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Favorites'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Book Infos'), ['controller' => 'BookInfos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Book Info'), ['controller' => 'BookInfos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="favorites form large-9 medium-8 columns content">
    <?= $this->Form->create($favorite) ?>
    <fieldset>
        <legend><?= __('Edit Favorite') ?></legend>
        <?php
            echo $this->Form->control('employee_id', ['options' => $employees, 'empty' => true]);
            echo $this->Form->control('book_id', ['options' => $books, 'empty' => true]);
            echo $this->Form->control('book_info_id', ['options' => $bookInfos, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
