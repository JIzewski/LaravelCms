@extends('layouts/app')
@section('content')

<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-12">
                    
                                    
                                <div class = "card card-default">

                                        <div class="card-header">
                                            <div class="title m-b-md">
                                                <h1 class="text-center my-5">Posts</h2>
                                            </div>
                                        </div>
                                        <div class="card-body">

                                            <div class="d-flex justify-content-end mb-2">
                                                <a href="{{ route('posts.create') }}" class="btn btn-primary" style="float: right; color: white;">Create Post<a>
                                             </div>
                                        </div>

                                        <div class="card card-default">
                                    
                                            <div class="card-body">

                                            @if($posts->count() == 0)
                                                <p>No posts in library</p>
                                            @else

                                                <table class="table">

                                                    <thead>
                                                    
                                                        <th>Image</th>
                                                        <th>Title</th>
                                                        <th>Author</th>
                                                        <th>Categories</th>
                                                    </thead>

                                                    <tbody>

                                                    
                                                

                                                        @foreach($posts as $post)
                                                            <tr>

                                                                <td><img src="{{ asset($post->image) }}" width="200px" height="90px" alt="alt text"></td>

                                                                <td>{{ $post->title }}</td>
                                                                <td>{{ $post->user->name }}</td>

                                                                <td>
                                                                <ul>
                                                                    @foreach($post->categories as $category)
                                                                        <li>{{ $category->name}}</li>
                                                                    @endforeach
                                                                </ul>
                                                                </td>
                                                                

                                                               

                                                                <td>
                                                                    <div class="btn-group">
                                                                            <a href ="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Preview</a>
                                                                            @if(!$post->trashed())
                                                                                    <a href ="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                                                                            @else
                                                                                <form action="{{ route('restore-posts', $post->id) }}" method="POST">
                                                                                    @csrf
                                                                                    @method('PUT')
                                                                                        <button  type="submit" class="btn btn-primary>Restore</button>
                                                                                </form>
                                                                        @endif
                                                                    
                                                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="btn btn-danger">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button  type="submit" class="btn btn-danger">
                                                                                {{   $post->trashed() ? 'Delete Permanently' :  'Delete'}}
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </td>

                                                         
                                                            </tr>

                                                        @endforeach

                                                    </tbody>

                                                </table>
                                            
                                            @endif
                                            </div>
                                        
                                        </div>
        </div>

    </div>
</div>
@endsection