@extends('Admin/Theme/main')
@section('content')
           
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Categories</h1>
                <br>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>Category Details 
                                <a href="category/create" class="btn btn-primary btn-sm" style="float:right;">Add New Category</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Category Name</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cat as $row)
                                        <tr>
                                            <td>{{$row['id']}}</td>
                                            <td>{{$row['category_name']}}</td>
                                            <td><a href="{{route('category.edit',$row['id'])}}" class="btn btn-secondary btn-sm">Edit</a></td>
                                            <td>
                                                <form action="{{route('category.destroy',$row['id'])}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are u Sure to Delete?')" type="submit">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
        </main>

@endsection
