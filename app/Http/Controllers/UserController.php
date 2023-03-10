<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function register(){
        $roles  = Role::all();
        return view('setting.user.create',compact('roles'));
    }

    public function register_action(Request $request){

        $request->validate([
            'role' => 'required',
            'username' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
            
            
            
        ]);

        $user = new User;
        $user->username = $request->username;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = "sales";
        $user->address = "Depok";
        $user->city = "Jakarta";
        $user->country  =  "indonesia";
        $user->assignRole($request->role);
    
        $user->save();

        return redirect()->route('setting.user')->with('success', 'Registration success. Please login!');

    }

    public function editUser($id)
    {
        $user = User::find($id);
        $role = Role::all();

        return view('setting.user.edit',compact('user','role'));

    }

    public function updateUser(Request $request, $id)
    {
        // $request->validate([
            
        // ]);

        $user = User::find($id);
        $user->username = $request->username;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->city = $request->city;
        $user->country  = "Indonesia";
        $user->role = "sales";
        $user->about = $request->about;
        $user->syncRoles($request->role);
    
        $user->save();

        return redirect()->route('setting.user')->with('success', 'User Berhasil Di Update !!');
    }

    public function deleteUser($id)
    {
        $user = user::find($id);
        $user->delete();
        return redirect()->route('setting.user')->with('success', 'Data Berhasil Di Hapus !!');
    }

    public function login(){
        $data['title'] = 'Login';
        return view('auth.login');
    }

    public function login_action(Request $request){
        $request->validate([
            'userEmail' => 'required',
            'userPassword' => 'required'

        ]);

        if (Auth::attempt(['email' => $request->userEmail, 'password' => $request->userPassword])) {
            $request->session()->regenerate();
            if(Auth::user()->role == 'sales'){
                return redirect()->route('user.profile',Auth::user()->id)->with('success', 'Login Berhasil !!');
            }
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }

    public function profile($id)
    {

        // Grafik By Sales
        // Progress By Sales
        $progress_by_sales = Customer::where('user_id',$id)->get();




        $user =  User::find($id);
        $customer_by_sales = Customer::where('user_id', $id)->get()->sortBy('asc')->take(5);
        //return $user;
        return view('setting.user.profile', compact('user','customer_by_sales'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
