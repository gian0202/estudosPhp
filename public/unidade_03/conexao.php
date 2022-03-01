<?php
//passo 1
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "andes";
$conecta = mysqli_connect($servidor, $usuario, $senha, $banco);
//passo 2
if(mysqli_connect_errno()){
    die ("Conexão Falhou ". mysqli_connect_errno());
}
//passo 3 
$consulta_produtos = "SELECT nomeproduto,  tempoentrega";
$consulta_produtos .= " FROM produtos";
$produtos = mysqli_query($conecta, $consulta_produtos) ;

if (!$produtos){
    die("Falha na consulta ao banco de Dados");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      while( $registro = mysqli_fetch_assoc($produtos)){
          ?>
          <li><?php  echo$registro["nomeproduto"]  ?></li><?php
      }
    ?>
<?php 
 mysqli_free_result($produtos);
?>
    
</body>
</html>
<?php
mysqli_close($conecta);
?>