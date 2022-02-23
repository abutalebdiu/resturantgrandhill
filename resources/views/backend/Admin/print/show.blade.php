<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Customer Copy - {{ $websetting->site_name }}</title>
        <link rel="stylesheet" href="{{ asset('backend\assets\css\custom.css') }}">
    </head>
    <body>

        <section class="section-heading py-3">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-7 text-center">
                        <h2>The Grand Hill Taj</h2>
                        <p>The Grand Hill Taj, Kaptai Lake, Rangamati Sadar Upazila Porisod, Hill Track, Chittagong-4500, Bangladesh</p>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered">
                            <tr>
                                <th>Name</th>
                                <td>{{ $booking->billinginfo->name }}</td>

                                <th>E-mail</th>
                                <td>{{ $booking->billinginfo->email }}</td>
                            </tr>
                            <tr>
                                <th>Mobile</th>
                                <td>{{ $booking->billinginfo->mobile }}</td>

                                <th>Alternative Mobile</th>
                                <td>{{ $booking->billinginfo->alternative_mobile }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $booking->billinginfo->addreas }}</td>
                                <th>Booking Id</th>
                                <td>{{ $booking->id }}</td>
                            </tr>
                            <tr>
                                <th>Check In</th>
                                <td>{{ Carbon\Carbon::parse($booking->checkin)->format('d F Y') }}</td>
                                <th>Check Out</th>
                                <td>{{ Carbon\Carbon::parse($booking->checkout)->format('d F Y') }}</td>
                            </tr>
                            <tr>
                                <th>Payment Type</th>
                                <td>
                                    <div class="badge {{ $booking->still_dues > 0 ? 'bg-danger':'bg-success' }}">
                                        @if ($booking->still_dues > 0)
                                            Due
                                        @else
                                            Paid
                                        @endif
                                    </div>
                                </td>
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
                                <th>Total Price</th>
                                <td>{{ $booking->original_amount }}</td>
                            </tr>
                            <tr>
                                <th>Paid Amount</th>
                                <td>{{ $booking->paid_amount }}</td>
                                <th>Dues Amount</th>
                                <td>{{ $booking->still_dues }}</td>
                            </tr>
                        </table>

                        <h3 class="text-center text-decoration-underline">Booked Rooms</h3>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Room No.</th>
                                    <th>Person</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($booking->bookingDetail as $detail)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $detail->room->room_no }} {{ $detail->id }}</td>
                                        <td>{{ $detail->person }}</td>
                                        <td>{{ $detail->room->discount_price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        <script>
            window.print();
        </script>

    </body>
</html>
