<?php
//https://www.hackerrank.com/challenges/ctci-making-anagrams
$handle = fopen ("php://stdin","r");
fscanf($handle,"%s",$a);
fscanf($handle,"%s",$b);

$aArr = str_split($a);
$bArr = str_split($b);

$min = min($aArr, $bArr);
$max = max($aArr, $bArr);

$bufferA = [];
$countDeleteA = 0;
$bufferB = [];
$countDeleteB = 0;

for($i = 0; $i < count ($min); $i++){
    
   if(array_key_exists($min[$i], $bufferA)){
       //echo "key exists, ++ $min[$i] in buffer \n";
       $bufferA[$min[$i]] += 1;
   } else {
       $bufferA[$min[$i]] = 1;
       //echo "key new, putting $min[$i] in buffer \n";

   }
}

//print_r($bufferA);

for($i = 0; $i < count ($max); $i++){
    if(array_key_exists($max[$i], $bufferA) && $bufferA[$max[$i]] > 0){
         //echo "key exists, $max[$i] is -- \n";
         $bufferA[$max[$i]]--;
    } else {
         //echo "key not exist, $max[$i] has +1 on deletes \n";
         $countDeleteA += 1;
    }
}

//print_r($bufferA);

for($i = 0; $i < count ($max); $i++){
    
   if(array_key_exists($max[$i], $bufferB)){
       //echo "key exists, ++ $max[$i] in buffer \n";
       $bufferB[$max[$i]] += 1;
   } else {
       $bufferB[$max[$i]] = 1;
       //echo "key new, putting $max[$i] in buffer \n";

   }
}
//print_r($bufferB);


for($i = 0; $i < count ($min); $i++){
    if(array_key_exists($min[$i], $bufferB) && $bufferB[$min[$i]] > 0){
         //echo "key exists, $min[$i] is -- \n";
         $bufferB[$min[$i]]--;
    } else {
         //echo "key not exist, $max[$i] has +1 on deletes \n";
         $countDeleteB += 1;
    }
}

//print_r($bufferB);

echo $countDeleteA + $countDeleteB;

?>
