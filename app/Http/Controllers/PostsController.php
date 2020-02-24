<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use App\Category;
use App\http\Requests\Posts\CreatePostsRequest;


use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('posts.index')->with('posts', Post::with('user')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $categories = Category::all();
        return view('posts.create', compact('users', 'categories'));
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(CreatePostsRequest $request)
    {

        //upload image to storage.
        $image = $request->image->store('posts');

        if(isset($request->post_id))
        {
            Post::find($request->post_id)->update([

                'title' => $request->title,
                'description' => $request->description,
                'content' => $request->content, 
                'image'=> $image,
                'user_id' => $request->user_id
            ]);


            return redirect(route('posts.index'));
        }
      
        else
        {
            Post::create([

                'title' => $request->title,
                'description' => $request->description,
                'content' => $request->content, 
                'image'=> $image,
                'user_id' => $request->user_id
    
            ])
                ->categories()
                ->attach($request->category_id);

        
            session()->flash('success', 'Post created successfully');

            return redirect(route('posts.index'));

        }

    

        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $users = User::all();
        $categories = Category::all();
        
        return view('posts.create', compact('post', 'users', 'categories'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Post $post)
    {
        $users = User::all();
        $categories = Category::all();
        
       // return view('posts.create', compact('post', 'users', 'categories'));

       //return view('posts.create')->with('post', $post);
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

     

        if($post->trashed())
        {
            $post->forceDelete();
        }
        else
        {
            $post->delete();
        }

        session()->flash('success', 'Post deleted successfully');

        return redirect(route('posts.index'));
    }

      /**
     * Display trahed posts. 
     */

    public function trashed()
{ 
    //$trash = Post::withTrashed()->get(); 

    return view('posts.index')->with('posts', Post::withTrashed()->get());

}
}



