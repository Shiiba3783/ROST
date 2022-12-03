<!DOCTYPE html>
<html lang = "ja">
    <meta charset = "UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <head>
        <title>学習記録</title>
        <?php
        $db = new mysqli('localhost', 'root', '', 'rost_development');
        if($db->connect_error) {
            echo 'エラーです';
        }else{
            $db->set_charset("utf-8"); 
        }
        $select_sql = "SELECT time, body , day FROM posts";

        ?>
    </head>
    <body class = "container">
        <section class = "mt-5">
            <form mehod= "POST" action = "post.php" class = "d-flex">
                <div class = "mx-auto p-5 border bg-info">
                    <div class = "p-1 ">
                        <label>勉強時間:<input type = "text" name = "time"></label>
                    </div>
                    <div class = "p-1">
                        <textarea name = "body" cols = 60 rows = 6></textarea>
                    </div>
                    <div class = "p-1">
                        <input type = "submit" value = "投稿">
                    </div>
                </div>
            </form>
        </section>
        <section class = "container d-flex mt-5">
            <?php
            if($result = $db->query($select_sql)) {
                while ($row = $result->fetch_assoc()) {
            ?>
            <div class = "border rounded mt-3 p-3 border-info">
                <div class = "p-1">
                    <?php echo "勉強時間:". $row['time']; ?> 
                </div>
                <div class = "p-1">  
                    <?php echo $row['body']; ?> 
                </div>
                <div class = "p-1">
                    <?php echo $row['day']; ?>
                </div>
            </div>
            <?php
                }
            }
            ?>
        </section>
        <?php
        $result->close();

        $db->close();
        ?>


    </body>
