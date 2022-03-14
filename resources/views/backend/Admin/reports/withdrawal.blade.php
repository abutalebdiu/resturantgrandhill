@extends('backend.Admin.layouts.app')
@section('title','Fund Withdraw')

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
            <h3 class="panel-title">Fund Withdraw List</h3>
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
                            <input type="text" placeholder="Search remarks..." id="search_number" class="form-control">
                        </div>
                    </div>
                </div>
            </form>

            <table class="table">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Date Time</th>
                        <th>Remarks</th>
                        <th>Payment Mode</th>
                        {{-- <th>Available Amount</th> --}}
                        <th>Withdraw Amount</th>
                        <th>Entry By</th>
                        <th>Update By</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    @foreach ($funds as $fund)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ Carbon\Carbon::parse($fund->created_at)->format('d M y - h:m A') }}</td>
                        <td>{{ $fund->remarks }}</td>
                        <td>{{ $fund->payment_mode }}</td>
                        {{-- <td>{{ $fund->available_amount }}</td> --}}
                        <td>{{ $fund->withdraw_amount }}</td>
                        <td>{{ $fund->entry_by }}</td>
                        <td>{{ $fund->update_by ?? 'N/A' }}</td>
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

    $('#search_number').on('keydown', function() {
        var search = $('#search_number').val();
        $('.tbody').empty();

        $.ajax({
            url: `{!! route('admin.reports.index') !!}`,
            data: {
                type: 'fundwithdrawal',
                search: search,
            },
            success: function(res) {
                $.each(res, function(key, item) {
                    $('.tbody').append(
                        `
                            <tr>
                                <td>${key+1}</td>
                                <td>${item.created_at}</td>
                                <td>${item.remarks}</td>
                                <td>${item.payment_mode}</td>
                                <td>${item.withdraw_amount}</td>
                                <td>${item.entry_by}</td>
                                <td>${item.update_by ?? 'N/A'}</td>
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