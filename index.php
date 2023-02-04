<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>4eachblog 掲示板</title>
    <link rel = "stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <div class="logo"><img src="./4eachblog_logo.jpg"></div>
        
        <div class="menu_bar">
            <ul class="menu">
                <li>トップ</li>
                <li>プロフィール</li>
                <li>4eachについて</li>
                <li>登録フォーム</li>
                <li>問い合わせ</li>
                <li>その他</li>
            </ul>
        </div>
    </header>
    <main>

        <div class="left">

            <?php
                mb_internal_encoding("utf8"); 
                $pdo = new PDO("mysql:dbname=lesson1;host=localhost;","root","root");
                $stmt = $pdo->query("select*from 4each_keijiban");
            ?>

            <h1>プログラミングに役立つ掲示板</h1>
            <div class="bbs">
                <h2>入力フォーム</h2>
                <form action="insert.php" method="post">
                    <div>
                        <label>ハンドルネーム</label>
                        <br>
                        <input type="text" name="handlename" value="<?php echo $_POST['handlename']; ?>">
                    </div>
                    <div>
                        <label>タイトル</label>
                        <br>
                        <input type="text" name="title" value="<?php echo $_POST['title']; ?>">
                    </div>
                    <div>
                        <label>コメント</label>
                        <br>
                        <textarea name="comments" rows="8" cols="80"><?php echo $_POST['comments']; ?></textarea>
                    </div>
                    <input type="submit" class="button"value="投稿する" />               
                </form>
            </div>
            <?php
                while ($row = $stmt->fetch()) {
                    echo "<div class='bbs'>";
                        echo "<h3>".$row['title']."<h3>";
                        echo "<div class='comments'>";
                            echo $row['comments'];
                            echo "<div class='handlename'>posted by ".$row['handlename']."</div>";
                        echo "</div>";
                    echo "</div>";
                }    
            ?>   
        </div>

         <div class="right">
            <h4>人気の記事</h2>
                <ul class="sidebar_menu">
                    <li>PHPオススメ本</li>
                    <li>PHP MyAdminの使い方</li>
                    <li>今人気のエディタ Top5</li>
                    <li>HTMLの基礎</li>
                </ul>
             <h4>オススメリンク</h2>
                <ul class="sidebar_menu">
                    <li>インターノウス株式会社</li>
                    <li>XAMMPのダウンロード</li>
                    <li>Eclipseのダウンロード</li>
                    <li>Bracketsのダウンロード</li>
                </ul>
             <h4> カテゴリ</h2>
                 <ul class="sidebar_menu">
                    <li>HTML</li>
                    <li>PHP</li>
                    <li>MySQL</li>
                    <li>JavaScript</li>
                </ul>
            </div>
    </main>
    <footer>
        copy-right &copy internous | 4each blog the which provides A to Z about programming.
    </footer>
</body>

</html>