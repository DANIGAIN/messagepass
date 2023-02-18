<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Models\User ;
Use Hash;

class CustomAuthController extends Controller
{   
    public function login()
    {
        return view('auth.login');
    }
    public function registration()
    {
        return view('auth.registration');
    }
    public function registerUser(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:12|min:5',
        ]);
        

        $user = new User();
        $user->name = $request->name ;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $req = $user->save();
        if($req)
        {
              return redirect()->route('logIn');
        }else
        {
             return back()->with('fail','something wrong');
        }
        
    }
    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|max:12|min:5',
        ]);
        $user = User::where('email','=',$request->email)->first();
        if($user)
        {
            if(Hash::check($request->password , $user->password)){
                $request->session()->put('loginId',$user->id);
                return redirect()->route('chat');

            }else{
                return back()->with('fail','Password not match');
            }

        }else
        {
            return back()->with('fail','This email is not registered');
        }
    }


    public function dashboard()
    {
         $data = array();
         if(Session::has('loginId'))
         {
            $data = User::where('id','=',Session::get('loginId'))->first();
            
         }
         return view('livewire/chat/dashboard',compact('data'));
    }
    public function logOut()
    {
        if(Session::has('loginId'))
        {
            Session::pull('loginId');
            return redirect()->route('logIn');
        }
    }
}
