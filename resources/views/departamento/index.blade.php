<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
    <title>Lista de departamentos </title>
  </head>
  <body>
    <div class="container">
    <h1>Lista de departamentos</h1>
    <a href="{{ route('departamentos.create') }}" class="btn btn-success">Crear Nuevo</a>
         <table class="table">
             <thead>
                <th>ID</th>
                    <th>Nombre</th>
                    <th>Ubicacion</th>
                    <th>Numero_telefono</th>
                    <th>Acciones</th>
            </thead>
        <tbody>
            @foreach($departamentos as $departamento)
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </div>
  </body>
</html>