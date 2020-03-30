@extends('layouts/app')

@section('content')

<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    
                                    
                                <div class = "card card-default">

                                        <div class="card-header">
                                            <div class="title m-b-md">
                                                <h1 class="text-center my-5">Tags</h2>
                                            </div>
                                        </div>
                                        <div class="card-body">

                                            <div class="d-flex justify-content-end mb-2">
                                                <a href="{{ route('tags.create') }}" class="btn btn-primary" style="float: right; color: white;">Create Tag<a>
                                             </div>

                                            @if($tags->count() <= 0)
                                                <p>No tags in library</p>
                                            @else
                    
                                        
                                            <table class="table">

                                                <thead>
                                                    <th>Name</th>
                                                </thead>

                                                <tbody>

                                                @foreach($tags as $tag)
                                                                <tr>
                                                                
                                                                    
                                                                    <td>
                                                                        {{ $tag->name }}
                                                                    </td>

                                                                    <td>
                                                                        <a href="{{ route('tags.edit' , $tag->id) }}" class="btn btn-info btn-sm" style="color: white;">Edit<a>
                                                                        <button class="btn btn-danger btn-sm" style="color: white;" onclick="handleDelete({{ $tag->id }})">Delete</button>

                                                                   </td>
                                                             
                                                                
                                                            
                                                                </tr>
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>

                                            

                                                <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" id="deleteTagForm">

                                                @csrf
                                                    @method('DELETE')
                                                   
                                                        
                                                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="deleteModalLabel">Warning</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Are you sure you want to delete this tag? This action cannot be undone.<p> 
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                </form>
                                               
                                               @endif

                                            </div>

                                
                                    </div>
                                        
                           
                    </div>
            </div>
    </div>
</div>
@endsection

@section('scripts')

    <script>

            function handleDelete(id)
            {

                var form = document.getElementById('deleteTagForm')

                form.action = 'tags/' + id

                //console.log('deleting ', form)

                $('#deleteModal').modal('show')
            }

    </script>

@endsection

<<<<<<< HEAD
=======
<!--Jimmy-Izewski-testing-->
>>>>>>> testing
