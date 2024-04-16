<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>Черенков Дмитрий Алексеевич</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />
    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>
    <div class="container-nav">
        <div class="logo-nav logo"></div>
    </div>
    <div class="container">
        <div class="header">
            <span class="text-first"><h1>Добро пожаловать на страничку</h1></span>
            <span class="text-second"><h1>Черенкова Дмитрия</h1></span>
        </div>

        <div class="row">
            <div class="col-12"><h1>Не много обо мне:</h1></div>
        </div>
        <div class="row opt">
            <div class="col-5"><h1>Кто я?</h1></div>
            <div class="col-8"><h2>Я студент ДВФУ на специальности "Компьютерная безопасность" С9122-10.05.01 безопасность компьютерных систем</h2></div>
            <div class="col-4">
                <div class="row img1"></div>
                <div class="row"><p class="title-photo">Черенков Д.А</div>
            </div>
        </div>
        <div class="row opt-down">
            <div class="col-6"><h1>Чего хочу:</h1></div>
            <div class="col-7">
                <div class="row img2"></div>
                <div class="row"><p class="title-photo2">Это просто кот</p></div>
            </div>
            <div class="col-9"><h2>Я хочу пиццы</h2></div>
        
        </div>
    </div>  
    <div class="container">
        <div class="row">
            <div class="button_js col-12">
                <button id="myButton">DON`T CLICK THIS</button>
                <p id="demo"></p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    Привет, <?php echo $_COOKIE['User']; ?>
                </h1>
            </div>
            <div class="col-12">
            <form method="POST" action="/profile.php" enctype="multipart/form-data" name="upload">
                <input class="form" type="text" name="title" placeholder="Заголовок поста">
                <textarea name="text" cols="120" rows="20" placeholder="Здесь можете рассказать что то интересное..."></textarea>
                <input type="file" name="file" /><br>
                <button type="submit" class="btn_red" name="submit">Сохранить</button>
            </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="/js/button.js"></script>
</body>
</html>
<?php
if (!isset($_COOKIE['User'])) {
    header("Location: index.php");
}
require_once('db.php');

$link = mysqli_connect('127.0.0.1', 'root', '123', 'dbCat');
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $main_text = $_POST['text'];
    if (!$title || !$main_text) die ("Заполните все поля");
    $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";

    if (!mysqli_query($link, $sql)) die ("Не удалось добавить пост");
}
if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }


?>
