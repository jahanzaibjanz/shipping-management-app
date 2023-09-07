<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShippingLine;

class ShippingLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:shipper-list|shipper-create|shipper-edit|shipper-delete', ['only' => ['index','show']]);
         $this->middleware('permission:shipper-create', ['only' => ['create','store']]);
         $this->middleware('permission:shipper-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:shipper-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $shippinglines = ShippingLine::latest()->paginate(5);
        return view('shipping-lines.index',compact('shippinglines'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('shipping-lines.create');
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
        request()->validate([
            'name' => 'required',
            'website' => 'required',            
            'contact_number' => 'required',
            'address' => 'required',
        ]);

        ShippingLine::create($request->all());
    
        return redirect()->route('shipping-lines.index')
                        ->with('success','Product created successfully.');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ShippingLine $shipping_line)
    {        
        return view('shipping-lines.edit',compact('shipping_line'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShippingLine $shipping_line)
    {
         request()->validate([
            'name' => 'required',
            'website' =>'required',
            'contact_number' =>'required',
            'address' => 'required',
        ]);
    
        $shipping_line->update($request->all());
    
        return redirect()->route('shipping-lines.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShippingLine $shipping_line)
    {
        $shipping_line->delete();
    
        return redirect()->route('shipping-lines.index')
                        ->with('success','Product deleted successfully');
    }
}
