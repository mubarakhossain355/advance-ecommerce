@extends('admin.master')

@section('title')
    Order Information
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
                    <h4 class="card-title py-4">Order Information</h4>
                    <hr>

                    <form action="{{route('admin.order.update',['id' => $order->id])}}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-md-3">Customer Info</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control"  value="{{$order->customer->name.'('.$order->customer->mobile.')'}}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3">Order ID</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control"  value="{{$order->id}}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3">Order Total</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{$order->order_total}}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3">Order Status</label>
                            <div class="col-md-9">
                                
                                <select name="order_status" class="form-control">
                                    <option value="Pending" {{$order->order_status == 'Pending' ? 'selected' : ''}} >Pending</option>
                                    <option value="Processing" {{$order->order_status == 'Processing' ? 'selected' : ''}}>Processing</option>
                                    <option value="Complete" {{$order->order_status == 'Complete' ? 'selected' : ''}}>Complete</option>
                                    <option value="Cancel" {{$order->order_status == 'Cancel' ? 'selected' : ''}}>Cancel</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3">Delivery Address</label>
                            <div class="col-md-9">
                                <textarea name="delivery_address" class="form-control" >{{$order->delivery_address}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3"></label>
                            <div class="col-md-9">
                               <input type="submit" class="btn btn-success w-100" value="Update Order">
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
@endsection