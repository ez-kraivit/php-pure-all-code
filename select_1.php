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

    <select id="selects2"></select>

    <input id="btn" type="button" value="Click!" />


    <select id="show_selects">
    </select>

    <select id="alert_selects">
        <option value="1">แสดงครั้งที่หนึ่ง</option>
        <option value="2">แสดงครั้งที่สอง</option>
    </select>
    <input id="button1" type="button" value="Click!" />

</body>

</html>

<script>
    jQuery(function() {
        //แสดงผลข้อมูลเวลาเลือก selected ให้เก็บค่าเอาไว้ในตัวแปร conceptName และส่งค่าไปตรวจสอบ
        jQuery('#selects').change(function() {
            const conceptName = jQuery('#selects :selected').text();
            console.log(conceptName);
            jQuery.post("./select_2.php", {
                check1: conceptName
            }, function(data) {
                console.log(data);
                console.log(data.msg);
                // สำหรับการแปลง json {} to array script
                var result = [];
                for (var i in data)
                    result.push([i, data[i]]);
                console.log(result);

                //สำหรับการโชว์ ข้อมูลเราสามารถประยุกต์ในการตัดคำเพื่อตัวสอบได้ 
                const myselect = jQuery('<select>');
                $.each(result[0], function(index, key) {
                    myselect.append(jQuery('<option></option>').val(key).html(key));
                });
                jQuery('#selects2').append(myselect.html());


            });
        });

        //การดึงข้อมูลจาก Array มาแสดงเป็น Dropdown  
        const resultData = ["Mumbai", "Delhi", "Chennai", "Goa"]
        jQuery(document).ready(function() {
            const myselect = jQuery('<select>');
            $.each(resultData, function(index, key) {
                myselect.append(jQuery('<option></option>').val(key).html(key));
            });
            jQuery('#show_selects').append(myselect.html());
        });

        //ทำการตรวจสอบ resultData array เป็น JSON 
        jQuery("#btn").click(function() {
            console.log(JSON.stringify(resultData));
            console.log(resultData);
        });

        //แสดงผลข้อมูลเวลาเลือก selected และกดปุ่ม button
        jQuery('#button1').click(function() {
            alert(jQuery('#alert_selects :selected').text());
        });

    });
</script>