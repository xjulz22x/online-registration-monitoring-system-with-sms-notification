<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use App\Models\PreApplicationForm;
use App\Models\RegistrationForm;
use App\Models\ApplicationForm;
use Carbon\Carbon;

class PreApplicationController extends Controller
{
   
    public function index()
    {
        $applications = ApplicationForm::where('status' , 1)->paginate(10);
        return view('frontend.admin.applications.applicationAccount', compact('applications'));
    }

   
    public function create()
    {
        if(Auth::user()->preapplication == null)
        {
          return view('frontend.users.pre-application.pre-application');
        }
        else
        {
            return abort(403 , 'cant access this page');
        }
       
      
    }

    public function createPart2()
    {

        if(Auth::user()->application == null)
        {
        $mytime = Carbon::now()->toDateString();
        return view('frontend.users.pre-application.pre-application-part2', compact('mytime'));
       
        }
        else
        {
            return abort(403 , 'cant access this page');
        
        }

        
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'mothers_maiden_name' => ['required', 'string' ,],
            'monthly_income' => ['required', 'numeric'],
            'total_person_in_the_house' => ['required', 'numeric'],
            'senior_picture_1x1' => ['required', 'mimes:jpeg,png,bmp'],
            'barangay_indigency' => ['required', 'mimes:jpeg,png,bmp'],
            'birth_cert_or_others' => ['required', 'mimes:jpeg,png,bmp'],
            'senior_citizen_id' => ['required', 'mimes:jpeg,png,bmp'],
            'senior_signature' => ['required', 'mimes:jpeg,png,bmp'],
        ]);

        $new_senior_picture_1x1 = Auth::user()->id.''.Auth::user()->first_name.'-'.time().rand(1,1000).'.'.$request->senior_picture_1x1->getClientOriginalName();
        $request->senior_picture_1x1->move(public_path('uploads'), $new_senior_picture_1x1);

        $new_barangay_indigency = Auth::user()->id.''.Auth::user()->first_name.'-'.time().rand(1,1000).'.'.$request->barangay_indigency->getClientOriginalName();
        $request->barangay_indigency->move(public_path('uploads'), $new_barangay_indigency);

        $new_birth_cert_or_others = Auth::user()->id.''.Auth::user()->first_name.'-'.time().rand(1,1000).'.'.$request->birth_cert_or_others->getClientOriginalName();
        $request->birth_cert_or_others->move(public_path('uploads'), $new_birth_cert_or_others);

        $new_senior_citizen_id = Auth::user()->id.''.Auth::user()->first_name.'-'.time().rand(1,1000).'.'.$request->senior_citizen_id->getClientOriginalName();
        $request->senior_citizen_id->move(public_path('uploads'), $new_senior_citizen_id);

        $new_senior_signature = Auth::user()->id.''.Auth::user()->first_name.'-'.time().rand(1,1000).'.'.$request->senior_signature->getClientOriginalName();
        $request->senior_signature->move(public_path('uploads'), $new_senior_signature);

        $user = Auth::user()->id;
        $preApplication = PreApplicationForm::create([
            'user_id' => Auth::user()->id,
            'mothers_maiden_name' =>$request->mothers_maiden_name,
            'monthly_income' =>$request->monthly_income,
            'total_person_in_the_house' =>$request->total_person_in_the_house,
            'senior_picture_1x1' =>$new_senior_picture_1x1,
            'barangay_indigency' =>$new_barangay_indigency,
            'birth_cert_or_others' =>$new_birth_cert_or_others,
            'senior_citizen_id' =>$new_senior_citizen_id,
            'senior_signature' =>$new_senior_signature,
            'status' => '1',
        ]);

        toast('Successfully Saved!','success')->autoClose(6000);;
        return redirect()->route('create-identifying-information');
    }

    public function storeApplication(Request $request)
    {
         $request->validate([
            'last_name' => ['required', 'string'],
            'first_name' => ['required', 'string'],
            'middle_name' => ['required', 'string'],
            'citizenship' => ['required', 'string'],
            'house_number' => ['nullable', 'string'],
            'street' => ['required', 'string'],
            'barangay' => ['required', 'string'],
            'city_municipality' => ['required', 'string'],
            'province' => ['required', 'string'],
            'age' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'civil_status' => ['required', 'string'],
            'birthdate' => ['required', 'string'],
            'birthplace' => ['required', 'string'],
            'living_arrangement' => ['required', 'string'],
            'pensioner' => ['required', 'string'],
            'pensioner_if_yes' => ['nullable', 'string'],
            'source' => ['required', 'string'],
            'source_others' => ['nullable', 'string'],
            'permanent_source_of_income' => ['required', 'string'],
            'permanent_source_of_income_if_yes' => ['nullable', 'string'],
            'regular_support_from_family' => ['required', 'string'],
            'type_of_support_cash' => ['required', 'string'], 
            'type_of_support_in_kind' => ['required', 'string'],
            'illness' => ['required', 'string'],
            'illness_if_yes' => ['nullable', 'string'],
            'hospitalized' => ['required', 'string'],
            'date_submitted' => ['required', 'string'],
            'received_by' => ['nullable', 'string'],
            'with_maintenance' => ['required', 'string'],
            'with_maintenance_if_yes' => ['nullable', 'string'],
            'authorized_representative_name_1' => ['nullable', 'string'],
            'authorized_representative_relation_1' => ['nullable', 'string'],
            'authorized_representative_name_2' => ['nullable', 'string'],
            'authorized_representative_relation_2' => ['nullable', 'string'],
            'authorized_representative_name_3' => ['nullable', 'string'],
            'authorized_representative_relation_3' => ['nullable', 'string'],
            'assesment' => ['nullable', 'string'],
            'intervieded_by' => ['nullable', 'string'],
            'dswd_e_signature' => ['nullable', 'string'],
        ]);

        $application = ApplicationForm::create([
            'user_id' => Auth::user()->preapplication->id,
            'last_name' =>$request->last_name,
            'first_name' =>$request->first_name,
            'middle_name' =>$request->middle_name,
            'citizenship' =>$request->citizenship,
            'house_number' =>$request->house_number,
            'street' =>$request->street,
            'barangay' =>$request->barangay,
            'city_municipality' =>$request->city_municipality,
            'province' =>$request->province,
            'age' =>$request->age,
            'gender' =>$request->gender,
            'civil_status' =>$request->civil_status,
            'birthdate' =>$request->birthdate,
            'birthplace' =>$request->birthplace,
            'living_arrangement' =>$request->living_arrangement,
            'pensioner' =>$request->pensioner,
            'pensioner_if_yes' =>$request->pensioner_if_yes,
            'source' =>$request->source,
            'source_others' =>$request->source_others,
            'permanent_source_of_income' =>$request->permanent_source_of_income,
            'permanent_source_of_income_if_yes' =>$request->permanent_source_of_income_if_yes,
            'regular_support_from_family' =>$request->regular_support_from_family,
            'type_of_support_cash' =>$request->type_of_support_cash,
            'type_of_support_in_kind' =>$request->type_of_support_in_kind,
            'illness' =>$request->illness,
            'illness_if_yes' =>$request->illness_if_yes,
            'hospitalized' =>$request->hospitalized,
            'date_submitted' =>$request->date_submitted,
            'received_by' =>$request->received_by,
            'with_maintenance' =>$request->with_maintenance,
            'with_maintenance_if_yes' =>$request->with_maintenance_if_yes,
            'authorized_representative_name_1' =>$request->authorized_representative_name_1,
            'authorized_representative_relation_1' =>$request->authorized_representative_relation_1,
            'authorized_representative_name_2' =>$request->authorized_representative_name_2,
            'authorized_representative_relation_2' =>$request->authorized_representative_relation_2,
            'authorized_representative_name_3' =>$request->authorized_representative_name_3,
            'authorized_representative_relation_3' =>$request->authorized_representative_relation_3,
            'assesment' =>$request->assesment,
            'intervieded_by' =>$request->intervieded_by,
            'dswd_e_signature' =>$request->dswd_e_signature,
            'status' =>'1', 
        ]);

        $user_id = Auth::user()->id;
        $status = RegistrationForm::where('user_id', $user_id)->first();
        $status->allowed_level = '4';
        $status->save();

        Alert::success('Your Application Form is Successfuly Saved!, please wait for the assesment','success')->autoClose(10000);;
        return redirect('/user-dashboard');
    }
   
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        
    }

    
    public function update(Request $request, $id)
    {
        
    }

  
    public function destroy($id)
    {
        
    }
}
