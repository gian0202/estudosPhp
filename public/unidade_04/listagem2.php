<?php  require_once("../../conexao/conexao.php") ?>
<?php
 // Consulta ao banco de dados
 $produtos = "SELECT produtoID, nomeproduto, tempoentrega, precounitario, imagempequena ";
 $produtos .= "FROM produtos ";
 $resultado = mysqli_query($conecta, $produtos);
 if(!$resultado) {
     die("Falha na consulta ao banco");   
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<link href="_css/estilo.css" rel="stylesheet">
<link href="_css/produtos.css" rel="stylesheet">
<?php include_once("../_incluir/topo.php"); ?>
        <?php include_once("../_incluir/funcoes.php"); ?>
        <main>
            <div id="listagem_produtos">
          <?php while($linha = mysqli_fetch_assoc($resultado)){

          
          ?>
        <ul>
            <li class="imagem"><img  src="<?php  echo $linha ["imagempequena"]?> "></li>
            <li><?php echo $linha["nomeproduto"] ?></li>
            <li>Tempo entrega:<?php echo $linha["tempoentrega"] ?></li>
            <li>Preço Unitario:<?php echo"R$" . number_format($linha["precounitario"],2,",",".") ?></li>
        </ul>
          <?php
          }
          ?>
          </div>
        </main>
        <?php include_once("../_incluir/rodape.php"); ?> 
</body>
</html>