@extends('admin/navbar')
@section('subcontent')
    <h1 class="centered-title">Images</h1>
    <form action="/service/file-upload"
          class="dropzone"
          id="my-awesome-dropzone">
        {!! csrf_field() !!}
    </form>
    <div id="myImages">
        @foreach ($images as $image)
            <img class="img-list" src="/{{ $image }}"/>
            <button onclick="removeFile('{{ $image }}')">
                <span class="glyphicon glyphicon-remove"></span>
            </button>
        @endforeach
    </div>
@section('subscript')
    @parent
    <script type="text/javascript">
        Dropzone.options.myAwesomeDropzone = {
            init: function () {
                var _token = document.getElementsByName("_token")[0].value;
                this.on("removedfile", function (file) {
                    $.ajax({
                        type: 'POST',
                        url: '/service/file-remove',
                        data: {
                            'filename': file.name,
                            '_token': _token
                        }
                    }).done(function() {
                       updateImagesRequest();
                    });
                });
                this.on("success", function() {
                    updateImagesRequest();
                });
            },
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            addRemoveLinks: true,

        };

        function updateImagesRequest() {
            $.ajax({
                type: 'GET',
                url: '/dashboard/images'
            }).done(function(images) {
                updateImages(images);
            });
        }

        function removeFile(file) {
            var str = file;
            var res = str.split("/");
            var _token = document.getElementsByName("_token")[0].value;
            $.ajax({
                type: 'POST',
                url: '/service/file-remove',
                data: {
                    'filename': res[1],
                    '_token': _token
                }
            }).done(function(images) {
                updateImages(images);
            });
        }

        function updateImages(images) {
            $('#myImages').html("");
            images.forEach(function(image) {
                var img = "<img class=\"img-list\" src=\"/" + image + "\"/>" +
                        "<button onclick=\"removeFile('" + image + "')\">" +
                        "<span class=\"glyphicon glyphicon-remove\"></span>" +
                        "</button>";
                $('#myImages').append(img);
            });
        }
    </script>
@endsection
@endsection