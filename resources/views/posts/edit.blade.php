@extends('layouts/app')
@section('content')

<div class="card card-default">
    <div class="card-header">
        Edit Post
    </div>
</div>

<div class="card-body">

<form action="route('posts.update')" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="published_at">Date</label>
            <input type="published_at" class="form-control" name="published_at" id="published_at">
        </div>

            <div class="form-group">

                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>

            <div class="form-group">

                <label for="description">Description</label>
                <textarea type="text" class="form-control" name="description" cols="5" rows="6" id="description"></textarea>
            </div>

            <div class="form-group">

                <label for="contnet">Content</label>
                <textarea type="text" class="form-control" name="content" cols="10" rows="12" id="contnet"></textarea>

            </div>


            <div class="form-group">
                <label for="image">Image file</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>


            <div class="form-group">
                <label for="user_id">Author</label>
                <select type="text" class="form-control" name="user_id" id="user_id">
                    @foreach($users as $user)
                        <option  value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach

                </select>
            </div>
            

           
            
            <div class="form-group">

            <button type="submit" class="btn btn-primary">Publish</button>

            </form>

</div>

@endsection