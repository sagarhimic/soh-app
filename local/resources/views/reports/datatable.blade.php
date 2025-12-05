<div class="table-scroll-wrapper mt-3">
<input type="hidden" name="curpage" id="curpage" value="{{ $items->currentPage() }}">
<table class="table table-bordered table-hover table-sticky align-middle" id="fixTable">
<thead class="table-dark">
                <tr>
                	<th>#</th>
                    <th width="350">Item Name</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Active SOH</th>
                    <th>Quarantine Stock</th>
                    <th>Consumption</th>
                    <th>Pending Supply</th>
                    <th>Active Months Resumed</th>
                    <th>Total Active SOH</th>
                    <th>Total Months Resumed</th>
                </tr>
                </thead>

                <tbody>
                <?php 
                    $per_page = $items->perPage(); 
                    $skipped = ($items->currentPage() * $per_page) - $per_page;
				?> 
                @forelse($items as $item)

                    @php
                        $active = 
                            $item->Adilabad +
                            $item->Komuram_Bheem_Asifabad +
                            $item->Mancherial +
                            $item->Nirmal +
                            $item->Khammam +
                            $item->Bhadradri_Kothagudem +
                            $item->Hanumakonda +
                            $item->Jangaon +
                            $item->Jayashankar_Bhupalpally +
                            $item->Mahabubabad +
                            $item->Mulugu +
                            $item->Warangal +
                            $item->Hyderabad +
                            $item->Medchal_Malkajgiri +
                            $item->Nizamabad +
                            $item->Kamareddy +
                            $item->Karimnagar +
                            $item->Peddapalli +
                            $item->Rajanna_Sircilla +
                            $item->Jagtial +
                            $item->Mahabubnagar +
                            $item->Narayanpet +
                            $item->Jogulamba_Gadwal +
                            $item->Nagarkurnool +
                            $item->Wanaparthy +
                            $item->Nalgonda +
                            $item->Suryapet +
                            $item->Yadadri_Bhongir +
                            $item->Ranga_Reddy +
                            $item->Vikarabad +
                            $item->Sangareddy +
                            $item->Medak +
                            $item->Siddipet;

                        $months = resumed_months($active, $item->pending_supply, $item->consumption);
                    @endphp

                    <tr>
                    	<td> {{ $loop->iteration + $skipped }}</td>
                        <td class="white-space-normal">
                            <span class="fw-bold"><a href="javascript:void(0)" data-toggle="tooltip" title="Full Time" onclick="dashboardPopup('{{ url('stock-detail-report/'.$item->id) }}')" >{{ $item->item->name }}</a></span>
                        </td>
                        <td>{{ $item->item->categoryType->name }}</td>
                        <td>{{ format_date($item->date) }}</td>
                        <td>{{ number_format($active, 2) }}</td>
                        <td>{{ number_format($item->quarantine_stock, 2) }}</td>
                        <td>{{ number_format($item->consumption, 2) }}</td>
                        <td>{{ number_format($item->pending_supply, 2) }}</td>
                        <td class="fw-bold {{ $months < 3 ? 'text-danger' : 'text-success' }}">
                            {{ number_format($months, 2) }}
                        </td>
                        @php
                        $total_soh = ($active + $item->quarantine_stock);
                        $total_months = resumed_months($total_soh, $item->pending_supply, $item->consumption);
                        @endphp
                        <td>{{ number_format($total_soh, 2) }}</td>
                        <td  class="fw-bold {{ $total_months < 3 ? 'text-danger' : 'text-success' }}">{{ number_format($total_months, 2) }}</td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="11" class="text-center py-3">No records found.</td>
                    </tr>
                @endforelse
                </tbody>

            </table>
            </div>

    <div class="mt-3 d-flex justify-content-center">
        {{ $items->links('pagination::bootstrap-5') }}
    </div>