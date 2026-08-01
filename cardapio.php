<?php
// ── Conexão com o banco de dados ──────────────────────────────────────────────
$host     = 'localhost';
$dbname   = 'deliverydesushi';
$user     = 'root';       // altere conforme seu ambiente
$password = '';           // altere conforme seu ambiente

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $user,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("Erro ao conectar ao banco: " . $e->getMessage());
}

// ── Busca todas as categorias que possuem produtos disponíveis ────────────────
$sqlCategorias = "
    SELECT c.id_categoria, c.nome_categoria
    FROM categorias c
    INNER JOIN produtos p ON p.id_categoria = c.id_categoria
    WHERE p.disponivel = 1
    GROUP BY c.id_categoria, c.nome_categoria
    ORDER BY c.id_categoria
";
$categorias = $pdo->query($sqlCategorias)->fetchAll(PDO::FETCH_ASSOC);

// ── Busca todos os produtos disponíveis ───────────────────────────────────────
$sqlProdutos = "
    SELECT id_produto, id_categoria, nome, descricao, preco, imagem
    FROM produtos
    WHERE disponivel = 1
    ORDER BY id_categoria, id_produto
";
$todosProdutos = $pdo->query($sqlProdutos)->fetchAll(PDO::FETCH_ASSOC);

// ── Agrupa produtos por categoria ─────────────────────────────────────────────
$produtosPorCategoria = [];
foreach ($todosProdutos as $produto) {
    $produtosPorCategoria[$produto['id_categoria']][] = $produto;
}

