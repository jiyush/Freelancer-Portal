<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Create a new user controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    /**
     * Add user form
     */
    public function addUser(){
        return view('admin.addUser');
    }

    /**
     * Save new user create by Admin
     *
     * @param Request $request type object
     */
    public function saveUser(Request $request){

            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'role' => ['required','string'],
            ]);
            $data = $request->all();
            $user = $this->user->addUser($data);
            if($user){

                return redirect(route('home'));
            }
    }

    /**
     * Show edit user form
     *
     * @param $id user id
     */
    public function editUser(Request $request){
        $user = User::where('id','=',$request->id)->first();
        return view('admin.editUser')->with('user', $user);

    }

    /**
     * Update User
     *
     * @param Request $request
     */
    public function updateUser(Request $request){

        $request->validate([
            'id' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$request->id],
            'role' => ['required','string'],
        ]);

        $data = $request->all();
        $user = $this->user->updateUser($data);
        if($user){

            return redirect(route('home'));
        }
    }

    /**
     *  Delete User
     *
     * @param $id user id
     */
    public function delete(Request $request){
        $this->user->deleteUser($request->id);
        return redirect(route('home'));
    }
}
