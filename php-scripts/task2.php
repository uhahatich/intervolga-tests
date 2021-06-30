<?
function resizeImg($path, $newNameFile)
{

    define('WIDTH', 200);
    define('HEIGHT', 150);
    define('DIRSAVE', 'res-images');
    define('QUALITY', 75);

    if (!file_exists($path)) {
        throw new Exception('файл не существует');
    }
    if (!function_exists('exif_imagetype')) {
        throw new Exception('Не подключено расширение exif');
    }

    // get type and create img desc

    $type = exif_imagetype($path);

    if ($type == IMAGETYPE_JPEG) {

        $img = imagecreatefromjpeg($path);
    } elseif ($type == IMAGETYPE_PNG) {

        $img = imagecreatefrompng($path);
    } elseif ($type == IMAGETYPE_GIF) {

        $img = imagecreatefromgif($path);
    } else {
        throw new Exception('Допустимые типы: .jpg .png .gif');
    }

    $img = resize($img);

    // save file 
    save($img, $type, $newNameFile);
}

function save($img, $type, $newNameFile, $quality = QUALITY)
{
    if ($type == IMAGETYPE_JPEG) {

        $savePath = DIRSAVE . '/' . $newNameFile . '.jpg';
        imagejpeg($img, $savePath, $quality);
    } elseif ($type == IMAGETYPE_PNG) {

        $savePath = DIRSAVE . '/' . $newNameFile . '.png';
        $quality = round(($quality * 9) / 100);
        $quality = 9 - $quality;
        imagepng($img, $savePath, $quality);
    } elseif ($type == IMAGETYPE_GIF) {

        $savePath = DIRSAVE . '/' . $newNameFile . '.gif';
        imagegif($img, $savePath);
    } else {
        throw new Exception('Не удалось создать файл');
    }
    echo '<img src="' . $savePath . '" alt="">';
}

function resize($img)
{
    // first resize

    $width = imagesx($img);
    $height = imagesy($img);

    $kh = $height / HEIGHT;
    $kw = $width / WIDTH;

    if ($kh < $kw) {
        $resK = $kh;
    } else {
        $resK = $kw;
    }

    $arr = array('w' => round($width / $resK), 'h' => round($height / $resK));

    $imgSubstrate = imagecreatetruecolor($arr['w'], $arr['h']);

    imagecopyresampled($imgSubstrate, $img, 0, 0, 0, 0, $arr['w'], $arr['h'], $width, $height);

    // second resize

    $sx = ($arr['w'] / 2) - (WIDTH / 2);
    $sy = ($arr['h'] / 2) - (HEIGHT / 2);
    $img = imagecreatetruecolor(WIDTH, HEIGHT);
    imagecopyresampled($img, $imgSubstrate, 0, 0, $sx, $sy, WIDTH, HEIGHT, WIDTH, HEIGHT);
    return $img;
}

try {
    resizeImg('img/image.jpg', 'image');
    resizeImg('img/image2.png', 'image2');
} catch (Exception $e) {
    echo $e->getMessage();
}
