@extends('layouts.app')
@section('content')
<div class="container">

<h2 class="mb-4">Stock Dashboard</h2>
<form id="sform" class="d-flex gap-2 align-items-center">

    <div class="col-md-3">
        <label>Date Filter</label>
        <input type="date" id="filter_date" name="filter_date" class="form-control"
               value="{{ $filterDate }}">
    </div>

    <div class="col-md-3">
        <label>District</label>
        <select id="district" name="district" class="form-control">
            <option value="">All Districts</option>

            @foreach(\App\Models\StockUpdate::districtColumns() as $dist)
                <option value="{{ $dist }}" {{ request('district') == $dist ? 'selected' : '' }}>
                    {{ $dist }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
    <label>Category</label>
    <select name="category" id="category" class="form-select" onchange="search(1)">
                <option value="">All Categories</option>
                @foreach($categories as $c)
                    <option value="{{ $c->id }}">
                        {{ $c->name }}
                    </option>
                @endforeach
            </select>
	</div>
    <!-- <div class="col-md-2 d-flex align-items-end">
        <button class="btn btn-primary w-100">Apply Filter</button>
    </div> -->
    <button type="button" class="btn btn-primary px-4" onclick="search(1)">Search</button>
    <button type="reset" class="btn btn-outline-secondary px-3" onclick="search(1)">Reset</button>
</form>

<div class="card mb-4">
    <div class="card-body p-0">
        <div class="table-responsive search-results">
            @include('dashboard.datatable')
        </div>
    </div>
</div>
@endsection
@include('dashboard.scripts')
                