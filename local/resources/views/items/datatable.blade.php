<div>
    <table class="table table-bordered table-striped table-hover" id="fixTable">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Item Code</th>
                    <th>Item Name</th>
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
                     <td>{{ $item->item_code }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->categoryType->name ?? '-' }}</td>
                    <td>{{ $item->itemType->name ?? '-' }}</td>
                    <td>{{ $item->consumptionType->name ?? '-' }}</td>
                    <td>{{ $item->status }}</td>
                </tr>
                @endforeach
            </tbody>
    </table>
</div>
    <div class="text-center">
	{{ $items->links() }}
</div>