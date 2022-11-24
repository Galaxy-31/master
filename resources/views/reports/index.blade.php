@extends('layouts.master')

@section('title')
    Profit & Lost
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Profit & Lost</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-info" href="{{ route('reports.excel') }}"> Export</a>
            </div>
        </div>
    </div>
    <br>

    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Category</th>
                @foreach (transactions as $transaction)
                    <th>{{ $transaction->dates }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
                @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $transaction->name }}</td>
                    <td>{{ $transaction->debit + $transaction->credit }}</td>
                </tr>
                @endforeach
                <tr>
                    <td>Net Income</td>
                    @foreach ($transactions as $transaction)
                        <td>Net Income</td>
                    @endforeach
                </tr>
            </tbody>
    </table>
@endsection
