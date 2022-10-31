<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!--CSS BOOTSTRAP-->
  <link
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
  rel="stylesheet"
  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
  crossorigin="anonymous"
/>

<style>
  form {
    max-width: 50%;
    margin: 0 auto;
    margin-top: 1.25rem;
  }
  .input-field {
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .btnGroup {
    display: flex;
    justify-content: space-between;
  }
</style>
</head>
<body>
  <form method="post" action="./login_php.php">
    <p class="h1">Formulário de Login</p>
    <div class="row mb-3 input-field">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="inputEmail3" autocomplete="off" name="email">
      </div>
    </div>
    <div class="row mb-3 input-field">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Senha</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="inputPassword3" autocomplete="off" name="senha">
      </div>
    </div>
    <div class="btnGroup mb-3">
      <button type="submit" class="btn btn-primary">Entrar</button>
      <a class="btn btn-outline-primary" href="../cadastro/index.php" role="button">Ainda não tem conta? Cadastre-se</a>
    </div>
    <br><br>
    <a class="btn btn-outline-secondary" href="../senha/newpass.php" role="button">Redefinir senha</a>
    <br>
    <br>
    <?php
      if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset ($_SESSION['msg']);
      }
    ?>
  </form>

  <!--BOOTSTRAP SCRIPTS-->
  <script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
  crossorigin="anonymous"
></script>
</body>
</html>