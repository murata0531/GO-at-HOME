<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        
        $user = \Auth::user();
        

        $family_query = \DB::table('families')
        ->join('members', 'families.id', '=', 'members.family_id')
        ->where('members.user_id', '=', $user->id)
        ->select('families.*')
        ->orderBy('id', 'asc');

        $family = $family_query->get();
        
        $request_data  = $request->input('familyid',"notstring");

        if($request_data = "notstring"){
            $first_family = $family_query->first();
        }else {
            $first_family = $family_query->where('families.id', '=', $request->input('familyid'))->first();

        }
        
        $family_user = \DB::select('select * from users,members,families,tuzukigaras where users.id = members.user_id and members.family_id = families.id and  tuzukigaras.id = members.tuzukigara_id and members.user_id = ? order by users.id asc',[$first_family->id]);
       
        return view('home',compact('user','family','first_family','family_user'));
    }
}
