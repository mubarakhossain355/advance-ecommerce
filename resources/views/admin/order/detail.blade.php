@extends('admin.master')

@section('title')
    Order Detail
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
                    <h4 class="card-title">Customer Info</h4>
                    <div class="table-responsive m-t-40">
                        <table  class="table table-striped table-hover border">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Customer Email</th>
                                    <th>Customer Mobile</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                          
                            <tr>
                                <td>{{$order->customer->name}}</td>
                                <td>{{$order->customer->email}}</td>
                                <td>{{$order->customer->mobile}}</td>
                                
                               
                            </tr>
                          
                                
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        

    </div>
@endsection