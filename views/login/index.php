<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
        body{
            background-image: url('/datatable_kenser/public/images/ejercito2.jpg') !important;
            background-size:cover; 

        }

        .custom-bordered-table {
        border: 4px solid black;
        box-shadow: -1px 2px 4px 4px blue;
        }

        .custom-bordered-table tr {
            border: 2px solid black;
        }

        .custom-bordered-table th {
            border: 2px solid;
        }
        h1 {
        text-shadow: -1px 2px 4px 4px white;
        }

        .login-container {
    background-color: gold;
    border-radius: 8px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 400px;
    margin: auto; /* Centrar horizontalmente */
    display: flex;
    flex-direction: column;
    align-items: center; /* Centrar verticalmente */
}
        .login-header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .login-form {
            text-align: left;
        }
        .form-group {
            margin-bottom: 16px;
        }
        .form-label {
            font-size: 14px;
            font-weight: bold;
        }
        .form-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        .login-button {
            background-color: #1877f2;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            margin: auto; /* Centrar horizontalmente */
            display: flex;
            flex-direction: column;
            align-items: center; /* Centrar verticalmente */

        }
        .login-button:hover {
            background-color: #1562e8;
        }
    </style>
</head>
<body>
  

<div class="row mb-3">
  <div class="col text-center">
    <h1>LOGIN</h1>
  </div>
</div>
<div class="login-container">
    <div class="login-header">Iniciar Sesión</div>
        <form class="login-form" action="login.php" method="post">
            <div class="form-group">
                <label class="form-label" for="usu_catalogo">Catalogo</label>
                <input class="form-input" type="number" id="usu_catalogo" name="usu_catalogo">
            </div>
            <div class="form-group">
                <label class="form-label" for="usu_password">Contraseña</label>
                <input class="form-input" type="password" id="usu_password" name="usu_password">
            </div>
            <button class="login-button" type="submit">Iniciar Sesión</button>
        </form>
        <div class="d-grid">
            <p class="mb-0 text-center"> ¡No tiene cuenta!<a href="/usuario/index" class="text-primary fw-bold ms-2">REGISTRARSE</a></p>
        </div>
    </div>

<div class="row justify-content-center">
  <div class="col-lg-4">
    <img src="./images/cit.png" width="100%" alt="">
  </div>
</div>
<script src="<?= asset('./build/js/login/index.js') ?>"></script>
</body>
</html>