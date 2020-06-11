<?php

namespace App\Http\Controllers\APP;

use App\Http\Controllers\Controller;
use App\Subcategory;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;


class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Subcategory::orderBy('id','desc')->get();

    }

    /**
     * Show the form for creating a new resource.
     
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'subcategory_name'=>'required|unique:subcategories,subcategory_name',
            'category_id'=>'required',
            'subcategory_description'=>'required',
            'publication_status'=>'required',
        ]);
        DB::table('subcategories')->insert([
            'subcategory_name'=>$request->subcategory_name,
            'category_id'=>$request->category_id,
            'subcategory_description'=>$request->subcategory_description,
            'publication_status'=>$request->publication_status,
            'created_at'=>Carbon::now(),
        ]);
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Subcategory::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
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
        $validate = $request->validate([
        
            'subcategory_name'=>'required',
            'category_id'=>'required',
            'subcategory_description'=>'required',
            'publication_status'=>'required',
        ]);

     DB::table('subcategories')->where('id',$id)->update([
        'subcategory_name'=>$request->subcategory_name,
        'category_id'=>$request->category_id,
        'subcategory_description'=>$request->subcategory_description,
        'publication_status'=>$request->publication_status,

     ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();
    }
}
