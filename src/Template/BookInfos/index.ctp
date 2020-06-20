<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BookInfo[]|\Cake\Collection\CollectionInterface $bookInfos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Book Info'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Favorites'), ['controller' => 'Favorites', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Favorite'), ['controller' => 'Favorites', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bookInfos index large-9 medium-8 columns content">
    <h3><?= __('Book Infos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('authors') ?></th>
                <th scope="col"><?= $this->Paginator->sort('isbn_10') ?></th>
                <th scope="col"><?= $this->Paginator->sort('isbn_13') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image_links') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('published_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('page_count') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bookInfos as $bookInfo): ?>
            <tr>
                <td><?= $this->Number->format($bookInfo->id) ?></td>
                <td><?= h($bookInfo->title) ?></td>
                <td><?= h($bookInfo->authors) ?></td>
                <td><?= $this->Number->format($bookInfo->isbn_10) ?></td>
                <td><?= $this->Number->format($bookInfo->isbn_13) ?></td>
                <td><?= h($bookInfo->image_links) ?></td>
                <td><?= h($bookInfo->description) ?></td>
                <td><?= h($bookInfo->published_date) ?></td>
                <td><?= $this->Number->format($bookInfo->page_count) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bookInfo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bookInfo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bookInfo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookInfo->id)]) ?>
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
