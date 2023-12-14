<?php 
$date=date("Y-m-d");
$date=date_create($date);
date_add($date,date_interval_create_from_date_string("30 days"));
echo date_format($date,"Y-m-d");
?>