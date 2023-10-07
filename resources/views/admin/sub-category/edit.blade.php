@extends('admin.master')

@section('title')
    Edit-SubCategory
@endsection

@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit SubCategory</h4>
                    <form class="form-horizontal p-t-20" action="{{route('sub.category.update',$subCategory->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Category Name<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select name="category_id" class="form-select" id="">
                                    <option value="" disabled selected>-- Select Category --</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{$category->id == $subCategory->category_id?'selected':''}}>{{$category->name}}</option>
                                    @endforeach
                                   
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Sub Category Name<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" value="{{$subCategory->name}}" id="exampleInputuname3" placeholder="sub category name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Sub Category Description <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="description" value="{{$subCategory->description}}" id="exampleInputEmail3" placeholder="sub category description">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Sub Category Image</label>
                            <div class="col-sm-9">
                                <input type="file" id="input-file-now" name="image" class="dropify" />
                                <img src="{{asset($subCategory->image)}}" alt="" height="80" width="80">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Publication Status</label>
                            <div class="col-sm-9">
                                <label class="me-3"><input type="radio" name="status" value="1" {{$subCategory->status == 1?'checked':''}}>Published</label>
                                <label><input type="radio" name="status" value="2" {{$subCategory->status == 2?'checked':''}}>Unpublished</label>
                            </div>
                        </div>
                        
                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Update SubCategory</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection