<?php

/**
* function array_8_dezena for demonstrating PHPDoc
*
* function array_8_dezena 
* 
* function that returns an array with 8 random tens between 1 and 80, 
* ensuring that the numbers never repeat and are in ascending order.
* 
* @package  funcoes
* @author   Vagton Alves Ferreira <vagtonaf@gmail.com>
* @version  $Revision: 1.0 $
* @access   public
* @see      http://www.e-create.com/xxx
*/

function array_8_dezena(){
	$retorno_array=array();
    $contar = 0;
    $n=1;
	while($contar<=8){
	   $valor_escolhido = rand ( 1 , 80 );	
	   $retorno_array[] = str_pad($valor_escolhido,2,"0",STR_PAD_LEFT); 
	   $retorno_array = array_unique($retorno_array);
	   $contar = count($retorno_array);
	   $n++;
	   if($n>50) break;
	}
	sort($retorno_array);

    return $retorno_array;
}

?>