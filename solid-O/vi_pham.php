<?php

/*
|--------------------------------------------------------------------------
| VD 1
|--------------------------------------------------------------------------
|
*/
class LoginService
{
    public function login($user)
    {
        if ($user instanceof User) {
            $this->authenticateUser($user);
        } else if ($user instanceOf ThirdPartyUser) {
            $this->authenticateThirdPartyUser($user);
        }
    }
}

/*
|--------------------------------------------------------------------------
| VD 2
|--------------------------------------------------------------------------
|
*/
public function pay(Request $request)
{
    $payment = new PaymentRequest();

    switch ($request->type) {
        case 'credit':
            $payment->payWithCreditCard();
            break;
        case 'paypal':
            $payment->payWithPaypal();
            break;
        default:
            // Exception
            break;
    }
}

class PaymentRequest
{
    public function payWithCreditCard()
    {
        // Logic to pay with a credit card...
    }

    public function payWithPaypal()
    {
        // Logic to pay with paypal...
    }
}