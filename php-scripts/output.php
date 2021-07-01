<?
include $_SERVER['DOCUMENT_ROOT'] . '/inc/connect.php';


$sql = "SELECT * FROM countries";
$query = $pdo->prepare($sql);
$query->execute();

function output($query)
{
    while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        echo '<th scope="col">' . $result['id'] . '</th>';
        echo '<th scope="col">' . $result['nameCountry'] . '</th>';
        echo '<th scope="col">' . $result['capital'] . '</th>';
        echo '<th scope="col">' . number_format($result['populationCountry'], 0, ',', ' ') . '</th>';
        echo '<tr>';
    }
}

output($query);
