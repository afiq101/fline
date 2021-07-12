@extends('layouts.master')

@section('css')
    <link href="{{ URL::asset('assets/css/hover2.css') }}" id="style-css" rel="stylesheet">
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <a href="/manage/add">
                <button class="btn btn-primary" style="float: right;">Insert</button>
            </a>
        </div>
        <div class="col-12">
            <div class="grid masonry">
                <!-- .grid-sizer empty element, only used for element sizing -->
                <div class="grid-sizer"></div>
                <div class="gutter-sizer"></div>
                @foreach ($userMedia as $key => $value)
                    <div class="grid-item">
                        <div class="contain hovereffect">
                            <?php 
                                $extension = explode('.' , $value->path)[1];
                                if ($extension == "x-flv" || $extension == "mp4" || $extension == "x-mpegURL" || $extension == "MP2T" || $extension == "3gpp" || $extension == "quicktime" || $extension == "x-msvideo" || $extension == "x-ms-wmv") { ?>
                            <video controls autoplay muted loop>
                                <source src="{{ asset('assets/images/media/' . $value->path) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <?php } else { ?>
                            <img class="img-responsive" src="{{ asset('assets/images/media/' . $value->path) }}" alt="">
                            <?php } ?>
                            <div class="overlay">
                                <h2>{{ $value->title }}</h2>
                                <p class="icon-links">
                                    <a href="{{ URL::to('manage/destroy/' . $value->id) }}">
                                        <ion-icon name="trash"></ion-icon>
                                    </a>
                                    <a href="{{ URL::to('manage/edit/' . $value->id) }}">
                                        <ion-icon name="create"></ion-icon>
                                    </a>
                                </p>
                            </div>
                        </div>
                        {{-- <a href="{{ URL::to('manage/edit/' . $value->id) }}">
                            <button class="btn btn-success">Update</button>
                        </a>
                        <a href="{{ URL::to('manage/destroy/' . $value->id) }}">
                            <button class="btn btn-danger">Delete</button>
                        </a>
                        <br> --}}
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection

@section('script-bottom')
    <script>
        const video = document.querySelector('video');

        // init Masonry
        var $grid = $('.grid').masonry({
            columnWidth: '.grid-sizer',
            itemSelector: '.grid-item',
            gutter: '.gutter-sizer',
            isAnimated: true,
            percentPosition: true,
            animationOptions: {
                duration: 700,
                easing: 'linear',
                queue: false
            }
        });

        video.addEventListener('loadeddata', (event) => {
            $grid.masonry('layout');
        });
    </script>
@endsection
