@extends('backend.Admin.layouts.app')
@section('title','Create Food Order')
@section('content')
@push('css')
<style>
    .list-group .active {
        background-color: #4A1D8C;
    }
</style>
@endpush
<div id="content" class="content">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Add Food Order </h4>
            <div class="panel-heading-btn">

                <a href="{{ route('admin.foodorder.index') }}" class="btn  btn-primary">
                    Back To Order List
                </a>
            </div>
        </div>
        <div class="panel-body">
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div>{{$error}}</div>
            @endforeach
            @endif
            <!-- User Modal -->
            <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('admin.foodorder.adduser')}}" method="post">
                            @csrf

                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name"><strong>Name <sup class="text-danger">*</sup></strong></label>
                                    <input type="text" id="name" name="name" placeholder="Name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="email"><strong>Email <sup class="text-danger">*</sup> </strong></label>
                                    <input type="email" id="email" name="email" placeholder="Email" class="form-control" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <form action="{{ route('admin.foodorder.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4">
                                <div class="list-group" id="list-tab" role="tablist">
                                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">All</a>
                                    @php
                                    $ids = '';
                                    @endphp
                                    @foreach($categories as $item)
                                    @php
                                    $ids = $ids.','.$item->id;
                                    @endphp
                                    <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="#i{{$item->id}}" role="tab" aria-controls="home">{{$item->name}}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-8">

                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                                        <div class="row">
                                            @foreach($foods as $food)
                                            <div class="col-4">
                                                <div class="card" id="cardImg" data-toggle="modal" data-target="#dd{{$food->id}}">
                                                    <input type="hidden" id="cardfoodid" value="{{$food->id}}">
                                                    <img height="70px" src="{{asset(''.$food->image)}}" class="card-img-top" alt="...">
                                                    <div class="card-body p-1">
                                                        <p style="font-size:12px" class="card-title text-center">{{$food->name}}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal -->
                                            <div class="modal fade" id="dd{{$food->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <input type="hidden" id="foodid" value="{{ $food->id}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form>
                                                            <input type="hidden" name="_token" id="carttoken" value="{{ Session::token() }}" />
                                                            <input type="hidden" id="foodid" value="{{ $food->id}}">
                                                            <div class="modal-body">
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Item Information</th>
                                                                            <th width="30%">Qty</th>
                                                                            <th>Price</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>{{$food->name}}</td>
                                                                            <td><input type="number" id="qty" class="form-control" value="1"></td>
                                                                            <td>{{$food->price}}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" id="addToCart" class="btn btn-primary addToCart">Add To Cart</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @php
                                    $datas = explode(',', $ids);
                                    $datas = array_slice($datas, 1);
                                    @endphp
                                    @foreach($datas as $key => $data)
                                    <div class="tab-pane fade show" id="i{{$data}}" role="tabpanel" aria-labelledby="list-home-list">
                                        <div class="row">
                                            @foreach(App\Models\Food::foodByCatId($data) as $food)
                                            <div class="col-4">
                                                <div class="card" data-toggle="modal" data-target="#a{{$key}}{{$food->id}}{{$loop->index}}">
                                                    <img height="70px" src="{{asset(''.$food->image)}}" class="card-img-top" alt="...">
                                                    <div class="card-body p-1">
                                                        <p style="font-size:12px" class="card-title text-center">{{$food->name}}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal -->
                                            <div class="modal fade" id="a{{$key}}{{$food->id}}{{$loop->index}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <input type="hidden" id="foodid" value="{{ $food->id}}">

                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form>
                                                            <input type="hidden" name="_token" id="carttoken" value="{{ Session::token() }}" />
                                                            <div class="modal-body">
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Item Information</th>
                                                                            <th width="30%">Qty</th>
                                                                            <th>Price</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>{{$food->name}}</td>
                                                                            <td><input type="number" id="qty" class="form-control" value="1"></td>
                                                                            <td>{{$food->price}}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" id="addToCart" class="btn btn-primary addToCart">Add To Cart</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            @endforeach
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="row pb-3 mb-3" style="border-bottom:2px dashed #ddd;">
                            <div class="col-6">
                                <div class="form-group">
                                    <label> <strong> User</strong></label>
                                    <div class="row">
                                        <select name="user_id" id="user_id" class="form-control col-7 pl-2">
                                            @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="col-5">
                                            <button type="button" class="btn btn-sm btn-primary py-2" data-toggle="modal" data-target="#addUser">Add User</button>
                                        </div>
                                    </div>

                                    <small class="form-text text-danger">{{ $errors->first('user_id') }}</small>
                                </div>
                            </div>




                            <!-- <div class="col-6">
                                <div class="form-group">
                                    <label> <strong> Customer Name</strong></label>
                                    <input type="text" name="customer_name" value="{{old('customer_name')}}" class="form-control" placeholder="Customer name">
                                    <small class="form-text text-danger">{{ $errors->first('customer_name') }}</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label><strong>Customer Phone</strong></label>
                                    <input type="text" name="mobile" value="{{old('mobile')}}" class="form-control" placeholder="Customer Phone">
                                    <small class="form-text text-danger">{{ $errors->first('mobile') }}</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label><strong>Customer Address</strong></label>
                                    <input type="text" name="address" value="{{old('address')}}" class="form-control" placeholder="Customer Address">
                                    <small class="form-text text-danger">{{ $errors->first('address') }}</small>
                                </div>
                            </div> -->
                            <div class="col-6">
                                <div class="form-group">
                                    <label><strong>Table No</strong></label>
                                    <select name="table_no" id="table_no" class="form-control">
                                        <option value="1">Table One</option>
                                        <option value="2">Table Two</option>
                                        <option value="3">Table Three</option>
                                        <option value="4">Table Four</option>
                                        <option value="5">Table Five</option>
                                        <option value="6">Table Six</option>
                                        <option value="7">Table Seven</option>
                                        <option value="8">Table Eight</option>
                                        <option value="9">Table Nine</option>
                                        <option value="10">Table Ten</option>
                                    </select>
                                    <small class="form-text text-danger">{{ $errors->first('table_no') }}</small>
                                </div>
                            </div>
                            <div class="col-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Qty</th>
                                            <th class="text-center">Total</th>
                                            <th class="text-center" width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach(Cart::content() as $item)
                                        <tr>
                                            <td>{{$item->name}}</td>
                                            <td class="text-center">{{$item->price}}</td>
                                            <td class="text-center"><a href="{{route('admin.increment.cart', $item->rowId)}}"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                </a>{{$item->qty}} <a href="{{route('admin.decrement.cart', $item->rowId)}}"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td>
                                            <td class="text-center">{{$item->total}}</td>
                                            <td class="text-center"><a href="{{route('admin.delete.cart', $item->rowId)}}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-5">

                            </div>
                            <div class="col-7">
                                <div class="form-group">
                                    <label><strong>Service Charge</strong></label>
                                    <input type="number" id="servicecharge" name="service_charge" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label><strong>Vat</strong></label>
                                    <input type="number" id="vat" name="vat" value="{{Cart::tax()}}" disabled class="form-control">
                                </div>
                                <div class="form-group">
                                    <label><strong>Total</strong></label>
                                    <input type="number" id="total" name="total" value="{{Cart::total()}}" disabled class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>


            </form>
            </table>
        </div>
    </div>
</div>
@push('js')
<script type="text/javascript">
    $(document).ready(function() {
        // $("#cardImg").click(function() {
        //     $cardfoodid = $("cardfoodid").val();
        //     $.ajax({
        //         url: "{{route('admin.food.cart')}}",
        //         type: 'POST',
        //         data: {
        //             foodid: foodid,
        //             qty: qty,
        //             _token: carttoken,
        //         },
        //         success: function(res) {
        //             location.reload();
        //         }
        //     })
        // });


        $('.addToCart').click(function() {
            var foodid = $('.show > #foodid').val();
            var carttoken = $("#carttoken").val();
            var qty = $("#qty").val();
            $.ajax({
                url: "{{route('admin.food.cart')}}",
                type: 'POST',
                data: {
                    foodid: foodid,
                    qty: qty,
                    _token: carttoken,
                },
                success: function(res) {
                    location.reload();
                }
            })
        });



    });
</script>
@endpush
@endsection