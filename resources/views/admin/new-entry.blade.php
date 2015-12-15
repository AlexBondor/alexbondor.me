@extends('admin/navbar')
@section('subcontent')
    <h1 class="centered-title">Creative corner</h1>
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <div class="new-entry-div">
                <form method="POST" action="/dashboard/new-entry">
                    {!! csrf_field() !!}
                    <a class="pull-right" href="http://parsedown.org/tests/" target="_blank">help</a>
                    <br>
                    @if($entry != null)
                        <input name="entryId" type="hidden" value="{{  $entry->id }}"/>
                        <input class="new-entry-title" name="title" placeholder="Title" value="{{ $entry->title }}"/>
                        <br>
                        <br>
                        <select id="cover" class="new-entry-cover" name="cover" placeholder="Cover">
                            <option value="{{ $entry->cover }}">{{ $entry->cover }}</option>
                        </select>
                        <br>
                        <br>
                        <textarea name="rawContent" class="form-control new-entry-textarea" rows="20"
                                  placeholder="Craft something awesome.."
                                  onkeyup="parsedown()">{{ $entry->rawContent }}</textarea>
                        <div class="pull-right">
                            @if ($entry->isHidden)
                                <input type="checkbox" name="isHidden" checked> Hidden?
                            @else
                                <input type="checkbox" name="isHidden"> Hidden?
                            @endif
                        </div>
                        <br>
                        <button class="btn btn-block" type="submit">Edit</button>
                    @else
                        <input class="new-entry-title" name="title" placeholder="Title"/>
                        <br>
                        <br>
                        <select id="cover" class="new-entry-cover" name="cover" placeholder="Cover">
                        </select>
                        <br>
                        <br>
                        <textarea name="rawContent" class="form-control new-entry-textarea" rows="20"
                                  placeholder="Craft something awesome.." onkeyup="parsedown()"></textarea>

                        <div class="pull-right">
                            <input type="checkbox" name="isHidden"> Hidden?
                        </div>
                        <br>
                        <button class="btn btn-block" type="submit">Ready</button>
                    @endif
                </form>
                <form action="/service/file-upload"
                      class="dropzone"
                      id="my-awesome-dropzone">
                    {!! csrf_field() !!}
                </form>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div id="new-entry-form-preview">
            </div>
        </div>
    </div>
@section('subscript')
    @parent
    <script type="text/javascript">
        function parsedown() {
            $.ajax({
                type: "GET",
                url: '/service/parsedown',
                data: {
                    'text': $('.new-entry-textarea').val()
                }
            }).done(function (data) {
                $('#new-entry-form-preview').html(data);
            });
        }

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
                    });
                    updateImagesRequest();
                });
                this.on("success", function () {
                    updateImagesRequest();
                });
            },
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            addRemoveLinks: true,

        };

        $(document).ready(function () {
            updateImagesRequest();
        });

        function updateImagesRequest() {
            $.ajax({
                type: 'GET',
                url: '/dashboard/images'
            }).done(function (images) {
                updateImages(images);
            });
        }

        function updateImages(images) {
            $('#cover').html("");
            if (images.length == 0) {
                var img = "<option value=\"/uploads/default.png\">Default</option>";
                $('#cover').append(img);
            }
            images.forEach(function (image) {
                var img = "<option value=\"/" + image + "\">" + image + "</option>";
                $('#cover').append(img);
            });
        }
    </script>
@endsection
@endsection