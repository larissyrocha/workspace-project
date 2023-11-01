<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login-styles.css">
    <title>Edsure</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    ?>
    <div class="header">
        <!-- <div class="logo">
            <a href="#"><img src="img/Creative_Logo.png" alt="logo-empresa"></a>
        </div> -->
    </div>
    <div class="login-body"> <!-- Removi o ponto para corrigir a classe -->
        <div class="login-box">
            <h2>Fazer login em sua conta</h2>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post"> <!-- Especifique a URL de destino ou deixe em branco -->
                <div class="input-box">
                    <input required type="email" placeholder="Email ou número de telefone" name="email" id="name">
                </div>
                <div class="input-box">
                    <input required type="password" placeholder="Senha" name="passoword" id="password"> <!-- Corrigi o tipo para "password" -->
                </div>
                <div class="bottom">
                    <button type="submit" class="submit">Entrar</button>
                </div>
            </form>
            <div class="terms1">
                <div class="remember">
                    <span><input type="checkbox"></span>
                    <p>Lembre de mim</p>
                </div>
                <div class="forgot">
                    <a href="#">Forgot password</a>
                </div>
            </div>
            <div class="terms2"> <!-- Corrigi o nome da classe para incluir hífen -->
                <p>Esta página é protegida pelo Google reCAPTCHA para garantir que você não é um robô <span>Saiba mais</span></p>
            </div>
            <?php 
                if ($email == '') {
                    ?>
                        <div class="alert alert-danger terms2" role="alert">
                            Informe seu E-mail
                        </div>
                    <?php
                } else {
                    if ($password == "") {
                        ?>
                            <div class="alert alert-danger terms2" role="alert">
                                Informe sua Senha
                            </div>
                        <?php
                    } else {
                        $query = $pdo->query("SELECT * FROM logins WHERE email = :email AND senha = :senha");
                        $query->bindValue(':email',$email, PDO::PARAM_STR);
                        $query->bindValue(':senha', $password, PDO::PARAM_STR);
                        $query->execute();
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res) > 0) {
                            $nome = $res[0]['nome'];
                            $email = $res[0]['email']; 

                            if (!(isset($_SESSION))) {
                                $_SESSION['id']
                            }
                        } else {
                            ?>
                            <div class="alert alert-danger terms2" role="alert">
                                Email e/ou Senha incorretos
                            </div>
                        <?php
                        }
                    }
                }
            ?>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>