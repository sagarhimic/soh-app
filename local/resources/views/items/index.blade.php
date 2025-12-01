@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-3">Items List</h2>

    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Item Name</th>
                <th>Item Code</th>
                <th>Category</th>
                <th>Item Type</th>
                <th>Consumption Type</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->item_code }}</td>
                <td>{{ $item->categoryType->name ?? '-' }}</td>
                <td>{{ $item->itemType->name ?? '-' }}</td>
                <td>{{ $item->consumptionType->name ?? '-' }}</td>
                <td>{{ $item->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $items->links() }}

</div>
@endsection
