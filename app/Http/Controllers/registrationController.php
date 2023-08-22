<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RegistrationForm;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class registrationController extends Controller
{
    
    public function index()
    {
        $registrations = RegistrationForm::where('status' , 1)->paginate(10);
        return view('frontend.admin.registrations.registrationsAccount', compact('registrations'));
    }

    
    public function create()
    {
        if(Auth::user()->registrations == null)
        {
        return view('frontend.users.registration.registrationForm');
        }
        else
        {
            return abort(403 , 'cant access this page');
        }
    }

    
    public function store(Request $request)
    {

        
              $request->validate([
            'first_name' => [ 'string'],
            'last_name' => [ 'string'],
            'middle_name' => [ 'string'],
            'place_of_birth' => ['required', 'string'],
            'age' => ['required', 'numeric'],
            'civil_status' => ['required', 'string'],
            'date_of_birth' => ['required', 'string'],
            'sex' => ['required', 'string'],
            'address' => ['required', 'string'],
            'educational_attainment' => ['nullable', 'string'],
            'other_skills' => ['nullable', 'string'],
            'u1_fullname' => ['nullable', 'string'],
            'u1_relationship' => ['nullable', 'string'],
            'u1_age' => ['nullable', 'string'],
            'u1_status' => ['nullable', 'string'],
            'u1_occupation' => ['nullable', 'string'],
            'u2_fullname' => ['nullable', 'string'],
            'u2_relationship' => ['nullable', 'string'],
            'u2_age' => ['nullable', 'string'],
            'u2_status' => ['nullable', 'string'],
            'u2_occupation' => ['nullable', 'string'],
            'u3_fullname' => ['nullable', 'string'],
            'u3_relationship' => ['nullable', 'string'],
            'u3_age' => ['nullable', 'string'],
            'u3_status' => ['nullable', 'string'],
            'u3_occupation' => ['nullable', 'string'],
            'u4_fullname' => ['nullable', 'string'],
            'u4_relationship' => ['nullable', 'string'],
            'u4_age' => ['nullable', 'string'],
            'u4_status' => ['nullable', 'string'],
            'u4_occupation' => ['nullable', 'string'],
            'u5_fullname' => ['nullable', 'string'],
            'u5_relationship' => ['nullable', 'string'],
            'u5_age' => ['nullable', 'string'],
            'u5_status' => ['nullable', 'string'],
            'u5_occupation' => ['nullable', 'string'],
            'name_of_association' => ['required', 'string'],
            'address_of_association' => ['required', 'string'],
            'date_of_membership' => ['required', 'string'],
            'position' => ['required', 'string'],
            'sc_picture' => ['required', 'mimes:jpeg,png,bmp'],
            'sc_document' => ['required', 'mimes:jpeg,png,bmp'],
            'sc_pres_signature' => ['required', 'mimes:jpeg,png,bmp'],
            'sc_signature' => ['required', 'mimes:jpeg,png,bmp'],
            'status' => ['nullable', 'string'],
          
            
        ]);
        
        $newScPictureName = Auth::user()->id.''.Auth::user()->first_name.'-'.time().rand(1,1000).'.'.$request->sc_picture->getClientOriginalName();
        $request->sc_picture->move(public_path('uploads'), $newScPictureName );
        $newScDocumentName = Auth::user()->id.''.Auth::user()->first_name.'-'.time().rand(1,1000).'.'.$request->sc_document->getClientOriginalName();
        $request->sc_document->move(public_path('uploads'), $newScDocumentName );
        $newScPresSignatureName = Auth::user()->id.''.Auth::user()->first_name.'-'.time().rand(1,1000).'.'.$request->sc_pres_signature->getClientOriginalName();
        $request->sc_pres_signature->move(public_path('uploads'), $newScPresSignatureName );
        $newScSignatureName = Auth::user()->id.''.Auth::user()->first_name.'-'.time().rand(1,1000).'.'.$request->sc_signature->getClientOriginalName();
        $request->sc_signature->move(public_path('uploads'), $newScSignatureName );
        
        

        $user = Auth::user()->id;
        $reg = RegistrationForm::create([
            'user_id' => Auth::user()->id,
            'first_name' =>$request->first_name,
            'last_name' =>$request->last_name,
            'middle_name' =>$request->middle_name,
            'place_of_birth' =>$request->place_of_birth,
            'age' =>$request->age,
            'civil_status' =>$request->civil_status,
            'date_of_birth' =>$request->date_of_birth,
            'sex' =>$request->sex,
            'address' =>$request->address,
            'educational_attainment' =>$request->educational_attainment,
            'other_skills' =>$request->other_skills,
            'u1_fullname' =>$request->u1_fullname,
            'u1_relationship' =>$request->u1_relationship,
            'u1_age' =>$request->u1_age,
            'u1_status' =>$request->u1_status,
            'u1_occupation' =>$request->u1_occupation,
            'u2_fullname' =>$request->u2_fullname,
            'u2_relationship' =>$request->u2_relationship,
            'u2_age' =>$request->u2_age,
            'u2_status' =>$request->u2_status,
            'u2_occupation' =>$request->u2_occupation,
            'u3_fullname' =>$request->u3_fullname,
            'u3_relationship' =>$request->u3_relationship,
            'u3_age' =>$request->u3_age,
            'u3_status' =>$request->u3_status,
            'u3_occupation' =>$request->u3_occupation,
            'u4_fullname' =>$request->u4_fullname,
            'u4_relationship' =>$request->u4_relationship,
            'u4_age' =>$request->u4_age,
            'u4_status' =>$request->u4_status,
            'u4_occupation' =>$request->u4_occupation,
            'u5_fullname' =>$request->u5_fullname,
            'u5_relationship' =>$request->u5_relationship,
            'u5_age' =>$request->u5_age,
            'u5_status' =>$request->u5_status,
            'u5_occupation' =>$request->u5_occupation,
            'name_of_association' =>$request->name_of_association,
            'address_of_association' =>$request->address_of_association,
            'date_of_membership' =>$request->date_of_membership,
            'position' =>$request->position,
            'sc_picture' => $newScPictureName,
            'sc_document' => $newScDocumentName,
            'sc_pres_signature' => $newScPresSignatureName,
            'sc_signature' => $newScSignatureName,
            'status' => '1',
            'allowed_level' => '1',
        ]);

        Alert::success('Successfully Registered! Your Document will be processed, please wait for the confirmation','success')->autoClose(20000);;
        return redirect('/user-dashboard');
      

        
       
    }

    
    public function show($id)
    {
        $accounts = RegistrationForm::findOrFail($id);
        return view('frontend.admin.registrations.viewRegistrationsAccount', compact('accounts'));
    }

   
    public function edit($id)
    {
        
    }

  
    public function update(Request $request, $id)
    {
        $status = RegistrationForm::where('id' , $id)->first();
        $status->status = '2';
        $status->allowed_level = '2';
        $status->save();
          toast('Saved!, Registration has been successfully Confirmed!','success')->autoClose(6000);;
        return redirect('/registration-accounts');
    }

    public function destroy($id)
    {
        
    }
}
