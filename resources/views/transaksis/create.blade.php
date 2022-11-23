@extends('layouts.master')

@section('title')
- Create
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Transaksi</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('transaksis.index') }}"> Back</a>
        </div>
    </div>
</div>
<br>
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('transaksis.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row gap-2 mt-2">
        <div class="col-md-4 col-12 mb-2">
            <div class="form-group">
                <strong>Date</strong>
                <input type="date" autocomplete="off" name="dates" class="form-control" placeholder="Date" autofocus>
            </div>
        </div>

        <div class="col-md-4 col-12 mb-2">
            <div class="form-group">
                <strong>Code</strong>
                <input type="text" autocomplete="off" name="name" class="form-control" placeholder="Code" autofocus>
            </div>
        </div>

        <div class="col-md-4 col-12 mb-2">
            <div class="form-group">
                <strong>Name</strong>
                <input type="text" autocomplete="off" name="name" class="form-control" placeholder="Name" autofocus>
            </div>
        </div>
    </div>

    <hr>
    <div class="row gap-2 mt-2">
        <div class="col-md-4 col-12 mb-2">
            <div class="form-group">
                <strong>Desc</strong>
                <input type="text" autocomplete="off" name="name" class="form-control" placeholder="Desc" autofocus>
            </div>
        </div>

        <div class="col-md-4 col-12 mb-2">
            <div class="form-group">
                <strong>Debit</strong>
                <input type="text" autocomplete="off" name="name" class="form-control" placeholder="Debit" autofocus>
            </div>
        </div>

        <div class="col-md-4 col-12 mb-2">
            <div class="form-group">
                <strong>Credit</strong>
                <input type="text" autocomplete="off" name="name" class="form-control" placeholder="Credit" autofocus>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>

@endsection