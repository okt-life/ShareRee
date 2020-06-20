<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Favorite[]|\Cake\Collection\CollectionInterface $favorites
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Favorite'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Book Infos'), ['controller' => 'BookInfos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Book Info'), ['controller' => 'BookInfos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="favorites index large-9 medium-8 columns content">
    <h3><?= __('Favorites') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('employee_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('book_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('book_info_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($favorites as $favorite): ?>
            <tr>
                <td><?= $this->Number->format($favorite->id) ?></td>
                <td><?= $favorite->has('employee') ? $this->Html->link($favorite->employee->name, ['controller' => 'Employees', 'action' => 'view', $favorite->employee->id]) : '' ?></td>
                <td><?= $favorite->has('book') ? $this->Html->link($favorite->book->id, ['controller' => 'Books', 'action' => 'view', $favorite->book->id]) : '' ?></td>
                <td><?= $favorite->has('book_info') ? $this->Html->link($favorite->book_info->title, ['controller' => 'BookInfos', 'action' => 'view', $favorite->book_info->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $favorite->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $favorite->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $favorite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $favorite->id)]) ?>
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
