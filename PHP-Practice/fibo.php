<?php
$n = isset($_GET['n']) ? intval($_GET['n']) : 0;
$fib = array();

if ($n >= 1) {
    $fib[] = 0;
}
if ($n >= 2) {
    $fib[] = 1;
}
for ($i = 2; $i < $n; $i++) {
    $fib[] = $fib[$i - 1] + $fib[$i - 2];
}

header("Content-Type: application/json");
echo json_encode(array(
    "length" => $n,
    "fibSequence" => $fib
));
?>
