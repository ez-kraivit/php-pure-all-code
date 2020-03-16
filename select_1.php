<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js" crossorigin="anonymous"></script>
</head>
<body>
    <select id="selects">
        <option>choose io</option>
        <option>roma</option>
        <option>totti</option>
    </select>
</body>

</html>

<script>
    jQuery(function() {
        $('#selects').change(function() {
            var conceptName = jQuery('#selects :selected').text();
            console.log(conceptName);
            jQuery.post("./select_2.php", {
            }, function(data) {
                console.log(data)
            });
        });
    });
</script>