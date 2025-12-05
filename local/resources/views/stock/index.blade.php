@extends('layouts.app')
@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <h3 class="mb-0">Stock Items</h3>
    <form id="sform" class="d-flex gap-2 align-items-center">
        <div class="input-group" style="min-width: 280px;">
            <span class="input-group-text bg-white">
                <i class="fas fa-search text-muted"></i>
            </span>
            <input type="text" id="search_key" name="search_key" class="form-control" placeholder="Search item name..."
                   autocomplete="off">
        </div>
        <div class="input-group" style="min-width: 220px;">
            <span class="input-group-text bg-white">
                <i class="fas fa-filter text-muted"></i>
            </span>
            <select name="category" id="category" class="form-select">
                <option value="">All Categories</option>
                @foreach($categories as $c)
                    <option value="{{ $c->id }}" {{ $category == $c->id ? 'selected' : '' }}>
                        {{ $c->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="button" class="btn btn-primary px-4" onclick="search(1)">Search</button>
        <button type="reset" class="btn btn-outline-secondary px-3" onclick="search(1)">Reset</button>
    </form>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive search-results">
            @include('stock.datatable',$items)
        </div>
    </div>
</div>
@endsection
@include('stock.scripts')