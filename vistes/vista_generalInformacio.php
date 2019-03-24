<?php

 ?>

 <div id="titol_vista_pluguin" class="panel panel-primary">
  <div class="panel-body">
			<div class="logo_col col-xs col-sm-fit logo_documental_pluguin">
					<img src="<?php echo plugins_url("Pluguin_M09_Funcionalitats_WP/assets/img/logo_pluguin.png"); ?>" height="90px"/>
			</div>
  </div>
</div>

<div id="cos_vista_pluguin">
    <div id="contenedor_del_cos" class="col-md-12">
        <div id="cos_primerPerfil" class="panel panel-primary">
            <div class="panel-body">

                <div id="opcions_parametres">
                  <div id="parametres_pluguins">
                      <p class="titol_parametres">Informació sobre el pluguin</p>
                  </div>

                  <form>
                      <div class="row">
                        <div class="col-md-3">
                          <input type="checkbox" id="documental" name="modul_documental" value="GestioDocumental">
                          <label for="documental">Mòdul GestioCarpetes</label>
                      </div>
                      <div class="col-md-3">
                          <input type="checkbox" id="contrasenyes" name="modul_contrasenyes" value="GestioContrasenyes">
                          <label for="contrasenyes">Mòdul GestioContrasenyes</label>
                    </div>
                    <div class="col-md-3">
                        <input type="checkbox" id="codi" name="modul_codi" value="GestioCodi">
                        <label for="codi">Mòdul GestioCodi</label>
                    </div>
                    <div class="col-md-3">
                        <input type="checkbox" id="backups" name="modul_backups" value="GestioBackups">
                        <label for="backups">Mòdul GestioBackups</label>
                    </div>
                    </div>
                  </form>
                  <ul style="margin-left: 15px;"><li class="li_boleta">Ruta Carpetes</li></ul>


                </div>









						</div>
				</div>
		</div>
</div>
