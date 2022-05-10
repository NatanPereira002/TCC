<?php

include 'config.php'

?>





<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastrar</title>

        <!--Links da fonte-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

        <!--Links da custumização-->
        <link rel="stylesheet" href="css/components.css">

        <!--Fim dos Links-->
    </head>
    <body>

        <section class="form-container">
            <form action="" enctupe="multipar/form-data" method="POST">
                <h3>Cadastrar</h3>
                <input type="text" name="name" class="box" placeholder="Nome comleto" required>
                <input type="email" name="email" class="box" placeholder="Seu E-mail" required>
                <input type="password" name="pass" class="box" placeholder="Senha" required>
                <input type="password" name="cpass" class="box" placeholder="Confirma senha" required>
                <input type="file" name="image" class="box" required accept="image/jpg, image/jpeg, image/png">
                <input type="submit" value="Cadastrar" class="btn" name="submit">
                <p>Você já tem uma conta?<a href="login.php">Login</a></p>


            </form>
        </section>




        
        
    </body>
</html>