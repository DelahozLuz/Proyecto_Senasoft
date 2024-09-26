<script src="vista/js/cl_usuario.js"></script>

<div id="R">
    <div id="Registro">
        <div class="card p-4 shadow">
            <form class="row g-3 needs-validation" id="FormRegistro" novalidate>
                <h2>Registro</h2>
                <div class="col-md-12">
                    <label for="txtNombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="txtNombre" required>
                    <div class="invalid-feedback">
                        Campo Requerido !!!
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="txtApellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="txtApellido" required>
                    <div class="invalid-feedback">
                        Campo Requerido !!!
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="txtTelefono" class="form-label">Telefono</label>
                    <input type="text" class="form-control" id="txtTelefono" required>
                    <div class="invalid-feedback">
                        Campo Requerido !!!
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="txtEmail" class="form-label">Email</label>
                    <input type="text" class="form-control" id="txtEmail" required>
                    <div class="invalid-feedback">
                        Campo Requerido !!!
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="txtPassword" class="form-label">Contraseña</label>
                    <input type="text" class="form-control" id="txtPassword" required>
                    <div class="invalid-feedback">
                        Campo Requerido !!!
                    </div>
                </div>

                <div class="col-12">
                    <button type="submit" id="registrarUsuario">
                        <span>Guardar</span>
                    </button>
                </div>
            </form>
        </div><!-- div Registro-->
    </div><!-- div R-->

    <script src="vista/js/registro.js"></script>
</div>
