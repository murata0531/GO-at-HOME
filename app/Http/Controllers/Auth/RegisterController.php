<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

//使用するテーブル//
use App\User;
use App\Member;
use App\Family;
use App\Tuzukigara;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        if($data['inlineRadioOptions'] == 'option1'){

            return Validator::make($data, [
                'name.*' => ['required', 'string', 'max:255'],
                'email.*' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'password.*' => ['required', 'string', 'min:8'],
                'password_confirmation.*' => ['required','same:password.*'],
                'family-name' => ['required'],
                // 'family-id' => ['required'],
                'relations.*' => ['required'],
            ],[

                'email.*.unique' => "無効なメールアドレスです",
                // 'password.*.regex' => "複雑なパスワードを入力してください",
                'password.*.min' => "パスワードは8文字以上で入力してください",
                'password_confirmation.*.same' => "パスワードが一致しません",
                // 'relations.*.min' => "選択してください",
            
            ]);
        }else {

            return Validator::make($data, [
                'name.*' => ['required', 'string', 'max:255'],
                'email.*' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'password.*' => ['required', 'string', 'min:8'],
                'password_confirmation.*' => ['required','same:password.*'],
                // 'family-name' => ['required'],
                'family-id' => ['required', 'exists:families,id'],
                'relations.*' => ['required'],
            ],[

                'email.*.unique' => "無効なメールアドレスです",
                'password.*.min' => "パスワードは8文字以上で入力してください",
                'password_confirmation.*.same' => "パスワードが一致しません",
                // 'relations.*.min' => "選択してください",
            
            ]);
        }
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);

        $familycount = count($data['name']);
        $famly_temp_id;

        $final_user;

        for($i = 0; $i <= $familycount -1; $i++){

            $user = User::create([
                'name' => $data['name'][$i],
                'email' => $data['email'][$i],
                'password' => Hash::make($data['password'][$i]),
            ]);
            
            if($i == 0){
                $final_user = $user;
            }
    
            $sdata = '';
    
            switch ($data['relations'][$i]){
    
                case '1' : $sdata = 1;
                    break;
                case '2' : $sdata = 2;
                    break;
                case '3' : $sdata = 3;
                    break;
                case '4' : $sdata = 4;
                    break;
                case '5' : $sdata = 5;
                    break;
                case '6' : $sdata = 6;
                    break;
            };
    
    
    
            if($data['inlineRadioOptions'] == 'option1'){
    
                if($i == 0){
                    $family = Family::create([
                        'family_name' => $data['family-name'],
                    ]);
        
                    Member::create([
        
                        'user_id' => $user->id,
                        'family_id' => $family->id,
                        'tuzukigara_id' => $sdata,
            
                    ]);
                } else {
                    Member::create([
        
                        'user_id' => $user->id,
                        'family_id' => $family->id,
                        'tuzukigara_id' => $sdata,
            
                    ]);
                }
            }else {
    
    
                Member::create([
    
                    'user_id' => $user->id,
                    'family_id' => $data['family-id'],
                    'tuzukigara_id' => $sdata,
        
                ]);
            }
        }
        

        return $final_user;
    }
}