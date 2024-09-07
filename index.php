<?php
error_reporting(error_level: -1);
session_start();

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/funcs.php';

if (isset($_POST['register'])) {
    registration();
    header("Location: index.php");
    die;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Гостевая книга</title>
<!-- Bootstrap CSS (jsDelivr CDN) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Bootstrap Bundle JS (jsDelivr CDN) -->
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>

<div class="container">

<div class="row my-3">
    <div class="col">

        <?php if (!empty($_SESSION['errors'])):    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php
            echo $_SESSION['errors'];
            unset($_SESSION['errors']);
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"
            aria-label="Close"></button>
        </div>
        <?php endif; ?>

        <?php if (!empty($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"
        aria-label="Close"></button>
    </div>
    <?php endif; ?>

    </div>
</div>
<?php if (empty($_SESSION['user']['name'])): ?>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <h3>Регистрация</h3>
    </div>
</div>

<form action="index.php" method="post" class="row g-3">
    <div class="col-md-6 offset-md-3">
    <div class="form-floating mb-3">
  
    <input type="text" name="login" class="form-control" id="floatingInput"
    placeholder="Имя">
    <label for="floatingInput">Имя</label>
</div>
</div>

<div class="col-md-6 offset-md-3">
    <div class="form-floating">
      <input type="password" name="pass" class="form-control" id="floatingPassword"
    placeholder="Password">
    <label for="floatingPassword">Пароль</label>
</div>
</div>

<div class="col-md-6 offset-md-3">
    <button type="submit" name="register" class="btn btn-primary">Зарегистрироватсья</button>
</div>
</form>
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <h3>Авторизация</h3>
        </div>
    </div>

    <form action="index.php" method="post" class="row g-3">
        <div class="col-md-6 offset-md-3">
            <div class="form-floating mb-3">
                <input type="text" name="login" class="form-control" id="floatingInput"
                placeholder="Имя">
                <label for="floatingInput">Имя</label>
            </div>
        </div>

        <div class="col-md-6 offset-md-3">
            <div class="form-floating">
                <input type="password" name="pass" class="form-control" id="floatingPassword"
                placeholder="Password">
                <label for="floatingPassword">Пароль</label>
            </div>
        </div>

        <div class="col-md-6 offset-md-3">
            <button type="submit" name="auth" class="btn btn-primary">Войти</button>
        </div>
    </form>

<?php else: ?> 

    <div class="row">
    <div class="col-md-6 offset-md-3">
        <p>Добро пожаловать, User! <a href="?do=exit">Log out</a></p>
    </div>
</div>

<form action="index.php" method="post" class="row g-3 mb-5" >
    <div class="col-md-6 offset-md-3">
        <div class="form-floating">
            <textarea class="form-control" name="message" placeholder="Leave a comment here"
            id="floatingTextarea" style="height: 100px;"></textarea>
            <label for="floatingTextarea">Сообщение</label>
        </div>
    </div>

    <div class="col-md-6 offset-md-3">
        <button type="submit" name="add" class="btn btn-primary">Отправить</button>
    </div>
</form>

<?php endif; ?>

<div class="row">
    <div class="col-md-6 offset-md-3">
        <hr>
        <div class="card my-3">
            <div class="card-body">
                <h5 class="card-tittle">Автор: User</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                    Aliquam ab explicabo quisquam! Ad veritatis atque dignissimos magnam vitae 
                    quidem rerum distinctio quaerat. Mollitia quia natus nostrum, illo quo veniam 
                    similique?
                </p>
                <p>Дата: 01.01.2000</p>
            </div>
        </div>
    </div>
</div>


</body>
</html>