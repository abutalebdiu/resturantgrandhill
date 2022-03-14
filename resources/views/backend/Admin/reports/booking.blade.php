@extends('backend.Admin.layouts.app')
@section('title','Booking Report')

@push('css')
<style>
    .dropdown-menu {
        min-width: 6rem;
    }

    .table thead tr th {
        /* font-size: 13px; */
    }
</style>
@endpush

@section('content')
<div id="content" class="content">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h3 class="panel-title">Booking List</h3>
        </div>
        <div class="panel-body">

            <form action="{{ route('admin.reports.index') }}" class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label>From Date</label>
                            <input type="date" name="from_date" value="{{ request('from_date') }}" class="form-control from_date" required>
                            <div class="invalid-feedback">
                                The from date field is required.
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="{{ request('type') }}" name="type">
                    <div class="col-3">
                        <div class="form-group">
                            <label>To Date</label>
                            <input type="date" name="to_date" value="{{ request('to_date') }}" class="form-control to_date" required>
                            <div class="invalid-feedback">
                                The to date field is required.
                            </div>
                        </div>
                    </div>
                    <div class="col-2 mt-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mt-4"><i class="fa fa-search" aria-hidden="true"></i> Filter</button>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label>Search</label>
                            <input type="text" placeholder="Search number..." id="search_number" class="form-control">
                        </div>
                    </div>
                </div>
            </form>

            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div>{{$error}}</div>
            @endforeach
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Room No</th>
                        <th>Paid Amount</th>
                        {{-- <th>Total Amount</th> --}}
                        <th>Payment Status</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="tbody">
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
                        <td>৳ {{ $booking->paid_amount }}</td>
                        {{-- <td>৳ {{ $booking->original_amount }}</td> --}}
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
                                    <a style="cursor: pointer" target="_blank" href="{{ route('admin.print.show', $booking->id) }}" class="nav-link text-dark">Print</a>
                                    <a style="cursor: pointer" target="_blank" href="{{ route('admin.booking.show', $booking->id) }}" class="nav-link text-dark">Details</a>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('backend.includes.payment-modal')

@endsection

@push('js')

<script>
    $('.from_date').on('change', function() {
        var from_date = $('.from_date').val();
        $(".to_date").attr("min", from_date);
    })

    $('#search_number').on('keydown', function() {
        var number = $('#search_number').val();
        $('.tbody').empty();

        $.ajax({
            url: `{!! route('admin.reports.index') !!}`,
            data: {
                type: 'booking',
                number: number,
            },
            success: function(res) {
                console.log(res)
                $.each(res, function(key, item) {
                    $('.tbody').append(
                        `
                            <tr>
                                <td>${item.id}</td>
                                <td>${item.billinginfo.name}</td>
                                <td>${item.billinginfo.mobile}</td>
                                <td>${item.checkin}</td>
                                <td>${item.checkout}</td>
                                <td></td>
                                <td>৳ ${item.paid_amount}</td>
                                <td>
                                    <div style="cursor: pointer" class="badge ${item.still_dues > 0 ? 'badge-danger':'badge-primary'}">
                                        ${item.still_dues > 0 ? `<span onclick="addPayment(${item.id})">Due</span>`:`Paid` }
                                    </div>
                                </td>
                                <td>
                                    ${item.booking_type == 'booking' ? `<div class="badge badge-warning">Booking</div>`:`` }
                                    ${item.booking_type == 'rent' ? `<div class="badge badge-green">Rent</div>`:`` }
                                    ${item.booking_type == 'cancle' ? `<div class="badge badge-danger">Cancle</div>`:`` }
                                </td>

                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu4">
                                            <a style="cursor: pointer" target="_blank" href="{{ route('admin.print.show', 1) }}" class="nav-link text-dark">Print</a>
                                            <a style="cursor: pointer" target="_blank" href="{{ route('admin.booking.show', 1) }}" class="nav-link text-dark">Details</a>
                                        </ul>
                                    </div>
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
    })
</script>
@include('backend.includes.validation')
@endpush