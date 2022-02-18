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
        function registrarse(e) {
            console.log("Hola")
            //e.preventDefault();
            const correo = document.getElementById("email").value;
            const password = document.getElementById("password").value;

            const usuario = {correo: correo, password: password}
            
            crearUsuario(usuario);
        }

        async function crearUsuario(usuario) {
            const config = {
                method: "POST",
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(usuario)
            }
            const URL = "http://localhost:8000";
            const url_completo = URL + "/api/registrar";
        
            const response = await fetch(url_completo, config);
            const data = await response.json()
    
            if (data.registrar) {
                document.getElementById("msg").textContent = data.mensaje;
            } else {
                alert(data.mensaje)
            }
        }   
</script>

<body>
        <div class="abs-center">
            <h2>CREAR CUENTA DE USUARIO</h2>
                <div class="alert alert-success" id="msg"></div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <button class="btn btn-primary" onclick="registrarse()" >Registrarse</button>
                
        </div>
    </div>
</body>
</html>