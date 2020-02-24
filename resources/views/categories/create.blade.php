@extends('layouts/app')
@section('content')


<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    
                                <div class = "card card-default">

                                    <div class="card-header">
                                        {{ isset($category) ? 'Edit Category' : 'Create category' }}
                                    </div>

                                        <div class="card-body">

                                            <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
                                                @csrf

                                               @if( isset($category))
                                                 @method('PUT');
                                                @endif

                                                <div class="form-group">
                                                    <label for="name" style="float: left;">Name</label>
                                                    <input type="text" id="name" class="form-control" name="name" value="{{ isset($category) ? $category->name : ''}}">
                                                </div>


                                                <div class="form-group">
                                                    <button class="btn btn-success" style="float: left;">
                                                        {{ isset($category) ? 'Update Category' : 'Add Category' }}
                                                    </button>
                                                </div>

                                            </form>
                                        

                                            <ul class="list-group">

                                   
                                            </ul>

                                        </div>
                                
                            </div>
                    </div>
            </div>
    </div>
</div>


@endsection



