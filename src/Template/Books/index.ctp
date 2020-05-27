<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book[]|\Cake\Collection\CollectionInterface $books
 */
?>

<?=$this->Form->create(null,['id'=>'Form']); ?>
<?=$this->Form->text('name'); ?>
<?=$this->Form->submit('送信',['id' => 'submit']); ?>
<?=$this->Form->end(); ?>

<p id="text"></p>

