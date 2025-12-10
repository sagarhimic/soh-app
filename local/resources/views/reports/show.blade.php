<div class="modal-header pb-0">
	<h5 class="modal-title">Stock Details ( <span style="color:blue;">{{ $stocks->first()->item->name }}</span> )</h5>
	
	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>


<div class="modal-body mcss">
    <div class="flex-row" >		

	<div class="table-responsive" style="max-height:500px;">
    <table class="table table-bordered table-hover align-middle" id="showfixTable">
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
                        <td class="fw-bold {{ $item->Adilabad <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Adilabad,2) }}</td>
                        <td class="fw-bold {{ $item->Komuram_Bheem_Asifabad <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Komuram_Bheem_Asifabad,2) }}</td>
                        <td class="fw-bold {{ $item->Mancherial <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Mancherial,2) }}</td>
                        <td class="fw-bold {{ $item->Nirmal <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Nirmal,2) }}</td>
                        <td class="fw-bold {{ $item->Khammam <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Khammam,2) }}</td>
                        <td class="fw-bold {{ $item->Bhadradri_Kothagudem <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Bhadradri_Kothagudem,2) }}</td>
                        <td class="fw-bold {{ $item->Hanumakonda <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Hanumakonda,2) }}</td>
                        <td class="fw-bold {{ $item->Jangaon <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Jangaon,2) }}</td>
                        <td class="fw-bold {{ $item->Jayashankar_Bhupalpally <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Jayashankar_Bhupalpally,2) }}</td>
                        <td class="fw-bold {{ $item->Mahabubabad <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Mahabubabad,2) }}</td>
                        <td class="fw-bold {{ $item->Mulugu <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Mulugu,2) }}</td>
                        <td class="fw-bold {{ $item->Warangal <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Warangal,2) }}</td>
                        <td class="fw-bold {{ $item->Hyderabad <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Hyderabad,2) }}</td>
                        <td class="fw-bold {{ $item->Medchal_Malkajgiri <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Medchal_Malkajgiri,2) }}</td>
                        <td class="fw-bold {{ $item->Nizamabad <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Nizamabad,2) }}</td>
                        <td class="fw-bold {{ $item->Kamareddy <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Kamareddy,2) }}</td>
                        <td class="fw-bold {{ $item->Karimnagar <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Karimnagar,2) }}</td>
                        <td class="fw-bold {{ $item->Peddapalli <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Peddapalli,2) }}</td>
                        <td class="fw-bold {{ $item->Rajanna_Sircilla <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Rajanna_Sircilla,2) }}</td>
                        <td class="fw-bold {{ $item->Jagtial <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Jagtial,2) }}</td>
                        <td class="fw-bold {{ $item->Mahabubnagar <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Mahabubnagar,2) }}</td>
                        <td class="fw-bold {{ $item->Narayanpet <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Narayanpet,2) }}</td>
                        <td class="fw-bold {{ $item->Jogulamba_Gadwal <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Jogulamba_Gadwal,2) }}</td>
                        <td class="fw-bold {{ $item->Nagarkurnool <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Nagarkurnool,2) }}</td>
                        <td class="fw-bold {{ $item->Wanaparthy <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Wanaparthy,2) }}</td>
                        <td class="fw-bold {{ $item->Nalgonda <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Nalgonda,2) }}</td>
                        <td class="fw-bold {{ $item->Suryapet <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Suryapet,2) }}</td>
                        <td class="fw-bold {{ $item->Yadadri_Bhongir <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Yadadri_Bhongir,2) }}</td>
                        <td class="fw-bold {{ $item->Ranga_Reddy <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Ranga_Reddy,2) }}</td>
                        <td class="fw-bold {{ $item->Vikarabad <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Vikarabad,2) }}</td>
                        <td class="fw-bold {{ $item->Sangareddy <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Sangareddy,2) }}</td>
                        <td class="fw-bold {{ $item->Medak <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Medak,2) }}</td>
                        <td class="fw-bold {{ $item->Siddipet <= 0 ? 'text-danger' : 'text-success' }}">{{ number_format($item->Siddipet,2) }}</td>
					</tr>
				@endforeach
				@else
				<tr><td colspan="35" class="text-center">No records found.</td></tr>
				@endif 
				</tbody>
			</table>
		</div>
    </div>
</div>
<script>
$(document).ready(function() {
	$("#showfixTable").tableHeadFixer({"left" : 2});
});
</script>