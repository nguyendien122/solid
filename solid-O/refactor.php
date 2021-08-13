<?php

/*
|--------------------------------------------------------------------------
| VD 1
|--------------------------------------------------------------------------
|
*/
// Tạo một interfacetệp.
interface LoginInterface
{
    public function authenticateUser($user);
}

//Bây giờ chúng ta nên tách logic mà chúng ta đã tạo cho trường hợp sử dụng của mình
//và triển khai nó trong một lớp triển khai giao diện của chúng ta.
class UserAuthentication implements LoginInterface
{
    public function authenticateUser($user)
    {
        // TODO: Implement authenticateUser() method.
    }
}

Class ThirdPartyUserAuthentication implements LoginInterface
{
    public function authenticateUser($user)
    {
        // TODO: Implement authenticateUser() method.
    }
}

// Như bạn có thể thấy, LoginServicelớp không xác định được phương thức xác thực nào (qua web, qua google hoặc twitter, v.v.).
class LoginService
{
    public function login(LoginInterface $user)
    {
        $user->authenticateUser($user);
    }
}

/*
|--------------------------------------------------------------------------
| VD 2
|--------------------------------------------------------------------------
|
*/
interface PayableInterface
{
    public function pay();
}

class CreditCardPayment implements PayableInterface
{
    public function pay()
    {
        // Logic to pay with a credit card...
    }
}

class PaypalPayment implements PayableInterface
{
    public function pay()
    {
        // Logic to pay with paypal...
    }
}

public function pay(Request $request)
{
    $paymentFactory = new PaymentFactory();
    $payment = $paymentFactory->initialize($request->type);

    return $payment->pay();
}

class PaymentFactory
{
    public function initialize(string $type): PayableInterface
    {
        switch ($type) {
            case 'credit':
                return new CreditCardPayment();
            case 'paypal':
                return new PayPalPayment();
            default:
                throw new \Exception("Payment method not supported");
                break;
        }
    }
}