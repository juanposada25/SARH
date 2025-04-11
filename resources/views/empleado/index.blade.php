<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Listado de Empleados</title>
  </head>
  <body>

    <div class="container">
        <h1 class="mt-4">Listado de Empleados</h1>

        <a href="{{ route('empleados.create') }}" class="btn btn-success mb-3">Agregar Empleado</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Posición</th>
                    <th>Departamento</th>
                    <th>Fecha de Contratación</th>
                    <th>Salario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->id }}</td>
                    <td>{{ $empleado->nombre }}</td>
                    <td>{{ $empleado->apellido }}</td>
                    <td>{{ $empleado->posición }}</td>
                    <td>{{ $empleado->nombre}}</td>
                    <td>{{ $empleado->fecha_contratación }}</td>
                    <td>{{ $empleado->salario }}</td>
                   <!-- <td>
                        <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-info btn-sm">Editar</a>
                        <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger btn-sm" value="Eliminar">
                        </form>
                    </td> -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
