@extends('backend.Admin.layouts.app')
@section('title','Expenses')

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
            <h3 class="panel-title">Add New Expense</h3>
        </div>
        <div class="panel-body">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="text-danger">{{$error}}</div>
                @endforeach
            @endif

            <form action="{{ route('admin.expenses.store') }}" method="post" class="needs-validation" novalidate>
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="datetime-local" name="date" value="{{ old('date') }}" id="date" class="form-control" required>
                            <div class="invalid-feedback">
                                The date field is required.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="reference">Reference name</label>
                            <input type="text" name="reference" id="reference" value="{{ old('reference') }}" class="form-control" placeholder="Ex: John Doe" required>
                            <div class="invalid-feedback">
                                The Reference field is required.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="purpose">Purpose</label>
                            <input type="text" name="purpose" id="purpose" class="form-control" value="{{ old('purpose') }}" placeholder="Ex: Wifi bill" required>
                            <div class="invalid-feedback">
                                The Purpose field is required.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" name="amount" id="amount" value="{{ old('amount') }}" class="form-control" placeholder="Ex: 200" required>
                            <div class="invalid-feedback">
                                The Amount field is required.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="remarks">Remarks</label>
                            <textarea name="remarks" id="remarks" value="{{ old('remarks') }}" class="form-control" placeholder="Remarks"></textarea>
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
            <h3 class="panel-title">Expense List</h3>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Date Time</th>
                        <th>Ref. Name</th>
<<<<<<< HEAD
                        <th>Purpose</th>
                        <th>Remarks</th>
                        <th>Amount</th>
                        <th>Entry By</th>
                        <th>Update By</th>
=======
                        <th>Amount</th>
                        <th>Purpose</th>
                        <th>Remarks</th>
>>>>>>> a0d1559a3a3587d3c7a9f6555c04751aa810f17c
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($expenses as $expense)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ Carbon\Carbon::parse($expense->date)->format('d M y - h:i A') }}</td>
                            <td>{{ $expense->reference }}</td>
<<<<<<< HEAD
                            <td>{{ $expense->purpose }}</td>
                            <td>{{ $expense->remarks }}</td>
                            <td>{{ $expense->amount }}</td>
                            <td>{{ $expense->entry_by }}</td>
                            <td>{{ $expense->update_by ?? "N/A" }}</td>
=======
                            <td>{{ $expense->amount }}</td>
                            <td>{{ $expense->purpose }}</td>
                            <td>{{ $expense->remarks }}</td>
>>>>>>> a0d1559a3a3587d3c7a9f6555c04751aa810f17c

                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu4">
                                        <a style="cursor: pointer" href="{{ route('admin.expenses.edit', $expense->id) }}" class="nav-link text-dark">Edit</a>
                                        <a style="cursor: pointer" onclick="del()" class="nav-link text-dark">Delete</a>
                                      </ul>
                                  </div>
                            </td>
                            <form id="del-form" action="{{ route('admin.expenses.destroy', $expense->id) }}" method="post" class="d-inline-block">
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
                $( "#del-form" ).submit();
            } else {
                return 0;
            }
        }
    </script>

    @include('backend.includes.validation')
@endpush
