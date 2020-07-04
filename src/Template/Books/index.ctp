<html lang="ja">

<head>
</head>

<body>

  <button id="modal-open">登録</button>
  <div class="loading hide"></div>
  <div id="modal-content">
  <div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<<') ?>
        <?= $this->Paginator->prev('<') ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next('>') ?>
        <?= $this->Paginator->last('>>') ?>
    </ul>
</div>
    <?= $this->Form->create(null); ?>
    <?= $this->Form->text("検索", ['placeholder' => 'isbn、本のタイトルなどを入力']); ?>
    <?= $this->Form->button('検索', ['class' => 'submit']); ?>
    <?= $this->Form->end(); ?>
    <div class="selector"></div>
    <!-- <p>こちらの本でよろしいですか？</p>
    <button id="decide" action="post">確定</button>
    <button id="modal-close">閉じる</button> -->
    <div id="book-contents">

    </div>

  </div>


</body>

</html>