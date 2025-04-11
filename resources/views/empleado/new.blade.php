<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Agregar Empleado</title>
  </head>
  <body>
    <div class="container">
        <h1>Agregar Empleado</h1>

        <form method="POST" action="{{ route('empleados.store') }}">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del empleado">
            </div>

            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido del empleado">
            </div>

            <div class="mb-3">
                <label for="posición" class="form-label">Posición</label>
                <input type="text" class="form-control" id="posición" name="posición" placeholder="Cargo o puesto">
            </div>

            <div class="mb-3">
                <label for="departamento_id" class="form-label">Departamento</label>
                <select class="form-select" id="departamento_id" name="departamento_id" required>
                    <option selected disabled value="">Seleccione un departamento...</option>
                    @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="fecha_contratación" class="form-label">Fecha de Contratación</label>
                <input type="date" class="form-control" id="fecha_contratación" name="fecha_contratación">
            </div>

            <div class="mb-3">
                <label for="salario" class="form-label">Salario</label>
                <input type="number" step="0.01" class="form-control" id="salario" name="salario" placeholder="Salario mensual">
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('empleados.index') }}" class="btn btn-warning">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  </body>
</html>
