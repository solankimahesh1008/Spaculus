<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function index(){
        $users=User::all();
        return view('user',compact('users'));
    }

    public function edit($id){
        $user=User::find($id);
        return view('edit-user',compact('user'));
    }

    public function update(Request $request,$id ){

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email'],
            'profile' => ['image', 'max:2048'],
        ]);

        $user=User::find($id);

        if ($request->hasFile('profile')) {
            // Delete the existing image if present
            if ($user->profile) {
                Storage::disk('public')->delete($user->profile);
            }

            // Upload and store the new image
            $imagePath = $request->file('profile')->store('images', 'public');
            $user->profile = $imagePath;
        }

        $user->first_name =  $request->first_name;
        $user->last_name = $request->last_name;
        $user->email =$request->email;
        $user->gender = $request->gender;
        $user->phone_numbers = $request->phone_numbers;
        $user->date_of_birth = $request->date_of_birth;
        $user->save();

        return redirect()->route('user');

    }

    public function delete($id){
        $user=User::find($id);
        $user->delete();
        return redirect()->back();

    }
}
