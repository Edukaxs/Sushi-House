<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="_css/style.css">
    <link rel="stylesheet" href="_css/index.css">
    <link rel="shortcut icon" href="_img/Logo.png" type="image/x-icon">
    <title>Sushi House</title>
</head>
<body>
    <header class="menu">
        <div class="logo">
            <a href="index.php"><img src="_img/Logo.png" alt=""></a>
        </div>
        <div class="links">
            <ul class="nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="cardapio.php" target="_blank">Cardápio</a></li>
                <li><a href="#suporte">Contato</a></li>
            </ul>
        </div>
        <div class="login">  
            <a href="login.php">
                <button><img src="_img/Login.png" alt=""></button>
            </a>
        </div>
    </header>

    <section class="main">
        <div class="texto">
            <h1>Sushi House</h1>
            <h2>Modernidade e <span>cultura.</span></h2>
            <p>Descubra sabores autênticos preparados com ingredientes frescos e selecionados.<br>
            Cada peça é feita com cuidado para oferecer qualidade, tradição e uma experiência inesquecível.</p>
            <button class="btn">Faça seu pedido</button>        
        </div>
    </section>

    <section class="casa">
        <div class="casa-header">
            <p>BEM-VINDO</p>
            <h2>Conheça <span>Nossa Casa</span></h2>
            <p id="txt">Um espaço pensado para unir tradição japonesa, ingredientes frescos e um atendimento que faz você se sentir em casa.</p>
        </div>
        <div class="casa-produtos">
            <div class="sushis">
                <div class="img">
                    <img src="_img/Sushis.png" alt="">
                </div>
                <div class="texto">
                    <h1>Sushis</h1>
                    <p>Preparações de peixe cru ou frutos do mar da mais alta qualidade, servidos com arroz temperado, algas e vegetais. Uma das comidas mais tradicionais da cultura japonesa.</p>
                </div>
            </div>
            <div class="sashimis">
                <div class="img">
                    <img src="_img/Sashimis.png" alt="">
                </div>
                <div class="texto">
                    <h1>Sashimis</h1>
                    <p>Iguaria tradicional da culinária japonesa, composta por finas fatias de peixe cru ou frutos do mar. É apreciado por sua simplicidade e sofisticação, servindo-se geralmente sem arroz, realçando o sabor puro dos ingredientes.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="categorias">
        <div class="categorias-header">
            <p>CATEGORIAS</p>
            <h2>Nossas <span>Categorias</span> Mais pedidas</h2>
            <p id="txt1">Confira os destaques do nosso cardápio, escolhidos a dedo pelos nossos clientes mais fiéis.</p>
        </div>
        <div class="categorias-container">
            <div class="lista">
                <div class="d1">
                    <div class="img">
                        <img src="_img/Combo.jpg" alt="">
                    </div>
                    <div class="texto">
                        <h1>Combos</h1>
                        <p>Combinações especiais com os pratos mais amados do nosso cardápio, perfeitas para compartilhar ou saborear sozinho.</p>
                        <p><span>Veja mais → </span></p>
                    </div>
                </div>
                <div class="d2">
                    <div class="img">
                        <img src="_img/Sopas.png" alt="">
                    </div>
                    <div class="texto">
                        <h1>Sopas</h1>
                        <p>Receitas tradicionais preparadas com ingredientes selecionados, trazendo conforto e sabor em cada colherada.</p>
                        <p><span>Veja mais → </span></p>
                    </div>
                </div>
            </div>
            <div class="img">
                <img src="_img/Sushi2.png" alt="">
            </div>
        </div>
        
    </section>

    <section class="contato" id="suporte">
        <div class="contato-header">
            <p>CONTATO
            </p>
            <h2>Fale <span>Conosco</span></h2>
            <p id="txt1">Tem alguma dúvida, sugestão ou quer fazer um pedido especial? É só nos mandar uma mensagem. *Cheque os horários de atendimento disponíveis.</p>
        </div>
        <div class="contato-container">
            <div class="img">
                <img src="_img/Contato.jpg" alt="">
            </div>
            <div class="texto">
                <div class="horarios">
                    <h1>Horários de funcionamento</h1>
                    <p>Segunda a Quinta <span>11h a 21h</span></p>
                    <p>Sexta e Sábado <span>10h a 20h</span></p>
                    <p>Domingo <span>12h a 20h</span></p>
                    <p>Feriados <span>11h a 19h</span></p>
                </div>
                <div class="meios-contato">
                    <h1>Meios de contato</h1>
                    <div class="whatsapp">
                        <div class="img">
                           <img src="_img/whatsapp.png" alt="">    
                        </div>
                        <div class="txt">
                            <p>11 99999-9999</p>
                        </div>
                    </div>

                    <div class="telefone">
                        <div class="img">
                           <img src="_img/telephone.png" alt="">    
                        </div>
                        <div class="txt">
                            <p>11 99999-9999</p>
                        </div>
                    </div>

                    <div class="email">
                        <div class="img">
                           <img src="_img/email.png" alt="">    
                        </div>
                        <div class="txt">
                            <p>SushiHouseDelivery@email.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <p>© 2026 Sushi <span>House</span> — Todos os direitos reservados.</p>
        <p>Site por: Claudio Henrique, Gabriel Lopes e Eduardo Gomes.</p>
    </footer>
</body>
</html>