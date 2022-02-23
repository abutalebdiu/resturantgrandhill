@extends('backend.Admin.layouts.app')
@section('title','Edit Expense')

@section('content')
<div id="content" class="content">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h3 class="panel-title">Add New Expense</h3>
            <a href="{{ route('admin.expenses.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        </div>
        <div class="panel-body">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="text-danger">{{$error}}</div>
                @endforeach
            @endif

            <form action="{{ route('admin.expenses.update', $expense->id) }}" method="post" class="needs-validation" novalidate>
                @csrf
                @method('put')

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="datetime-local" name="date" value="2018-06-12T19:30" id="date" class="form-control" required>
                            <div class="invalid-feedback">
                                The date field is required.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="reference">Reference name</label>
                            <input type="text" name="reference" id="reference" value="{{ $expense->reference }}" class="form-control" placeholder="Ex: John Doe" required>
                            <div class="invalid-feedback">
                                The Reference field is required.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="purpose">Purpose</label>
                            <input type="text" name="purpose" id="purpose" class="form-control" value="{{ $expense->purpose }}" placeholder="Ex: Wifi bill" required>
                            <div class="invalid-feedback">
                                The Purpose field is required.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" name="amount" id="amount" value="{{ $expense->amount }}" class="form-control" placeholder="Ex: 200" required>
                            <div class="invalid-feedback">
                                The Amount field is required.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="remarks">Remarks {{ $expense->remarks }}</label>
                            <textarea name="remarks" id="remarks" class="form-control" placeholder="Remarks">{{ $expense->remarks }}</textarea>
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
