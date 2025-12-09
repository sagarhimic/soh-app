@extends('layouts.app')
@section('content')
<div class="container-fluid">
        <div class="page-header-height">
            <h3 class="mb-0">Stock Items</h3>
            <form id="sform" class="d-flex gap-2 align-items-center">
                <div class="input-group" style="min-width: 280px;">
                    <input type="text" id="search_key" name="search_key" class="form-control" placeholder="Search item name..."
                           autocomplete="off">
                </div>
                <div class="input-group" style="min-width: 220px;">
                    <select name="category" id="category" class="form-select" onchange="search(1)">
                        <option value="">All Categories</option>
                        @foreach($categories as $c)
                            <option value="{{ $c->id }}">
                                {{ $c->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="button" class="btn btn-primary px-4" onclick="search(1)">Search</button>
                <button type="reset" class="btn btn-outline-secondary px-3" onclick="search(1)">Reset</button>
            </form>
    	</div>

        <div class="search-results">
            @include('items.datatable',$items)
        </div>
</div>
@endsection
@include('items.scripts')