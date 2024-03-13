<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;

class MainController extends Controller
{

    //Tests
    public function tests(){

        return view('/tests/tests');

    }

    //Homepage
    public function home(){

        return view('home');

    }

    //Be a parter page
    public function bePartner(){

        return view('company');

    }

    //Be a messenger page
    public function beMessenger(){

        return view('messenger');

    }

    //Contacts page
    public function contacts(){

        return view('contacts');

    }

    //Login page
    public function login(){

        return view('/auth/login');

    }

    //User login with credentials
    public function submitLogin(Request $request){
 
        // Field validation
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // try authenticate
        if (Auth::attempt($credentials)) {

            //get role of user
            $user = Auth::user();

            //Choose dashboard acordingly
            if ($user->role === 'client') {

            return redirect()->route('client.dashboard');

            } elseif ($user->role === 'company') {

                return redirect()->route('company.dashboard');

            } elseif ($user->role === 'messenger') {

                return redirect()->route('messenger.dashboard');

            } else {
                //Unknown role
                return redirect()->route('/');
            }

        }
        // failed
        return back()->withErrors([
            'Error' => 'Credenciais erradas.',
        ]);

    }

    //Logout user
    public function submitLogout(){

         Auth::logout();
        return redirect('/');

    }


    //Register page
    public function register(){

        return view('/auth/register');

    }
    
    //Register user function
    public function registerUser(Request $request){

        $request->validate([

            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required',
            'role'=>'required'

        ]);

        $data = new User;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->role = $request->role;
        $data->save();
        return redirect()->back();

    }

    //Update profile
    public function updateProfile(Request $request){

        $data = User::find($request->id);

        $data->name = $request->name;
        $data->address1 = $request->address1;
        $data->address2 = $request->address2;
        $data->city = $request->city;
        $data->cp = $request->cp;
        $data->country = $request->country;
        $data->phone1 = $request->phone1;
        $data->phone2 = $request->phone2;
        $data->nif = $request->nif;
        $data->email = $request->email;

        $image = $request->image;

        if($image){

            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('images/profiles',$imagename);
            $data->image = $imagename;

        }

        $data->save();
        return redirect()->back();
    }


    //Client dashboard
    public function clientDashboard(){

        // Redirect for correct dashboard if tries to manually access other dashboard
        if (Auth::user()->role !== 'client') {
            
            return view('/'.Auth::user()->role.'/dashboard');

        }

        return view('/client/dashboard');

    }

    //Messenger dashboard
    public function messengerDashboard(){

        // Redirect for correct dashboard if tries to manually access other dashboard
        if (Auth::user()->role !== 'messenger') {
            
            return view('/'.Auth::user()->role.'/dashboard');

        }

        return view('/messenger/dashboard');

    }

    //Show order detaisl-common page to all users
    public function showorderdetails($id){

        $order = Order::find($id);
        return view('orderdetails',compact('order'));

    }
    

}
