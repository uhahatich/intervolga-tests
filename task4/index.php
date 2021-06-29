<? require $_SERVER['DOCUMENT_ROOT'] . '/vendor/header.php' ?>
<? include $_SERVER['DOCUMENT_ROOT'] . '/php-scripts/task4.php' ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <? print_r($arr) ?>
        </div>
        <div class="col-md-6">
            <p class="">Количество последовательных пар одинаковых элементов: <?= $counter ?></p>
        </div>
    </div>
</div>

<? require $_SERVER['DOCUMENT_ROOT'] . '/vendor/footer.php' ?>