<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
   
    public function index()
    {
        $userId = Auth::user()->id;
        $getPost = Post::where('author_id', $userId)->orderBy('created_at', 'desc')->take(5)->get();
        return view('frontend.admin.profile.adminProfile' , compact('getPost'));
    }

     public function showProfile()
    {
       
        return view('frontend.users.profile.userProfile');
    }

  
    public function create()
    {
       return view('frontend.admin.profile.editProfile');
    }

   
    public function store(Request $request)
    {
        
    }

   
    public function show($id)
    {
    
     
        
    }


    public function edit($id)
    {
        $getProfile = User::findOrFail($id);
        return view('frontend.admin.profile.editProfile')->with('getProfile', User::where('id', $id)->first());
    }

     public function editUserProfile($id)
    {
        $getUserProfile = User::findOrFail($id);
        return view('frontend.users.profile.editUserProfile')->with('getUserProfile', User::where('id', $id)->first());
    }

    public function update(Request $request, $id)
    {
         $request->validate([
           'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'gender' => ['required', 'string', 'max:25'],
            'phone_number' => ['required', 'numeric' , 'min:11'],
           
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());
        toast('Profile Successfully Updated!','success')->autoClose(6000);
        return redirect('/my-profile');
    }

     public function updateUserProfile(Request $request, $id)
    {
         $request->validate([
           'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'gender' => ['required', 'string', 'max:25'],
            'phone_number' => ['required', 'numeric' , 'min:11'],

        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());
        toast('Profile Successfully Updated!','success')->autoClose(6000);
        return redirect('/profile');
    }

    public function destroy($id)
    {
        
    }
}
