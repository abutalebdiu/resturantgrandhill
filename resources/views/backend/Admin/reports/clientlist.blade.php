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
                            <input type="text" placeholder="Search number..." id="search_number" class="form-control">
                        </div>
                    </div>
                </div>
            </form>

            <table class="table">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Client Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>NID</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    @foreach ($billings as $billing)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $billing->name }}</td>
                            <td>{{ $billing->mobile }}</td>
                            <td>{{ $billing->email }}</td>
                            <td>{{ $billing->addreas }}</td>
                            <td>{{ $billing->nid }}</td>
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
            var number = $('#search_number').val();
            $('.tbody').empty();

            $.ajax({
                url: `{!! route('admin.reports.index') !!}`,
                data: {
                    type: 'clientlist',
                    number: number,
                },
                success: function(res) {
                    $.each( res, function( key, item ) {
                        $('.tbody').append(
                            `
                            <tr>
                                <td>${key+1}</td>
                                <td>${item.name}</td>
                                <td>${item.mobile}</td>
                                <td>${item.email}</td>
                                <td>${item.addreas}</td>
                                <td>${item.nid}</td>
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
