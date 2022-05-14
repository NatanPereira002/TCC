<?php

include '../components/connect.php';

session_start();

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select_admin = $conn->prepare("SELECT * FROM `admins` WHERE name = ? AND password = ?");
   $select_admin->execute([$name, $pass]);
   $row = $select_admin->fetch(PDO::FETCH_ASSOC);

   if($select_admin->rowCount() > 0){
      $_SESSION['admin_id'] = $row['id'];
      header('location:dashboard.php');
   }else{
      $message[] = 'Usuário ou senha incorreta!';
   }

}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="../css/admin_style.css">


</head>
<body>

    <?php
        if(isset($message)){
            foreach($message as $message){
                echo '
                <div class="message">
                    <span>'.$message.'</span>
                    <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
                </div>
                ';
            }
        }


    ?>

    <!-- inicio login do admin-->

       <section class="form-container">

       <form action="" method="POST">
           <h3>Logar</h3>
           <p>nome de usuário padrão = <span>ADMIN</span> & Senha = <span>111</span></p>
           <input type="text" name="name" maxlength="20" required placeholder="Digita seu nome" class="box" oninput="this.value =this.value.replace(/\s/g, '')">

           <input type="password" name="pass" maxlength="20" required placeholder="Digita seu senha" class="box" oninput="this.value =this.value.replace(/\s/g, '')">

           <input type="submit" value="logar" name="submit" class="btn" >

       </form>

       </section> 

    <!-- final login do admin-->

    
</body>
</html>