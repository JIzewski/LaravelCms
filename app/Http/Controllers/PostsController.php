<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use App\Category;
use App\Tag;
use App\http\Requests\Posts\CreatePostsRequest;
use App\http\Requests\Posts\UpdatePostRequest;


use Illuminate\Http\Request;

class PostsController extends Controller
{

    //Constructor
    public function __construct()
    {
        $this->middleware('verifyCategoriesCount')->only(['create', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::with('user')->get();
        $categories = Post::with('categories')->get();

        return view('posts.index', compact('posts', 'categories'));
 
     
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
        $tags = Tag::all();

        return view('posts.create', compact('users', 'categories', 'tags'));
      
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

            $post = Post::create([

                'published_at' => $request->published_at, 
                'title' => $request->title,
                'description' => $request->description,
                'content' => $request->content, 
                'image'=> $image,
                'user_id' => $request->user_id,
    
            ])
                ->categories()
                ->attach($request->category_id);

                if($request->tags)
                {
                    $post->tags()->attach($request->tags);
                }

                //Git change in testing branch
                



        
            session()->flash('success', 'Post created successfully');

            //return view('posts.index')->with('posts', Post::with('user')->get());
            return view('posts.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('posts.show')->with('post', Post::find($id));
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
        $tags = Tag::all();

        return view('posts.create', compact('post', 'users', 'categories', 'tags'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(UpdatePostRequest $request, Post $post)
    {
        $users = User::all();
        $categories = Category::all();

        //For security
        //$requst->validated(); 
        $data = $request->only(['title', 'description', 'published_at', 'content', 'category']);

        if ($request->hasFile('image')) {


             //delte image via post method. 
             $post->deleteImage();

            //assign new image
            $image = $request->image->store('posts');
            $data['image'] = $image;

        }

        //Update post record with new data. 
        $post->update($data);
        session()->flash('success', 'Post updated successfully');        

        return view('posts.index')->with('posts', Post::with('user')->get());
        
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
            $post->deleteImage();
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

    return view('posts.index')->with('posts', Post::onlyTrashed()->get());

}

public function restore($id)
{

    $post = Post::withTrashed()->where('id', $id)->firstOrFail();

    //Simply restore post 
    $post->restore();
    session()->flash('success', 'Post restored successfully');
    return redirect()->back();
}


}



