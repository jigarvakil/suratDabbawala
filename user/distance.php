<?php
include('connection.php');
/* These are two points in New York City */
$a1=$_POST['a1'];
$a2=$_POST['a2'];
$sql="select * from tbl_area where areaid=$a1";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);
$sql1="select * from tbl_area where areaid=$a2";
$res1=mysqli_query($con,$sql1);
$row1=mysqli_fetch_assoc($res1);
 $latitude1=$row['latitude'];
 $longitude1=$row['longitude'];
 $latitude2=$row1['latitude'];
 $longitude2=$row1['longitude'];

$point1 = array('lat' => $latitude1, 'long' => $longitude1);
$point2 = array('lat' => $latitude2, 'long' => $longitude2);

$distance = getDistanceBetweenPoints($point1['lat'], $point1['long'], $point2['lat'], $point2['long']);
// foreach ($distance as $unit => $value) {
//     echo $unit.': '.number_format($value,2).'<br />';
// }

if(is_nan($distance) || $distance==0)
{
    echo "2";
}
else
{
    echo $distance+1;
}
function getDistanceBetweenPoints($lat1, $lon1, $lat2, $lon2) {
    $theta = $lon1 - $lon2;
    $miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
    $miles = acos($miles);
    $miles = rad2deg($miles);
    $miles = $miles * 60 * 1.1515;
    $feet = $miles * 5280;
    $yards = $feet / 3;
    $kilometers =round( $miles * 1.609344);
    $meters = $kilometers * 1000;
    return $kilometers; 
}
?>


