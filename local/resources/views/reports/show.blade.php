<div class="modal-header pb-0">
	<h5 class="modal-title">Stock Details ( <span style="color:blue;">{{ $stocks->first()->item->name }}</span> )</h5>
	
	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>


<div class="modal-body mcss">
    <div class="flex-row" >		

	<div class="table-responsive" style="max-height:500px;">
    <table class="table align-items-center table-flush border" id="fixTable">
				<thead class="thead-light">
					<tr>
						<th>#</th>
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
					</tr>
				</thead>
				<tbody>
				@if(isset($stocks) && !empty($stocks) > 0)
				@foreach($stocks as $item)
					<tr>
						<td>{{ $loop->iteration }}</td>
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
					</tr>
				@endforeach
				@else
				<tr><td colspan="15" class="text-center">No records found.</td></tr>
				@endif 
				</tbody>
			</table>
		</div>
    </div>
</div>
<script>
$(document).ready(function() {
	$("#fixTable").tableHeadFixer({"left" : 3});
});
</script>