@extends('layouts.master')

@section('title')
- Chart of Account
@endsection

@section('content')
<div class="row justify-space-between display-flex mb-2">
    <!-- <div class="col-sm-12 col-md-6 col-lg-3"> -->
    <div class="col-6">
        <h2>Chart of Account</h2>
        <a class="btn btn-primary" href="{{ route('masterchartofaccounts.create') }}"> Create</a>
        <a class="btn btn-success" href="{{ route('masterchartofaccounts.create') }}"> Export</a>
    </div>
</div>
<br>

<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Code</th>
            <th>Name</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
    </thead>
    @foreach ($masterchartofaccounts as $masterchartofaccount)
    <tbody>
    </tbody>
    @endforeach
</table>
@endsection

@push('scripts')
<script type="text/javascript">
$(function() {
    var table = $('#example').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('masterchartofaccounts.data') }}",
        columns: [{
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                orderable: true,
                searchable: false
            },
            {
                data: "code",
                name: "code"
            },
            {
                data: "name",
                name: "name"
            },
            {
                data: "category",
                name: "category"
            },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false
            },
        ]
    });

    $('#example').on('click', '.delete[data-remote]', function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = $(this).data('remote');
        // confirm then
        $.ajax({
            url: url,
            type: 'DELETE',
            dataType: 'json',
            data: {
                method: '_DELETE',
                submit: true
            }
        }).always(function(data) {
            $('#example').DataTable().draw(false);
        });
    });
});
</script>
@endpush