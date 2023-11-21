<?php

include_once './config/config.php';
include_once './classes/produ.php';


$produ = new Produ($conn);
$data = $produ->read();
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="media.css">
<script src="script.js" defer></script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <section class="principal" id="home">
        <header class="nav">
            <a href="#"><img src="img/logo.png" alt="" class="logo"></a>
            <nav>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="./login.php">Produtos</a></li>
                    <li><a href="./login.php">Banho&Tosa</a></li>
                    <li><a class="btn" href="./login.php">login</a></li>
                </ul>
            </nav>
        </header>
    </section>

    <section class="content">
        <div class="fundoPrincipal">
            <div class="text">
                <h2>Pelúcia & Ração
                    <br><span>PetShop</span>
                </h2>
                <p>Olá! Somos Pelúcias & Ração. Nascemos da alegria e do prazer que é cuidar de cães e gatos!
                    Todos os pets que recebemos são tratados assim: como se fossem nossos próprios filhos.</p>
            </div>
        </div class="icons">
        <ul>
            <li><a href="https://www.facebook.com/"><img src="./img/facebook.png" alt=""></a></li>
            <li><a href="https://www.youtube.com/"><img src="img/youtube.jpg" alt=""></a></li>
            <li><a href="https://www.instagram.com/"><img src="img/instagram.jpg" alt=""></a></li>
        </ul>
        <div class="imagens">
            <div class="imagemCao">
                <img src="./img/cao.jpg" alt="">
            </div>
            <svg preserveAspectRatio="none" data-bbox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" width="200"
                height="200" viewBox="0 0 200 200" role="img" aria-label="Veterinário Canoas | Le Malí Pet Center">
                <g>
                    <path d="M200 100c0 55.228-44.772 100-100 100S0 155.228 0 100 44.772 0 100 0s100 44.772 100 100z">
                    </path>
                </g>
            </svg>
        </div>

    </section>

    <section class="homeVantages">
        <div class="advantage">
            <div>
                <h1>Teste</h1>
            </div>
        </div>
    </section>

    <section class="carrosel">
        <div class="bannerCarrosel">

        </div>
    </section>

    <div class="titulo">
        <h2>Mais Vendidos</h2>
    </div>


    <section class="carousel-produtos">
        <?php
        /*
            while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                        <td class="tabNome"><?php echo $row['nome']; ?></td>
                        <td class="tabIdade"><?php echo $row['idade']; ?></td>
                        <td class="tabAcao"> <a href="edit.php?id=<?php echo $row['id']; ?>">Editar</a> <a href="delete.php?id=<?php echo $row['id']; ?>">Excluir</a> </td>
                    </tr>
                <?php } ?>
        */





        while ($row = $data->fetch(PDO::FETCH_ASSOC)) { ?>
            <i class="fa-solid fa-angle-left">
            </i>
            <a href="./login.php">
                <div class="boxProduto">
                    <div class="categoriaProdutos">
                        <div class="badge">
                            <h4 style="font-weight: bolder;">Hot</h4>
                        </div>
                        <div class="tumbnail_imagem">
                            <img src="<?php echo $row['imagem']; ?>" alt="" />
                        </div>
                        <section>
                            <header class="tituloProdtuo">
                                <h2>
                                    <?php echo $row['nome']; ?>
                                </h2>
                            </header>
                        </section>
                        <section class="preco">
                            <p>
                                <?php echo $row['preco']; ?>
                            </p>
                        </section>


                    </div>
            </a>
            <button class="btn" style="padding: 25px 111px;margin-top: 10px;">
                <a style="color: rgb(48, 25, 107);" href="./login.php">Comprar</a>
            </button>
            </div>

            </div>
        <?php } ?>

        <i class="fa-solid fa-angle-right"> > </i>
    </section>

</body>

</html>