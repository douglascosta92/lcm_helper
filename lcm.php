<?php
/*
THIS PROGRAM SHOULD DISPLAY THE EVALUATION PROCCESS TO OBTAIN A LCM "LEAST COMMON MULTIPLE 
OF A GIVEN NUMBERS IN ARRAY FORMAT
*/
$numbers = array(10, 5, 3); //  <== PUT THE NUMBERS DO YOU WANT TO EVALUATE HERE AS ARRAY
mmc($numbers); //FUNCTION CALL

/*
FUNCTION CODE
*/
function mmc($numbers){
    $factor = 2; // START FACTOR
    $ponteiro = array_values($numbers); // THIS VAR IS THE CARRYING FOR EACH LINE PROCCESSING
    $temp = null;
    $repeat = true;
    $ruler = array();
    while($repeat){
        $repeat = false;
        for($i=0;$i < count($ponteiro);$i++){
            $stay = false;
            foreach($ponteiro as $p){
                if($p % $factor==0){
                    $stay = true;
                }
            }
            if(!$stay){
                $factor++;
                $repeat=true;
                continue 2;
            }
            $n = $ponteiro[$i];
            echo $n;
            if($i<count($numbers)-1){
                echo ",";
            }
            if($n % $factor==0){
                $temp[$i] = $n/$factor;
                $factor_flag = true;
            }else{
                $temp[$i] = $n;
            }
        }
        $ponteiro = $temp;
        echo "\t | ".$factor;
        foreach($ponteiro as $n){
            if($n!=1){
                $repeat = true;
            }
        }
        echo "\n";
        if(!$repeat){
           for($j=0;$j<count($ponteiro);$j++){
               echo $ponteiro[$j];
               if($j < count($ponteiro)-1){
                   echo ",";
               }
           } 
        }
        array_push($ruler,$factor);
    }
    echo "\t | ---------------\n \t | ";
    // THE LINES ABOUT CARE ABOUT TO CALCULATE THE PRODUCT FROM ALL PRIME FACTORED NUMBERS.
    $prod = 1;
    for($i = 0; $i < count($ruler);$i++){
        echo $ruler[$i];
        $prod *= $ruler[$i];
        if($i < count($ruler)-1){
            echo "*";
        }else{
            echo "=".$prod;
        }
    }
    // HERE IS DISPLAY THE FINAL RESULT
    echo "\n O resultado é: ".$prod;
}
