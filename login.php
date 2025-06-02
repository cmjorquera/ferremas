<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Ferretería</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #B0B8C1;
            margin: 0;
            padding: 0;
        }

        .login-container {
            display: flex;
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .form-section {
            flex: 1;
            padding: 40px;
        }

        .form-section h2 {
            margin-bottom: 20px;
            font-size: 28px;
        }

        .form-section input[type="email"],
        .form-section input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0 20px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .form-section button {
            width: 100%;
            padding: 12px;
            background-color: #0066FF;
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 30px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .form-section button:hover {
            background-color: #0044cc;
        }

        .form-section .links {
            text-align: center;
            margin-top: 15px;
        }

        .form-section .links a {
            text-decoration: none;
            color: #0066FF;
            margin: 0 5px;
            font-size: 14px;
        }

        .image-section {
            flex: 1;
            background: url('https://cdn.pixabay.com/photo/2021/11/04/09/30/tools-6767556_1280.jpg') no-repeat center center;
            background-size: cover;
        }

        .logo {
            display: block;
            margin: 0 auto 20px;
            max-width: 150px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="form-section">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4d/Ferreter%C3%ADa_logo.png/600px-Ferreter%C3%ADa_logo.png" alt="Logo Ferretería" class="logo">
        <h2>Bienvenido</h2>
        <form method="POST" action="../api/usuario/login.php">
            <input type="email" name="email" placeholder="correo@ejemplo.com" required>
            <input type="password" name="clave" placeholder="********" required>
            <button type="submit">INGRESAR</button>
        </form>
        <div class="links">
            <a href="#">¿Olvidaste tu contraseña?</a><br>
            <a href="#">¿No tienes cuenta? Regístrate</a>
        </div>
    </div>
    <div class="image-section"></div>
</div>

</body>
</html>
