@extends('backend.Admin.layouts.app')
@section('title','Room Book')
@push('css')
    <style>
        .room-buttons {
            padding: 20px;
            text-align: center;
            border: 1px solid #ddd;
            margin:0 10px;
            cursor: pointer;
        }
    </style>
@endpush
@section('content')
<div id="content" class="content">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Create Book</h4>
            <div class="panel-heading-btn">
                <a href="{{ route('admin.booking.index') }}" class="btn  btn-primary">
                    Back To Booking
                </a>
            </div>
        </div>
        <div class="panel-body">
            @if ($errors->any())
	            @foreach ($errors->all() as $error)
	                <div>{{$error}}</div>
	            @endforeach
	        @endif

            <form action="{{ route('admin.booking.create') }}" class="needs-validation" novalidate>
                {{--  @csrf  --}}
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label>Check in</label>
                            <input type="date" name="checkin" value="{{ request('checkin') }}" class="form-control" required>
                            <div class="invalid-feedback">
                                The check in date is required.
                            </div>
                        </div>
                    </div>
					<div class="col-4">
                        <div class="form-group">
                            <label>Check out</label>
                            <input type="date" name="checkout" value="{{ request('checkout') }}" class="form-control" required>
                            <div class="invalid-feedback">
                                The check out date is required.
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mt-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mt-4">Submit</button>
                        </div>
                    </div>
                </div>
            </form>


      		<div class="row">
        		<div class="col-12 col-md-7">
        		@foreach($roomfloors as $roomfloor)
        			<p class="bg-gray text-white p-2" style="">{{ $roomfloor->name }}</p>
        			<div class="row">
        				@foreach($roomfloor->rooms as $room)
                            @if ($room->is_available)
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
                        <tbody>

                        </tbody>
                    </table>

                    <div class="col text-center">
                        <button onclick="bookNow()" class="btn btn-primary">Book Now</button>
                    </div>
        		</div>
        	</div>
        </div>
    </div>
</div>

@include('backend.includes.booked-modal')

@endsection

@push('js')

    <script>

        cartItems()

        function cartItems() {
            $("tbody").empty();
            $.ajax({
                url: `{!! route('admin.carts.index') !!}`,
                success: function(res) {
                    console.log(res)
                    $.each( res, function( key, item ) {
                        $('tbody').append(
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

    <script>
        (function() {
        'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
                });
            }, false);
        })();
    </script>

@endpush
