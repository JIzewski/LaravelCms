@extends('layouts/app')

@section('content')

<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    
                                    
                                <div class = "card card-default">

                                        <div class="card-header">
                                            <div class="title m-b-md">
                                                <h1 class="text-center my-5">Categories</h2>
                                            </div>
                                        </div>
                                        <div class="card-body">

                                            <div class="d-flex justify-content-end mb-2">
                                                <a href="{{ route('categories.create') }}" class="btn btn-primary" style="float: right; color: white;">Create Category<a>
                                             </div>

                                            @if($categories->count() <= 0)
                                                <p>No categories in library</p>
                                            @else
                                            <!--Table for displaying categories-->
                                            <table class="table">

                                                <thead>
                                                    <th>Name</th>
                                                </thead>

                                                <tbody>

                                                @foreach($categories as $category)
                                                                <tr>
                                                                
                                                                    
                                                                    <td>
                                                                        {{ $category->name }}
                                                                    </td>

                                                                    <td>
                                                                        <a href="{{ route('categories.edit' , $category->id) }}" class="btn btn-info btn-sm" style="color: white;">Edit<a>
                                                                        <button class="btn btn-danger btn-sm" style="color: white;" onclick="handleDelete({{ $category->id }})">Delete</button>

                                                                   </td>
                                                             
                                                                
                                                            
                                                                </tr>
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>

                                            

                                                <form action="" method="POST" id="deleteCategoryForm">

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
                                                                        <p>Are you sure you want to delete this category? This action cannot be undone.<p> 
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

                var form = document.getElementById('deleteCategoryForm')

                form.action = 'categories/' + id

                //console.log('deleting ', form)

                $('#deleteModal').modal('show')
            }

    </script>

@endsection