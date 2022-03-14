@extends('backend.Admin.layouts.app')
@section('title','Food Order Report')

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
            <h3 class="panel-title">Food Order Report</h3>
        </div>
        <div class="panel-body">
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

                    </div>
                </form>

                <thead>
                    <tr>
                        <th>SL</th>
                        <th>User</th>
                        <th>Table No</th>
                        <th>Sub Total</th>
                        <th>Vat</th>
                        <th>Service Charge</th>
                        <th>Total</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($foodorders as $ledgerstatement)
                    <tr class="tbody">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$ledgerstatement->user->name}}</td>
                        <td>{{$ledgerstatement->table_no}}</td>
                        <td>{{$ledgerstatement->sub_total}}</td>
                        <td>{{$ledgerstatement->vat}}</td>
                        <td>{{$ledgerstatement->service_charge}}</td>
                        <td>{{$ledgerstatement->total}}</td>
                        <td>{{ Carbon\Carbon::parse($ledgerstatement->created_at)->format('d M y - h:i A') }}</td>
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