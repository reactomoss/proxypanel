<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\User;

class ProfileController extends Controller
{
    public function show(Request $request) {
        $userInfo = Auth::user();

        return view('profile', compact('userInfo'));
    }

    public function changeUser(Request $request) {
        $request->validate([
            'userName' => 'required',
            'email' => 'required',
        ]);

        $user = Auth::user();
        $user->name = $request->userName;
        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->email = $request->email;
        $user->skype_id = $request->skype;
        $user->telegram_id = $request->telegram;
        
        try {
            if ($request->file('avatar')) {
                $imagePath = $request->file('avatar');
                $originalName = $imagePath->getClientOriginalName();
                $fileExt = $imagePath->getClientOriginalExtension();
                $uuid = Str::uuid()->toString();
                $imageName = "{$user->id}-{$uuid}.{$fileExt}";
                $user->avatar = $request->file('avatar')->storeAs('avatars', $imageName, 'public');
            }

            $user->save();
        }
        catch (Exception $e) {
            echo '0';
            exit;
        }
        echo '1';
    }
    
}
