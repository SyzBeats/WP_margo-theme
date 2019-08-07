<?php 
  //Theme Security
  if ( ! defined( 'ABSPATH' ) ) {
      exit; // Exit if accessed directly
  }
?>
<!-- THEME MODAL MINICART -->
<div id="mini-cart-modal" class="modal bottom-sheet">
  <a href="#!" class="modal-close waves-effect waves-red btn red darken-2 right m-1">&times;</a>
  <p class="modal-heading p-1 white z-depth-1 text-darken-4 grey-text">Dein Warenkorb</p>
  <div class="modal-content">
    <div class="widget_shopping_cart_content">
    <?php 
      woocommerce_mini_cart();
    ?>
    </div>
    </div>
    <div class="modal-footer">
  </div>
</div>
<!-- THEME FOOTER-->
<footer class="page-footer grey lighten-5">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="grey-text text-darken-3">MARGO M&uuml;nchen</h5>
        <p class="grey-text text-darken-4">hello@margo-muenchen.shop</p>
        <p class="grey-text text-darken-4">+49 123 789 456</p>
        <p class="grey-text text-darken-4 footer_payment"><span class="fa  fa-2x fa-cc-visa"></span><span class="fa  fa-2x fa-cc-mastercard"></span> <span class="fa  fa-2x fa-cc-paypal"></span> <span class="fa  fa-2x fa-cc-stripe"></span></p>
      </div>
      <div class="col l4 offset-l2 s12">
        <h5 class="grey-text text-darken-3">Links</h5>
        <ul>
          <li><a class="grey-text text-darken-3" href="/impressum">Impressum</a></li>
          <li><a class="grey-text text-darken-3" href="/datenschutz">Datenschutz</a></li>
          <li><a class="grey-text text-darken-3" href="/agb">AGBs</a></li>
          <li><a class="grey-text text-darken-3" href="/widerrufsbelehrung">Widerrufsbelehrung</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright  grey darken-4">
    <div class="container">
    © 2019 MARGO München
    <a class="grey-text text-lighten-4 right" href="#!">Mehr</a>
    </div>
  </div>
</footer>

<?php wp_footer() ?>