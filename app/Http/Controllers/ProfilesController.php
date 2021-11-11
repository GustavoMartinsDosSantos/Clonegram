<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    
    public function index(\App\Models\User $user)
    {

        return view(
            'profiles.index',
            compact(
                'user'
            )
        );
    }

    public function edit(\App\Models\User $user)
    {
        $this->authorize('update', $user->profile);
        return view(
            'profiles.edit',
            compact(
                'user'
            )
        );
    }

    public function update(\App\Models\User $user)
    {
        $this->authorize('update', $user->profile);
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => 'image',
        ]);

        if(request('image'))
        {
            $imagePath = request('image')->store('storage', 'public');
            
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $data['image'] = $imagePath;
        }
        
        auth()->user()->profile->update($data);

        return(redirect("/profile/{$user->id}"));
    }
}