// ── Função auxiliar: renderiza imagem ou placeholder ─────────────────────────
function imagemProduto(string $imagem = null): string
{
    if ($imagem && file_exists($imagem)) {
        return htmlspecialchars($imagem);
    }
    return '_img/placeholder.jpg'; // imagem padrão caso não haja cadastrada
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="_css/style.css">
    <link rel="stylesheet" href="_css/cardapio.css">
    <link rel="shortcut icon" href="_img/Logo.png" type="image/x-icon">
    <title>Cardápio</title>
</head>

<body>

    <header class="menu">
        <div class="logo">
            <a href="index.html"><img src="_img/Logo.png" alt="Logo Sushi House"></a>
        </div>
        <div class="links">
            <ul class="nav">
                <li><a href="index.php" target="_blank">Home</a></li>
                <li><a href="cardapio.php" target="_blank">Cardápio</a></li>
                <li><a href="#suporte">Contato</a></li>
            </ul>
        </div>
        <div class="login">
            <button><img src="_img/Login.png" alt="Login"></button>
        </div>
    </header>

    <section class="produtos">
        <div class="casa-header">
            <p>CARDÁPIO</p>
            <h2>Peça <span>Seus Favoritos</span></h2>
            <p id="txt">Um espaço pensado para unir tradição japonesa, ingredientes frescos e um atendimento que faz você se sentir em casa.</p>
        </div>

        <?php if (empty($categorias)): ?>
            <p style="text-align:center; padding: 2rem;">Nenhum produto disponível no momento.</p>

        <?php else: ?>
            <?php foreach ($categorias as $categoria): ?>
                <?php
                $idCat   = $categoria['id_categoria'];
                $nomeCat = htmlspecialchars($categoria['nome_categoria']);
                $produtos = $produtosPorCategoria[$idCat] ?? [];
                ?>

                <div class="combos">
                    <h1><?= $nomeCat ?></h1>
                    <div class="combos-container">

                        <?php foreach ($produtos as $index => $produto): ?>
                            <?php
                            $classe = 'i' . (($index % 4) + 1); // i1, i2, i3, i4 (cicla de 4 em 4)
                            $nome   = htmlspecialchars($produto['nome']);
                            $desc   = htmlspecialchars($produto['descricao'] ?? '');
                            $preco  = number_format((float)$produto['preco'], 2, ',', '.');
                            $img    = imagemProduto($produto['imagem']);
                            $id     = (int)$produto['id_produto'];
                            ?>
                            <div class="<?= $classe ?>">
                                <div class="img">
                                    <img src="<?= $img ?>" alt="<?= $nome ?>">
                                </div>
                                <div class="txt">
                                    <h1><?= $nome ?></h1>
                                    <p><?= $desc ?></p>
                                    <div class="produto-rodape">
                                        <h2>R$ <?= $preco ?></h2>
                                        <button class="btn-comprar" onclick="abrirModal(
                                            '<?= addslashes($nome) ?>',
                                            '<?= addslashes($desc) ?>',
                                            '<?= $preco ?>',
                                            '<?= $img ?>'
                                            )">
                                            Comprar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>

            <?php endforeach; ?>
        <?php endif; ?>

    </section>

    <footer>
        <p>© 2026 Sushi <span>House</span> — Todos os direitos reservados.</p>
        <p>Site por: Claudio Henrique, Gabriel Lopes e Eduardo Gomes.</p>
    </footer>


    <div id="modal-produto" class="modal">

        <div class="modal-content">

            <span class="fechar">&times;</span>

            <div class="modal-imagem">
                <img id="modal-img" src="" alt="">
            </div>

            <div class="modal-info">
                <div id="modal-pedido">
                    <h1 id="modal-nome"></h1>
                    <p id="modal-desc"></p>

                    <div class="modal-entrega">
                        <label for="modal-endereco">Endereço de entrega</label>
                        <input type="text" id="modal-endereco" placeholder="Rua, número, bairro">
                    </div>

                    <div class="modal-pagamento">
                        <p>Forma de pagamento</p>
                        <div class="pagamento-opcoes">
                            <button type="button" class="pagamento-opcao" data-pagamento="Débito">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="2" y="5" width="20" height="14" rx="2" />
                                    <line x1="2" y1="10" x2="22" y2="10" />
                                </svg>
                                <span>Débito</span>
                            </button>

                            <button type="button" class="pagamento-opcao" data-pagamento="Pix">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 4 L18 10 L12 16 L6 10 Z" />
                                    <path d="M12 16 L18 22" />
                                    <path d="M12 16 L6 22" />
                                </svg>
                                <span>Pix</span>
                            </button>

                            <button type="button" class="pagamento-opcao" data-pagamento="VR">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="2" y="5" width="20" height="14" rx="2" />
                                    <text x="12" y="15" font-size="7" text-anchor="middle" fill="currentColor" stroke="none">VR</text>
                                </svg>
                                <span>VR</span>
                            </button>
                        </div>
                    </div>

                    <h2 id="modal-preco"></h2>
                    <button class="btn-finalizar">Finalizar Pedido</button>
                </div>

                <div id="modal-confirmacao" style="display:none;">
                    <svg class="icone-confirmado" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M8 12 L11 15 L16 9" />
                    </svg>
                    <h1>Pedido confirmado!</h1>
                    <p>Seu pedido de <strong id="confirmacao-nome"></strong> foi registrado com sucesso.</p>
                    <p><strong>Endereço:</strong> <span id="confirmacao-endereco"></span></p>
                    <p><strong>Pagamento:</strong> <span id="confirmacao-pagamento"></span></p>
                    <button class="btn-fechar-confirmacao">Fechar</button>
                </div>
            </div>

            <div class="modal-footer">
                <h2 id="modal-preco"></h2>
            </div>

        </div>

    </div>

    </div>

    <script>
        const modal = document.getElementById("modal-produto");
        const pagamentoOpcoes = document.querySelectorAll(".pagamento-opcao");
        let pagamentoSelecionado = null;

        pagamentoOpcoes.forEach(opcao => {
            opcao.addEventListener("click", function() {
                pagamentoOpcoes.forEach(o => o.classList.remove("selecionado"));
                this.classList.add("selecionado");
                pagamentoSelecionado = this.dataset.pagamento;
            });
        });

        function abrirModal(nome, descricao, preco, imagem) {
            document.getElementById("modal-nome").innerText = nome;
            document.getElementById("modal-desc").innerText = descricao;
            document.getElementById("modal-preco").innerText = "R$ " + preco;
            document.getElementById("modal-img").src = imagem;

            // reseta tudo toda vez que um produto novo é aberto
            document.getElementById("modal-endereco").value = "";
            pagamentoOpcoes.forEach(o => o.classList.remove("selecionado"));
            pagamentoSelecionado = null;

            document.getElementById("modal-pedido").style.display = "block";
            document.getElementById("modal-confirmacao").style.display = "none";

            modal.style.display = "flex";
        }

        document.querySelector(".fechar")
            .addEventListener("click", function() {
                modal.style.display = "none";
            });

        window.onclick = function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        };

        document.querySelector(".btn-finalizar")
            .addEventListener("click", function() {
                const endereco = document.getElementById("modal-endereco").value.trim();

                if (endereco === "") {
                    alert("Por favor, informe o endereço de entrega.");
                    return;
                }

                if (!pagamentoSelecionado) {
                    alert("Selecione uma forma de pagamento.");
                    return;
                }

                // preenche os dados na tela de confirmação
                document.getElementById("confirmacao-nome").innerText = document.getElementById("modal-nome").innerText;
                document.getElementById("confirmacao-endereco").innerText = endereco;
                document.getElementById("confirmacao-pagamento").innerText = pagamentoSelecionado;

                // troca a visualização dentro do modal
                document.getElementById("modal-pedido").style.display = "none";
                document.getElementById("modal-confirmacao").style.display = "flex";
            });

        document.querySelector(".btn-fechar-confirmacao")
            .addEventListener("click", function() {
                modal.style.display = "none";
            });
    </script>

</body>

</html>