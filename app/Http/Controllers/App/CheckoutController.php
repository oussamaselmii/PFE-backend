<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Livraison;
use DB;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_livraison_info(Request $request)
    {
        
        $livraison = new Livraison();

        $livraison->first_name = $request->first_name;
        $livraison->last_name = $request->last_name;
        $livraison->email = $request->email;
        $livraison->phone_number = $request->phone_number;
        $livraison->address = $request->address;
        $livraison->address_2 = $request->address_2;
        $livraison->gouvernorat = $request->gouvernorat;
        $livraison->city = $request->city;
        $livraison->zip = $request->zip;

        $livraison->save();


        return $livraison ;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
