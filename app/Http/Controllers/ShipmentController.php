<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Shipment;
use App\Models\Shipper;
use App\Models\Client;
use App\Models\ShippingLine;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        //  $this->middleware('permission:shipment-list|shipment-create|shipment-edit|shipment-delete', ['only' => ['index','show']]);
        //  $this->middleware('permission:shipment-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:shipment-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:shipment-delete', ['only' => ['destroy']]);
    }
    
    public function index()
    {

        $shipments = Shipment::join('shippers','shippers.id','=','shipments.shipper_id')
        ->join('clients','clients.id','=','shipments.client_id')
        ->join('shipping_lines','shipping_lines.id','=','shipments.shipping_line_id')
        ->join('agents','agents.id','=','shipments.agent_id')
        ->select('shipments.*','shippers.company_name as shipper','clients.company_name','shipping_lines.name','agents.agency_name')
        ->get();

        return view('shipments.index',compact('shipments'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = auth()->user()->id;
        $shippers = Shipper::select('id','company_name')->get();
        $clients = Client::select('id','company_name')->get();
        $shippinglines = ShippingLine::select('id','name')->get();
        $agents = Agent::select('id','agency_name')->get();
        return view('shipments.create',compact('user_id','shippers','clients','shippinglines','agents'));
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
            'origin' => 'required',
            'destination' => 'required',
            'shipment_date' => 'required',
            'delivery_date' => 'required',
        ]);
        
        Shipment::create($request->all());

        return redirect()->route('shipments.index')
                        ->with('success','Product created successfully.');
        //
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
    public function edit(Shipment $shipment)
    {
        return view('shipments.edit',compact('shipment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shipment $shipment)
    {
        request()->validate([
            'shipper_id ' => 'required',
            'client_id ' => 'required',
            'shipping_line_id ' => 'required',
            'origin' => 'required',
            'destination' => 'required',
            'shipment_date' => 'required',
            'delivery_date' => 'required',
        ]);
    
        $shipment->update($request->all());
    
        return redirect()->route('shipments.index')
                        ->with('success','Product updated successfully');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipment $shipment)
    {
        $shipment->delete();
    
        return redirect()->route('shipments.index')
                        ->with('success','Product deleted successfully');
        //
    }
}
