@extends('Admin/Theme/main')
@section('content')
                
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">SubCategory</h3></div>
                                <div class="card-body">
                                @foreach($subcat as $sub)
                                    <form method="POST" action="{{route('subcategory.update',$sub->id)}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    @method('PATCH')
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputFirstName">Select Category Name</label>
                                                        <select name="category_id" class="form-control" >
                                                            <option value="">Select Category</option>
                                                            @foreach($cat as $row)
                                                                <option value="{{$row['id']}}">{{$row['category_name']}}</option>
                                                            @endforeach
                                                        </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputFirstName">Sub-Category Name</label>
                                                        <input class="form-control" value="{{$sub['subcategory_name']}}" type="text"  name="subcategory_name" required/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputFirstName">Sub-Category Image(Only PNG file)</label>
                                                        <div><img src="{{asset($sub['image'])}}" value="{{$sub['image']}}" height="55px" width="65px" /></div>
                                                        <input type="file" class="form-control" name="image" required/>
                                                </div>
                                            </div>
                                        </div>
                                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
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