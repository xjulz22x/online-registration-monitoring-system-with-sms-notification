<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\IdentifyingInformation;
use App\Models\FamilyComposition;
use App\Models\EconomicStatus;
use App\Models\HealthAndCondition;
use App\Models\PreApplicationForm;
use App\Models\Barangay;
use App\Models\Assesment;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class GeneralIntakeSheetController extends Controller
{
   
  
    public function createIdentifyingInformation()
    {
        

        if(Auth::user()->identifying == null)
        {
        $barangays = Barangay::get();
        return view('frontend.users.identifying-information.identifying-information' , compact('barangays'));
       
        }
        else
        {
            return abort(403 , 'cant access this page');
        
        }
    }

    public function createFamilyComposition()
    {
        

           $family = FamilyComposition::where('user_id' , Auth::user()->id);
           
          return view('frontend.users.family-compostion.family-composition' , compact('family'));
        
    }

     public function createEconomicStatus()
    {
        

        if(Auth::user()->economic == null)
        {
          return view('frontend.users.economic-status.economic-status');
        }
        else
        {
            return abort(403 , 'cant access this page');
        }
    }

     public function createHealthCondition()
    {
       

         if(Auth::user()->health == null)
        {
           return view('frontend.users.health-condition.health-condition');
        }
        else
        {
            return abort(403 , 'cant access this page');
        }
    }


  
    public function storeIdentifyingInformation(Request $request)
    {
          $request->validate([
            'user_id' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'first_name' => ['required', 'string'],
            'middle_name' => ['required', 'string'],
            'phone_number' => ['required' , 'unique:identifying_information'],
            'citizenship' => ['required', 'string'],
            'house_number' => ['nullable', 'string'],
            'street' => ['required', 'string'],
            'barangay_id' => ['required', 'string'],
            'city_municipality' => ['required', 'string'],
            'province' => ['required', 'string'],
            'age' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'civil_status' => ['required', 'string'],
            'religion' => ['required', 'string'],
            'birthdate' => ['required', 'string'],
            'birthplace' => ['required', 'string'],
            'educational_attainment' => ['nullable', 'string'],
            'listahanan' => ['nullable', 'string'],
            'pantawid_beneficiary' => ['nullable', 'string'],
            'indigenous_people' => ['nullable', 'string'],
            'senior_citizen_organization' => ['nullable', 'string'],
            'others' => ['nullable', 'string'],
            'osca' => ['nullable', 'string'],
            'tin' => ['nullable', 'string'],
            'gsis' => ['nullable', 'string'],
            'sss' => ['nullable', 'string'],
            'philhealth' => ['nullable', 'string'],
            'id_number_others' => ['nullable', 'string'],
            'living_arrangement' => ['nullable', 'string'],
            
        ]);

        $identifyingInformation = IdentifyingInformation::create($request->all());
        toast('Successfully Saved!','success')->autoClose(6000);
        return redirect()->route('create-family-composition');
    }


    public function storeFamilyComposition(Request $request)
    {
            $user_id = $request->user_id;
            $fullname = $request->fullname;
            $relationship = $request->relationship;
            $age = $request->age;
            $status = $request->status;
            $occupation = $request->occupation;

        for ($i=0; $i < count($fullname) ; $i++) { 
                $savedata = [
                    'user_id' => $user_id[$i],
                    'fullname' =>  $fullname[$i],
                    'relationship' => $relationship[$i],
                    'age' =>  $age[$i],
                    'status' =>  $status[$i],
                    'occupation' =>  $occupation[$i],
                ];
            $familyComposition = FamilyComposition::create($savedata);
        }
        toast('Successfully Saved!','success')->autoClose(6000);
        return redirect()->route('create-economic-status');
    }

    public function storeEconomicStatus(Request $request)
    {
           $request->validate([
            'user_id' => ['required', 'string'],
            'pensioner' => ['required', 'string'],
            'pensioner_if_yes' => ['nullable', 'string'],
            'source' => ['required', 'string'],
            'source_others' => ['nullable', 'string'],
            'permanent_source_of_income' => ['required', 'string'],
            'permanent_source_of_income_if_yes' => ['nullable', 'string'],
            'regular_support_from_family' => ['required', 'string'],
            'type_of_support_cash' => ['required', 'string'],
            'type_of_support_in_kind' => ['required', 'string'],
        ]);

        $economic = EconomicStatus::create($request->all());
        toast('Successfully Saved!','success')->autoClose(6000);
        return redirect()->route('create-health-condition');
    }


      public function storeHealthCondition(Request $request)
    {
           $request->validate([
            'user_id' => ['required', 'string'],
            'has_existing_illness' => ['required', 'string'],
            'has_existing_illness_if_yes' => ['nullable', 'string'],
            'hospitalized' => ['required', 'string'],
            'with_maintenance' => ['required', 'string'],
            'with_maintenance_if_yes' => ['nullable', 'string'],
        ]);

        $economic = HealthAndCondition::create($request->all());
        Alert::success('Your Application Form is Successfuly Saved!, You may now go to OSCA office for Assesment','success')->autoClose(10000);
        return redirect('/user-dashboard');
    }


      public function updateDocument(Request $request, $id)
    {
         $request->validate([
            'mothers_maiden_name' => ['required', 'string'],
            'monthly_income' => ['required', 'string'],
            'total_person_in_the_house' => ['required', 'string'],
            // 'senior_picture_1x1' => ['required', 'mimes:jpeg,png,bmp'],
            // 'barangay_indigency' => ['required', 'mimes:jpeg,png,bmp'],
            // 'birth_cert_or_others' => ['required', 'mimes:jpeg,png,bmp'],
            // 'senior_citizen_id' => ['required', 'mimes:jpeg,png,bmp'],
            // 'senior_signature' => ['required', 'mimes:jpeg,png,bmp'],
        ]);

        $updateThis = PreApplicationForm::where('user_id', $id)->first();
        $updateThis->update($request->all());
        toast('Successfully Updated!','success')->autoClose(6000);
        return back();
    }

    
      public function updateIdentifying(Request $request, $id)
    {
         $request->validate([
            'last_name' => ['required', 'string'],
            'first_name' => ['required', 'string'],
            'middle_name' => ['required', 'string'],
            'citizenship' => ['required', 'string'],
            'house_number' => ['nullable', 'string'],
            'street' => ['required', 'string'],
            'barangay_id' => ['required', 'string'],
            'city_municipality' => ['required', 'string'],
            'province' => ['required', 'string'],
            'age' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'civil_status' => ['required', 'string'],
            'religion' => ['required', 'string'],
            'birthdate' => ['required', 'string'],
            'birthplace' => ['required', 'string'],
            'educational_attainment' => ['nullable', 'string'],
            'listahanan' => ['nullable', 'string'],
            'pantawid_beneficiary' => ['nullable', 'string'],
            'indigenous_people' => ['nullable', 'string'],
            'senior_citizen_organization' => ['nullable', 'string'],
            'others' => ['nullable', 'string'],
            'osca' => ['nullable', 'string'],
            'tin' => ['nullable', 'string'],
            'gsis' => ['nullable', 'string'],
            'sss' => ['nullable', 'string'],
            'philhealth' => ['nullable', 'string'],
            'id_number_others' => ['nullable', 'string'],
            'living_arrangement' => ['nullable', 'string'],
            
        ]);


        $updateThis = IdentifyingInformation::where('user_id', $id)->first();
        $updateThis->update($request->all());
        toast('Successfully Updated!','success')->autoClose(6000);
        return back();
    }

      public function updateEconomic(Request $request, $id)
    {
         $request->validate([
            'pensioner' => ['required', 'string'],
            'pensioner_if_yes' => ['nullable', 'string'],
            'source' => ['required', 'string'],
            'source_others' => ['nullable', 'string'],
            'permanent_source_of_income' => ['required', 'string'],
            'permanent_source_of_income_if_yes' => ['nullable', 'string'],
            'regular_support_from_family' => ['required', 'string'],
            'type_of_support_cash' => ['required', 'string'],
            'type_of_support_in_kind' => ['required', 'string'],
        ]);

        $updateThis = EconomicStatus::where('user_id', $id)->first();
        $updateThis->update($request->all());
        toast('Successfully Updated!','success')->autoClose(6000);
        return back();
    }

      public function updateHealth(Request $request, $id)
    {
           $request->validate([
            'has_existing_illness' => ['required', 'string'],
            'has_existing_illness_if_yes' => ['nullable', 'string'],
            'hospitalized' => ['required', 'string'],
            'with_maintenance' => ['required', 'string'],
            'with_maintenance_if_yes' => ['nullable', 'string'],
        ]);

        $updateThis = HealthAndCondition::where('user_id', $id)->first();
        $updateThis->update($request->all());
        toast('Successfully Updated!','success')->autoClose(6000);
        return back();
    }

       public function updateAssesment(Request $request, $id)
    {
         $request->validate([
            'assesment' => ['required', 'string'],
            'authorized_representative_name_1' => ['nullable', 'string'],
            'authorized_representative_relation_1' => ['nullable', 'string'],
            'authorized_representative_name_2' => ['nullable', 'string'],
            'authorized_representative_relation_2' => ['nullable', 'string'],
            'authorized_representative_name_3' => ['nullable', 'string'],
            'authorized_representative_relation_3' => ['nullable', 'string'],
            'interviewed_by' => ['required', 'string'],
        ]);

        $updateThis = Assesment::where('user_id', $id)->first();
        $updateThis->update($request->all());
        toast('Successfully Updated!','success')->autoClose(6000);
        return back();
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
