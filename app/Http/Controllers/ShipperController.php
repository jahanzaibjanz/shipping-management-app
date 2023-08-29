<?php

namespace App\Http\Controllers;

use App\Models\Shipper;

use Illuminate\Http\Request;

class ShipperController extends Controller
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
        $shippers = Shipper::latest()->paginate(5);
        return view('shippers.index',compact('shippers'))
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
        $user_id = auth()->user()->id;        
        return view('shippers.create',compact('user_id'));
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
            'user_id' => 'required',
            'company_name' => 'required',
            'company_person' => 'required',
            'contact_number' => 'required',
            'address' => 'required',
        ]);

        Shipper::create($request->all());
    
        return redirect()->route('shippers.index')
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
    public function edit(Shipper $shipper)
    {
        return view('shippers.edit',compact('shipper'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shipper $shipper)
    {
         request()->validate([
            'agency_name' => 'required',
            'contact_number' => 'required',
            'address' => 'required',
        ]);
    
        $shipper->update($request->all());
    
        return redirect()->route('shippers.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipper $shipper)
    {
        $shipper->delete();
    
        return redirect()->route('shippers.index')
                        ->with('success','Product deleted successfully');
    }
}
