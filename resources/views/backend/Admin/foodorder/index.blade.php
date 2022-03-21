 @extends('backend.Admin.layouts.app')
 @section('title','Food ')
 @section('content')
 <div id="content" class="content">
     <div class="panel panel-inverse">
         <div class="panel-heading">
             <h4 class="panel-title">Food Order </h4>
             <div class="panel-heading-btn">
                 <a href="{{ route('admin.foodorder.create') }}" class="btn  btn-primary">
                     <i class="fa fa-plus"></i> Add New Order
                 </a>
             </div>
         </div>
         <div class="panel-body table-responsive">
             <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">

                 <thead>
                     <tr>
                         <th>Serial</th>
                         <th>Customer Name</th>
                         <th>Mobile</th>
                         <th>Table No</th>
                         <th>Sub Total</th>
                         <th>Service Charge</th>
                         <th>Vat</th>
                         <th>Total</th>
                         <th>Status</th>
                         <th>Payment</th>
                         <th>Action</th>

                     </tr>
                 </thead>

                 <tbody>

                     @foreach($orders as $order)

                     <tr>
                         <td>{{ $loop->iteration }}</td>
                         <td>{{ $order->customer_name }}</td>
                         <td>{{ $order->mobile }}</td>
                         <td>{{ $order->table_no }}</td>
                         <td>{{ $order->sub_total }}</td>
                         <td>{{ $order->service_charge }}</td>
                         <td>{{ $order->vat }}</td>
                         <td>{{ $order->total }}</td>
                         <td>{{$order->status == 1 ? 'prending' : 'Compleated'}}</td>
                         <td>@if($order->payment_status == "unpaid") <a class="btn btn-info btn-sm" href="{{route('admin.payfoodbill', $order->id)}}">Pay Now</a> @else <span class="badge badge-success">Paid</span> @endif</td>
                         <td><a class="btn btn-primary btn-sm" href="{{ route('admin.foodorder.show',$order->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                             <a class="btn btn-primary btn-sm" href="{{ route('admin.foodorder.invoice',$order->id) }}"><i class="fa fa-file-text" aria-hidden="true"></i></a>

                             <form action="{{ route('admin.foodorder.destroy',$order->id) }}" method="post" style="display:inline-block;">
                                 @csrf
                                 @method('delete')
                                 <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                             </form>
                         </td>
                     </tr>
                     @endforeach




                 </tbody>
             </table>
         </div>
     </div>
 </div>



 @section('customjs')


 @endsection
 @endsection