<?php 
  $a = $_POST['input'];
  $primerString = '{"SumResult":30,"MulResult":4,"SortedInputs":["1.00","1.01","2.02","4.00"]}';
  if ($a == $primerString) {
  	echo "всё ок";
  	echo $a;
  } else {
  	echo $a;
  }
 ?>