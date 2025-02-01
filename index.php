<?php
$view = ""; // 変数を初期化

// ファイルを開く。モードは'r' = 読み込みのみでオープン。
$file = fopen('./data/data.csv', 'r');

// #2 テーブルのHTMLを生成
$view .= "<table class='table'>
    <tr>
        <th>入力時間</th>
        <th>日時</th>
        <th>住所</th>
        <th>メモ</th>
    </tr>";

// #3 csvのデータを配列に変換し、HTMLに埋め込んでいる
while ($line = fgetcsv($file)) {
    $view .= "<tr>";
    for ($i = 0; $i < count($line); $i++) {
        $view .= "<td>" . $line[$i] . "</td>";
    }
    $view .= "</tr>";
}
$view .= "</table>";

// #4 ファイルを閉じる
fclose($file);
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>行きたいところメモ ver.0.1</title>
    <!-- faviconの設定 -->
    <link rel="icon" href="./img/favicon.svg" />
    <!-- Google Fontsの設定 -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&family=M+PLUS+Rounded+1c&family=Zen+Kurenaido&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./css/reset.css" />
    <link rel="stylesheet" href="./css/style.css" />
</head>
<body>
    <header></header>
    <!-- タイトル画像 -->
    <div class="top">
        <img class="topImg" src="./img/top.jpg" alt="トップ画像" />
        <h1 class="title">行きたいところメモ</h1>
    </div>
    <!-- 入力フォーム -->
    <div class="formArea">
        <form action="write.php" method="post">
            <div>
                <input type="date" id="datepicker" class="form" name="date" value="" />
            </div>
            <div>
                <input type="text" id="address" class="form" name="address" placeholder="住所を入力してください" />
            </div>
            <div>
                <textarea id="note" class="form" name="note" placeholder="メモを入力してください"></textarea>
            </div>
            <div>
                <input type="submit" class="send" value="目的地を設定">
            </div>
        </form>
    </div>
    <!-- リストの表示 -->
    <div id="output"><?php echo $view; ?></div> <!-- ここで変数を正しく出力する -->
</body>
</html>
