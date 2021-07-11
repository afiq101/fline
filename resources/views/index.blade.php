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
    <div class="grid masonry">
        <!-- .grid-sizer empty element, only used for element sizing -->
        <div class="grid-sizer"></div>
        <div class="gutter-sizer"></div>
        <div class="grid-item">
            <div class="contain">
                <img src="{{ asset('assets/images/picture/img1.jpg') }}" alt="">
            </div>
        </div>
        <div class="grid-item">
            <div class="contain">
                <img src="{{ asset('assets/images/picture/img2.jpg') }}" alt="">
            </div>
        </div>
        <div class="grid-item">
            <div class="contain">
                <img src="{{ asset('assets/images/picture/img3.jpg') }}" alt="">
            </div>
        </div>
        <div class="grid-item">
            <div class="contain">
                <img src="{{ asset('assets/images/picture/img4.jpg') }}" alt="">
            </div>
        </div>
        <div class="grid-item">
            <div class="contain">
                <img src="{{ asset('assets/images/picture/img5.jpg') }}" alt="">
            </div>
        </div>
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
