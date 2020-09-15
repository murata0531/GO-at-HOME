<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Auth;

use Redirect;
use Validator;
use Illnminate\Validation\Roule;
use Illuminate\Support\Facades\Hash;
 use App\User;

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
        
            
        \DB::table('users')
        ->where('id', \Auth::user()->id)
        ->update(['final_login' => now()]);


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

        $family_user = \DB::select('select * from users,members,families,tuzukigaras where users.id = members.user_id and members.family_id = families.id and  tuzukigaras.id = members.tuzukigara_id and members.family_id = ? order by users.id asc',[$first_family->id]);
        
        return view('home',compact('user','family','first_family','family_user'));
    }

    public function store(Request $request)

    {
        
        
        if($request->has('setting_email')){
            
            $request->validate([
                'setting_email' => ['email','max:50','unique:users,email'],
            
            ],[
                'setting_email.unique' => "無効なメールアドレスです",
            ]);
        }


        if($request->has('setting_password')){
            
            $request->validate([
                'setting_password' => ['required','min:8','unique:users,password'],
                'setting_password2' => 'required | same:setting_password',            
            ],[
                'setting_password.min' => "パスワードが短すぎます",
                'setting_password2.same' => "パスワードが一致しません",
                'setting_password.unique' => "無効なパスワードです",
            
            ]);
        }

        
        if($request->has('setting_name')){
            
            $setting_name = $request->setting_name;

            \DB::table('users')
            ->where('id', \Auth::user()->id)
            ->update(['name' => $setting_name]);
        }

        if($request->has('setting_email')){

            $setting_email = $request->setting_email;

            \DB::table('users')
            ->where('id', \Auth::user()->id)
            ->update(['email' => $setting_email]);
        }
        
        if($request->has('setting_password')){

            $setting_password = Hash::make($request->setting_password);

            \DB::table('users')
            ->where('id', \Auth::user()->id)
            ->update(['password' => $setting_password]);
        } 
        
        return redirect('/home');

    }
}
