@extends('admin.master')

@section('title')
    Category-Manage
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{Session::get('success')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <h4 class="card-title">Category Manage</h4>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped border">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Category Name</th>
                                    <th>Category Description</th>
                                    <th>Category Image</th>
                                    <th>Publication Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->description}}</td>
                                <td><img src="{{asset($category->image)}}" alt="" height="70" width="70"></td>
                                <td>{{$category->status == 1 ? 'Published':'Unpublished'}}</td>
                                <td>
                                    <a href="{{route('category.edit',$category->id)}}" class="btn btn-sm btn-success"><i class="ti-pencil"></i></a>
                                    <a href="{{route('category.destroy',$category->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure Delete This?')"><i class="ti-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                                
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection