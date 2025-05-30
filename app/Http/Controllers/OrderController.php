<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Payment;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\Double;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $client;
    private $secret;
    private $clientId;

    public function __construct()
    {
        $this->client =new Client([
            'base_uri' => 'https://api-m.sandbox.paypal.com'
        ]);

        $this->clientId = env('PAYPAL_CLIENT_ID');
        $this->secret = env('PAYPAL_SECRET');
    }

    public function index(User $user)
    {
        $orders = null;
        if($user->rol->name == "Admin"){
            $orders = Order::paginate(10);
        }else{
            $orders = $user->orders()->paginate(10);
        }
        
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $totalAmount = $request->totalAmount;
        $payments = Payment::all();
        return view('orders.create',compact('totalAmount','payments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Cart $cart)
    {
        $order = new Order();
        $order->totalPrice = $request->totalPrice;
        $order->state = $request->state;
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->payment = $request->payment;
        $order->user_id = $request->user_id;
        $order->save();
        foreach($cart->cartLines as $cartLine){
            $orderLine = new OrderLine();
            $orderLine->piece_id = $cartLine->piece_id;
            $orderLine->number = $cartLine->number;
            $orderLine->totalPrice = $cartLine->totalPrice;
            $orderLine->pieceName = $cartLine->piece->name;
            $order->orderLines()->save($orderLine);
        } 
    
        return redirect()->route('orders.show',$order);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->totalPrice = $request->totalPrice;
        $order->state = $request->state;
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->payment = $request->payment;
        $order->user_id = $request->user_id;
        $order->save();
        return redirect()->route('orders.show',$order);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index');
    }

    public function process($orderId){
        
        $response = $this->client->request('POST', '/v1/oauth2/token', [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
            'body' => 'grant_type=client_credentials',

            'auth' => [$this->clientId, $this->secret, 'basic']
            ]
        );

        $data = json_decode($response->getBody(), true);
        $access_token = $data['access_token'];

        $response = $this->client->request('GET','/v2/checkout/orders/' . $orderId, [
            'headers' => [
                'Accept' => 'application/json',
                'Autorization' => "Bearer $access_token"
            ]
        ]);

        $data = json_decode($response->getBody(), true);
        if ($data['status'] === 'APPROVED'){
            $amount = $data['purchase_units'][0]['amount']['value'];
            return [
                'success' => true,
            ];
        }
            return [
                'success' => false
            ];
    }
}
