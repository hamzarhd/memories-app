<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use foo\bar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users=User::where("isAdmin",0)->get();
        return view('users.index', ['users' => $users,'notif' =>""]);
    }




    public function AddUser()
    {
        return view("users.add_user");
    }
    public function edit(User $user)
    {
        return view('users.edit_user',['user' => $user]);
    }

    public function EditUser(Request $request)
    {
        $user=User::find($request->id);
        if ($user)
        return view("users.edit_user",['user' => $user]);
        else
            return redirect()->route('user.index');
    }

    public function RegisterUser(Request $request)
    {
        $postdata = file_get_contents("php://input");

        $validator = Validator::make($request->all(), [

            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if ($validator->fails()) {
            return back()->with(['errors'=>$validator->errors()]);
        }


        $verify = User::where("email",$request->email)->first();


            $user = User::create([
                "name" => $request->fullname,
                "email" => $request->email ,
                "password" => bcrypt($request->password),
                "api_token" => Password::getRepository()->createNewToken(),
                "isAdmin" => 0,
                "age" => $request->age ,
                "gender" => $request->gender ,
                "country" => $request->country ,
            ]);

            if($user){
                auth()->login($user);
                return view('welcome');
                
            }else{
                return response()->json([
                    'error' => true
                ],200);
            }

    }


    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')
            ->with('success','User deleted successfully');
    }


    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
        if ($validator->fails()) {
            return back()->with(['errors'=>$validator->errors()]);
        }

        $user =User::where("email",$request->email)->get()->first();
        $user->update($request->all());

        return redirect()->route('user.index')
            ->with('success','User updated successfully');
    }



    public function password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if ($validator->fails()) {
            return back()->with(['errors'=>$validator->errors()]);
        }
        $user=User::where("email",$request->email)->get()->first();
        $user->update(['password' => Hash::make($request->get('password'))]);

        return redirect()->route('user.index')
            ->with('success','Password updated successfully');
    }
}
