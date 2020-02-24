@extends('layouts/app')
@section('content')

<div class="card card-default">
    <div class="card-header">

    <?php 
        if(isset($post))
            echo 'Edit Post';
        
        else
            echo 'Create Post';
    ?>
    </div>
</div>

<div class="card-body">

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <?php if (isset($post)): ?>
        <input type="hidden" class="form-control" name="post_id" id="post_id" value="{{  $post->id }}">
        <?php endif; ?>
        
 

        <div class="form-group">
            <label for="published_at">Date</label>
            <input type="published_at" class="form-control" name="published_at" id="published_at">
        </div>

            <div class="form-group">

                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ isset($post) ? $post->title : '' }}">
            </div>

            <div class="form-group">

                <label for="description">Description</label>
                <textarea type="text" class="form-control" name="description" cols="5" rows="6" id="description">{{ isset($post) ? $post->description : '' }}</textarea>
            </div>

            <div class="form-group">
                <label for="contnet">Content</label>
                <input id="contnet" type="hidden" name="content">
                <textarea type="text" class="form-control" name="content" cols="10" rows="12" id="contnet" >{{ isset($post) ? $post->content : '' }}</textarea>
            </div>


            <div class="form-group">
                <label for="image">Image file</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>

            <div class="form-group">
                <label for="user_id">Author</label>
                <select type="text" class="form-control" name="user_id" id="user_id"   accept="image/png, image/jpeg" value="{{ isset($post) ? $post->user_id : '...' }}">
                    @foreach($users as $user)
                        <option  value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach

                </select>
            </div>
          

            <div class="form-group">
                <label for="category_id">Category</label>
                <select type="text" class="form-control" name="category_id" id="category_id" value="{{ isset($post) ? $post->category_id : '...' }}">
                    @foreach($categories as $category)
                        <option  value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach

                </select>
            </div>

            
            <div class="form-group">

            <button type="submit" class="btn btn-primary">
                <?php 
                    if(isset($post))
                        echo 'Update';
                    
                    else
                        echo 'Publish';
                ?>
            </button>

            </form>



            </div>


    </form>


</div>





@endsection

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>


@endsection


@section('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">

@endsection