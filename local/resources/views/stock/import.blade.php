@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h3 class="mb-4">Stock Import</h3>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Error Message --}}
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('stock.import') }}" enctype="multipart/form-data">
                @csrf

                {{-- Excel File --}}
                <div class="mb-3">
                    <label class="form-label">Select Excel File (.xlsx)</label>
                    <input 
                        type="file" 
                        name="file" 
                        class="form-control" 
                        accept=".xlsx,.xls"
                        required
                    >
                </div>

                {{-- Import Date --}}
                <div class="mb-3">
                    <label class="form-label">Import Date</label>
                    <input 
                        type="date" 
                        name="import_date" 
                        class="form-control"
                        required
                    >
                </div>

                <button class="btn btn-primary">
                    <i class="bi bi-upload"></i>
                    Upload & Import
                </button>
            </form>

        </div>
    </div>
    <a href="JavaScript:void(0);" class="sample-file-link" onclick="window.location.href='{{ url('local/storage/sample_stock.xlsx') }}'" download><i class="fa fa-download"></i> Download Sample</a>
</div>
@endsection
