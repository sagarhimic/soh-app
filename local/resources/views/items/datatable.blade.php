<input type="hidden" name="curpage" id="curpage" value="{{ $items->currentPage() }}">
<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle" id="fixTable">
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
                	<?php 
                        $per_page = $items->perPage(); 
                        $skipped = ($items->currentPage() * $per_page) - $per_page;
    				?> 
                    @foreach ($items as $item)
                    <tr>
                        <td>{{ $loop->iteration + $skipped }}</td>
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
    <div class="mt-3 d-flex justify-content-center pagination-height">
        {{ $items->links() }}
    </div>
<script>
 $("#fixTable").tableHeadFixer({ head: true, left: 2 });
</script>
    