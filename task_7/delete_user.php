<?php
session_start();


if (!isset($_POST['id']) || !isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    header("Location: admin.php");
    exit();
}


$user_id = $_POST['id'];


try {
    $db = new PDO('mysql:host=localhost;dbname=u67451', 'u67451', '5546450', array(PDO::ATTR_PERSISTENT => true));
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Ошибка подключения к базе данных: " . $e->getMessage();
    exit();
}

try {
    $stmt = $db->prepare("DELETE FROM application_languages WHERE id_app = ?");
    $stmt->execute([$user_id]);
} catch (PDOException $e) {
    echo "Ошибка удаления связанных записей: " . $e->getMessage();
    exit();
}

try {
    $stmt = $db->prepare("DELETE FROM application WHERE id = ?");
    $stmt->execute([$user_id]);
    
    header("Location: admin.php");
    exit();
} catch (PDOException $e) {
    echo "Ошибка удаления пользователя: " . $e->getMessage();
    exit();
}
?>
