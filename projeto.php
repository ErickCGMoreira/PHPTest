<?php
require_once("conexao.php");
if (isset($_GET['catego'])) {
    $cate = $_GET['catego'];
} else {
    $cate = 'principal';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardápio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body align="center">
    <h1><?php echo $cate;?></h1>
    <?php
try {
$sql = "SELECT * FROM item WHERE categoria = '$cate';";
$stmt = $conexao->query($sql);
$lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
$list = array();

foreach ($lista as $linha) {
    echo "
    <div class='card mb-3' style='max-width: 540px;'>
        <div class='row no-gutters'>
          <div class='col-md-4'>
            <img src='".$linha['foto']."' class='card-img' alt='...'>
          </div>
          <div class='col-md-8'>
            <div class='card-body'>
                <h5 class='card-title'>".$linha['nome']."</h5>
                <p class='card-text'>".$linha['descicao']."</p>
                <p class='card-text'> R$".$linha['preco']."</p>
            </div>
          </div>
        </div>
      </div>";
}

} catch (PDOException $e) {
    echo "Ocorreu um erro ao tentar Buscar Todos. " . $e->getMessage();
}
?>
      
    
</body>

</html>