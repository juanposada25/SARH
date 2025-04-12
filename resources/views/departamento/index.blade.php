<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Lista de departamentos </title>
  </head>
  <body>
    <div class="container">
    <h1>Lista de departamentos</h1>
    <a href="{{ route('departamento.create') }}" class="btn btn-success">add</a>
         <table class="table">
             <thead>
                <th>ID</th>
                    <th>Nombre</th>
                    <th>Ubicacion</th>
                    <th>Numero_telefono</th>
                    <th>Acciones</th>
            </thead>
        <tbody>
            @foreach(deportos as $departamento)
                <tr>
                    <th scope="row">{{$departamento->id}}</th>
                    <td>{{ $departamento->id }}</td>
                    <td>{{ $departamento->nombre }}</td>
                    <td>{{ $departamento->ubicacion }}</td>
                    <td>{{ $departamento->numero_telefono}}</td>
                  <td>
                        <a href="{{ route('departamentos.edit', $departamento->id) }}" class="btn btn-info btn-sm">Editar</a>
                        <form action="{{ route('departamentos.destroy', $departamento->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger btn-sm" value="Eliminar">
                        </form>
                    </td>
                </tr>
                @endforeach
        </tbody>
        </table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    </div>
  </body>
</html>