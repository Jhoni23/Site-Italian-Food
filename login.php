<?php
    $conexao = mysqli_connect('localhost', 'root', 'root', 'bd_lojaphp');

    if($_GET['verif'] == 1){
        $email = $_POST['txtemail']; $senha = $_POST['txtsenha'];

        if($email && $senha){
            $sql="select email from tb_cliente";
            $return = $conexao->query( $sql ); $return = $return->fetch_array();

            foreach ($return as $emails) {

                if ($email == $emails) {
                    $sql='select cod_cliente from tb_cliente where email = "'. $email.'"';
                    $return = $conexao->query( $sql ); $return = $return->fetch_array();
                    $id = $return['0'];

                    $sql="select senha from tb_cliente where cod_cliente = ".$id;
                    $return = $conexao->query( $sql ); $return = $return->fetch_array();
                    $senhacorreta = $return['0'];

                    if ($senha == $senhacorreta) {
                        header("Location: index.php?success=1");
                    } else {
                        $wrong =1;
                    }
                    
                    if($wrong == 1){
                        echo '<script>alert("Dados incorretos! Tente novamente.");</script>';
                    }

                    break;
                    
                } else {
                    $wrong = 1;
                }
                
            }

            if($wrong == 1){
                echo '<script>alert("Dados incorretos! Tente novamente.");</script>';
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
    <link rel="stylesheet" href="css/estilo-login.css">
    <title>Login - Cliente</title>
</head>
<body>
    <div class="container justify-content-center panel">

        <div class="div-logo">
            <img src="img/logo.png" class="img-fluid rounded mx-auto d-block img-logo">
        </div>

        <div class="form-group d-flex formulario">
            <form action="?verif=1" method="post">

                <div class="form-row form-row-initial">
                    <input class="form-control form-control-lg" type="text" name="txtemail" placeholder="Email">
                </div>

                <div class="form-row">
                    <input class="form-control form-control-lg" type="password" name="txtsenha" placeholder="Senha">
                </div>

                <div class="form-row btn-sub initial">
                    <input class="btn" type="submit" value="LOGIN" name="btn">
                </div>

            </form>

            <div class="form-row btn-sub">
                <form action="cadastro.php" method="post"><input class="btn" type="submit" value="REGISTRE-SE" name="btn"></form>
            </div>

        </div>
    </div>
</body>
</html> 