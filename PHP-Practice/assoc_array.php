<!doctype html>
<html>
<head>
<title>Office Hours</title>
<style>
    .row {
        display: flex;
        justify-content: space-between;
        width: 250px;
        font-family: Arial, sans-serif;
        padding: 5px;
        border-bottom: 1px solid #ccc;
    }
</style>
</head>
<body>

<h2>Business Hours</h2>

<?php
$hours = array(
    "Monday" => "9am - 4pm",
    "Tuesday" => "9am - 4pm",
    "Wednesday" => "9am - 4pm",
    "Thursday" => "9am - 4pm",
    "Friday" => "9am - 2pm",
    "Saturday" => "Closed",
    "Sunday" => "Closed"
);

function show_hours($arr) {
    $out = "";
    foreach ($arr as $day => $time) {
        $out .= "<div class='row'><span>$day</span><span>$time</span></div>";
    }
    return $out;
}

echo show_hours($hours);
?>

</body>
</html>
