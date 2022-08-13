<?php if(!defined("APP_NAME")) exit(); ?>
<?php $user = auth_user(); if($user === null) exit(); ?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?php echo APP_NAME; ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php">SALIR</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <h3>Bienvenido, <?php echo $user["name"]; ?></h3>
            <br />
            <ul class="nav nav-sidebar">
                <li class="active"><a href="#">Pagina Principal <span class="sr-only">(current)</span></a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Registro Electoral</h1>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 form-container" id="election-form-container">
                        <h1 class="sign-in-heading text-center">Ingresar Los Datos</h1>
                        <form method="post" id="electionForm">
                            <div class="form-group">
                                <label for="years">Año de la Votación</label>

                                <?php
                                    $date = date('Y');
                                ?>
                                <select name="years" class="form-control" placeholder="Elija el Año"  required>
                                <?php for($i = $date; $i >= $date - 22; $i--): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                                </select> 
                            </div>

                            <div class="form-group">
                                <label for="votecount">cantidad de votos</label>
                                <input type="number" name="votecount" id="votecount" class="form-control" placeholder="Numero de Votos" required />
                            </div>

                            <div class="form-group">
                                <div >Partido Politico</div>    
                                <select name="politicalparty" class="form-control" placeholder="Elija el partido"  required>
                                    <option value="DEMOCRAT" >Partido Democrata</option>
                                    <option value="REPUBLIC">Partido Republicano</option>
                                    <option value="OTHER">Otros Partidos</option>
                                </select> 
                            </div>

                            <div class="form-group">
                                <div >Codigo Condado</div>    
                                <select name="codecounty" class="form-control" placeholder="Elija el partido"  required>
                                <?php
                                    $consulta = $db->prepare("SELECT * FROM county");
                                    $consulta->execute();
                                    $data = $consulta->fetchAll();

                                    foreach($data as $county):
                                        echo "<option value='{$county["codeCounty"]}'>{$county["county"]}</option>";

                                    endforeach;
                                ?>
                                </select> 
                            </div>

                            <div class="alert alert-success"></div>
                            <div class="alert alert-danger alert-errors"></div>

                            <button type="submit" class="btn btn-success btn-lg btn-block">Guardar</button><hr />
                            <p>Registra Datos</p>

                            <input type="hidden" name="_token" id="signup_token" class="token-field" value="<?php echo isset($_SESSION["token"]) ? $_SESSION["token"] : ""; ?>" />
                        </form>

                    </div>
                </div>
            </div>
        
            
        </div>
    </div>
    
</div>