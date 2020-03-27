@extends('layouts/app')
@section('content')


<div class="col-md-10">

    <h1 style="text-align: center;">{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>

</div>


@endsection