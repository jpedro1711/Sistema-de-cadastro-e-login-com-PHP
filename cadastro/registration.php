<?php
  include "../connection.php";
  session_start();

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $confPass = $_POST['confSenha'];

  $sql = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($conn, $sql);

  if ($senha === $confPass) {
    if (mysqli_num_rows($result) === 1) {
      $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>
      Esse e-mail já foi cadastrado
    </div>";
      header('Location: index.php');
    }
    else {

      $pass = "SELECT * FROM users WHERE senha='$senha'";
      $resultPass = mysqli_query($conn, $pass);
      if (mysqli_num_rows($resultPass) === 1) {
        $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>
        Essa senha já foi cadastrada por outro usuário. Insira uma nova senha!
      </div>";
        header('Location: index.php');
      }
      else {
        $result_usuario = "INSERT INTO users (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
        $resultado_usuario = mysqli_query($conn, $result_usuario);

        if (mysqli_insert_id($conn)) {
          $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
          Usuário cadastrado com sucesso
        </div>";
          header('Location: ../login/login.php');
        }
        else {
          $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
          Não foi possível cadastrar o usuário. Tente novamente
        </div>";
          header('Location: index.php');
        }
      }
    }
  }
  else {
    $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>
    As senhas não coincidem
  </div>";
    header('Location: index.php');
  }
?>