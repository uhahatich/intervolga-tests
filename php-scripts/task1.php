<?
// $path - путь к файлу
// $startTag - тэг с которого начинается статья
function get_short_article($path, $startTag)
{
    $link = $_SERVER['DOCUMENT_ROOT'] . $path;
    $a = file_get_contents($link);
    // создание строки - превью
    $start = mb_strpos($a, $startTag);
    $a = strip_tags(mb_substr($a, $start, 180 + mb_strlen($startTag)));
    // определение последних двух слов превью
    $lastWordsPos =  mb_strrpos($a, ' ', -8) + 1;
    $lastWords = mb_substr($a, $lastWordsPos);

    $a = mb_substr($a, 0, mb_strlen($a) - (180 - $lastWordsPos));

    $nLink = '<a href="' .  $path . '">' . $lastWords . '...' . '</a>';
    return $a . $nLink;
}

$a = get_short_article('/task1/article.php', '<p>');
echo $a;
