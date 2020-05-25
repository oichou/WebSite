<?php

namespace App;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Agreement;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Plan;
use PayPal\Api\Payment;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\PayerInfo;
use Omnipay\Omnipay;
use Omnipay\PayPal;
use Omnipay\Common\CreditCard;
use Omnipay\Common\GatewayFactory;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\ApiOperations\Create;
use Stripe\Charge;
class Payments
{
    private static $paypalkey = 'AuRgsHGArD2dK6HMSGoC8GlvOyfGA.v6ndPjKlOfuJoR56ytEZDwlzp2';
    private static $stripekey = 'sk_test_X0GGFqdyd4an1XSagTgVcS6a00VczaDIPt';
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
        $gateway->setSignature($paypalkey);
        $gateway->setTestMode(true);
        return $gateway;
    }

    public function initPaypal(){
            $apiContext = new ApiContext(new OAuthTokenCredential(
            'AUSAMi9EoqPcJdnFYFzJriwoCPGjZnibpE2f0cZhJniApMeV6a_1Mx3ZWFPOkiZSP8vQvt5vo-xe05rE',
            'EACSR2he9zA12Zx3N-UQDn5LxYFJpx5FzRIvVj5_IJXKnUN4tBh-Cj3UaxVnNfhQw8wk7lcp824Atr6F')
        );
        // $apiContext->setConfig($paypal_conf['settings']);
        return $apiContext;
      }

    /**
     *  make the payment using paypal
     *  @param $value
     */
    function makePaypalPayment($value){
        try{
          $payer = new Payer();
          $payer->setPaymentMethod('paypal');
          $amount = new Amount();
          $amount->setCurrency($value['currency'])
                 ->setTotal($value['amount']);
          $transaction = new Transaction();
          $transaction->setAmount($amount)
                      ->setDescription('transaction description');
          $redirect_urls = new RedirectUrls();
          $redirect_urls->setReturnUrl('http://localhost:8000/checkpaypal/success') /** Specify return URL **/
                        ->setCancelUrl('http://localhost:8000/checkpaypal/echec');
          $payment = new Payment();
          $payment->setIntent('Sale')
                  ->setPayer($payer)
                  ->setRedirectUrls($redirect_urls)
                  ->setTransactions(array($transaction));
        try {
            $response= $payment->create($this->initPaypal());
            return [$response,$this->initPaypal()];

        } catch (\PayPal\Exception\PPConnectionException $ex){
            return back()->withError('Some error occur, sorry for inconvenient');
        } catch (\PayPal\Exception\PayPalConnectionException $ex){
            return back()->withError('Some error occur, sorry for inconvenient');
        } catch (\PayPal\Exception\Exception $ex) {
            return back()->withError('Some error occur, sorry for inconvenient');
        }
        } catch(\Exception $ex){
            return $ex->getMessage();
        }
    }
    /**
     *  make the payment using a credit card
     *  @param $value
     */
     function makeStripePayment($value,$stripeToken){
       Stripe::setApiKey('sk_test_maAcvm6hGu3QiLvbp5eoq6Pv00XrGK4Av2');
       $response = Charge::create ([
              "amount" =>  $value['amount'] * 100,
              "currency" => $value['currency'],
              "source" => $stripeToken,
              "description" => "Test payment from oussafa"
              ]);
      return $response;

     }

    /**
     * @param $order
     */
    public function getCancelUrl($order)
    {
        return route('paypal.checkout.cancelled', $order->id);
    }
}
