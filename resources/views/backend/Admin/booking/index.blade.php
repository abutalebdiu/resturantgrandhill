@extends('backend.Admin.layouts.app')
@section('title','Room Book list')
@section('content')

@push('css')
<style>
    .room-buttons {
        padding: 20px;
        text-align: center;
        border: 1px solid #ddd;
        margin: 0 10px;
        cursor: pointer;
    }

    .dropdown-menu {
        min-width: 6rem;
    }
</style>
@endpush
@section('content')
<div id="content" class="content">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Search Available Room</h4>
        </div>
        <div class="panel-body">
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div>{{$error}}</div>
            @endforeach
            @endif

            <form action="{{ route('admin.booking.index') }}" class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label>Check in</label>
                            <input type="date" name="checkin" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" value="{{ request('checkin') }}" class="form-control checkin" required>
                            <div class="invalid-feedback">
                                The check in date is required.
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Check out </label>
                            <input type="date" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" name="checkout" value="{{ request('checkout') }}" class="form-control checkout" required>
                            <div class="invalid-feedback">
                                The check out date is required.
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mt-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mt-4"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                        </div>
                    </div>
                </div>
            </form>


            @if (request('checkout'))
            <div class="row">
                <div class="col-12 col-md-7">
                    @foreach($roomfloors as $roomfloor)
                    <p class="bg-gray text-white p-2" style="">{{ $roomfloor->name }}</p>
                    <div class="row">
                        @foreach($roomfloor->rooms as $room)
                        @if ($room->not_available)
                        <div class="col-12 col-md-1 {{ $room->is_rent ? 'bg-danger':'bg-warning' }} text-white font-weight-bold room_book d-flex room-buttons">
                            {{ $room->room_no }}
                        </div>
                        @else
                        <div onclick="showModal({{ $room->id }})" class="col-12 col-md-1 bg-green text-white font-weight-bold room_book d-flex room-buttons">
                            {{ $room->room_no }}
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <br>
                    @endforeach

                </div>
                <div class="col-12 col-md-5">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-secondary text-light">
                                <tr>
                                    <th>SL</th>
                                    <th>Room No</th>
                                    <th>No. of Person</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="tbody">

                            </tbody>
                        </table>
                    </div>
                    <div class="col text-center">
                        <button onclick="bookNow()" class="btn btn-primary">Book Now</button>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h3 class="panel-title">Booking List</h3>
        </div>
        <div class="panel-body">
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div>{{$error}}</div>
            @endforeach
            @endif
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Room No</th>
                            <th>Total Amount</th>
                            <th>Payment Status</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->billinginfo->name }}</td>
                            <td>{{ $booking->billinginfo->mobile }}</td>
                            <td>{{ Carbon\Carbon::parse($booking->checkin)->format('d M y') }}</td>
                            <td>{{ Carbon\Carbon::parse($booking->checkout)->format('d M y') }}</td>
                            <td>
                                @foreach ($booking->bookingDetail as $detail)
                                {{ $detail->room->room_no }}{{ $loop->last ? "":',' }}
                                @endforeach
                            </td>
                            <td>৳ {{ $booking->original_amount }}</td>
                            <td>
                                <div style="cursor: pointer" class="badge {{ $booking->still_dues > 0 ? 'badge-danger':'badge-primary' }}">
                                    @if ($booking->still_dues > 0)
                                    <span onclick="addPayment({{ $booking->id }})">Due</span>
                                    @else
                                    Paid
                                    @endif
                                </div>
                            </td>
                            <td>
                                @if ($booking->booking_type == 'booking')
                                <div class="badge badge-warning">
                                    Booking
                                </div>
                                @elseif ($booking->booking_type == 'rent')
                                <div class="badge badge-green">
                                    Rent
                                </div>
                                @elseif ($booking->booking_type == 'cancle')
                                <div class="badge badge-danger">
                                    Cancle
                                </div>
                                @endif
                            </td>

                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu4">
                                        <a style="cursor: pointer" href="{{route('admin.final.invoice', $booking->user_id)}}" class="nav-link text-dark">Invoice</a>

                                        <a style="cursor: pointer" target="_blank" href="{{ route('admin.print.show', $booking->id) }}" class="nav-link text-dark">Print</a>

                                        @if ($booking->booking_type == 'booking')
                                        <a style="cursor: pointer" onclick="confirm('Are you sure want to do this?') ? href='{{ route('admin.chnagetype.update', $booking->id) }}':false" class="nav-link text-dark">Rent</a>
                                        @endif

                                        <a style="cursor: pointer" href="{{ route('admin.booking.show', $booking->id) }}" class="nav-link text-dark">Details</a>

                                        <a style="cursor: pointer" onclick="confirm('Are you sure want to do this?') ? href='{{ route('admin.bookingcancle', $booking->id) }}':false" class="nav-link text-dark">Cancel</a>

                                        <a style="cursor: pointer" onclick="del()" class="nav-link text-dark">Delete</a>
                                    </ul>
                                </div>
                            </td>
                            <form id="del-form" action="{{ route('admin.booking.destroy', $booking->id) }}" method="post" class="d-inline-block">
                                @csrf
                                @method('delete')
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@include('backend.includes.payment-modal')
@include('backend.includes.booked-modal')

@endsection

@push('js')
<script>
    function del() {
        if (confirm('Are you sure want to do this?')) {
            $("#del-form").submit();
        } else {
            return 0;
        }
    }
</script>

<script>
    cartItems()

    $(".checkin").on('change', function() {
        var checkin = $('.checkin').val();
        var checkout = `{{ Carbon\Carbon::now()->addDay()->format('Y-m-d') }}`;
        $(".checkout").attr("min", checkout);
        $('.checkout').val(checkout);
    });

    function cartItems() {
        $(".tbody").empty();
        $.ajax({
            url: `{!! route('admin.carts.index') !!}`,
            success: function(res) {
                $.each(res, function(key, item) {
                    $('.tbody').append(
                        `
                            <tr>
                                <td>${key+1}</td>
                                <td>${item.room.room_no}</td>
                                <td>${item.person}</td>
                                <td>${item.payable_amount}</td>
                                <td class="text-danger">
                                    <a style="cursor: pointer;" onclick="deleteItem(${item.id})">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            `
                    )
                });
            },
            error: function(e) {
                console.log(e);
                // toastr.error('These credentials do not match our records.')
            }
        });
    }

    function deleteItem(id) {
        var url = `{!! route('admin.carts.index') !!}/${id}`
        $.ajax({
            method: 'delete',
            url: url,
            success: function(res) {
                toastr.success('This item has been deleted')
                cartItems()
            },
            error: function(e) {
                console.log(e);
                // toastr.error('These credentials do not match our records.')
            }
        });
    }
</script>

@include('backend.includes.validation')
@endpush