<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BookInfo $bookInfo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bookInfo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bookInfo->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Book Infos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Favorites'), ['controller' => 'Favorites', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Favorite'), ['controller' => 'Favorites', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bookInfos form large-9 medium-8 columns content">
    <?= $this->Form->create($bookInfo) ?>
    <fieldset>
        <legend><?= __('Edit Book Info') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('authors');
            echo $this->Form->control('isbn_10');
            echo $this->Form->control('isbn_13');
            echo $this->Form->control('image_links');
            echo $this->Form->control('description');
            echo $this->Form->control('published_date');
            echo $this->Form->control('page_count');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
