<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<script>
        function jalarDatos(e) {
            console.log("Hola")
            //e.preventDefault();
            const correo = document.getElementById("email").value;
            const password = document.getElementById("password").value;

            const usuario = {correo: correo, password: password}
            
            validar(usuario);
        }

        async function validar(usuario) {
            const config = {
                method: "POST",
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(usuario)
            }
            const response = await fetch("http://localhost:8000/api/validar", config);
            const data = await response.json()
            if (data.login) {
                window.location = "/bienvenido"
            } else {
                alert(data.mensaje)
            }
        }   
</script>

<body>
        <div class="abs-center">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <button class="btn btn-primary" onclick="jalarDatos()" >Login</button>
                <a href="/crearuser"><button class="btn btn-primary">Registrarse</button></a>
        </div>
    </div>
</body></html>