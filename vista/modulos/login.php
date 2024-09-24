<script src="vista/js/cl_usuario.js"></script>

<div class="container mt-5">
    <div class="card p-4 shadow">
        <form id="Fromlogin" class="row g-3 needs-validation"  novalidate>
            <h1 class="text-center">Login</h1>
            <div class="col-md-12">
                <label for="txtUsuario" class="form-label">Usuario</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="txt-usuario">@</span>
                    <input type="text" class="form-control" id="txtUsuario" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Campo requerido
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <label for="txtPassword" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="txtPassword" required>
                <div class="invalid-feedback">
                    Campo requerido
                </div>
            </div>

            <div class="col-12 text-center">
                <div class="forgot-password">
                    <a href="#">¿Olvidó su contraseña?</a>
                </div>
            </div>

            <div class="col-12 text-center">
                <button class="btn btn-primary" type="submit">Ingresar</button>
            </div>

            <div class="col-12 text-center">
              <h6>Si no tienes cuenta Registrate</h6>
              <button class="btn btn-info" type="submit" >Registrar</button>

            </div>

        </form>
    </div>
</div>
<script src="vista/js/login.js"></script>
