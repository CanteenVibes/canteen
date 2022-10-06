<?php
    

    if(isset($_POST['submit']))
    {
        // print_r('Nome: ' . $_POST['nome']);
        // print_r('<br>');
        // print_r('Email: ' . $_POST['email']);
        // print_r('<br>');
        // print_r('Telefone: ' . $_POST['telefone']);
        // print_r('<br>');
        // print_r('Sexo: ' . $_POST['genero']);
        // print_r('<br>');
        // print_r('Data de nascimento: ' . $_POST['data_nascimento']);
        // print_r('<br>');
        // print_r('Cidade: ' . $_POST['cidade']);
        // print_r('<br>');
        // print_r('Estado: ' . $_POST['estado']);
        // print_r('<br>');
        // print_r('Endereço: ' . $_POST['endereco']);

        include('conecta.php');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $telefone = $_POST['telefone'];
        

        $result = mysqli_query($conexao, "INSERT INTO clientes(nome,senha,email,telefone) 
        VALUES ('$nome','$senha','$email','$telefone')");

        header('Location: login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro | Canteen Vibes</title>
    <link rel="icon" type="imagem/png" href="./favicon.ico" />
    <style>
         @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap');

        body{
            font-family: 'Nunito';
            background-color: rgb(226, 192, 140);
            overflow: hidden;
            margin: 0;
        }
        
        .box{
            color: rgb(102, 42, 13);
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 15px;
            border-radius: 15px;
            width: 30%;
            align-items: center;
            margin-left: 300px;
        }
        
        legend{
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: red;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid #615850;
            outline: none;
            color: black;
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
            background-color: rgb(102, 42, 13);
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #back{
            text-decoration: none;
            margin-top: 50px;
            border: 2px solid #614933;
            border-radius: 15px;
            padding: 10px;
            color: #614933;
        }
        #back:hover{
            background: #614933;
            color: white;
        }
        hr{
            width: 2px;
            height: 550px;
            background-color: #614933;
            border: #614933;
            
        }
        #boizin{
            margin-top: -500px;
            margin-left: 80px;
        }
        h1{
            margin-left: 50px;
        }
    </style>
</head>
<body>
   
    <div class="box">
        <form action="formulario.php" method="POST">
        <br><br><br>         
                <h1>Cadastro</h1>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div><br>
                <input type="submit" name="submit" id="submit">         
        </form>
    </div>
    <div><br><br>
        <hr><br>
    </div>
    <div id='boizin'><img src='./boi-feliz.png'></div>
</body>
</html>
