@extends('layouts.master')

@section('title')
    - Create
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Chart of Account</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('masterchartofaccounts.index') }}"> Back</a>
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
        
    <form action="{{ route('masterchartofaccounts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Code</strong>
                    <input type="text" name="code" class="form-control" placeholder="Code" autofocus>
                </div>
                <div class="form-group">
                    <strong>Name</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name" autofocus>
                </div>
                <div class="form-group">
                    <strong>Category</strong>
                    <input type="text" name="category" class="form-control" placeholder="Category" autofocus>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        
    </form>
@endsection