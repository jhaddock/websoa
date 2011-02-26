<div id="col-izquierda" class="span-5 columna">
    <img src="<?php soa_image('soa-staff.png') ?>" alt="SOA Staff"/>
    <!--<ul class="menu">
        <li><a href="<?php page_url('State of the art')?>"><?php _e('State of the art') ?></a></li>
        <li><a href="<?php page_url('Garantia SOA') ?>"><?php _e('Garantía SOA') ?></a></li>
        <li><a href="<?php page_url('Good Staff') ?>"><?php _e('Good staff') ?></a></li>
        <li><a href="<?php page_url('Armario') ?>"><?php _e('Armario') ?></a></li>
        <li><a href="<?php page_url('Contacto') ?>"><?php _e('Contacto') ?></a></li>
        <li><a href="<?php page_url('Eres SOA?') ?>"><?php _e('Eres SOA?') ?></a></li>
        <li><a href="<?php page_url('Blog') ?>"><?php _e('Blog') ?></a></li>
    </ul>-->


     <?php $nav_args = array(
      'menu'            => 'Navegacion',
      'container'       => false,
      'menu_class'      => 'menu',
      'echo'            => true,
      'fallback_cb'     => false);
    ?>
    <?php wp_nav_menu($nav_args); ?>
    <div class="follow">
        <p>Follow us</p>
        <ul>
            <li><a href="http://www.facebook.com/pages/Madrid-Spain/Soa-Staff-Azafatas-y-modelos/158823347491417"><img src="<?php echo(soa_image('facebook-icon.png')) ?>" alt="SOA Facebook"/></a></li>
            <li style="display:none"><a href="#"><img src="<?php soa_image('twitter-icon.png') ?>" alt="SOA Twitter"/></a></li>
        </ul>
    </div>
    <div class="politica">
        <ul>
            <li><a href="#">Privacidad</a></li>
            <li><a href="#">Pol&iacute;tica de uso</a></li>
            <li><a href="#">Contacto</a></li>
        </ul>
        <p>&copy; SOA Staff 2010</p>
        <p>Dise&ntilde;ado por <a href="http://masenelinterior.es/">M&aacute;s en el interior</a></p>
    </div>
</div><!-- col-izquierda --> 