<?php
//https://www.hackerrank.com/challenges/ctci-ransom-note
$handle = fopen ("php://stdin","r");
fscanf($handle,"%d %d",$m,$n);
$magazine_temp = fgets($handle);
$magazine = explode(" ",$magazine_temp);
$ransom_temp = fgets($handle);
$ransom = explode(" ",$ransom_temp);

echo test($ransom, $magazine);

function test($ransom, $magazine){
       
    $magHash = [];
    $count = 0;
    foreach($magazine as $word){
        
     if(array_key_exists($word, $magHash)){
         $magHash[$word] += 1;
            } else {
         $magHash[$word] = 1;
     } 
     
    }
    
    foreach($ransom as $word2){ 
           
        if(array_key_exists($word2, $magHash)){
            
            if($magHash[$word2] > 0){
                $magHash[$word2]--;
            } else {
                return 'No';
            }
        }
    }

    return 'Yes';
}

?>
