<!DOCTYPE html>
<html lang="ja">
<head>
  <title>Google Books APIs</title>
</head>
<body>
  <p>全<?php echo $totalCount; ?>件中、<?php echo $get_count; ?>件を表示中</p>
  <!-- 1件以上取得した書籍情報がある場合 -->
  <?php if($get_count > 0): ?>
    <div class="loop_books">
      <!-- 取得した書籍情報を順に表示 -->
      <?php foreach($books  as $book):?>

        <div class="loop_books_item">
          <img src="<?= $book["thumbnail"]; ?>" alt="<?= $book["title"]; ?>"><br />
          <p>
            <b>『<?= $book["title"]; ?>』</b><br/>
            著者：<?= $book["authors"]; ?><br/>

            <!-- isbnの情報を順に表示 -->
            <?php $isbns = $book["isbn"][0];?>
            <?php foreach($isbns as $isbn); ?>
            <?php if($isbn->type == "ISBN_10"){
                    echo "ISBN10:".$isbn->identifier;
            }elseif($isbn->type == "ISBN_13"){
              echo "ISBN13:".$isbn->identifier;
            }else{
              echo "ISBNコードなし";
            }
            ?>
          </p>
        </div>
      <?php endforeach; ?>
    </div><!-- ./loop_books -->
  <?php else: ?>
    <p>情報が有りません</p>
  <?php endif; ?>
</body>
</html>
