<?php if(!defined("APP_NAME")) exit(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 form-container" id="sign-up-form-container">
            <h2 class="sign-in-heading text-center">Registrarse</h2>
            <form method="post" id="signUpForm">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required />
                </div>
                <div class="form-group">
                    <label for="document">Numero de Documento</label>
                    <input type="number" name="document" id="document" class="form-control" placeholder="Documento" required />
                </div>

                <div class="form-group">
                    <label for="email">Correo</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Correo" required />
                </div>

                <div class="form-group">
                    <label for="username">Usuario</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Usuario" required />
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required />
                </div>

                <div class="alert alert-success"></div>
                <div class="alert alert-danger alert-errors"></div>

                <button type="submit" class="btn btn-primary btn-lg btn-block">Registrar</button><hr />
                <p>Registro de Usuarios</p>
                <a href="#" id="sign-in-link">Login</a>
                <input type="hidden" name="_token" id="signup_token" class="token-field" value="<?php echo isset($_SESSION["token"]) ? $_SESSION["token"] : ""; ?>" />
            </form>

        </div>
    </div>
</div>