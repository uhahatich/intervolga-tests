<?
$name = trim(filter_var($_POST['nameCountry'], FILTER_SANITIZE_STRING));
$capital = trim(filter_var($_POST['capital'], FILTER_SANITIZE_STRING));
$population = trim(filter_var($_POST['populationCountry'], FILTER_SANITIZE_NUMBER_INT));
$error = '';

if ($name == '') {
    $error = 'Укажите страну.';
}

if ($capital == '') {
    $error .= ' Укажите столицу.';
}

if ($population == '') {
    $error .= ' Укажите население.';
}


if ($error !== '') {
    echo trim($error);
    exit();
}

include $_SERVER['DOCUMENT_ROOT'] . '/inc/connect.php';

$sql = "SELECT id FROM countries WHERE nameCountry = ?";
$query = $pdo->prepare($sql);
$query->execute([$name]);
$result = $query->fetch(PDO::FETCH_OBJ);

if ($result) {
    echo 'Такая страна уже есть в базе';
    exit();
}


$sql = "INSERT INTO countries( nameCountry, capital, populationCountry ) VALUES(?,?,?)";
$query = $pdo->prepare($sql);
$query->execute([$name, $capital, $population]);

echo 'Готово';
