<?php

namespace App\Http\Controllers;

use App\Models\orders;
use App\Models\payment;
use App\Http\Requests\StorepaymentRequest;
use App\Http\Requests\UpdatepaymentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = payment::all();
        return response($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepaymentRequest $request)
    {
       $data = payment::create($request->all());
       return response()->json([
            'success' => true,
            'data' => $data
       ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(payment $payment)
    {
        return  $payment;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepaymentRequest  $request
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepaymentRequest $request, payment $payment)
    {
        $payment->update($request->all());
        return response()->json([
            'success' => true,
            'data' => $payment
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(payment $payment)
    {
        $payment->delete();
        return response()->json([
            'success' => true,
            'data' => $payment
        ], 200);
    }

    public function vnPay(Request $request)
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost/BackEnd-Laravel-BookStore/public/api/home/vnpayreturn";
        $vnp_TmnCode = "8ASB91CS";//Mã website tại VNPAY
        $vnp_HashSecret = "H2M3M5OO7W2F4BFTNHVTBZV31XTFEVK4"; //Chuỗi bí mật

        $vnp_TxnRef = rand(00, 9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'noi dung thanh toan';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->input('totalPrice') * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $cartitems = $request->input('cartitems');
        $cartitems_json = json_encode($cartitems);
        $cartitems_base64 = base64_encode($cartitems_json);


        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
//            "customer_name" => $request->input('name'),
//            "phone_number" => $request->input('phoneNumber'),
//            "address" => $request->input('address'),
//            "order_note" => $request->input('order_note'),
//            "cartitems" => $cartitems_base64,

        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }


        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        return response()->json([
            'success' => true,
            'data' => $request->input('totalPrice'),
            'url' => $vnp_Url]);
    }

    public function vnpayReturn(Request $request)
    {
        $vnp_SecureHash = $request->input('vnp_SecureHash');
        $inputData = $request->except('vnp_SecureHash');

        ksort($inputData);
        $hashData = "";
        foreach ($inputData as $key => $value) {
            $hashData .= urlencode($key) . '=' . urlencode($value) . '&';
        }
        $hashData = trim($hashData, '&');
        $vnp_HashSecret = "H2M3M5OO7W2F4BFTNHVTBZV31XTFEVK4";

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        if ($secureHash == $vnp_SecureHash) {
            if ($request->input('vnp_ResponseCode') == '00') {
                $customer_name = $request->input('customer_name');
//                $cartitems_base64 = $request->input('cartitems');
//                $cartitems_json = base64_decode($cartitems_base64);
//                $cartitems = json_decode($cartitems_json, true);
                if(isset($customer_name)) {
                    dd($customer_name);
                    return redirect('http://localhost:3000/thanks');
                }

                // Thanh toán thành công, tạo đơn hàng
//                DB::beginTransaction();
//                try {
//                    $order = orders::create([
//                        'user_id' => $request->user()->id,
//                        'order_info' => $request->input('vnp_OrderInfo'),
//                        'amount' => $request->input('vnp_Amount') / 100,
//                        'txn_ref' => $request->input('vnp_TxnRef'),
//                        'status' => 'completed',
//                    ]);
//
//                    DB::commit();
//                    return redirect('/thanks')->with('success', 'Payment successful!');
//                } catch (\Exception $e) {
//                    DB::rollBack();
//                    return redirect('/thanks')->with('error', 'Could not create order.');
//                }
            } else {
                return redirect('/thanks')->with('error', 'Payment failed.');
            }
        } else {
            return redirect('/thanks')->with('error', 'Invalid signature.');
        }
    }
}


