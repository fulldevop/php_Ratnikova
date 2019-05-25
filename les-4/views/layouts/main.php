<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Skvot</title>
  <link rel="stylesheet" type="text/css" href="/css/style.css"/>
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
<div class="page">
  <header>
    <?= $menu ?>
  </header>
  <?= $content ?>
</div>
<div class="auth-block">
  <div class="auth-block-content">
    <div class="auth-form">
      <div class="auth-form-title">Авторизация:</div>
      <form method="post">
        <input type="text" name="login" placeholder="Логин"><br>
        <input type="password" name="pass" placeholder="Пароль"><br>
        <div class="auth-save">
          <input type="checkbox" name="save"> <span>Сохранить пароль</span>
        </div>
        <input class="blue-btn auth-btn" type="submit" name="send" value="Войти">
      </form>
    </div>
    <div class="close-auth-btn"></div>
  </div>
</div>
<script src="/js/main.js"></script>
</body>
</html>