<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Вход в систему</title>
</head>

<body>
<?php

header('Content-Type: text/html; charset=UTF-8');

session_start();

if (!empty($_SESSION['login'])) {
  if (!empty($_POST['logout'])) {
    session_destroy();
    header('Location: ./login.php');
    exit();
  } else {
    header('Location: ./');
    exit();
  }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
  }

  if (!empty($_GET['nologin'])) {
    echo "<div>Пользователя с таким логином не существует</div>";
  }
  if (!empty($_GET['wrongpass'])) {
    echo "<div>Неверный пароль!</div>";
  }
?>

  <form action="" method="post">
    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
    <input name="login" placeholder="Введи логин"/>
    <input name="pass" type="password" placeholder="Введи пароль"/>
    <input type="submit" id="login" value="Войти" />
  </form>

<?php
} else {
  if (empty($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    die('Неверный CSRF-токен.');
  }

  $db = new PDO('mysql:host=localhost;dbname=u67451', 'u67451', '5546450', array(PDO::ATTR_PERSISTENT => true));
  $stmt = $db->prepare("SELECT id, pass FROM login_pass WHERE login = ?");
  $stmt->execute([$_POST['login']]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$row) {
    header('Location: ?nologin=1');
    exit();
  }

  if ($row["pass"] != md5($_POST['pass'])) {
    header('Location: ?wrongpass=1');
    exit();
  }

  $_SESSION['login'] = htmlspecialchars($_POST['login']);
  $_SESSION['uid'] = $row["id"];

  header('Location: ./');
}
?>

</body>
</html>
