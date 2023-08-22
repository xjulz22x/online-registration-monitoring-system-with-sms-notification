<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IdentifyingInformation;
use App\Models\Barangay;
use App\Models\Payouts;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PayoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payouts = IdentifyingInformation::where('status', 1)
        ->orderBy('last_name', 'asc')
        ->paginate(10);
         $barangays = Barangay::get();
        return view('frontend.admin.payout.index', compact('payouts' , 'barangays'));
    }

    public function searchesPayouts(Request $request)
    {
        $search = $request->searching;
        $barangays = Barangay::get();
        $payouts = IdentifyingInformation::orderBy('created_at', 'asc')
                  ->where('first_name', 'LIKE', "%{$search}%")
                        ->orWhere('last_name', 'LIKE', "%{$search}%")
                        ->paginate(15);

        return view('frontend.admin.payout.index', compact('payouts' , 'barangays'));
    }

    public function showSeniorPayout()
    {
        $payouts = Payouts::orderBy('created_at', 'asc')
        ->where('user_id' , Auth::user()->id)
        ->paginate(10);
        return view('frontend.users.payouts.index', compact('payouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = IdentifyingInformation::find($id);
        $payouts = Payouts::where('user_id' , $user->user_id)
        ->orderBy('created_at', 'asc')
        ->paginate(10);
        $barangays = Barangay::get();
        return view('frontend.admin.payout.create', compact('user' ,'barangays' , 'payouts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => ['required', 'string'],
            'first_name' => ['required', 'string'],
            'middle_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'barangay_id' => ['required', 'string'],
            'payout_month' => ['required', 'string'],
            'payout_day' => ['required', 'string'],
            'payout_year' => ['required', 'string'],
            'amount' => ['required', 'string'],
            'approve_by' => ['required', 'string'],
        ]);

        Payouts::create([
            'user_id' => $validated['user_id'],
            'first_name' => $validated['first_name'],
            'middle_name' => $validated['middle_name'],
            'last_name' => $validated['last_name'],
            'barangay_id' => $validated['barangay_id'],
            'payout_month' => $validated['payout_month'],
            'payout_day' => $validated['payout_day'],
            'payout_year' => $validated['payout_year'],
            'amount' => $validated['amount'],
            'approve_by' => $validated['approve_by'],
            'status' => '1',
        ]);
        Alert::success('Payout has been successfully saved','success')->autoClose(10000);
        return redirect('/payout-lists');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $barangays = Barangay::get();
        $payouts = Payouts::orderBy('created_at', 'asc')->paginate(15);
        return view('frontend.admin.payout.success-payouts', compact('payouts', 'barangays'));
    }

    public function filterMonthYear(Request $request)
    {
        $barangays = Barangay::get();
        $payouts = Payouts::orderBy('created_at', 'asc')
            ->where('payout_month', $request->payout_month)
            ->where('payout_year', $request->payout_year)
        ->paginate(15);
        return view('frontend.admin.payout.success-payouts', compact('payouts', 'barangays'));
    }

    public function filterBarangay(Request $request)
    {
        $barangays = Barangay::get();
        $payouts = Payouts::orderBy('created_at', 'asc')
            ->where('barangay_id', $request->barangay_id)
        ->paginate(15);
        return view('frontend.admin.payout.success-payouts', compact('payouts', 'barangays'));
    }

    public function searches(Request $request)
    {
        $search = $request->search;
        $barangays = Barangay::get();
        $payouts = Payouts::orderBy('created_at', 'asc')
                  ->where('first_name', 'LIKE', "%{$search}%")
                        ->orWhere('last_name', 'LIKE', "%{$search}%")
                        ->paginate(15);
            
              
     
        return view('frontend.admin.payout.success-payouts', compact('payouts', 'barangays'));
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
