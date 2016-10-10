<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<? include "file:///C|/wamp64/www/labs/connect.php"; ?>

<body>

<? if($_GET['funcao'] != "detalhes") { ?>
<form name="formulario1" id="formulario1" method="post" action="file:///C|/wamp64/www/labs/enviar-formulario-produto.php">
	Produto:<input type="text" name="produto" id="produto"><br>
    Preco:<input type="text" name="preco" id="preco"><br>
    <input type="submit" name="enviar" id="enviar">
</form>

<hr/>
<h1>Produtos cadastrados</h1><br>


<table width="670" border="1">
  <tr>
    <td width="90" bgcolor="#999999">Detalhes</td>
    <td width="356" bgcolor="#999999">Produtos</td>
    <td width="202" bgcolor="#999999">Preços</td>
  </tr>
<?
  	$sql = mysql_query("SELECT * FROM produtos ORDER BY preco ASC LIMIT 3");
	while ($listar = mysql_fetch_array($sql)) {
		$id = $listar['id'];
		$produto = $listar['produto'];
		$preco = $listar['preco'];
?>
  <tr>
    <td bgcolor="#FFFFFF"> <a href="file:///C|/wamp64/www/labs/index.php?funcao=detalhes&id=<? echo $id ?>"><img src="file:///C|/wamp64/www/labs/arrow_down_16x16.png"></a></td>
    <td bgcolor="#FFFFFF"><? echo $produto ?></td>
    <td bgcolor="#FFFFFF"><? echo $preco ?></td>
  </tr>
<?
}
?>
</table>

<?
} else {

?>

<!-- detalhes -->
<?
	$id = $_GET['id'];
	$sql = mysql_query("SELECT * FROM produtos WHERE id = '$id'");
	while ($listar = mysql_fetch_array($sql)){
		
		$id = $listar['id'];
		$produto = $listar['produto'];
		$preco = $listar['preco'];
		$sobre = $listar['sobre'];
	}
?>

<strong>PRODUTO</strong> <? echo $produto ?>
<br>
<strong>PRECO</strong> <? echo $preco ?>
<br>
<strong>SOBRE</strong> <? echo $sobre ?>

<?
}
?>

</body>
</html>