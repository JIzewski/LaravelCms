@extends('layouts/app')
@section('content')

<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Category</div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-group">
            
                                @foreach ($errors->all() as $error)
                                    <li class="list-group-item">
                                        {{ $error }}
                                     </li>
                                @endforeach

                            </ul>
                        </div>
                     @endif

                    <form action="store-category" method="POST">
                        @csrf

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="category name" name="name">
                        </div>

                        <div class="form-group">
                        <button type="submit" class="btn btn-success">Add Category</button>

                        </div>


                    </form>
                    

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


