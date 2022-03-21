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
                <h3 class="panel-title">Ledger Statement List</h3>
            </div>
            <div class="panel-body table-responsive">
                <table class="table">

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

                            {{-- <div class="col-4">
                                <div class="form-group">
                                    <label>Search</label>
                                    <input type="text" placeholder="Search remarks..." id="search_number" class="form-control">
                                </div>
                            </div>  --}}
                        </div>
                    </form>

                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Date</th>
                            <th>Remarks</th>
                            <th>Amount</th>
                            <th>Debit</th>
                            <th>Credit</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ledgerstatements as $ledgerstatement)
                        <tr class="tbody">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ Carbon\Carbon::parse($ledgerstatement->created_at)->format('d M y - h:i A') }}</td>
                            <td>
                                @if ($ledgerstatement->remarks == 'Booking')
                                @if (isset($ledgerstatement->bookings))

                                {{ $ledgerstatement->bookings->booking_type }}
                                @foreach ($ledgerstatement->bookings->bookingDetail as $detail)
                                ( {{ $detail->room->room_no }} {{ $loop->last ? "":',' }} )
                                @endforeach
                                @endif
                                @else
                                {{ $ledgerstatement->remarks }}
                                @endif
                            </td>
                            <td>{{ $ledgerstatement->amount }}</td>
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

    @push('js')

    <script>
        $('.from_date').on('change', function() {
            var from_date = $('.from_date').val();
            $(".to_date").attr("min", from_date);
        })
    </script>
    @include('backend.includes.validation')
    @endpush