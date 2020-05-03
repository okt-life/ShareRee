<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Test[]|\Cake\Collection\CollectionInterface $tests
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Test'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tests index large-9 medium-8 columns content">
    <h3><?= __('Tests') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user') ?></th>
                <th scope="col"><?= $this->Paginator->sort('age') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tests as $test): ?>
            <tr>
                <td><?= $this->Number->format($test->id) ?></td>
                <td><?= h($test->user) ?></td>
                <td><?= $this->Number->format($test->age) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $test->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $test->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $test->id], ['confirm' => __('Are you sure you want to delete # {0}?', $test->id)]) ?>
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
