<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Registrar Asistencia</title>
  </head>
  <body>

     <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/empleados">Empleado</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/departamentos">Departamento</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/asistencias">Asistencia</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Perfil</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Cerrar sesión</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                    </li>
                @endauth
            </ul>
    </nav>
  
    <div class="container">
        <h1>Registrar Asistencia</h1>

        <form method="POST" action="{{ route('asistencias.store') }}">
            @csrf

            <div class="mb-3">
                <label for="empleado_id" class="form-label">Empleado</label>
                <select class="form-select" id="empleado_id" name="empleado_id" required>
                    <option selected disabled value="">Seleccione un empleado...</option>
                    @foreach ($empleados as $empleado)
                        <option value="{{ $empleado->id }}">{{ $empleado->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>

            <div class="mb-3">
                <label for="hora_entrada" class="form-label">Hora de Entrada</label>
                <input type="time" class="form-control" id="hora_entrada" name="hora_entrada" required>
            </div>

            <div class="mb-3">
                <label for="hora_salida" class="form-label">Hora de Salida</label>
                <input type="time" class="form-control" id="hora_salida" name="hora_salida" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('asistencias.index') }}" class="btn btn-warning">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  </body>
</html>
