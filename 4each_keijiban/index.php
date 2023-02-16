<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>4eachblog 掲示板</title>
        <link rel="stylesheet" type="text/css" href="style.css"> 
    </head>

    <body>
    
        <?php
        mb_internal_encoding("utf8");
        $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","root");
        $stmt = $pdo->query("select * from 4each_keijiban");
        ?>

        <div class="logo">
            <img src="4eachblog_logo.jpg">
        </div>

        <header>
            <ul>
                <li>トップ</li>
                 <li>プロフィール</li>
                <li>4eachについて</li>
                <li>登録フォーム</li>
                <li>問い合わせ</li>
                <li>その他</li>
            </ul>
        </header>
        
        <main>
            <div class="left">
                <div class="midasi">
                    <h1>プログラミングに役立つ掲示板</h1>
                </div>
                
                <div class="form">
                    <h2>入力フォーム</h2>
                    <form method ="post" action="insert.php">
                        <div class="nyuryoku">
                            <label>ハンドルネーム</label>
                            <br>
                            <input type="text" class="text" size="50" name="handlename">
                        </div>
                        <div class="nyuryoku">
                            <label>タイトル</label>
                            <br>
                            <input type="text" class="text" size="50" name="title">
                        </div>
                        <div class="nyuryoku">
                            <label>コメント</label>
                            <br>
                            <textarea name="comments" cols="60" rows="10"></textarea>
                        </div>

                        <div>
                            <input type="submit" class="submit" value="投稿する">
                        </div>
                </div>
                <?php
                while($row = $stmt->fetch()){
                    echo "<div class='kiji'>";
                        echo "<h3>".$row['title']."</h3>";
                            echo "<div class='contents'>";
                                echo $row['comments'];
                                echo "<div class='handlename'>posted by ".$row['handlename']."</div>";
                            echo "</div>";
                    echo "</div>";
                }
                ?>
            </div>
            
            <div class="right">
                <h2>人気の記事</h2>
                <ul>
                    <li>PHPオススメ本</li>
                    <li>PHP MyAdminの使い方</li>
                    <li>今人気のエディタ TOP5</li>
                    <li>HTMLの基礎</li>
                </ul>

                <h2>オススメリンク</h2>
                <ul>
                    <li>インターノウス株式会社</li>
                    <li>XAMPPのダウンロード</li>
                    <li>Eclipseのダウンロード</li>
                    <li>Bracketsのダウンロード</li>
                </ul>

                <h2>カテゴリ</h2>
                <ul>
                    <li>HTML</li>
                    <li>PHP</li>
                    <li>MySQL</li>
                    <li>Javascript</li>
                </ul>
            </div>
        </main>

        <footer>
            <P>copyright © internous|4each blog the which provides A to Z about programming.</P> 
        </footer>
        
    </body>

</html>