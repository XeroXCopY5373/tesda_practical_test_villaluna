<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index() {

        $blogs = Blogs::all();

        return view('blogs', compact('blogs'));
    }

    public function create(Request $request) {

        try {
            $request->validate([
                'title' => 'required|string',
                'content' => 'required|string',
                'image_path' => 'required|file|image|mimes:jpeg,jpg|max:2048'
            ]);

            Blogs::create([
                'title' => $request->get('title'),
                'content' => $request->get('content'),
                'image_path' => $request->file('image_path') ? Storage::disk('public')->put('images',$request->image_path) : null
            ]);

            return redirect()->route('dashboard')->with('success', 'added successfully');
            }
        catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function read_blogs() {
        $blogs = Blogs::all();

        return view('read_blogs', compact('blogs'));
    }

    public function update_blogs($id) {
        $blogs = Blogs::find($id);

        return view('update_blog', compact('blogs'));
    }

    public function update_blog_process(Request $request, $id) {

        try {
            $blog = Blogs::find($id);

            $request->validate([
                'title' => 'required|string',
                'content' => 'required|string',
                'image_path' => 'required|file|image|mimes:jpeg,jpg|max:2048'
            ]);

            $blog->update([
                'title' => $request->get('title'),
                'content' => $request->get('content'),
                'image_path' => $request->file('image_path') ? Storage::disk('public')->put('images',$request->image_path) : null
            ]);

            return redirect()->route('read_blogs')->with('success', 'updated successfully');
        }
        catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete_blog($id) {
        $blog = Blogs::find($id);

        $blog->delete();

        return redirect()->route('read_blogs')->with('success', 'deleted successfully');
    }
}
