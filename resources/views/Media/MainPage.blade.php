@extends('layouts.master')

@section('css')
    <style>
        .contain {
            height: 300px;
            width: 100%;
            border-radius: 16px;
        }

        .contain img {
            object-fit: cover;
            width: 100%;
            height: 100%;
            border-radius: 16px;

        }

        .masonry {
            width: 90%;
            margin: 0 auto;
        }

        /* fluid 5 columns */
        .grid-sizer,
        .grid-item {
            width: 19%;
            margin-bottom: 20px;
        }

        .gutter-sizer {
            width: 1%;
        }

        @media screen and (max-width: 1200px) {

            .grid-sizer,
            .grid-item {
                width: 30%;
                margin-bottom: 20px;
            }

            .gutter-sizer {
                width: 5%;
            }
        }

        @media screen and (max-width: 992px) {

            .grid-sizer,
            .grid-item {
                width: 49%;
                margin-bottom: 20px;
            }

            .gutter-sizer {
                width: 2%;
            }
        }

        @media screen and (max-width: 768px) {
            .masonry {
                width: 90%;
            }

            .grid-sizer,
            .grid-item {
                width: 100%;
                margin-bottom: 20px;
            }

            .gutter-sizer {
                width: 0%;
            }
        }

    </style>

@endsection

@section('content')
<a href="{{route('Media.Media.create') }}">
<button style="float: right;">Insert</button>
</a>
    <div class="grid masonry">
        <!-- .grid-sizer empty element, only used for element sizing -->
        <div class="grid-sizer"></div>
        <div class="gutter-sizer"></div>
        @foreach ($userMedia as $key => $value) 
                <div class="grid-item">
                    <div class="contain">
                        <?php 
                        $extension = explode('.' , $value->path)[1];
                        if ($extension == "x-flv" || $extension == "mp4" || $extension == "x-mpegURL" || $extension == "MP2T" || $extension == "3gpp" || $extension == "quicktime" || $extension == "x-msvideo" || $extension == "x-ms-wmv") { ?>
                                <video width="300" height="200" controls src="{{ asset('assets/Media/' . $value->path) }}" ></vidoe>
                            <?php } else { ?>
                                <img width="300" height="200" src="{{ asset('assets/Media/' . $value->path) }}" alt="">
                        <?php } ?>
                    </div>
                    <a href="{{ URL::to('Media/edit/' . $value->id) }}">
                        <button class="btn btn-success">Update</button>
                    </a>
                    <a href="{{ URL::to('Media/destroy/' . $value->id) }}">
                        <button class="btn btn-danger">Delete</button>
                    </a>
                    <br>
                </div> 
            @endforeach

    </div>
@endsection

@section('script-bottom')
    <script>
        $('.grid').masonry({
            columnWidth: '.grid-sizer',
            itemSelector: '.grid-item',
            gutter: '.gutter-sizer',
            percentPosition: true
        })
    </script>
@endsection
