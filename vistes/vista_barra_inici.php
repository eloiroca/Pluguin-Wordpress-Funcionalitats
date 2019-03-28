<div class="barra_inici">
  <div class="row">
    <div class="col-md-6" style="display:inline;">
        <div class="apartats_barra barra_esquerra">
            <img class="imatges_barra" src="<?php echo plugins_url("Pluguin_M09_Funcionalitats_WP/assets/img/icona-ubicacio.png"); ?>" />
            <p class="textos_apartats"><?php echo recuperar_valor_barra('direccio'); ?></p>
        </div>
        <div class="apartats_barra">
            <img class="imatges_barra" src="<?php echo plugins_url("Pluguin_M09_Funcionalitats_WP/assets/img/icona-telefon.png"); ?>" />
            <p class="textos_apartats"><?php echo recuperar_valor_barra('telefon'); ?></P>
        </div>
        <div class="apartats_barra">
            <img class="imatges_barra" src="<?php echo plugins_url("Pluguin_M09_Funcionalitats_WP/assets/img/icona-mail.png"); ?>" />
            <p class="textos_apartats"><?php echo recuperar_valor_barra('correu'); ?></p>
        </div>
    </div>
    <div class="col-md-6 barra_dreta">
        <div class="apartats_barra">
            <img class="imatges_barra" src="<?php echo plugins_url("Pluguin_M09_Funcionalitats_WP/assets/img/icona-facebook.png"); ?>" />
            <p class="textos_apartats"><a href="<?php echo recuperar_valor_barra('facebook'); ?>" target="_blank">Facebook</a></p>
        </div>
        <div class="apartats_barra">
            <img class="imatges_barra" src="<?php echo plugins_url("Pluguin_M09_Funcionalitats_WP/assets/img/icona-instagram.png"); ?>" />
            <p class="textos_apartats"><a href="<?php echo recuperar_valor_barra('instagram'); ?>" target="_blank">Facebook</a></p>
        </div>
        <div class="apartats_barra">
            <img class="imatges_barra" src="<?php echo plugins_url("Pluguin_M09_Funcionalitats_WP/assets/img/icona-twitter.png"); ?>" />
            <p class="textos_apartats"><a href="<?php echo recuperar_valor_barra('twitter'); ?>" target="_blank">Facebook</a></p>
        </div>
    </div>
  </div>
</div>
