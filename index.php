<?php
  if( $curl = curl_init() ) {
    //curl_setopt($curl, CURLOPT_URL, 'http://213.226.112.78/study/GetInputData');
    curl_setopt($curl, CURLOPT_URL, 'http://test2/GetInputData/');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    $out = curl_exec($curl);
    echo $out;
    curl_close($curl);
    $input = chetResJson($out);
  }

  if( $curl = curl_init() ) {
    //curl_setopt($curl, CURLOPT_URL, 'http://213.226.112.78/study/WriteAnswer');
    curl_setopt($curl, CURLOPT_URL, 'http://test2/WriteAnswer/');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, "input=$input");
    $out2 = curl_exec($curl);
    echo $out2;
    curl_close($curl);
  }

  function chetResJson ($json)
{
  $obj = json_decode($json);
  $SumResult = array_sum($obj->{'Sums'}) * $obj->{'K'};
  $MulResult = array_product($obj->{'Muls'});
  $SortedInputs = array_merge($obj->{'Sums'}, $obj->{'Muls'});
  sort($SortedInputs);
  $SumResult = number_format($SumResult, 2);
  $SumResult = (int)$SumResult;

  for ($i=0; $i < count($SortedInputs) ; $i++) { 
  	$SortedInputs [$i] = number_format($SortedInputs[$i], 2);	
  }

  $arr = array('SumResult' => $SumResult, 'MulResult' => $MulResult, 'SortedInputs' => $SortedInputs);

  $ret = json_encode($arr);
  return $ret;
}
?>