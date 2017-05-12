<?php
$records = file_get_contents('http://www.umass.edu/microbio/rasmol/country-.txt');
$recordsArray = explode("\n",$records);
$orderedArray = [];

foreach($recordsArray as $key => $value):
  if($key !== 0 && $key !== 1 && $value !== ''):
    $arrayValues = explode('   ',$value);
    if(isset($arrayValues[1])):
      $orderedArray[$arrayValues[1]] = $value;
    endif;
  endif;
endforeach;

ksort($orderedArray);

$file = fopen('cache/countries.csv','w');

foreach($orderedArray as $key => $value):
  $arrayValues = explode('   ',$value);
  $arrayValues = [ $arrayValues[1], $arrayValues[0] ];
  fputcsv($file,$arrayValues);
endforeach;

fclose($file);
