<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class postController extends Controller
{
    
    public function index()
    {
        
    }

   
    public function create()
    {
        return view('frontend.admin.posts.adminAddPost');
    }

   
    public function store(Request $request)
    {
           $request->validate([
           'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            'post_image' => ['nullable', 'mimes:jpeg,png,bmp'],
        ]);
        if($request->hasFile('post_image'))
        {
        
        $post_image = Auth::user()->id.''.Auth::user()->first_name.'-'.time().rand(1,1000).'.'.$request->post_image->getClientOriginalName();
        $request->post_image->move(public_path('uploads/posts/image'), $post_image );

        $user = Auth::user()->id;
        $post = Post::create([
            'author_id' => Auth::user()->id,
            'title' =>$request->title,
            'content' =>$request->content,
            'post_image' =>$post_image,
        ]);
        toast('Posted Successfully!','success')->autoClose(6000);;
        return redirect('/admin-dashboard');

        }
        else
        {
        $user = Auth::user()->id;
        $post = Post::create([
            'author_id' => Auth::user()->id,
            'title' =>$request->title,
            'content' =>$request->content,
           
        ]);
        toast('Posted Successfully!','success')->autoClose(6000);;
        return redirect('/admin-dashboard');

        }
        

    }

  
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $getPost = Post::findOrFail($id);
        return view('frontend.admin.posts.editPost', compact('getPost'))->with('getPost', Post::where('id', $id)->first());
    }

  
    public function update(Request $request, $id)
    {
         $request->validate([
           'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            'post_image' => ['nullable', 'mimes:jpeg,png,bmp'],
        ]);

        if($request->hasFile('post_image'))
        {
        
        $post_image = Auth::user()->id.''.Auth::user()->first_name.'-'.time().rand(1,1000).'.'.$request->post_image->getClientOriginalName();
        $request->post_image->move(public_path('uploads/posts/image'), $post_image );

        $post = Post::findOrFail($id);
        $post->update([
            'title' =>$request->title,
            'content' =>$request->content,
            'post_image' =>$post_image,
        ]);
        toast('Post Successfully Updated!','success')->autoClose(6000);
        return redirect('/admin-dashboard');

        }
        else
        {
        $post = Post::findOrFail($id);
        $post->update([
            'title' =>$request->title,
            'content' =>$request->content,
            'post_image' =>$post_image,
        ]);
        toast('Post Successfully Updated!','success')->autoClose(6000);
        return redirect('/admin-dashboard');

        }
    }

    

    public function destroy(Request $request)
    {
        $post = Post::findorfail($request->id);
        $post->delete();
        Alert::error('Deleted', 'Deleted Successfully');
        return redirect()->back()->with('message', 'Deleted Successfully');
    }
}
