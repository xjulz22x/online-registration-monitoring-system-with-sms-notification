<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\IdentifyingInformation;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use RealRashid\SweetAlert\Facades\Alert;

class seniorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seniors = User::role('senior')->paginate(10);
        return view('frontend.admin.senior.seniorList', compact('seniors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.admin.senior.adminAddSenior');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
           'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'role_id'=> ['nullable'],
            'phone_number' => ['required', 'numeric', 'digits:11', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ])->assignRole('senior');
        Alert::success('System Alert', 'Successfully Created Senior Account!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seniors = User::findOrFail($id);
        return view('frontend.admin.senior.viewSeniorInfo' , compact('seniors'));
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
    public function destroy(Request $request)
    {
        $removeSenior = User::findorfail($request->id);
        $removeSenior->delete();
        Alert::error('Deleted', 'Deleted Successfully');
        return redirect()->back()->with('message', 'Deleted Successfully');
    }

    public function destroySenior(Request $request)
    {
        $removeSenior = User::findorfail($request->id);
        $removeSenior->delete();
        Alert::error('Deleted', 'Deleted Successfully');
        return redirect()->back()->with('message', 'Deleted Successfully');
    }

    public function decline(Request $request)
    {
        $decline = IdentifyingInformation::where('id', $request->id)->first();
        $decline->status = '2';
        $decline->save();

        Alert::success('Senior Application has been successfully declined!','success')->autoClose(5000);
        return redirect('/pending-accounts');
    }

    public function restore(Request $request)
    {
        $restore = IdentifyingInformation::where('id', $request->user_id)->first();
        $restore->status = '0';
        $restore->save();

        Alert::success('Senior Application has been successfully restored!','success')->autoClose(5000);
        return redirect('/declined-accounts');
    }
}
