@extends('admin/navbar')
@section('content')
    {!! csrf_field() !!}
    <h1 class="centered-title">Dashboard</h1>
    <div id="myEntries">
        @foreach($entries as $entry)
            <button onclick="removeEntry('{{ $entry->id }}')">
                <span class="glyphicon glyphicon-remove"></span>
            </button>
            <button onclick="editEntry('{{ $entry->id }}')">
                <span class="glyphicon glyphicon-edit"></span>
            </button>
            <h3>{{ $entry->title }}</h3> <span>{{ $entry->created_at }}</span>
            <br>
            <h5>{{ $entry->cover }}</h5>
            <br>
            <br>
        @endforeach
    </div>
@section('script')
    @parent
    <script type="text/javascript">
        function removeEntry(id) {
            if (confirm("Are you sure?")) {
                var _token = document.getElementsByName("_token")[0].value;
                $.ajax({
                    type: 'POST',
                    url: '/service/entry-remove',
                    data: {
                        'entryId': id,
                        '_token': _token
                    }
                }).done(function() {
                    location.reload();
                });
            }
        }

        function editEntry(id) {
            document.location.href = '/dashboard/new-entry?id=' + id;
        }
    </script>
@endsection
@endsection