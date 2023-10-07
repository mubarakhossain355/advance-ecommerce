@extends('admin.master')

@section('title')
    Edit-Category
@endsection

@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                       
                    <h4 class="card-title">Edit Category</h4>
                    <form class="form-horizontal p-t-20" action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Category Name<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" value="{{$category->name}}" id="exampleInputuname3" placeholder="category name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Category Description <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="description" value="{{$category->description}}" id="exampleInputEmail3" placeholder="category description">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Category Image</label>
                            <div class="col-sm-9">
                                <input type="file" id="input-file-now" name="image" class="dropify" />
                                <img src="{{asset($category->image)}}" alt="" height="70" width="70">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Publication Status</label>
                            <div class="col-sm-9">
                                <label class="me-3"><input type="radio" name="status" value="1" {{$category->status == 1 ? 'checked':''}}>Published</label>
                                <label><input type="radio" name="status" value="2" {{$category->status == 2 ? 'checked':''}}>Unpublished</label>
                            </div>
                        </div>
                        
                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Update Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection