<form action="{{ route('items.import') }}" method="POST" enctype="multipart/form-data">
@csrf
<label>Select Items Excel File:</label>
<input type="file" name="file" required>
<button type="submit">Upload & Import</button>
</form>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
    @endif
    