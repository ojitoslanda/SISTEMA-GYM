<?php 

$year  = 2021;
$month = 01;
$day = 31;
$date = mktime( 0, 0, 0, $month, $day, $year );
echo strftime( '%B %Y', strtotime( '+1 month', $date ) );
echo '<br/>';
echo strftime( '%B %Y', strtotime( '-1 month', $date ) );

echo '<br/>';
echo date("Y-m-d", strtotime('-1 month', $date));
echo '<br/>';
echo date("Y-m-d", strtotime('+1 month', $date));

echo "<hr>";
$a = 1;
$b = 1;

echo $a >= $b ?  "Es mayor" : "Es menor";
?>