<?
// создание массива 
for ($i = 0; $i < 100; $i++) {
    $arr[] = rand(-10, 10);
}

// находим число последовательных пар
$counter = 0;
for ($i = 0; $i < count($arr); $i++) {
    if ($arr[$i] === $arr[$i + 1]) {
        $counter++;
    }
}
