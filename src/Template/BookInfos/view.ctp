<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BookInfo $bookInfo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Book Info'), ['action' => 'edit', $bookInfo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Book Info'), ['action' => 'delete', $bookInfo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookInfo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Book Infos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Book Info'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Favorites'), ['controller' => 'Favorites', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Favorite'), ['controller' => 'Favorites', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bookInfos view large-9 medium-8 columns content">
    <h3><?= h($bookInfo->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($bookInfo->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Authors') ?></th>
            <td><?= h($bookInfo->authors) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image Links') ?></th>
            <td><?= h($bookInfo->image_links) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($bookInfo->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Published Date') ?></th>
            <td><?= h($bookInfo->published_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bookInfo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isbn 10') ?></th>
            <td><?= $this->Number->format($bookInfo->isbn_10) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isbn 13') ?></th>
            <td><?= $this->Number->format($bookInfo->isbn_13) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Page Count') ?></th>
            <td><?= $this->Number->format($bookInfo->page_count) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Favorites') ?></h4>
        <?php if (!empty($bookInfo->favorites)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Employee Id') ?></th>
                <th scope="col"><?= __('Book Id') ?></th>
                <th scope="col"><?= __('Book Info Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($bookInfo->favorites as $favorites): ?>
            <tr>
                <td><?= h($favorites->id) ?></td>
                <td><?= h($favorites->employee_id) ?></td>
                <td><?= h($favorites->book_id) ?></td>
                <td><?= h($favorites->book_info_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Favorites', 'action' => 'view', $favorites->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Favorites', 'action' => 'edit', $favorites->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Favorites', 'action' => 'delete', $favorites->id], ['confirm' => __('Are you sure you want to delete # {0}?', $favorites->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
