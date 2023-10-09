@extends('admin.master')

@section('title')
   Brand-Manage
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
                    <h4 class="card-title">Brand Manage</h4>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped border">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Brand Name</th>
                                    <th>Brand Description</th>
                                    <th>Brand Image</th>
                                    <th>Publication Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($brands as $brand)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$brand->name}}</td>
                                <td>{{$brand->description}}</td>
                                <td><img src="{{asset($brand->image)}}" alt="" height="70" width="70"></td>
                                <td>{{$brand->status == 1 ? 'Published':'Unpublished'}}</td>
                                <td>
                                    <a href="{{route('brand.edit',$brand->id)}}" class="btn btn-sm btn-success"><i class="ti-pencil"></i></a>
                                    <a href="{{route('brand.destroy',$brand->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure Delete This?')"><i class="ti-trash"></i></a>
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