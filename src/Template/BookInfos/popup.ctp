<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BookInfo[]|\Cake\Collection\CollectionInterface $bookInfos
 */
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
          <?php echo $form->submit('文字',array('onclick'=>'return window.confirm('モーダルウィンドウ')'));?>
