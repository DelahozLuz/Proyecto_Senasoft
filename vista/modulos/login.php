<script src="vista/js/cl_usuario.js"></script>
<div id="L">
  <div class="container mt-5">
    <div class="card p-4 shadow" style="max-width: 400px; margin: auto; border-radius: 15px;">
      <h1 class="text-center mb-4">Iniciar Sesión</h1>
      <form id="Fromlogin" class="row g-3 needs-validation" novalidate>
        <div class="col-md-12">
          <label for="txtUsuario" class="form-label">Correo</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="txt-usuario">@</span>
            <input type="email" class="form-control" id="txtUsuario" aria-describedby="inputGroupPrepend" required>
            <div class="invalid-feedback">Campo requerido</div>
          </div>
        </div>

        <div class="col-md-12">
          <label for="txtPassword" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="txtPassword" required>
          <div class="invalid-feedback">Campo requerido</div>
        </div>

        <div class="col-12 text-center">
          <div class="forgot-password mb-3">
            <a href="process_reset_request" style="color: #007bff;">¿Olvidó su contraseña?</a>
          </div>
        </div>

        <div class="col-12">
          <button class="btn btn-primary w-100" type="submit">Ingresar</button>
        </div>

        <h6 class="text-center mt-3">Si no tienes cuenta, regístrate</h6>
        <div class="text-center">
          <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">Registrarse</button>
        </div>
      </form>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 400px;">
          <div class="modal-content">
            <div class="modal-body">
              <form class="row g-3 needs-validation" id="FormRegistro" novalidate>
                <h2 class="text-center">Registro</h2>
                <div class="col-md-12">
                  <label for="txtNombre" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="txtNombre" required>
                  <div class="invalid-feedback">Campo Requerido</div>
                </div>

                <div class="col-md-12">
                  <label for="txtApellido" class="form-label">Apellido</label>
                  <input type="text" class="form-control" id="txtApellido" required>
                  <div class="invalid-feedback">Campo Requerido</div>
                </div>

                <div class="col-md-12">
                  <label for="txtTelefono" class="form-label">Teléfono</label>
                  <input type="text" class="form-control" id="txtTelefono" required>
                  <div class="invalid-feedback">Campo Requerido</div>
                </div>

                <div class="col-md-12">
                  <label for="txtEmail" class="form-label">Email</label>
                  <input type="email" class="form-control" id="txtEmail" required>
                  <div class="invalid-feedback">Campo Requerido</div>
                </div>

                <div class="col-md-12">
                  <label for="txtPasswords" class="form-label">Contraseña</label>
                  <input type="password" class="form-control" id="txtPasswords" required>
                  <div class="invalid-feedback">Campo Requerido</div>
                </div>

                <div class="col-12 text-center">
                  <button type="submit" class="btn btn-primary w-100">Guardar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="vista/js/registro.js"></script>
<script src="vista/js/login.js"></script>

<style>
  body {
    background-color: #736d74;
  }
  .card {
    background-color: #ffffff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    border: none;
  }
  .form-label {
    font-weight: bold;
    color: #333;
  }
  .btn-primary {
    background-color: #007bff;
    border: none;
  }
  .btn-primary:hover {
    background-color: #0056b3;
  }
  .btn-secondary {
    background-color: #6c757d;
    border: none;
  }
  .btn-secondary:hover {
    background-color: #5a6268;
  }
</style>