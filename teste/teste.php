<?php  
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
require_once("funcoes/funcoes.php");
require_once("classes/Arquivo.php");
header("Content-type: text/html; charset=iso-8859-1");
include("inc/header.php"); 

echo "<h2>1-Teste da Fun&ccedil;&atilde;o</h2><pre>";
print_r(array_8_dezena());
echo "</pre>";

echo "<h2>2-Teste da Classe Arquivo</h2><br>";
?>
   <h3>Basico Upload</h3>
<tbody>
   <form action="#" method="POST" enctype="multipart/form-data">
      <input type="file" name="fileUpload" placeholder="Selecione um arquivo válido" class="form-control" ></br>
      <input type="submit" class="btn btn-lg  btn-primary" value="Enviar">
   </form>
</tbody>


<?php
   if(isset($_FILES['fileUpload'])){
   	  //Definindo timezone padrão 
      date_default_timezone_set("America/Sao_Paulo"); 
      $agora = date("Y.m.d-H.i.s");

      //Pegando extensão do arquivo
      $ext = strtolower(substr($_FILES['fileUpload']['name'],-4)); 
      //Definindo um novo nome para o arquivo
      $new_name = "Arquivo_" . $agora . $ext; 
      //Diretório para uploads
      $dir = 'uploads/'; 
      //onde está o arquivo
      $arquivo = $dir.$new_name;
      //Fazer upload do arquivo
      move_uploaded_file($_FILES['fileUpload']['tmp_name'], $arquivo); 
      if(!empty($arquivo)){
         $objArquivo = new Arquivo();
         if($objArquivo->carregar($arquivo)){
               echo "<h2>3-Exibi&ccedil;&atilde;o do Arquivo</h2><br>";
               echo "<div class='well well-lg'>Arquivo carregado [{$arquivo}]</div>";
               echo "<div class='well well-lg'><pre>";
               print_r($objArquivo->ver());
               echo "</pre></div>";
         }else{
            echo "<div class='well well-lg'>Selecione um arquivo para carregar!</div>";
         }  
      }       
   }else{
        echo "<div class='well well-lg'>Selecione um arquivo para carregar!</div>";
   }

include("inc/footer.php"); 
?>