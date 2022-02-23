@extends('backend.Admin.layouts.app')
@section('title','Show Booking')
@section('content')

<div id="content" class="content">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Show Room</h4>
            <div class="panel-heading-btn">
                <a href="{{ route('admin.booking.index') }}" class="btn  btn-primary">
                    <i class="fa fa-plus"></i> Back To Booking List
                </a>
            </div>
        </div>
        <div class="panel-body">
            <div class="panel-heading">
                <h3 style="font-size: 16px" class="panel-title">Billing Info</h3>
                <div class="panel-heading-btn">
                    <a target="_blank"href="{{ route('admin.print.show', $booking->id) }}" class="btn btn-green">
                        <i class="fa fa-print"></i> Print
                    </a>
                </div>
            </div>
            <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                <tr>
                    <th>Name</th>
                    <td>{{ $booking->billinginfo->name }}</td>
                </tr>
                <tr>
                    <th>E-mail</th>
                    <td>{{ $booking->billinginfo->email }}</td>
                </tr>
                <tr>
                    <th>Mobile</th>
                    <td>{{ $booking->billinginfo->mobile }}</td>
                </tr>
                <tr>
                    <th>Alternative Mobile</th>
                    <td>{{ $booking->billinginfo->alternative_mobile }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $booking->billinginfo->addreas }}</td>
                </tr>
                <tr>
                    <th>Note</th>
                    <td>{{ $booking->billinginfo->notes }}</td>
                </tr>
            </table>

            <h5 class="mt-4">Booking Info</h5>
            <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                <tr>
                    <th>Booking Id</th>
                    <td>{{ $booking->id }}</td>
                </tr>
                <tr>
                    <th>Check In</th>
                    <td>{{ Carbon\Carbon::parse($booking->checkin)->format('d F Y') }}</td>
                </tr>
                <tr>
                    <th>Check Out</th>
                    <td>{{ Carbon\Carbon::parse($booking->checkout)->format('d F Y') }}</td>
                </tr>
                <tr>
                    <th>Payment Type</th>
                    <td>
                        <div class="badge {{ $booking->still_dues > 0 ? 'badge-danger':'badge-primary' }}">
                            @if ($booking->still_dues > 0)
                                Due
                            @else
                                Paid
                            @endif
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Payment Method</th>
                    <td>
                        {{ $booking->payment_method }}
                    </td>
                </tr>
                <tr>
                    <th>Booking Type</th>
                    <td>
                        <span class="text-capitalize">{{ $booking->booking_type }}</span>
                    </td>
                </tr>
                <tr>
                    <th>Total Price</th>
                    <td>{{ $booking->total_price }}</td>
                </tr>
                <tr>
                    <th>After Discount</th>
                    <td>{{ $booking->after_discount }}</td>
                </tr>
                <tr>
                    <th>Original Price</th>
                    <td>{{ $booking->original_amount }}</td>
                </tr>
                <tr>
                    <th>Paid Amount</th>
                    <td>{{ $booking->paid_amount }}</td>
                </tr>
                <tr>
                    <th>Dues Amount</th>
                    <td>{{ $booking->still_dues }}</td>
                </tr>
            </table>

            <div class="panel-heading">
                <h3 style="font-size: 16px" class="panel-title">Booking Details</h3>
                <div class="panel-heading-btn">
                    <a href="{{ route('admin.booking.create', ['checkin' => $booking->checkin, 'checkout' => $booking->checkout, 'booking_id' => $booking->id]) }}" class="btn  btn-primary">
                        <i class="fa fa-plus"></i> Book New Room
                    </a>
                </div>
            </div>

            <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Image</th>
                        <th>Room No.</th>
                        <th>Person</th>
                        <th>Price</th>
                        <th>Discount Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($booking->bookingDetail as $detail)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img width="100" src="{{ asset($detail->room->photo) }}" alt="Not found">
                            </td>
                            <td>{{ $detail->room->room_no }}</td>
                            <td>{{ $detail->person }}</td>
                            <td>{{ $detail->room->price }}</td>
                            <td>{{ $detail->room->discount_price }}</td>
                            <td>
                                <button  type="submit" class="btn btn-danger btn-sm" onclick="deleteItem({{ $detail->id }}, {{ $detail->booking_id }})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection


@push('js')
    <script>

        function deleteItem(id, booking_id) {
            if (confirm('Are you sure want to do this?')) {
                var url = `{!! route('admin.bookingdetails.index') !!}/${id}`
                $.ajax({
                    method: 'delete',
                    url: url,
                    data: {
                        booking_id: booking_id
                    },
                    success: function(res) {
                        console.log(res)
                        location.reload();
                        toastr.success('This room has been deleted')
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
            } else {
                return 0;
            }
        }

    </script>
@endpush
