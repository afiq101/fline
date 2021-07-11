@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Upload Page</div>

                <div class="card-body">
                    <?php $value = $updateMedia[0] ?>
                    <form action="/Media/upload" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label text-md-right">Title</label>
                        <div class="col-md-6">
                            <input id="name" type="name" class="form-control" name="name" value="<?= $value->title ?>" required autofocus>
                        </div>
                    </div>

                    <input type="hidden" id="id" name="id" value="<?= $value->id ?>">
                    <input type="hidden" id="path" name="path" value="<?= $value->path ?>">
                    <input type="hidden" id="add" name="add" value="add">


                    <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label text-md-right">Description</label>
                        <div class="col-md-6">
                            <input id="desc" type="text" class="form-control" name="desc" value="<?= $value->description ?>" required autofocus>
                        </div>
                    </div>


                    <div class="form-group row">
                    <label for="file" class="col-md-3 col-form-label text-md-right">Picture</label>
                        <div class="col-md-6">
                            <input type="file" name="file"  onchange="previewFile(this);">
                        </div>
                    </div>


                    <div class="form-group row">
                    <label for="file" class="col-md-3 col-form-label text-md-right"></label>
                        <div id="preview" class="col-md-6">
                        </div>
                    </div>


                    <div style="float: right">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function previewFile(input){
        $( "#previewImg" ).remove();
        var file = $("input[type=file]").get(0).files[0];
        console.log(file.type.split('/')[0]);
        if(file.type.split('/')[0] == 'image')
            $("#preview").append('<img id="previewImg" width="300" height="200"></img>');
        else if(file.type.split('/')[0] == 'video')
            $("#preview").append('<video controls id="previewImg" width="300" height="200"></video>');

        if(file){
            var reader = new FileReader();

            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }

    function loadPreview(){
            let file =  `<?= $value->path ?>`;
            let extension = file.split('.')[1];
            $( "#previewImg" ).remove();
            if (extension == "x-flv" || extension == "mp4" || extension == "x-mpegURL" || extension == "MP2T" || extension == "3gpp" || extension == "quicktime" || extension == "x-msvideo" || extension == "x-ms-wmv")
                    $("#preview").append('<video controls id="previewImg" width="300" height="200"></video>');
            else
                $("#preview").append('<img id="previewImg" width="300" height="200"></img>');
            $("#previewImg").attr("src", `http://localhost:8000/assets/Media/${file}`);
    }

    setTimeout(() => {
        loadPreview()
    }, 1000);
</script>