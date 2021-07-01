<?
$user = "root";
$password = "root";
$db = "test";
$host = "localhost";

$dsn = "mysql:host=" . $host . ";dbname=" . $db;

try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    die("Не удалось подключиться к базе данных :" . $e->getMessage());
}