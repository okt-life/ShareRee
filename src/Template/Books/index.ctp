<html lang="ja">
<head>
</head>
<body>
  <button id="modal-open">登録</button>
  <div class="loading hide"></div>
  <div id="modal-content">
    <?= $this->Form->create(null); ?>
    <?= $this->Form->text("検索", ['placeholder' => 'isbn、本のタイトルなどを入力']); ?>
    <?= $this->Form->button('検索', ['id' => 'submit']); ?>
    <?= $this->Form->end(); ?>
    <div class="selector"></div>
    <p>こちらの本でよろしいですか？</p>
    <button id="decide" action="post">確定</button>
    <button id="modal-close">閉じる</button>
    <div id="book-contents">

  </div>
  </div>
  

</body>
</html>