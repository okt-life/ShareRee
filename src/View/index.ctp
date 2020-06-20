<?php require_once('GoogleApiController.php'); ?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <title>Google Books APIs</title>
</head>
<body>
  <p>全<?php echo $googlebooksapi->getTotalCount(); ?>件中、<?php echo $googlebooksapi->getCount(); ?>件を表示中</p>

  <!-- 1件以上取得した書籍情報がある場合 -->
  <?php if($googlebooksapi->getCount() > 0): ?>
    <div class="loop_books">

      <!-- 取得した書籍情報を順に表示 -->
      <?php foreach($googlebooksapi->getBooksInfo() as $book):
          // タイトル
          $title = $book->volumeInfo->title;
          // サムネ画像
          $thumbnail = $book->volumeInfo->imageLinks->thumbnail;
          // 著者（配列なのでカンマ区切りに変更）
          $authors = implode(',', $book->volumeInfo->authors);
      ?>
        <div class="loop_books_item">
          <img src="<?php echo $thumbnail; ?>" alt="<?php echo $title; ?>"><br />
          <p>
            <b>『<?php echo $title; ?>』</b><br />
            著者：<?php echo $authors; ?>
            isbn:<?php echo $isbn; ?>
          </p>
        </div>
      <?php endforeach; ?>

    </div><!-- ./loop_books -->

  <!-- 書籍情報が取得されていない場合 -->
  <?php else: ?>
    <p>情報が有りません</p>

  <?php endif; ?>

</body>
</html>