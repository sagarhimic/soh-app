<div class="card mb-4">
<div class="card-header bg-danger text-white">
Districts with Most Stock Shortage
</div>
<div class="card-body">
<ul>
@foreach($districtShortage as $district => $data)
    <li>
        <strong>{{ $district }}</strong> → <span style="color:red; font-size: 16px; font-weight : 700">{{ $data['count'] }} items have zero stock</span>
        <ul>
            @foreach($data['items'] as $item)
                <li>
                    {{ $item['name'] }}
                    <span style="color: red; font-weight: bold;">
                        ({{ $item['category'] }})
                    </span>
                </li>
            @endforeach
        </ul>
    </li>
@endforeach
    </ul>
    </div>
    </div>
    </div>