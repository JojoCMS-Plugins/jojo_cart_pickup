<?php
/**
 *                    Jojo CMS
 *                ================
 *
 * Copyright 2008 Harvey Kane <code@ragepank.com>
 * Copyright 2008 Michael Holt <code@gardyneholt.co.nz>
 *
 * See the enclosed file license.txt for license information (LGPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
 *
 * @author  Harvey Kane <code@ragepank.com>
 * @license http://www.fsf.org/copyleft/lgpl.html GNU Lesser General Public License
 * @link    http://www.jojocms.org JojoCMS
 */

class JOJO_Plugin_jojo_cart_pickup extends JOJO_Plugin
{
    function getPaymentOptions()
    {
        global $smarty;
        $options = array();
        $options[] = array(
                'id' => 'pickup',
                'label' => "Pay upon pickup",
                'html' => $smarty->fetch('jojo_cart_pickup_checkout.tpl')
                );
        $options = Jojo::applyFilter('jojo_cart_pickup:get_payment_options', $options);
        return $options;
    }

    /*
    * Determines whether this payment plugin is active for the current payment.
    */
    function isActive()
    {
        /* Look for a post variable specifying the test processor */
        return (Jojo::getFormData('handler', false) == 'pickup') ? true : false;
    }

    function process()
    {
        $receipt = array();
        $errors  = array();

        return array(
                    'success' => true,
                    'paid'    => false,
                    'receipt' => $receipt,
                    'errors'  => $errors,
                    'message' => Jojo::getOption('cart_pickup_instructions', 'Please make payment when collecting your order.')
                    );
    }
    
    function jojo_cart_process_pending_template($pending_template)
    {
        $cart = call_user_func(array(Jojo_Cart_Class, 'getCart'));
        if ($cart->handler == 'jojo_plugin_jojo_cart_pickup') $pending_template['customer'] = 'jojo_cart_customer_email_pickup.tpl';
        return $pending_template;
    }
}