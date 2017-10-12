<?php 

/**
* class Arquivo for demonstrating PHPDoc
*
* Class Arquivo 
* this class loads a file and displays on the screen its contents
*
* @package  classes
* @author   Vagton Alves Ferreira <vagtonaf@gmail.com>
* @version  $Revision: 1.0 $
* @access   public
* @see      http://www.e-create.com/xxx
*/

class Arquivo {

     private $conteudo_arquivo;

     public function carregar($arquivo=null){
     	try{
            if(empty($arquivo)){
               throw new Exception("Informe um arquivo válido! ", 1);
            }elseif (is_file( $arquivo ) ){
	        	$objLido = fopen( $arquivo, "r" );
	        	$texto = fread( $objLido, filesize( $arquivo ) );
	        	fclose( $objLido );
		        $this->conteudo_arquivo = $texto;
                return true;
	    	}
    	}catch( Exception $e){
            echo "Falha " . $e->getMessage();
    	}
      }

     public function ver(){
        if(!empty($this->conteudo_arquivo)){
            return $this->conteudo_arquivo;
        }else{
            return "Arquivo com conteudo vazio!";
        }
        
     }

}

?>