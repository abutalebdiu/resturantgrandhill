@extends('backend.Admin.layouts.app')
@section('title','Edit Fund Withdraw')

@section('content')
<div id="content" class="content">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h3 class="panel-title">Edit Fund Withdraw</h3>
            <a href="{{ route('admin.expenses.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        </div>
        <div class="panel-body">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="text-danger">{{$error}}</div>
                @endforeach
            @endif

            <form action="{{ route('admin.funds_withdraws.update', $fundWithdraw->id) }}" method="post" class="needs-validation" novalidate>
                @csrf
                @method('put')

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="available_amount">Available Amount</label>
                            <input type="text" name="available_amount" value="{{ $fundWithdraw->available_amount }}" id="available_amount" class="form-control" placeholder="Ex: 200" required>
                            <div class="invalid-feedback">
                                The Available Amount field is required.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="withdraw_amount">Withdraw Amount</label>
                            <input type="text" name="withdraw_amount" id="withdraw_amount" value="{{ $fundWithdraw->withdraw_amount }}" class="form-control" placeholder="Ex: John Doe" required>
                            <div class="invalid-feedback">
                                The Withdraw Amount field is required.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="payment_mode">Payment Mode</label>
                            <select name="payment_mode" id="payment_mode" class="form-control" required>
                                <option {{ $fundWithdraw->payment_mode == 'Cash' ? 'selected':'' }} value="Cash">Cash</option>
                                <option {{ $fundWithdraw->payment_mode == 'Bank' ? 'selected':'' }} value="Bank">Bank</option>
                                <option {{ $fundWithdraw->payment_mode == 'BEFTN' ? 'selected':'' }} value="BEFTN">BEFTN</option>
                                <option {{ $fundWithdraw->payment_mode == 'RTGS' ? 'selected':'' }} value="RTGS">RTGS</option>
                            </select>
                            <div class="invalid-feedback">
                                The Payment Mode field is required.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="remarks">Remarks</label>
                            <input type="text" name="remarks" id="remarks" value="{{ $fundWithdraw->remarks }}" class="form-control" placeholder="Remarks">
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
</div>

@endsection

@push('js')
    @include('backend.includes.validation')
@endpush
