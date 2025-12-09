@extends('layouts.app')
@section('content')
    <div class="page-header-height">
        <h4 class="mb-3">Stock Resumed Months Report</h4>
        <form id="sform" class="d-flex gap-2 align-items-center mb-2">
            <input type="text" id="search_key" name="search_key" class="form-control" placeholder="item name"autocomplete="off">
            <select id="category" name="category" class="form-select">
                <option value="">All Categories</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" 
                        {{ request('category') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
            <input type="number" style="max-width:140px" id="min_months" name="min_months" class="form-control" placeholder="Active SOH Month" autocomplete="off">
            <input type="number" style="max-width:140px" id="tot_min_months" name="tot_min_months" class="form-control" placeholder="Total Month Count" autocomplete="off">
            <input style="max-width:200px"  type="date" id="filter_date" name="filter_date" class="form-control"
                       value="{{ request('filter_date') }}">
            <button type="button" class="btn btn-primary px-4" onclick="search(1)">Search</button>
            <button type="reset" class="btn btn-outline-secondary px-3" onclick="search(1)"> Reset </button>
    		<select class="form-select"  id="per_page" onchange="search(1)">
    			@foreach(per_page() as $pg)
                 	<option value="{{ $pg }}" {{ (isset($scrbck['per_page']) && $scrbck['per_page']==$pg) ? 'selected=selected' : '' }}>{{ $pg }}</option>
    			@endforeach
        	</select>
        </form>
    </div>
    <div class="search-results">
        @include('reports.datatable',$items)
    </div>
@endsection
@include('reports.scripts')
