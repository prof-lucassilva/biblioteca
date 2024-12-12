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
        include_once('config.php');
    
        $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
        $email = mysqli_real_escape_string($conexao, $_POST['email']);
        $senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));
        $telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
        $sexo = mysqli_real_escape_string($conexao, $_POST['genero']);
        $data_nasc = mysqli_real_escape_string($conexao, $_POST['data_nascimento']);
        $cidade = mysqli_real_escape_string($conexao, $_POST['cidade']);
        $estado = mysqli_real_escape_string($conexao, $_POST['estado']);
        $endereco = mysqli_real_escape_string($conexao, $_POST['endereco']);
        
        $senhaValida = verificarForcaSenha($_POST['senha']);
    
        if ($senhaValida) {
            $result = mysqli_query($conexao, "INSERT INTO cadastros(nome,email,senha,telefone,sexo,data_nasc,cidade,estado,endereco) 
            VALUES ('$nome','$email','$senha','$telefone','$sexo','$data_nasc','$cidade','$estado','$endereco')");
            
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
    <title>Formulário | Exemplo</title>
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
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
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
    </style>
</head>
<body>
    <a href="home.php">Voltar</a>
    <div class="box">
        <form action="formulario.php" method="POST">
            <fieldset>
                <legend><b>Fórmulário de Clientes</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <span id="senha-error" style="color: red;"></span>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="genero" value="f" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="m" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="genero" value="o" required>
                <label for="outro">Outro</label>
                <br><br>
                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" required>
                <br><br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="estado" class="labelInput">Estado</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">
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