<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;



class Postcontroller extends Controller
{
    // Store a new post
    public function ourstore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $post = new Post;
        $post->name = $request->name;
        $post->description = $request->description;
        $post->image = $imageName;
        $post->save();

        return redirect()->route('Dashboard')->with('success', 'Your post is created.');
    }

    // Update existing post
    public function updatedata($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
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

    // Delete a post
    public function Deletedata($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('Dashboard')->with('success', 'Your post is deleted.');
    }
}
