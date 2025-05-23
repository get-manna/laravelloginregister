<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class Postcontroller extends Controller
{
 public function create()
    {
        return view('create');
    }

    public function ourstore(request $request)
    {

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);


        $post = new post;
        $post->name = $request->name;
        $post->description = $request->description;
        $post->image = $imageName;

        $post->save();

        return redirect()->route('Dashboard')->with('success', 'your post is created ');
    }


    public function editdata($id)
    {
        $post = post::findOrFail($id);
        return view('editdata', ['post' => $post]);
    }


    public function updatedata($id, Request $request)
{

    $validatedData = $request->validate([
        'name' => ['required'],
        'description' => ['required'],
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $post = Post::findOrFail($id);
    $post->name = $request->name;
    $post->description = $request->description;


    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $post->image = $imageName; 
    }

    $post->save();

    return redirect()->route('Dashboard')->with('success', 'Your post is updated.');
}




public function Deletedata($id)
{
    $post = Post::findOrFail($id);
    $post->delete(); 

    return  redirect()->route('Dashboard')->with( 'success', 'Your post is deleted.');
}


};