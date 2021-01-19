<?php

namespace App\Http\Controllers;
use Classiebit\Eventmie\Models\Booking;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function payment($id, $amount)
    {
        if (is_null($amount) || is_null($id)){
            return response()->json(0);
        }
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.tap.company/v2/charges",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($this->data($amount,$id)),
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer sk_test_ZJaMj5ENm643G0FhCKupfSgy",
                "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
           $json =  $response;
           return $json;
        }
    }

    public function redirect($id)
    {
        $book = Booking::where('id', $id)->first();
        if (isset($book)) {
            $book->update([
                'is_paid' => 1,
            ]);
            return 1;
        }
        return 0;
    }

    protected function data($amount, $id)
    {
        return $data = [
            "amount" => $amount,
            "currency" => "KWD",
//            "threeDSecure" => true,
//            "save_card" => false,
//            "description" => "حجز في منتجع دبليو",
//            "statement_descriptor" => "حجز",
//            "metadata" => [
//                "udf1" => "test 1",
//                "udf2" => "test 2"
//            ],
//            "reference" => [
//                "transaction" => $id,
//                "order" => $id,
//            ],
//            "receipt" => [
//                "email" => false,
//                "sms" => true
//            ],
            "customer" => [
                "first_name" => 'Waleed Alhazmi',
                "email" => 'waleed@dabliu.co',
                "phone" => [
                    "country_code" => "966",
                    "number" => '501111785',
                ]
            ],
//            "merchant" => ["id" => ""],
            "source" => ["id" => "src_kw.knet"],
            "post" => ["url" => route('pay.redirect',$id)],
            "redirect" => ["url" => route('pay.redirect',$id)]
        ];
    }


}
