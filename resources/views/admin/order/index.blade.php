@extends('admin.master')

@section('title')
    Order
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
                    <h4 class="card-title">All Order Information</h4>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped table-hover border">
                            <thead>
                                <tr>
                                    <th>SL No</th>
                                    <th>Order NO</th>
                                    <th>Order Date</th>
                                    <th>Customer Info</th>
                                    <th>Order Total</th>
                                    <th>Order Status</th>
                                    <th>Payment Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                           @foreach($orders as $order)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$order->id}}</td>
                                <td>{{$order->order_date}}</td>
                                <td>{{$order->customer->name.'('.$order->customer->mobile.')'}}</td>
                                <td>{{$order->order_total}}</td>
                                <td>{{$order->order_status}}</td>
                                <td>{{$order->payment_status}}</td>
                                <td>
                                    <a href="{{route('admin.order.detail',['id' => $order->id])}}" class="btn btn-sm btn-info" title="View Order Detail"><i class="ti-book"></i></a>
                                    <a href="{{route('admin.order.edit',['id' => $order->id])}}" class="btn btn-sm btn-success" title="Order Edit"><i class="ti-pencil"></i></a>
                                    <a href="{{route('admin.order.invoice',['id' => $order->id])}}" class="btn btn-sm btn-primary" title="View Order Invoice"><i class="ti-infinite"></i></a>
                                    <a href="{{route('admin.order.printInvoice',['id' => $order->id])}}" target="_blank" class="btn btn-sm btn-warning" title="Print Order Invoice"><i class="ti-dropbox"></i></a>
                                    <a href="" class="btn btn-sm btn-danger" title="Delete Order" onclick="return confirm('Are you sure Delete This?')"><i class="ti-trash"></i></a>
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