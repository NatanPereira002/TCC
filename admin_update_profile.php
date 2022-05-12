<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Atualizar perfil do administrador</title>

  <!-- Links da fonte-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

 <!--Links da custumização-->
 <link rel="stylesheet" href="css/components.css">

</head>
<body>

<?php include 'admin_header.php'; ?>

<section class="update-profile">

   <h1 class="title">Atualizar perfil</h1>

   <form action="" method="POST" enctype="multipart/form-data">
      <img src="uploaded_img/<?= $fetch_profile['image']; ?>" alt="">
      <div class="flex">
         <div class="inputBox">
            <span>Usuário :</span>
            <input type="text" name="name" value="<?= $fetch_profile['name']; ?>" placeholder="Atualizar nome de usuário" required class="box">
            <span>E-mail :</span>
            <input type="email" name="email" value="<?= $fetch_profile['email']; ?>" placeholder="Atualizar e-mail" required class="box">
            <span>Atualizar foto :</span>
            <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box">
            <input type="hidden" name="old_image" value="<?= $fetch_profile['image']; ?>">
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?= $fetch_profile['password']; ?>">
            <span>Senha anterior :</span>
            <input type="password" name="update_pass" placeholder="Digite a senha anterior" class="box">
            <span>Senha nova :</span>
            <input type="password" name="new_pass" placeholder="Insira a nova senha" class="box">
            <span>Confirme a senha :</span>
            <input type="password" name="confirm_pass" placeholder="Confirme a nova senha" class="box">
         </div>
      </div>
      <div class="flex-btn">
         <input type="submit" class="btn" value="update profile" name="update_profile">
         <a href="admin_page.php" class="option-btn">Voltar</a>
      </div>
   </form>

</section>













<script src="js/script.js"></script>

</body>
</html>