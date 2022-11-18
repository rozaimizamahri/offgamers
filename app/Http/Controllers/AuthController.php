<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers; 
use Carbon\Carbon; 

class AuthController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
    */    

    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function getRegister(Request $request){
        $email = $request->session()->get('email');
        if(!$email){
            return view('register');
        }else{
            return redirect('home');
        }	
    }  

    public function register(Request $request){  

        $name        = $request->get('name'); 
        $email       = $request->get('email'); 
        $password    = $request->get('password'); 

        $users = User::where('email','=', $email )->get(); 
        if(count($users) > 0)
        {  
            return back()->with('msg_failed', 'Account already exists.'); 
        } else {  
            
            User::insert([  
                'name'                  => $name, 
                'email'                 => $email,
                'password'              => $password,
                'active'	            => 'Y',
                'created_by_name'	    => $name,
                'created_by_email'	    => $email,
                'created_by_date' 	    => now(),
                'updated_status' 	    => 'N',
                'updated_count' 	    => '0'
            ]); 
    
            return redirect('/login'); 
             
        } 
         
    }

    public function getLogin(Request $request){
        $email = $request->session()->get('email');
        if(!$email){
            return view('login');
        }else{
            return redirect('home');
        }	
    }  

    public function login(Request $request){  

        $email       = $request->get('email'); 
        $password    = $request->get('password'); 

        $users = User::where('email','=', $email )  
            ->where('password',$password)
            ->where('active','=', 'Y' )  
            ->get(); 
        if(count($users) > 0)
        {  
            foreach($users as $user){
                $user_id    = $user->id;
                $name       = $user->name;
                $email      = $user->email;
            }   

            $request->session()->put('user_id', $user_id);
            $request->session()->put('name', $name);
            $request->session()->put('email', $email);  

            User::where('id',$user_id)
                                    ->update(
                                                [
                                                    'last_login'    => Carbon::now()
                                                ]
                                            ); 
            return redirect('/home'); 
            return true;  
            
        } else {   
            return back()->with('msg_failed', 'Invalid username and password.'); 
        } 
         
    }

    public function logout(Request $request){
        
        $user_id     = $request->session()->get('user_id'); 
        
        User::where('id',$user_id)
                                ->update(['last_logout'=>  Carbon::now()]);
                               
        $request->session()->forget('email'); 
        $request->session()->forget('name'); 
        $request->session()->flush();
        $request->session()->regenerate(true);

        
        return redirect('/login');
    }
}
