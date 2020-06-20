<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Favorite $favorite
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Favorite'), ['action' => 'edit', $favorite->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Favorite'), ['action' => 'delete', $favorite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $favorite->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Favorites'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Favorite'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Book Infos'), ['controller' => 'BookInfos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Book Info'), ['controller' => 'BookInfos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="favorites view large-9 medium-8 columns content">
    <h3><?= h($favorite->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Employee') ?></th>
            <td><?= $favorite->has('employee') ? $this->Html->link($favorite->employee->name, ['controller' => 'Employees', 'action' => 'view', $favorite->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Book') ?></th>
            <td><?= $favorite->has('book') ? $this->Html->link($favorite->book->id, ['controller' => 'Books', 'action' => 'view', $favorite->book->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Book Info') ?></th>
            <td><?= $favorite->has('book_info') ? $this->Html->link($favorite->book_info->title, ['controller' => 'BookInfos', 'action' => 'view', $favorite->book_info->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($favorite->id) ?></td>
        </tr>
    </table>
</div>
