<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Empleado</title>
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
      <h1>Edit Empleado</h1>
      <form method="POST" action="{{ route('empleados.update', ['empleado' => $empleado->id]) }}">
        @method('put')
        @csrf

        <div class="mb-3">
          <label for="id" class="form-label">ID</label>
          <input type="text" class="form-control" id="id" name="id" disabled value="{{ $empleado->id }}">
        </div>

        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" required class="form-control" id="nombre" name="nombre" value="{{ $empleado->nombre }}">
        </div>

        <div class="mb-3">
          <label for="apellido" class="form-label">Apellido</label>
          <input type="text" required class="form-control" id="apellido" name="apellido" value="{{ $empleado->apellido }}">
        </div>

        <div class="mb-3">
          <label for="posición" class="form-label">Posición</label>
          <input type="text" required class="form-control" id="posición" name="posición" value="{{ $empleado->posición }}">
        </div>

        <div class="mb-3">
          <label for="fecha_contratación" class="form-label">Fecha de Contratación</label>
          <input type="date" class="form-control" id="fecha_contratación" name="fecha_contratación" value="{{ $empleado->fecha_contratación }}">
        </div>

        <div class="mb-3">
          <label for="salario" class="form-label">Salario</label>
          <input type="number" step="0.01" class="form-control" id="salario" name="salario" value="{{ $empleado->salario }}">
        </div>

        <div class="mb-3">
          <label for="departamento_id" class="form-label">Departamento</label>
          <select class="form-select" id="departamento_id" name="departamento_id" required>
            <option disabled selected value="">Seleccione un departamento...</option>
            @foreach ($departamentos as $departamento)
              <option value="{{ $departamento->id }}" {{ $departamento->id == $empleado->departamento_id ? 'selected' : '' }}>
                {{ $departamento->nombre }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="mt-3">
          <button type="submit" class="btn btn-primary">Actualizar</button>
          <a href="{{ route('empleados.index') }}" class="btn btn-warning">Cancelar</a>
        </div>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
