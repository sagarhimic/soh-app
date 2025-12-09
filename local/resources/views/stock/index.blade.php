@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="page-header-height">
        <h3 class="mb-0">Stock Items</h3>
        <form id="sform" class="d-flex gap-2 align-items-center">
            <input type="text" id="search_key" name="search_key" class="form-control" placeholder="Search item name"
                   autocomplete="off">
            <select name="category" id="category" class="form-select">
                <option value="">All Categories</option>
                @foreach($categories as $c)
                    <option value="{{ $c->id }}" {{ $category == $c->id ? 'selected' : '' }}>
                        {{ $c->name }}
                    </option>
                @endforeach
                </select>
            <button type="button" class="btn btn-primary px-4" onclick="search(1)">Search</button>
            <button type="reset" class="btn btn-outline-secondary px-3" onclick="search(1)">Reset</button>
        </form>
	</div>

    <div class="search-results">
        @include('stock.datatable',$items)
    </div>
    
</div>
@endsection
@include('stock.scripts')