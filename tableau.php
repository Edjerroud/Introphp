<?php 
    
    $tirage = [];
        for ($i=0 ; $i<6; $i++){
        
        do{
          $numero = rand(1,49);
        }
        while(in_array($numero,$tirage));
        $tirage[]=$numero;
         }
        var_dump($tirage);

include 'loto.phtml';

