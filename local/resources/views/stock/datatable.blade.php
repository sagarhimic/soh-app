<input type="hidden" name="curpage" id="curpage" value="{{ $items->currentPage() }}">
<div class="table-responsive">
<table class="table table-bordered table-hover align-middle" id="fixTable">
    			<thead class="table-dark">
                    <tr>
                    	<th>#</th>
                        <th>Item Name</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Adilabad</th>
                        <th>Komuram Bheem Asifabad</th>
                        <th>Mancherial</th>
                        <th>Nirmal</th>
                        <th>Khammam</th>
                        <th>Bhadradri Kothagudem</th>
                        <th>Hanumakonda</th>
                        <th>Jangaon</th>
                        <th>Jayashankar Bhupalpally</th>
                        <th>Mahabubabad</th>
                        <th>Mulugu</th>
                        <th>Warangal</th>
                        <th>Hyderabad</th>
                        <th>Medchal Malkajgiri</th>
                        <th>Nizamabad</th>
                        <th>Kamareddy</th>
                        <th>Karimnagar</th>
                        <th>Peddapalli</th>
                        <th>Rajanna Sircilla</th>
                        <th>Jagtial</th>
                        <th>Mahabubnagar</th>
                        <th>Narayanpet</th>
                        <th>Jogulamba Gadwal</th>
                        <th>Nagarkurnool</th>
                        <th>Wanaparthy</th>
                        <th>Nalgonda</th>
                        <th>Suryapet</th>
                        <th>Yadadri Bhongir</th>
                        <th>Ranga Reddy</th>
                        <th>Vikarabad</th>
                        <th>Sangareddy</th>
                        <th>Medak</th>
                        <th>Siddipet</th>
                        <th>Consumption</th>
                        <th>Grand Total(Active SOH)</th>
                        <th>Quarantine Stock</th>
                        <th>Total(Active+Quarantine)</th>
                        <th>Pending Supply</th>
                        <th>Months Resumed</th>
                    </tr>
                 </thead>
                 <tbody>
                 <?php 
                    $per_page = $items->perPage(); 
                    $skipped = ($items->currentPage() * $per_page) - $per_page;
				 ?> 
				<input type="hidden" name="curpage" id="curpage" value="{{ $items->currentPage() }}">
                    @forelse($items as $item)
                    <tr>
                    @php
                    $total_active = 
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
                @endphp
                		<td>{{ $loop->iteration + $skipped }}</td>
                        <td class="white-space-normal" style="max-width:400px;"><a href="#">{{ $item->item->name }}</a></td>
                        <td>{{ $item->item->categoryType->name }}</td>
                        <td>{{ format_date($item->date) }}</td>
                        <td>{{ $item->Adilabad }}</td>
                        <td>{{ $item->Komuram_Bheem_Asifabad }}</td>
                        <td>{{ $item->Mancherial }}</td>
                        <td>{{ $item->Nirmal }}</td>
                        <td>{{ $item->Khammam }}</td>
                        <td>{{ $item->Bhadradri_Kothagudem }}</td>
                        <td>{{ $item->Hanumakonda }}</td>
                        <td>{{ $item->Jangaon }}</td>
                        <td>{{ $item->Jayashankar_Bhupalpally }}</td>
                        <td>{{ $item->Mahabubabad }}</td>
                        <td>{{ $item->Mulugu }}</td>
                        <td>{{ $item->Warangal }}</td>
                        <td>{{ $item->Hyderabad }}</td>
                        <td>{{ $item->Medchal_Malkajgiri }}</td>
                        <td>{{ $item->Nizamabad }}</td>
                        <td>{{ $item->Kamareddy }}</td>
                        <td>{{ $item->Karimnagar }}</td>
                        <td>{{ $item->Peddapalli }}</td>
                        <td>{{ $item->Rajanna_Sircilla }}</td>
                        <td>{{ $item->Jagtial }}</td>
                        <td>{{ $item->Mahabubnagar }}</td>
                        <td>{{ $item->Narayanpet }}</td>
                        <td>{{ $item->Jogulamba_Gadwal }}</td>
                        <td>{{ $item->Nagarkurnool }}</td>
                        <td>{{ $item->Wanaparthy }}</td>
                        <td>{{ $item->Nalgonda }}</td>
                        <td>{{ $item->Suryapet }}</td>
                        <td>{{ $item->Yadadri_Bhongir }}</td>
                        <td>{{ $item->Ranga_Reddy }}</td>
                        <td>{{ $item->Vikarabad }}</td>
                        <td>{{ $item->Sangareddy }}</td>
                        <td>{{ $item->Medak }}</td>
                        <td>{{ $item->Siddipet }}</td>
                        <td>{{ number_format($item->consumption,2) }}</td>
                        <td>{{ number_format($total_active,2) }}</td>
                        <td>{{ number_format($item->quarantine_stock,2) }}</td>
                        <td>{{ number_format(($total_active + $item->quarantine_stock),2) }}
                        <td>{{ number_format($item->pending_supply,2) }}</td>
                        <td>{{ resumed_months($total_active, $item->pending_supply, $item->consumption) }}</td>
                    </tr>
                    @empty
                    <tr>
                		<td colspan="4" class="text-center">No items found.</td>
                    </tr>
                    @endforelse
                    </tbody>
           </table>
</div>
           <div class="mt-3 d-flex justify-content-center pagination-height">
            {{ $items->links('pagination::bootstrap-5') }}
    </div>
<script>
 $("#fixTable").tableHeadFixer({ head: true, left: 2 });
</script>
