<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Listado de Asistencias</title>
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
        <h1 class="mt-4">Listado de Asistencias</h1>

        <a href="{{ route('asistencias.create') }}" class="btn btn-success mb-3">Registrar Asistencia</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Empleado</th>
                    <th>Fecha</th>
                    <th>Hora de Entrada</th>
                    <th>Hora de Salida</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($asistencias as $asistencia)
                <tr>
                    <td>{{ $asistencia->id }}</td>
                    <td>{{ $asistencia->nombre }}</td> 
                    <td>{{ $asistencia->fecha }}</td>
                    <td>{{ $asistencia->hora_entrada }}</td>
                    <td>{{ $asistencia->hora_salida }}</td>
                    <td>
                        <a href="{{ route('asistencias.edit', $asistencia->id) }}" class="btn btn-info btn-sm">Editar</a>
                        <form action="{{ route('asistencias.destroy', $asistencia->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger btn-sm" value="Eliminar">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
