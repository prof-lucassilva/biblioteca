<?php
    function verificarForcaSenha($password) {
        // Verificar o comprimento mínimo
        if (strlen($password) < 8) {
            return false;
        }
        // Verificar se a senha contém pelo menos uma letra maiúscula
        if (!preg_match("/[A-Z]/", $password)) {
            return false;
        }
        // Verificar se a senha contém pelo menos uma letra minúscula
        if (!preg_match("/[a-z]/", $password)) {
            return false;
        }
        // Verificar se a senha contém pelo menos um número
        if (!preg_match("/[0-9]/", $password)) {
            return false;
        }
        // Verificar se a senha contém pelo menos um caractere especial
        if (!preg_match("/[!@#$%^&*()\-_+=\[\]{};:,.<>?]/", $password)) {
            return false;
        }
        return true;
    }

    if (isset($_POST['submit'])) {
        include_once('conexao.php');
    
        $usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
        $senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));
        
        $senhaValida = verificarForcaSenha($_POST['senha']);
    
        if ($senhaValida) {
            $result = mysqli_query($conexao, "INSERT INTO admin(usuario,senha) 
            VALUES ('$usuario','$senha')");
            
            header('Location: login.php');
        } else {
            $senhaError = "A senha não atende aos critérios de segurança.";
        }
    }    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Administradores</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
        }
        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset{
            border: 3px solid dodgerblue;
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
        #submit{
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
        }
        a{
            text-decoration: none;
            color: white;
            border: 3px solid blue;
            border-radius: 10px;
            padding: 10px;
        }
        a:hover{
            background-color: dodgerblue;
        }
    </style>
</head>
<body>
    <div class="box">
        <form action="formulario.php" method="POST">
            <fieldset>
                <legend><b>Cadastro de Administradores</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="usuario" id="usuario" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome de usuário</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <span id="senha-error" style="color: red;"></span>
                <br><br>
                <input type="submit" name="submit" id="submit">
                <br><br><br><br>
                <a href="home.php">Voltar</a>
            </fieldset>
        </form>
    </div>
    <script>
        <?php if (isset($senhaError)): ?>
            document.getElementById('senha-error').textContent = "<?php echo $senhaError; ?>";
            document.getElementById('senha-error').style.display = 'block';
        <?php endif; ?>
    </script>
</body>
</html>