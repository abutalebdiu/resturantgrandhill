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
            <h3 class="panel-title">Add Fund Withdraw</h3>
        </div>
        <div class="panel-body">
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="text-danger">{{$error}}</div>
            @endforeach
            @endif

            <form action="{{ route('admin.funds_withdraws.store') }}" method="post" class="needs-validation" novalidate>
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="available_amount">Available Amount</label>
                            <input type="text" name="available_amount" value="{{ old('available_amount') }}" id="available_amount" class="form-control" placeholder="Ex: 200" required>
                            <div class="invalid-feedback">
                                The Available Amount field is required.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="withdraw_amount">Withdraw Amount</label>
                            <input type="text" name="withdraw_amount" id="withdraw_amount" value="{{ old('withdraw_amount') }}" class="form-control" placeholder="Ex: John Doe" required>
                            <div class="invalid-feedback">
                                The Withdraw Amount field is required.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="payment_mode">Payment Mode</label>
                            <select name="payment_mode" id="payment_mode" class="form-control" required>
                                <option value="Cash">Cash</option>
                                <option value="Bank">Bank</option>
                                <option value="BEFTN">BEFTN</option>
                                <option value="RTGS">RTGS</option>
                            </select>
                            <div class="invalid-feedback">
                                The Payment Mode field is required.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="remarks">Remarks</label>
                            <input type="text" name="remarks" id="remarks" value="{{ old('remarks') }}" class="form-control" placeholder="Remarks">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mt-2"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h3 class="panel-title">Fund Withdraw List</h3>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Available Amount</th>
                        <th>Withdraw Amount</th>
                        <th>Payment Mode</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($funds as $fund)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $fund->available_amount }}</td>
                        <td>{{ $fund->withdraw_amount }}</td>
                        <td>{{ $fund->payment_mode }}</td>
                        <td>{{ $fund->remarks }}</td>

                        <td>
                            <div class="dropdown">
                                <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu4">
                                    <a style="cursor: pointer" href="{{ route('admin.funds_withdraws.edit', $fund->id) }}" class="nav-link text-dark">Edit</a>
                                    <a style="cursor: pointer" onclick="del()" class="nav-link text-dark">Delete</a>
                                </ul>
                            </div>
                        </td>
                        <form id="del-form" action="{{ route('admin.funds_withdraws.destroy', $fund->id) }}" method="post" class="d-inline-block">
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

    function getFund() {
        $.ajax({
            url: `{!! route('admin.funds_withdraws.index') !!}`,
            success: function(res) {
                $('#available_amount').val(res.amount);
            },
            error: function(e) {
                console.log(e);
                // toastr.error('These credentials do not match our records.')
            }
        });
    }

    getFund();
</script>

@include('backend.includes.validation')
@endpush