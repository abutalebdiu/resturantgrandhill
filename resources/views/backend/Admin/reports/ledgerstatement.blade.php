@extends('backend.Admin.layouts.app')
@section('title','Client List')

@push('css')
    <style>
        .dropdown-menu {
            min-width: 6rem;
        }
    </style>
@endpush

@section('content')
<div id="content" class="content">
    <div class="panel panel-inverse">
        <div class="panel-heading">
<<<<<<< HEAD
            <h3 class="panel-title">Ledger Statement List</h3>
=======
            <h3 class="panel-title">Fund Withdraw List</h3>
>>>>>>> a0d1559a3a3587d3c7a9f6555c04751aa810f17c
        </div>
        <div class="panel-body">
            <table class="table">

<<<<<<< HEAD
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

                        {{--  <div class="col-4">
                            <div class="form-group">
                                <label>Search</label>
                                <input type="text" placeholder="Search remarks..." id="search_number" class="form-control">
                            </div>
                        </div>  --}}
                    </div>
                </form>
=======
                {{-- Details=[SL, Date, Ref. Name, Mobile, Room No, Payment Mode, Amount, Remarks)]) --}}
>>>>>>> a0d1559a3a3587d3c7a9f6555c04751aa810f17c

                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Date</th>
                        <th>Remarks</th>
<<<<<<< HEAD
=======
                        <th>Amount</th>
>>>>>>> a0d1559a3a3587d3c7a9f6555c04751aa810f17c
                        <th>Debit</th>
                        <th>Credit</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ledgerstatements as $ledgerstatement)
<<<<<<< HEAD
                        <tr class="tbody">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ Carbon\Carbon::parse($ledgerstatement->created_at)->format('d M y - h:i A') }}</td>
                            <td>
                                @if ($ledgerstatement->remarks == 'Booking')
                                    {{ $ledgerstatement->bookings->booking_type }}
                                    @foreach ($ledgerstatement->bookings->bookingDetail as $detail)
                                        ( {{ $detail->room->room_no }} {{ $loop->last ? "":',' }} )
                                    @endforeach
                                @else
                                    {{ $ledgerstatement->remarks }}
                                @endif
                            </td>
=======
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ Carbon\Carbon::parse($ledgerstatement->created_at)->format('d M y - h:i A') }}</td>
                            <td>{{ $ledgerstatement->remarks }}</td>
                            <td>{{ $ledgerstatement->amount }}</td>
>>>>>>> a0d1559a3a3587d3c7a9f6555c04751aa810f17c
                            <td>{{ $ledgerstatement->debit }}</td>
                            <td>{{ $ledgerstatement->credit }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu4">
                                        <a style="cursor: pointer" href="{{ route('admin.reports.show', $ledgerstatement->id) }}" class="nav-link text-dark">Details</a>
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

@endsection
<<<<<<< HEAD

@push('js')

    <script>

        $('.from_date').on('change', function() {
            var from_date = $('.from_date').val();
            $(".to_date").attr("min", from_date);
        })

        // $('#search_number').on('keydown', function() {
        //     var search = $('#search_number').val();
        //     $('.tbody').empty();

        //     $.ajax({
        //         url: `{!! route('admin.reports.index') !!}`,
        //         data: {
        //             type: 'ledgerstatement',
        //             search: search,
        //         },
        //         success: function(res) {
        //             $.each( res, function( key, item ) {
        //                 $('.tbody').append(
        //                     <td>{{ $ledgerstatement->amount }}</td>
        //                     <td>{{ $ledgerstatement->debit }}</td>
        //                     <td>{{ $ledgerstatement->credit }}</td>
        //                     `
        //                     <tr>
        //                         <td>${key+1}</td>
        //                         <td>${item.created_at}</td>
        //                         <td>${item.reference}</td>
        //                         <td>${item.amount}</td>
        //                         <td>${item.purpose}</td>
        //                         <td>${item.remarks}</td>
        //                         <td>${item.entry_by}</td>
        //                         <td>${item.update_by ?? 'N/A'}</td>
        //                     </tr>
        //                     `
        //                 )
        //             });
        //         },
        //         error: function(e) {
        //             console.log(e);
        //             // toastr.error('These credentials do not match our records.')
        //         }
        //     });
        // })

    </script>
    @include('backend.includes.validation')
@endpush
=======
>>>>>>> a0d1559a3a3587d3c7a9f6555c04751aa810f17c
