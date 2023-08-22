<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IdentifyingInformation;
use App\Models\User;
use App\Models\PreApplicationForm;
use App\Models\Assesment;
use Carbon\Carbon;
use App\Models\Barangay;
use RealRashid\SweetAlert\Facades\Alert;

class PendingController extends Controller
{
    
    public function showPendingAccounts()
    {
        $pendings = IdentifyingInformation::where('status', 0)
        ->orderBy('created_at', 'desc')
        ->paginate(10);
        return view('frontend.admin.pendings.pending-account-list', compact('pendings'));
    }

     public function showDeclinedAccounts()
    {
        $pendings = IdentifyingInformation::where('status', 2)
        ->orderBy('created_at', 'desc')
        ->paginate(10);
        return view('frontend.admin.declined.declined-list', compact('pendings'));
    }

     public function showPendingAccountsFullInfo($id)
    {
        $pendingUser = User::where('id', $id)->first();
        return view('frontend.admin.pendings.pending-account-full-info', compact('pendingUser'));
    }


       public function showPendingAccountsPreapplication($id)
    {
        $pendingUser = User::where('id', $id)->first();
        return view('frontend.admin.pendings.pending-account-documents', compact('pendingUser'));
    }

     public function showPendingAccountsIdentifying($id)
    {
        $barangays = Barangay::get();
        $pendingUser = User::where('id', $id)->first();
        return view('frontend.admin.pendings.pending-account-identifying', compact('pendingUser' , 'barangays'));
    }

     public function showPendingAccountsFamily($id)
    {
        $pendingUser = User::where('id', $id)->first();
        return view('frontend.admin.pendings.pending-account-family', compact('pendingUser'));
    }

     public function showPendingAccountsEconomic($id)
    {
        $pendingUser = User::where('id', $id)->first();
        return view('frontend.admin.pendings.pending-account-economic', compact('pendingUser'));
    }

      public function showPendingAccountsHealth($id)
    {
        $pendingUser = User::where('id', $id)->first();
        return view('frontend.admin.pendings.pending-account-health', compact('pendingUser'));
    }

      public function showPendingAccountsAssesment($id)
    {
        $pendingUser = User::where('id', $id)->first();
        return view('frontend.admin.pendings.pending-account-assesment', compact('pendingUser'));
    }



   
    public function createAssesment($id)
    {
        $mytime = Carbon::now()->toDateString();
        $assesmentForUser = User::where('id', $id)->first();
        return view('frontend.admin.assesment.assesment', compact('mytime' , 'assesmentForUser'));
    }

   
    public function storeAssesment(Request $request, $id)
    {
         $request->validate([
            'date_submitted' => ['required', 'string'],
            'assesment' => ['required', 'string'],
            'authorized_representative_name_1' => ['nullable', 'string'],
            'authorized_representative_relation_1' => ['nullable', 'string'],
            'authorized_representative_name_2' => ['nullable', 'string'],
            'authorized_representative_relation_2' => ['nullable', 'string'],
            'authorized_representative_name_3' => ['nullable', 'string'],
            'authorized_representative_relation_3' => ['nullable', 'string'],
            'interviewed_by' => ['required', 'string'],
            'dswd_e_signature' => ['required', 'mimes:jpeg,png,bmp'],
        ]);

        $new_dswd_e_signature = time().rand(1,1000).'.'.$request->dswd_e_signature->getClientOriginalName();
        $request->dswd_e_signature->move(public_path('uploads'), $new_dswd_e_signature);

        $assesment = Assesment::create([
            'user_id' => $id,
            'date_submitted' =>$request->date_submitted,
            'assesment' =>$request->assesment,
            'authorized_representative_name_1' =>$request->authorized_representative_name_1,
            'authorized_representative_relation_1' =>$request->authorized_representative_relation_1,
            'authorized_representative_name_2' =>$request->authorized_representative_name_2,
            'authorized_representative_relation_2' =>$request->authorized_representative_relation_2,
            'authorized_representative_name_3' =>$request->authorized_representative_name_3,
            'authorized_representative_relation_3' =>$request->authorized_representative_relation_3,
            'interviewed_by' =>$request->interviewed_by,
            'dswd_e_signature' =>$new_dswd_e_signature,
        ]);

        $accepted = IdentifyingInformation::where('user_id', $id)->first();
        $accepted->status = '1';
        $accepted->save();

        Alert::success('Senior Application has been successfully confirmed!','success')->autoClose(10000);
        return redirect('/pending-accounts');
    }

  
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }

 
  

  
    public function destroy($id)
    {
        //
    }
}
