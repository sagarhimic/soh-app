@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h3 class="mb-4">Items Import</h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

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

            <form method="POST" action="{{ route('items.import') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Select Excel File (.xlsx)</label>
                    <input type="file" name="file" class="form-control" accept=".xlsx,.xls" required >
                </div>
                <button class="btn btn-primary">
                    <i class="bi bi-upload"></i>
                    Upload & Import
                </button>
            </form>

        </div>
    </div>
</div>
@endsection