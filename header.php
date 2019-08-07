<?php 
		//Theme Security
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly
    }
?>
<header class="header">
    <nav class="top-nav-mobile white grey-text text-darken-4">
        <div class="nav-wrapper">
            <ul id="nav-mobile" class="left">
                <li class="trigger-wrap">
                    <a href="#" data-target="slide-out" class="sidenav-trigger shown grey-text text-darken-4"><i class="material-icons">menu</i></a>
                </li>
                <li class="trigger-wrap">
                    <a href="#" class="sidenav-trigger-close grey-text text-darken-4"><i class="material-icons">close</i></a>
                </li>
            </ul>
        <picture class="brand-logo center">
             <img src="http://localhost:8888/margo/wp-content/uploads/2019/07/Download.jpg" alt="Margo Logo" />
        </picture>
        
        <a href="#mini-cart-modal" class="waves-effect modal-trigger right"> <!-- Modal Trigger -->
            <img class="mini-cart_icon" src="http://localhost:8888/margo/assets/img/shopicon-01.svg" alt="shopping icon" lazy />
        </a>
        </div>
    </nav>
        
    <aside class="side-widgets">
        <a href="#">
            <div class="side-widget side-widget_about">
                <span class="side-widget_icon">
                    ABOUT
                </span>
            </div>
        </a>
        <a href="https://www.instagram.com/margomuenchen/">
            <div class="side-widget side-widget_instagram">
                <span  class="side-widget_icon">
                    <i class="fa fa-instagram fa-2x"></i>
                </span>
            </div>
        </a>
        <a href="https://www.facebook.com/margomuenchen/" >
            <div class="side-widget side-widget_facebook">
                <span class="side-widget_icon">
                    <i class="fa fa-facebook fa-2x"></i>
                </span>
            </div>
        </a>
        <a href="/margo/storefinder" >
            <div class="side-widget side-widget_storefinder">
                <span class="side-widget_icon">
                    STORE<br>FINDER
                </span>
            </div>
        </a>
    </aside>
</header>