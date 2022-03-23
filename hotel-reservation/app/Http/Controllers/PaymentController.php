<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use App\Models\Customer;
use App\Models\Booking;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct(Payment $Payment)
    {
        $this->Payment = $Payment;
    }
    public function index(Request $request)
    {
        //for sorting the booking index page
        // if ($request->has('form1')){
        //     $find = Customer::where('email', $request->email)->where('contact', $request->number)->first();
        //     if($find === null){
        //         return redirect()->back()->with('message', 'No Customer Found');
        //     }
        //     else{
        //         $bookingid = Booking::where('user_id',$find->id)->get();
        //         $data = array();
        //         foreach ($bookingid as $id) {
        //             $data[]= Payment::where('booking_id', $id->id)->first();
        //         }
        //         dd($data);
        //         return view('payment.index', compact('data'));
        //     }
        // }
        
        $data = $this->Payment->all();
        $data = $this->Payment->orderby('status', 'desc')->paginate(10);
        return view('payment.index', compact('data'));
    }
   
    public function create()
    {
        return view('payment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Payment::where('booking_id', '=', $request->form1)->first();
        if ($request->has('form1')) {
            $data->status = 'paid';
            $data->update();
            return redirect('/home')->with('success', 'Successfully made a payment.');

        }
        if ($request->has('form2')) {
            return redirect('/home');
        }
    }


    public function edit($id)
    {
        $data = $this->Payment->findOrFail($id); 
        return view('Payment.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_method', '_token');
        $this->Payment->where('id', "$id")->update($data);
        return redirect()->back()->with('success', 'Successfully updated payments table.');
        
    }

    public function destroy(Request $request, $id)
    {
        $data = $request->except('_method', '_token');
        $this->Payment->where('id', "$id")->delete($data);
        return redirect()->back()->with('success', 'A Payment data deleted successfully.');
    }
}
