<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sushi House - Entrar ou Criar Conta</title>
    <link rel="stylesheet" href="_css/login.css">
</head>
<body>
    <div class="auth-wrapper">
        <div class="auth-banner">
            <a href="index.php" class="logo"><img src="_img/Logo.png" alt=""></a>
            <div class="banner-text">
                <h1>Sabores que <span>conectam</span> tradição e modernidade</h1>
                <p>Crie sua conta para acompanhar pedidos, salvar seus combos favoritos e aproveitar promoções exclusivas da Sushi House.</p>
            </div>

            <a href="index.php" class="back-link">← Voltar para o site</a>
        </div>

        <div class="auth-form-side">
            <div class="auth-box">
                <div class="form-panel active" id="login">
                    <h2>Bem-vindo de <span>volta</span></h2>
                    <p class="subtitle">Entre com sua conta para continuar seu pedido.</p>

                    <form>
                        <div class="field-group">
                            <label for="login-email">E-mail</label>
                            <input type="email" id="login-email" placeholder="seuemail@gmail.com" required>
                        </div>

                        <div class="field-group">
                            <label for="login-password">Senha</label>
                            <input type="password" id="login-password" placeholder="Digite sua senha" required>
                        </div>

                        <div class="field-row">
                            <label><input type="checkbox"> Lembrar de mim</label>
                            <a data-target="forgot" class="switch-link">Esqueci a senha</a>
                        </div>

                        <button type="submit" class="btn">Entrar</button>
                    </form>

                    <div class="divider">ou continue com</div>
                    <button class="btn-google">Entrar com Google</button>

                    <p class="switch-text">Não tem uma conta? <a data-target="register" class="switch-link">Criar conta</a></p>
                </div>

                
                <div class="form-panel" id="register">
                    <h2>Crie sua <span>conta</span></h2>
                    <p class="subtitle">Cadastre-se e aproveite uma experiência completa na Sushi House.</p>

                    <form>
                        <div class="field-group">
                            <label for="register-name">Nome completo</label>
                            <input type="text" id="register-name" placeholder="Seu nome" required>
                        </div>

                        <div class="field-group">
                            <label for="register-email">E-mail</label>
                            <input type="email" id="register-email" placeholder="seuemail@gmail.com" required>
                        </div>

                        <div class="field-group">
                            <label for="register-password">Senha</label>
                            <input type="password" id="register-password" placeholder="Crie uma senha" required>
                        </div>

                        <div class="field-group">
                            <label for="register-confirm">Confirmar senha</label>
                            <input type="password" id="register-confirm" placeholder="Repita a senha" required>
                        </div>

                        <button type="submit" class="btn">Criar conta</button>
                    </form>

                    <div class="divider">ou continue com</div>
                    <button class="btn-google">Criar conta com Google</button>

                    <p class="switch-text">Já tem uma conta? <a data-target="login" class="switch-link">Entrar</a></p>
                </div>

                
                <div class="form-panel" id="forgot">
                    <a class="back-to-login switch-link" data-target="login">← Voltar para o login</a>

                    <h2>Esqueceu sua <span>senha</span>?</h2>
                    <p class="subtitle">Digite seu e-mail e enviaremos um link para você redefinir sua senha.</p>

                    <form>
                        <div class="field-group">
                            <label for="forgot-email">E-mail</label>
                            <input type="email" id="forgot-email" placeholder="seuemail@gmail.com" required>
                        </div>

                        <button type="submit" class="btn">Enviar link de recuperação</button>
                    </form>

                    <p class="switch-text">Lembrou a senha? <a data-target="login" class="switch-link">Voltar ao login</a></p>
                </div>

            </div>
        </div>

    </div>

    <script>
        // Controla a troca entre os painéis: Entrar, Criar Conta, Esqueci a Senha
        const panels = document.querySelectorAll('.form-panel');
        const mainTabs = document.querySelectorAll('#mainTabs .tab-btn');
        const switchLinks = document.querySelectorAll('.switch-link');

        function showPanel(target) {
            panels.forEach(panel => {
                panel.classList.toggle('active', panel.id === target);
            });

            // Atualiza as abas principais (Entrar / Criar Conta) só quando
            // o destino é um desses dois painéis
            mainTabs.forEach(tab => {
                tab.classList.toggle('active', tab.dataset.target === target);
            });
        }

        mainTabs.forEach(tab => {
            tab.addEventListener('click', () => showPanel(tab.dataset.target));
        });

        switchLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                showPanel(link.dataset.target);
            });
        });
    </script>

</body>
</html>