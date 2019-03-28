<?php

 ?>

 <div id="titol_vista_pluguin" class="panel panel-primary">
  <div class="panel-body">
			<div class="logo_col col-xs col-sm-fit logo_documental_pluguin">
					<img src="<?php echo plugins_url("Pluguin_M09_Funcionalitats_WP/assets/img/logo_pluguin_funcionalitats.png"); ?>" height="90px"/>
			</div>
  </div>
</div>

<div id="cos_vista_pluguin">
    <div id="contenedor_del_cos" class="col-md-12">
        <div id="cos_primerPerfil" class="panel panel-primary">
            <div class="panel-body">
                <div id="opcions_parametres">
                      <div class="row">
                        <div class="col-md-6 divisor">
                          <?php
                              if (estat_modul_funcionalitats("estat_canviar_foto")=="false" && estat_modul_funcionalitats("estat_barra_inici")=="false" && estat_modul_funcionalitats("estat_entrades_automatiques")=="false" && estat_modul_funcionalitats("estat_widget_hora")=="false"){
                          ?>
                                  <div class="text_funcionalitats">
                                      <p class="avis_activacio">Activa la funcionalitat que més t'agradi</p>
                                  </div>
                          <?php

                              }
                              if (estat_modul_funcionalitats("estat_canviar_foto")=="true"){
                          ?>
                                  <div class="text_funcionalitats">
                                      <p class="avis_modul">Personalitzar imatge Wordpress</p>

                                      <?php if (existeix_foto_logo()=="true"){?>
                                      <p class="descripcio_modul">Existeix la foto de Logo</p>
                                      <?php
                                      echo '<img height=200 width=200 src="data:image/png;base64,'.base64_encode(recuperar_foto_logo()).'">';
                                      ?>
                                      <form enctype="multipart/form-data" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="POST" id="formulari_eliminar_logo" >
                                        <input type="hidden" name="action" value="formulari_eliminar_logo">
                                        <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Eliminar Logo"></p>
                                      </form>
                                      <?php
                                    }else{ ?>
                                      <p class="descripcio_modul"> S'ha de penjar una foto <b>JPG</b> que s'hafegira al logo de Wordpress de la pantalla de loggeig</p>
                                      <form enctype="multipart/form-data" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="POST" id="formulari_logo" >
                                          <input type="hidden" name="action" value="formulari_logo">
                                          <input type="file" name="logo" required/>
                                          <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Canviar Logo"></p>
                                      </form>
                                    <?php } ?>
                                    <hr class="hr">

                                  </div>
                          <?php
                              }if (estat_modul_funcionalitats("estat_barra_inici")=="true"){
                          ?>
                                  <div class="text_funcionalitats">
                                      <p class="avis_modul">Camps barra inici</p>
                                      <p class="descripcio_modul">Personalitza la barra de la pàgina d'Inici</p>
                                      <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="POST" id="formulari_barra" >
                                          <input type="hidden" name="action" value="formulari_barra">
                                          <div class="row">
                                              <div class="col-md-4">
                                                  <label>Direcció:</label>
                                                  <input type="text" name="direccio" value="<?php echo recuperar_valor_barra('direccio'); ?>" required/>
                                              </div>
                                              <div class="col-md-4">
                                                  <label>Telèfon:</label>
                                                  <input type="text" name="telefon" value="<?php echo recuperar_valor_barra('telefon'); ?>" required/>
                                              </div>
                                              <div class="col-md-4">
                                                  <label>Correu:</label>
                                                  <input type="text" name="correu" value="<?php echo recuperar_valor_barra('correu'); ?>" required/>
                                              </div>
                                              <div class="col-md-4">
                                                  <label>Link Facebook:</label>
                                                  <input type="text" name="facebook" value="<?php echo recuperar_valor_barra('facebook'); ?>" required/>
                                              </div>
                                              <div class="col-md-4">
                                                  <label>Link Instagram:</label>
                                                  <input type="text" name="instagram" value="<?php echo recuperar_valor_barra('instagram'); ?>" required/>
                                              </div>
                                              <div class="col-md-4">
                                                  <label>Link Twitter:</label>
                                                  <input type="text" name="twitter" value="<?php echo recuperar_valor_barra('twitter'); ?>" required/>
                                              </div>
                                          </div>
                                          <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Guardar Dades"></p>
                                      </form>
                                      <hr class="hr">
                                  </div>
                          <?php
                              }if (estat_modul_funcionalitats("estat_entrades_automatiques")=="true"){
                          ?>
                                  <div class="text_funcionalitats">
                                      <p class="avis_modul">Generar entrades automàtiques</p>
                                      <p class="descripcio_modul"> S'ha de penjar un fitxer <b>CSV</b> delimitat per comes ',' amb el nom, cognoms i poblacio dels autors de la web. <br>Exemple: <b>eloi, roca plana, Les Borges Blanques</b></p>
                                      <p class="descripcio_modul"><a href="<?php echo plugins_url( 'Pluguin_M09_Funcionalitats_WP/assets/csv/usuaris.csv'); ?>"><b>Descarrega't el CSV d'exemple</b></a></p>
                                      <form enctype="multipart/form-data" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="POST" id="formulari_entrades" >
                                          <input type="hidden" name="action" value="formulari_entrades">
                                          <input type="file" name="csv" required/>
                                          <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Generar Entrades"></p>
                                      </form>
                                      <hr class="hr">
                                  </div>
                          <?php
                              }if (estat_modul_funcionalitats("estat_widget_hora")=="true"){
                          ?>
                                  <div class="text_funcionalitats">
                                      <p class="avis_modul">Widget hora actual</p>
                                      <p class="descripcio_modul"> Es mostrarà un rellotge com el següent en el llistat de Widgets, a la Dashboard i insertant-lo com a Shortcode</p>
                                      <p class="descripcio_modul"> Pots intentar afegir el shortcode sempre i quan estigui hablitada la funcionalitat de "Widget Hora" pots apegar el shortcode de la seguent manera <i><b>[widget_hora]</b></i></p>
                                        <?php echo pintar_cos_widgets(); ?>
                                        <hr class="hr">
                                  </div>
                          <?php
                              }
                          ?>

                        </div>
                        <div class="col-md-6">
                          <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="POST" id="formulari_moduls" >
                              <input type="hidden" name="action" value="formulari_funcionalitats">
                              <div class="row">
                                  <div class="col-md-6">
                                    <input type="checkbox" id="foto" name="estat_foto" value="foto" class="checkbox_bonic" >
                                    <label for="foto">Canviar Foto WP General</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="checkbox" id="entrades" name="estat_entrades" value="entrades" class="checkbox_bonic">
                                    <label for="entrades">Crear Entrades Automatiques</label>
                              </div>
                              <div class="col-md-6">
                                  <input type="checkbox" id="barra" name="estat_barra" value="barra" class="checkbox_bonic">
                                  <label for="barra">Habilitar Barra Pàgina Inici</label>
                              </div>
                              <div class="col-md-6">
                                  <input type="checkbox" id="hora" name="estat_hora" value="hora" class="checkbox_bonic">
                                  <label for="hora">Habilitar Widget Hora</label>
                              </div>

                              <div class="col-md-12">
                                  <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Guardar Canvis"></p>
                              </div>
                            </div>
                        </form>
                      </div>
                    </div>
                  <script>
                  <?php
                      if (estat_modul_funcionalitats("estat_canviar_foto")=="true"){
                          ?>jQuery('#foto').prop('checked', true);<?php
                      }
                      if (estat_modul_funcionalitats("estat_barra_inici")=="true") {
                          ?>jQuery('#barra').prop('checked', true);<?php
                      }
                      if (estat_modul_funcionalitats("estat_entrades_automatiques")=="true") {
                          ?>jQuery('#entrades').prop('checked', true);<?php
                      }
                      if (estat_modul_funcionalitats("estat_widget_hora")=="true") {
                          ?>jQuery('#hora').prop('checked', true);<?php
                      }
                  ?>
                  </script>
                </div>
						</div>
				</div>
		</div>
</div>
