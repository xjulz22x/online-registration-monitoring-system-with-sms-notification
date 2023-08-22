<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\IdentifyingInformation;
use App\Models\Payouts;

class adminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countStaffs = User::role('staff')->count();
        $countSeniors = IdentifyingInformation::where('status' , 1)->count();
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        $countPosts = Post::count();
        $countPendingSeniors = IdentifyingInformation::where('status', 0)->count();
        // $countPayouts = Payouts::get()->groupBy(['payout_month' , 'payout_year']);
    //    dd($countPayouts);
        $countAllSeniors = IdentifyingInformation::count();
        $countPayouts = Payouts::selectRaw('id ,payout_month, payout_year')
                        ->orderby('payout_year', 'desc')
                        ->get()->groupBy('payout_year');
        $countNewSeniors = IdentifyingInformation::orderBy('created_at', 'desc')->take(10)->get();
        return view('frontend.admin.dashboard.adminDashboard', compact('countStaffs', 'countSeniors', 'countAllSeniors', 'countNewSeniors' , 'posts' , 'countPosts' , 'countPendingSeniors', 'countPayouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
