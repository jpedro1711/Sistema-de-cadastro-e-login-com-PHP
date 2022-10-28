<?php

  include "../connection.php";
  session_start();

  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $sql = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);

    if ($row['email'] === $email and $row['senha'] === $senha) {
      $_SESSION['email'] = $email;
      $_SESSION['senha'] = $senha;
      $_SESSION['id'] = $id;
      $nome = $row['nome'];
      $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
      Bem vindo, $nome
    </div>";
      header('Location: login.php');
    }
    else {
      $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>
      E-mail ou senha incorretos
    </div>";
      header('Location: login.php');
    }
  }
  else {
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
    Usuário não cadastrado
  </div>";
    header('Location: login.php');
  }
?>