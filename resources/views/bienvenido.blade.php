<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="POST" action="/documentos">
  @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="nombre">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Descripcion</label>
    <input type="text" class="form-control" name="archivo" id="archivo" placeholder="Descripcion">
  </div>
    <button type="submit">Enviar</button>
</form>
</body>
</html>
