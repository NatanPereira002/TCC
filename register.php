
<?php

include 'config.php'

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = md5($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = md5($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

$image = $_FILES['image']['name'];
$image_size = $_FILES['image']['size'];
$image_tmp_name = $_FILES['image']['tmp_name'];
$image_folder = 'uploaded_img/'.$image;

$select = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
$select->execute([$email]);

if($select->rowCount() > 0){
    $message[] = 'Este endereço de email já está sendo usado.';
}
else{
    if($pass != $cpass){
       $message[] = 'As senhas não correspondem!';
  }else{
    $insert = $conn->prepare("INSERT INTO `users`(name, email, password, image) VALUES(?,?,?,?)");
    $insert->execute([$name, $email, $pass, $image]);

    if($insert){
       if($image_size > 2000000){
          $message[] = 'O tamanho da imagem é muito grande!';
       }else{
          move_uploaded_file($image_tmp_name, $image_folder);
          $message[] = 'Registrado com sucesso!';
          header('location:login.php');
    }
   }
  }
 }
}


?>




<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro</title>

        <!--Links da fonte-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

        <!--Links da custumização-->
        <link rel="stylesheet" href="css/components.css">

        <!--Fim dos Links-->
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

        <section class="form-container">
            <form action="" enctupe="multipar/form-data" method="POST">
                <h3>Cadastre-se</h3>
                <input type="text" name="name" class="box" placeholder="Nome comleto" required>
                <input type="email" name="email" class="box" placeholder="Seu E-mail" required>
                <input type="password" name="pass" class="box" placeholder="Senha" required>
                <input type="password" name="cpass" class="box" placeholder="Confirme a senha" required>
                <input type="file" name="image" class="box" required accept="image/jpg, image/jpeg, image/png">
                <input type="submit" value="Cadastrar" class="btn" name="submit">
                <p>Você já possue uma conta?<a href="login.php"> Entrar</a></p>


            </form>
        </section>




        
        
    </body>
</html>