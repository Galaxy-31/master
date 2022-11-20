@extends('layouts.master')

@section('title')
   - Categories
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Categories</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('categories.create') }}"> Create</a>
            </div>
        </div>
    </div>
    <br>

    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Category Name</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach ($mastercategorycoas as $mastercategorycoa)
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
                ajax: "{{ route('categories.data') }}",
                columns: [{
                        data: "DT_RowIndex",
                        name: "DT_RowIndex",
                        orderable: true,
                        searchable: false
                    },
                    {
                        data: "name",
                        name: "name"
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
