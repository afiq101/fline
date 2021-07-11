@extends('layouts.master')

@if(!empty($failed))
  <div class="alert alert-success"> {{ $failed }}</div>
@endif

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Upload Page</div>

                <div class="card-body">
                    <form action="{{route('Media.Media.store')}}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label text-md-right">Title</label>
                        <div class="col-md-6">
                            <input id="name" type="name" class="form-control" name="name" value="" required autofocus>
                        </div>
                    </div>

                    <input type="hidden" id="add" name="add" value="add">
                    

                    <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label text-md-right">Description</label>
                        <div class="col-md-6">
                            <input id="desc" type="text" class="form-control" name="desc" value=""  autofocus>
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                    <label for="file" class="col-md-3 col-form-label text-md-right">Picture</label>
                        <div class="col-md-6">
                            <input type="file" name="file" required onchange="previewFile(this);">
                        </div>
                    </div>

                    
                    <div class="form-group row">
                    <label for="file" class="col-md-3 col-form-label text-md-right"></label>
                        <div class="col-md-6">
                            <img id="previewImg" width="300" height="200"></img>
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
        var file = $("input[type=file]").get(0).files[0];
        
        if(file){
            var reader = new FileReader();
            
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>