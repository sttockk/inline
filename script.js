$(document).ready(function () {
    $('#search').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            dataType: 'html',
            url: 'search.php',
            data: $(this).serialize(),
            success: function (response) {
                $('#result').html(response);
            }
        });
    });
});
