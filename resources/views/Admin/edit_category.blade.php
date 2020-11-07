@extends('Admin/Theme/main')
@section('content')
                
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Category</h3></div>
                                <div class="card-body">
                                @foreach($cat as $row)
                                    <form method="POST" action="{{route('category.update',$row->id)}}" >
                                    {{ csrf_field() }}
                                    @method('PATCH')
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputFirstName">Category Name</label>
                                                        <input class="form-control py-4" id="inputFirstName" type="text" name="category_name" value="{{$row->category_name}}" required/>
                                                </div>
                                            </div>
                                        </div>
                                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                    </form>
                                @endforeach
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <br>

@endsection