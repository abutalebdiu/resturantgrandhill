@extends('backend.Admin.layouts.app')
@section('title','Create Food Order')
@section('content')
@push('css')
<style>
    .list-group .active {
        background-color: #4A1D8C;
    }
</style>
@endpush
<div id="content" class="content">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Add Food Order </h4>
            <div class="panel-heading-btn">

                <a href="{{ route('admin.foodorder.index') }}" class="btn  btn-primary">
                    Back To Order List
                </a>
            </div>
        </div>
        <div class="panel-body">

        </div>
    </div>
</div>
@endsection