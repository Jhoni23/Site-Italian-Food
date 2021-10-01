<?php
    $conexao = mysqli_connect('localhost', 'root', 'root', 'bd_lojaphp');

    if($_GET['cadas'] == 1){
        $nome = $_POST['txtnome'];
        $email = $_POST['txtemail'];
        $senha = $_POST['txtsenha'];
        $telefone = $_POST['txttel'];
        $endereco = $_POST['txtend'];

        if($nome && $email && $senha && $telefone && $endereco){
            $sql='select count(email) from tb_cliente where email = "'.$email.'" ';
            $return = $conexao->query( $sql ); $return = $return->fetch_array();
            $exemail = $return['0'];

            if ($exemail == 1) {
                echo '<script>alert("Email já cadastrado! Tente colocar outro.");</script>';
            }else{
                $sql='insert into tb_cliente (nome, telefone, endereco, email, senha) values ("'.$nome.'", '.$telefone.', "'.$endereco.'", "'.$email.'", "'.$senha.'")';
                $conexao->query( $sql );
                
                header("Location: login.php");
            }

        }else {
            echo '<script>alert("Preencha todos os campos!");</script>';
        }
        
        
    }


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo-cadastro.css">
    <title>Cadastro - Cliente</title>
</head>
<body>
    <div class="container justify-content-center panel">

        <div class="div-logo">
            <img src="src/logo.png" class="img-fluid rounded mx-auto d-block img-logo">
        </div>

        <div class="form-group d-flex justify-content-center formulario">
            <form action="?cadas=1" method="post">

                <div class="form-row form-row-initial">
                    <input class="form-control form-control-lg" type="text" name="txtnome" placeholder="Nome Completo">
                </div>

                <div class="form-row">
                    <input class="form-control form-control-lg" type="text" name="txtemail" placeholder="Email">
                </div>

                <div class="form-row">
                    <input class="form-control form-control-lg" type="password" name="txtsenha" placeholder="Senha">
                </div>

                <div class="form-row">
                    <input class="form-control form-control-lg" type="text" name="txttel" placeholder="Telefone ou Celular">
                </div>

                <div class="form-row">
                    <input class="form-control form-control-lg" type="text" name="txtend" placeholder="Endereço">
                </div>

                <div class="form-row btn-sub">
                    <input class="btn" type="submit" value="CADASTRAR" name="btn">
                </div>

            <form>
        </div>
    </div>
</body>
</html> 