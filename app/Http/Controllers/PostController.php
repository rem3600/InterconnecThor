<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //save post to database
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $post = new Post([
            'title' => $request->input('title'),
            'description' => $request->input('description')
        ]);

        $post->user_id = Auth::id();

        $post->save();

        // Check if the previous URL is the user profile page
        $yourProfileUrl = route('your-profile');
        if (url()->previous() == $yourProfileUrl) {
            return redirect($yourProfileUrl)->with('success', 'Successfully created post!');
        }

        // Redirect to the homepage
        return redirect(route('home'))->with('success', 'Successfully created post!');
    }



    //show all posts
    public function home()
    {
        // Retrieve all posts from the database sort decent by id
        $posts = Post::with('user')->orderBy('id', 'desc')->get();
        // Pass the posts data to the home view
        return view('home', compact('posts'));
    }

    // show followed users posts
    public function getFollowedUsersPosts()
    {
        $user = Auth::user();

        // Get the user ids of the users that the logged-in user is following
        $followingUserIds = $user->following->pluck('id')->toArray();

        // Add the logged-in user's id to the array
        $followingUserIds[] = $user->id;

        // Retrieve the followed users' posts and the logged-in user's posts
        $posts = Post::whereIn('user_id', $followingUserIds)->orderBy('created_at', 'desc')->get();

        // Return a view with the posts
        return view('home', compact('posts'));
    }

    // search for posts
    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and description columns from the posts table
        // Search in the name, first_name and last_name columns from the users table
        $posts = Post::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->orWhereHas('user', function($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('first_name', 'LIKE', "%{$search}%")
                    ->orWhere('last_name', 'LIKE', "%{$search}%");
            })
            ->get();

        // Return the home view with the resuls compacted
        return view('home', compact('posts'));
    }

}