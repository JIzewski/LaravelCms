@extends('layouts/app')
@section('content')




<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    
                                    
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

                                                <table class="table">

                                                    <thead>
                                                    
                                                        <th>Image</th>

                                                        <th>Title</th>

                                                        <th>Author</th>
                                                    </thead>

                                                    <tbody>

                                                        @foreach($posts as $post)
                                                            <tr>

                                                                <td><img src="{{ asset($post->image) }}" width="200px" height="90px" alt="text"></td>

                                                                <td>{{ $post->title }}</td>
                                                                <td>{{ $post->user->name }}</td>
                                                                <td><a href ="posts/{{ $post->id }}/edit" class="btn btn-primary btn-md">Edit</a></td>
                                                                <td>
                                                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="btn btn-danger">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button  type="submit" class="btn btn-danger btn-sm">Delete</button>
</button>                                                            </form>
                                                                </td>

                                                         
                                                            </tr>

                                                        @endforeach

                                                    </tbody>

                                                </table>
                                            
                                            
                                            </div>
                                        
                                        </div>
        </div>

    </div>
</div>
@endsection