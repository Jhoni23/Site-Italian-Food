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

    if($_GET['id'] > 0){
        global $conexao;
        $id = $_GET['id'];

        $sql = 'select tb_carrinho_qtd from tb_carrinho where tb_produtos_id = '. $id ;
        $totalItens = $conexao->query( $sql );
        $registro = $totalItens->fetch_array();

        if ($registro['0'] == 0){
            $sql = "insert into tb_carrinho (tb_produtos_id, tb_carrinho_qtd) values(". $id .", 1)";
            $conexao->query( $sql );
        }else{
            $registro['0'] += 1;
            $sql = "update tb_carrinho set tb_carrinho_qtd = ". $registro['0'] ." where tb_produtos_id = ". $id ."";
            $conexao->query( $sql );
        }

        header("Location: ?id=false");
    };

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Início - Italian Food</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link href="css/estilo-index.css" rel="stylesheet" />
    </head>

        <?php
            if($_GET['success'] == 1){
                include("assets/mensagemsucesso.php");
                $sql = "truncate table tb_carrinho"; $conexao->query( $sql );
            }
        ?>
    <body>
        

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: fixed; width: 100%; z-index: 1;">
            <div class="container px-4 px-lg-5">
                <img src="img/logo.png" class="navbar-brand" style="width: 14%; filter: invert(100%);">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="d-flex" action="carrinho.php">
                            <button class="btn btn-outline-light" type="submit">
                                <i class="bi-cart-fill me-1"></i>
                                Carrrinho
                                <span class="badge bg-light text-black ms-1 rounded-pill"><?php echo $registro['0'] ?></span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5" style="background-image: url(img/massas.jpg); background-position-y: bottom;">
            <div class="container px-4 px-lg-5 my-5" style="padding-top: 50px;">
                <div class="text-center text-white" style="text-shadow: 0px -1px 9px rgb(0, 0, 0);">
                    <h1 class="display-4 fw-bolder">Italian Food</h1>
                    <p class="lead fw-normal text-white mb-0">A melhor loja de queijos e massas!</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <h1 style="text-align: center; font-family: Century Gothic, CenturyGothic, AppleGothic, sans-serif; font-size: xx-large;">NOSSOS PRODUTOS</h1>
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="img/1.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Kit de Queijos</h5>
                                    <!-- Product price-->
                                    R$29,99
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="?id=1">Comprar</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Popular badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Popular</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="img/2.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Queijo Minas 1Kg</h5>
                                    <!-- Product price-->
                                    R$35,00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="?id=2">Comprar</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Popular badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Popular</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="img/3.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Queijo Brie 1Kg</h5>
                                    <!-- Product price-->
                                    $47,90
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="?id=3">Comprar</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="img/4.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Queijo Gouda 1Kg</h5>
                                    <!-- Product reviews-->
                                    <!-- Product price-->
                                    R$39,90
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="?id=4">Comprar</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Popular badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Popular</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="img/5.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Massa Italiana Tradizionale</h5>
                                    R$30,50
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="?id=5">Comprar</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="img/6.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Massa Carbonara</h5>
                                    <!-- Product price-->
                                    R$55,00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="?id=6">Comprar</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Popular badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Popular</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="img/7.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Nhoque ao Molho Sugo</h5>
                                    R$21.30
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="?id=7">Comprar</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="img/8.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Lasanha a Bolonhesa</h5>
                                    <!-- Product price-->
                                    R$27,40
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="?id=8">Comprar</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="img/9.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Vinho Barista Pinotage 2020</h5>
                                    <!-- Product price-->
                                    R$174,21
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="?id=9">Comprar</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Popular badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Popular</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="img/10.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Vinho Amayna Pinot Noir 2017</h5>
                                    R$376,22
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="?id=10">Comprar</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Popular badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Popular</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="img/11.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Espumante Marquês de Borba Brut</h5>
                                    R$177,60
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="?id=11">Comprar</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="img/12.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Vinho The Wolftrap Red Blend 2019</h5>
                                    <!-- Product price-->
                                    R$123,74
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="?id=12">Comprar</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-2 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; 2°DSIEM 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>