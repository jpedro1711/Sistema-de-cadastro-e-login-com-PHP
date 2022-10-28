<?php

  include "../connection.php";
  session_start();

  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $newPass = $_POST['novaSenha'];
  $confNewPass = $_POST['confNovaSenha'];

  // Verifica se o usuário está cadastrado 
  $sql = "SELECT * FROM users WHERE email='$email' AND senha='$senha'";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);

    if ($newPass === $confNewPass) {
      if ($row['email'] === $email and $row['senha'] === $senha){
        $id = $row['id'];
        $newPassword = "UPDATE users SET senha = '$newPass' where id=$id";

        if ($conn->query($newPassword) === TRUE) {
          $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
          Senha redefinida com sucesso!
        </div>";
          header('Location: newpass.php');
        }
        else {
          $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
          Erro ao tentar redefinir a senha!
        </div>";
          header('Location: newpass.php');
        }

      } 
      else {
        $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>
        E-mail ou senha atuais incorretos!
      </div>";
        header('Location: newpass.php');
      }
    }
    else {
      $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>
      As novas senha não coincidem!
    </div>";
      header('Location: newpass.php');
    }
  }
  else {
     $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>
     Conta não cadastrada!
   </div>";
     header('Location: newpass.php');
  }
?>