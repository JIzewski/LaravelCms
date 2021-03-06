@extends('layouts/app')
@section('content')


<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    
                                <div class = "card card-default">

                                    <div class="card-header">
                                        {{ isset($tag) ? 'Edit Tag' : 'Create Tag' }}
                                    </div>

                                        <div class="card-body">

                                            <form action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}" method="POST">
                                                @csrf

                                               @if( isset($tag))
                                                 @method('PUT');
                                                @endif

                                                <div class="form-group">
                                                    <label for="name" style="float: left;">Name</label>
                                                    <input type="text" id="name" class="form-control" name="name" value="{{ isset($tag) ? $tag->name : ''}}">
                                                </div>


                                                <div class="form-group">
                                                    <button class="btn btn-success" style="float: left;">
                                                        {{ isset($tag) ? 'Update Tag' : 'Add Tag' }}
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