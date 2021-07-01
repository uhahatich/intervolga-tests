<? require $_SERVER['DOCUMENT_ROOT'] . '/vendor/header.php' ?>

<div class="container">
    <div class="row d-flex justify-content-between py-3">
        <div class="col-md-4 bg-white rounded py-3 shadow">
            <form method="POST" action="../php-scripts/task5.php">
                <div class="mb-3">
                    <label for="nameCountry" class="form-label fs-4">Название страны</label>
                    <input type="text" name="nameCountry" class="form-control" id="nameCountry" placeholder="Китай">
                </div>
                <div class="mb-3">
                    <label for="capital" class="form-label fs-4">Столица</label>
                    <input type="text" name="capital" class="form-control" id="capital" placeholder="Пекин">
                </div>
                <div class="mb-3">
                    <label for="populationCountry" class="form-label fs-4">Население</label>
                    <input type="text" name="populationCountry" class="form-control" id="populationCountry" placeholder="1404328611">
                </div>
                <div class="alert alert-danger mt-2" id="errorBlock"></div>
                <button type="button" class="btn btn-primary fs-4" id="notation">Записать</button>
            </form>
        </div>
        <div class="col-md-7 bg-white rounded py-3 shadow">
            <table class="table  table-bordered table-light table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Страна</th>
                        <th scope="col">Столица</th>
                        <th scope="col">Население</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                </tbody>
            </table>
        </div>
    </div>
</div>

<? require $_SERVER['DOCUMENT_ROOT'] . '/vendor/footer.php' ?>