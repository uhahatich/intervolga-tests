$("#notation").click(function () {
    let nameCountry = $('#nameCountry').val();
    let capital = $('#capital').val();
    let populationCountry = $('#populationCountry').val();

    $.ajax({
        url: '../php-scripts/task5.php',
        type: 'POST',
        cache: false,
        data: {
            'nameCountry': nameCountry,
            'capital': capital,
            'populationCountry': populationCountry,
        },
        dataType: 'html',
        success: function (data) {
            if (data == 'Готово') {
                $('#errorBlock').hide();
            } else {
                $('#errorBlock').show();
                $('#errorBlock').html(data);
            }
        }
    });
});
$(document).ready(function () {
    $.ajax({
        url: '../php-scripts/output.php',
        type: 'POST',
        cache: false,
        data: {},
        dataType: 'html',
        success: function (data) {
            $('#tbody').html(data);
        }
    });
});
$("#notation").click(function () {
    $.ajax({
        url: '../php-scripts/output.php',
        type: 'POST',
        cache: false,
        data: {},
        dataType: 'html',
        success: function (data) {
            $('#tbody').html(data);
        }
    });
});

