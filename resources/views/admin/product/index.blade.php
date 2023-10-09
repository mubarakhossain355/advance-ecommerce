@extends('admin.master')

@section('title')
    Product-Manage
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
                    <h4 class="card-title">Product Manage</h4>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped border">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Product Name</th>
                                    <th>Code</th>
                                    <th>Stock Amount</th>
                                    <th>Product Image</th>
                                    <th>Publication Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->code}}</td>
                                <td>{{$product->stock_amount}}</td>
                                <td><img src="{{asset($product->image)}}" alt="" height="70" width="70"></td>
                                <td>{{$product->status == 1 ? 'Published':'Unpublished'}}</td>
                                <td>
                                    <a href="{{route('product.detail',$product->id)}}" class="btn btn-sm btn-info"><i class="ti-layers-alt"></i></a>
                                    <a href="{{route('product.edit',$product->id)}}" class="btn btn-sm btn-success"><i class="ti-pencil"></i></a>
                                    <a href="{{route('product.destroy',$product->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure Delete This?')"><i class="ti-trash"></i></a>
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