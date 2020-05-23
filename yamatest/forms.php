<?php
//$ptitle=$_POST['title'];
//$pinauthor=$_POST['inauthor'];
$isbn=$_POST['isbn'];
// 検索条件を配列にする
$params = array(
  // 'intitle'  => $ptitle,  //書籍タイトル
  // 'inauthor' => $pinauthor,       //著者
  'isbn' => $isbn,
);

// 1ページあたりの取得件数
$maxResults = 10;

// ページ番号（1ページ目の情報を取得）
$startIndex = 0;  //欲しいページ番号-1 で設定

// APIの基本になるURL
$base_url = 'https://www.googleapis.com/books/v1/volumes?q=';

// 配列で設定した検索条件をURLに追加
foreach ($params as $key => $value) {
  $base_url .= $key.':'.$value.'+';
}

// 末尾につく「+」をいったん削除
$params_url = substr($base_url, 0, -1);

// 件数情報を設定
$url = $params_url.'&maxResults='.$maxResults.'&startIndex='.$startIndex;

// 書籍情報を取得
$json = file_get_contents($url);

// デコード（objectに変換）
$data = json_decode($json);

// 全体の件数を取得
$total_count = $data->totalItems;

// 書籍情報を取得
$books = $data->items;

// 実際に取得した件数
$get_count = count($books);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <title>Google Books APIs</title>
</head>
<body>
  <p>全<?php echo $total_count; ?>件中、<?php echo $get_count; ?>件を表示中</p>

  <!-- 1件以上取得した書籍情報がある場合 -->
  <?php if($get_count > 0): ?>
    <div class="loop_books">

      <!-- 取得した書籍情報を順に表示 -->
      <?php foreach($books as $book):
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