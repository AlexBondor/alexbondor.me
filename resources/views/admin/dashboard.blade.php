@extends('app')

@section('content')
    <h1 class="dashboard-title">Creative corner</h1>
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <form class="new-entry-form" method="POST" action="/dashboard">
                {!! csrf_field() !!}
                <a class="pull-right" href="http://parsedown.org/tests/" target="_blank">help</a>
                <textarea class="form-control new-entry-textarea" rows="20"
                          placeholder="Craft something awesome.." onkeyup="parsedown()"></textarea>
                <br>
                <button class="btn btn-block" type="submit">Ready</button>
            </form>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div id="new-entry-form-preview">
            </div>
        </div>
    </div>
@section('script')
    @parent
    <script type="text/javascript">
        function parsedown() {
            $.ajax({
                type: "GET",
                url: '/parsedown',
                data: {
                    'text': $('.new-entry-textarea').val()
                }
            }).done( function (data){
                $('#new-entry-form-preview').html(data);
            });
        }
    </script>
    @endsection
@endsection