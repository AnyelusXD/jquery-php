<?php if(!defined("APP_NAME")) exit(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 form-container" id="sign-in-form-container">
            <h2 class="sign-in-heading text-center">Inicio de Sesión</h2>
            <form method="post" id="signInForm">
                <div class="form-group">
                    <label for="username">Correo o Usuario</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Correo o Usuario" required />
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required />
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember_me"> Recordarme
                    </label>
                </div>
                <div class="alert alert-danger alert-errors"></div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Ingresar</button><hr />
                <p>Sistema Electoral</p>
                <a href="#" id="sign-up-link">Registrarse</a>
                <input type="hidden" name="_token" class="token-field" value="<?php echo isset($_SESSION["token"]) ? $_SESSION["token"] : ""; ?>" />
            </form>
        </div>
    </div>
</div>