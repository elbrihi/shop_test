<?php

namespace AppBundle\Service\Menu;

class CheckoutMenu {
    public function getItems() {
        // Initial dummy menu
        return array(
            array('path' =>'cart', 'label' =>'Cart (3)'),
            array('path' =>'checkout', 'label' =>'Checkout'),
        );
    }
}