<?php
    $conexao = mysqli_connect('localhost', 'root', 'root', 'bd_lojaphp');

    if(!$conexao){
        echo  '<script>alert("Não foi possível se conectar ao bando de dados");</script> ';
        exit;
    }

    $sql="select sum(tb_carrinho_qtd) from tb_carrinho";
    $return = $conexao->query( $sql );
    $registro = $return->fetch_array();
    
    if($registro['0'] == null){
        $registro['0'] = 0;
    }

    if($_GET['soma'] > 0){
        global $conexao;
        $id = $_GET['soma'];

        $sql = 'select tb_carrinho_qtd from tb_carrinho where tb_produtos_id = '. $id ;
        $totalItens = $conexao->query( $sql ); $registro = $totalItens->fetch_array();
        $registro['0'] += 1;
        $sql = "update tb_carrinho set tb_carrinho_qtd = ". $registro['0'] ." where tb_produtos_id = ". $id ."";
        $conexao->query( $sql );

        header("Location: ?");
    }

    if($_GET['subt'] > 0){
        global $conexao;
        $id = $_GET['subt'];

        $sql = 'select tb_carrinho_qtd from tb_carrinho where tb_produtos_id = '. $id ;
        $totalItens = $conexao->query( $sql ); $registro = $totalItens->fetch_array(); $qtd = $registro['0'];

        if($qtd >= 2){
            global $conexao;
            $qtd -= 1;
            $sql = "update tb_carrinho set tb_carrinho_qtd = ".$qtd." where tb_produtos_id = ". $id ."";
            $conexao->query( $sql );
        }else if($qtd == 1){
            global $conexao;
            $id = $_GET['subt'];

            $sql = 'delete from tb_carrinho where tb_produtos_id='. $id;
            $conexao->query( $sql );
        }
    
        header("Location: ?");
    }

    if($_GET['del'] > 0){
        global $conexao;
        $id = $_GET['del'];
        $sql = 'delete from tb_carrinho where tb_produtos_id='. $id;
        $conexao->query( $sql );
        header("Location: ?");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Carrinho - Italian Food</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="css/estilo-carrinho.css" rel="stylesheet" />
    </head>

    <body>
        <nav>
            <img src="img/logo.png" class="navbar-brand">
            <form action="index.php">
            <button type="submit"><i class="bi bi-arrow-return-left"></i> Início</button>
            </form>
        </nav>

        <div id="titulo">
            <span style="font-size: 380%;">Seu Carrinho</span>
            <span style="font-size: 150%;" class="claro">
            
            <?php switch ($registro['0']) {
                case 0:
                    break;
                
                case 1:
                    echo "(1 Item)";
                    break;
                
                default:
                    echo "(".$registro['0']." Itens)";
                    break;
            } ?> </span>

        </div>

                
        <div class="group">
            <div id="conteiner-main">
                <div id="um" class="title">
                    <span class="claro">PRODUTO</span>
                </div>
                
                <div id="dois" class="title">
                    <span class="claro">PREÇO</span>
                </div>
                    
                <div id="tres" class="title">
                    <span class="claro">QUANTIDADE</span>
                </div>
                                    
                <div id="quatro" class="title">
                    <span class="claro">TOTAL</span>
                </div>
                
            <div id="espaco"></div>

                <?php    
                    if($registro['0'] > 0){
                        $sql='select tb_carrinho_id from tb_carrinho';
                        $return = $conexao->query( $sql );
                        for ($set = array (); $row = $return->fetch_array(); $set[] = $row);
                        
                        foreach ($set as list($i)) { 
                            $sql='select tb_produtos_id from tb_carrinho where tb_carrinho_id = '.$i;
                            $return = $conexao->query( $sql ); $return = $return->fetch_array(); $id = $return['0'];

                            $sql='select tb_produtos_nome, tb_produtos_preço from tb_produtos where tb_produtos_id = '.$id;
                            $return = $conexao->query( $sql ); $return = $return->fetch_array(); 
                            $nome = $return['0'];
                            $preco = $return['1'];

                            $sql='select tb_carrinho_qtd from tb_carrinho where tb_produtos_id = '.$id;
                            $return = $conexao->query( $sql ); $return = $return->fetch_array(); 
                            $qtd = $return['0'];

                            $totalproduto = $preco * $qtd;

                            echo'   <div id="item">
                                        <div id="um">
                                            <div id="backimg"><img src="img/'.$id.'.jpg"></div>
                                            <div id="txtnome"><p>'.$nome.'</p></div>
                                        </div>
                    
                                        <div id="dois">
                                            <span>R$'.$preco.'</span>
                                        </div>
                    
                                        <div id="tres">
                                            <div>
                                                <a href="?soma='.$id.'">+</a>
                                                <span>'.$qtd.'</span>
                                                <a href="?subt='.$id.'">-</a>
                                            </div>
                                        </div>
                    
                                        <div id="quatro">
                                            <span>R$'.$totalproduto.'</span>
                                            <a href="?del='.$id.'"><span><i class="bi bi-x"></i></span></a>
                                        </div>
                                    </div>
                                ';

                            

                            if (!$totalgeral) {
                                $totalgeral = $totalproduto;
                            }else{
                                $totalgeral += $totalproduto;
                            }
                        }
                        $qtditens = 0;
                        
                    }else {
                        $qtditens = 0;
                        echo "Não há itens no carrinho!";
                        $totalgeral = "0,00";
                    }

                    foreach ($set as list($i)) {
                        $qtditens++;
                    }
                ?>
                <?php if($qtditens >= 5){ echo'
                                    <footer class="bottom">
                                    <span>Copyright &copy; 2°DSIEM 2021</span>
                                    </footer>
                                ';} ?>
                
                
            </div>  
        </div>
        
        <?php if($qtditens < 5){ echo'
                    <footer class="fix">
                    <span>Copyright &copy; 2°DSIEM 2021</span>
                    </footer>
                ';} ?>

        <div id="conteiner2">
            <div id="resumo-box">
                <div id="um">
                    <p>Resumo do Pedido</p>
                </div>
                                    
                <div id="dois">
                    <span class="claro">Subtotal</span><span class="right">R$<?php echo $totalgeral; ?></span></br></br>
                    <span class="claro">Frete</span><span class="right">Grátis</span>
                </div>
                
                <div id="tres">
                    <p>Total</p>
                    <p class="right">R$<?php echo $totalgeral; ?></p>
                </div>
            </div>
            <form action="login.php" method="post">
                <button id="checkout">FINALIZAR</button>
            </form>
        </div>

    </body>
</html>