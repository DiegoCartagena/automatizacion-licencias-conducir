<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagos;
use Transbank\Webpay\WebpayPlus;
Use Transbank\Webpay\WebpayPlus\Transaction;

class TransbankController extends Controller
{

    public function __construct ()
    {
      //  if(app()->enviroment('produccion')){
        /*    WebpayPlus::configureForProduction(
                env('webpay_plus_cc'),
                env('webpay_plus_apikey')
            );
        }else{*/
            WebpayPlus::configureForTesting();
       // }

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function crear_compra(Request $request)
    {
      
        try {
            $nuevo_pago = new Pagos();
            $nuevo_pago->session_id='123457';
            $nuevo_pago->total = 66450;
            $nuevo_pago->solicitud_id="1";
            $nuevo_pago->save();
            $url_pago = self::init_transaction($nuevo_pago);
            
            return $url_pago;
        } catch (\Exception $e) {
            var_dump("error al guardar datos en bd");die($e);
        }
    }


    public function init_transaction($pago)
    {
    try {
            //code...
             
            $transaccion = (new Transaction)->create(
                $pago->id, // orden de compra
                $pago->session_id, // session_id
                $pago->total, // monto a pagar
                route('confirmar_pago')
            );
            //var_dump($transaccion);die;
            $url = $transaccion->getUrl().'?token_ws='.$transaccion->getToken();
            return $url;
        } catch (\Exception $e) {
            var_dump('TransactionError');die($e);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function confirmar_pago(Request $request)
    {
        $confirmacion = (new Transaction)->commit($request->get('token_ws'));

        $pago = Pagos::where('id', $confirmacion->buyOrder)->first();
        if($confirmacion->isApproved()) {
            $pago->status = 2;
            $pago->update();

            return redirect('/dashboard');
        }else {
            return response()->json(['res'=>false]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
