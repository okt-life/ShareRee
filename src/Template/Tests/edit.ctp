<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Test $test
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $test->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $test->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tests'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tests form large-9 medium-8 columns content">
    <?= $this->Form->create($test) ?>
    <fieldset>
        <legend><?= __('Edit Test') ?></legend>
        <?php
            echo $this->Form->control('user');
            echo $this->Form->control('age');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
