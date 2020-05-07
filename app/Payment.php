<?php

namespace App;

use Omnipay\Omnipay;
use Omnipay\Common\CreditCard;
use Omnipay\Common\GatewayFactory;
class Payment
{
    private $pay;
    private $card;
    // verify and set the credit card.
    function setcard($value){
      try{
            $card = [
                'firstName' => 'Bobby',
                'lastName' => 'Tables',
                'number' => $value['card'],
                'expiryMonth' => $value['expiremonth'],
                'expiryYear' => $value['expireyear'],
                'cvv' => $value['cvv']
            ];
            $ccard = new CreditCard($card);
            // we take the credit card information and validate it using validate()
            $ccard->validate();
            $this->card = $card;
            return true;
        }
        catch(\Exception $ex){
            return $ex->getMessage();
        }

    }
    public function gateway()
    {
        $gateway = Omnipay::create('PayPal_Express');

        $gateway->setUsername('sb-gmnct1678850_api1.business.example.com');
        $gateway->setPassword('4R68X67Z488GMQ5J');
        $gateway->setSignature('AuRgsHGArD2dK6HMSGoC8GlvOyfGA.v6ndPjKlOfuJoR56ytEZDwlzp2');
        $gateway->setTestMode(true);
        return $gateway;
    }
    // make the payment
    function makepayment($value){
        try{

            // Setup payment gateway

            // Send purchase request
            $response = $this->gateway()->authorize(
                [
                    'amount'    => $value['amount'],
                    'currency'  => $value['currency'],
                    'card'      => $this->card,
                    'cancelUrl' => 'http://localhost:8000/check/echec',
                    'returnUrl' => 'http://localhost:8000/check/success',
                ]
            )->send();

            return $response;
        }
        catch(\Exception $ex){
            return $ex->getMessage();
        }
    }
    /**
     * @param $order
     */
    public function getCancelUrl($order)
    {
        return route('paypal.checkout.cancelled', $order->id);
    }
}
