<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book[]|\Cake\Collection\CollectionInterface $books
 */
?>
<button id="modal-open">登録</button>
<div class="loading hide"></div>
<div id="modal-content">
    <?= $this->Form->create(null); ?>
    <?= $this->Form->text("検索", ['placeholder' => 'isbn、本のタイトルなどを入力']); ?>
    <?= $this->Form->submit('検索', ['id' => 'submit']); ?>
    <?= $this->Form->end(); ?>
    <!--本の画像表示-->


    <div id="book-img">

    </div>
    <!--本を選ぶ左右の矢印-->
    <div class="selector"></div>
    <p>こちらの本でよろしいですか？</p>
    <button id="decide" action="post">確定</button>
    <button id="modal-close">閉じる</button>

</div>

<!-- モーダルのコードおわり -->