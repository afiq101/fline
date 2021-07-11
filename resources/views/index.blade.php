@extends('layouts.master')

@section('css')
    <style>
        .icon ion-icon {
            color: white;
            font-size: 22px;
        }

        .fav ion-icon {
            color: #FFAA48;
            font-size: 16px;
        }

        .overlay h2 .react {
            float: right;
        }

        .overlay h2 .react span {
            display: inline-block;
            vertical-align: middle;
        }

        .overlay h2 .react ion-icon {
            color: #ff6156;
            font-size: 18px;
            display: inline-block;
            vertical-align: middle;
        }

    </style>
@endsection

@section('content')
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Launch demo modal
    </button>
    <div class="grid masonry">
        <!-- .grid-sizer empty element, only used for element sizing -->
        <div class="grid-sizer"></div>
        <div class="gutter-sizer"></div>

        @foreach ($images as $item)
            <div class="grid-item">
                <div class="contain hovereffect">
                    @isset($item->image)
                        <img class="img-responsive" src="{{ asset($item->full_path) }}" alt="">
                    @else
                        <video autoplay muted loop>
                            <source src="{{ asset($item->full_path) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @endisset
                    <div class="fav">
                        <ion-icon name="star"></ion-icon>
                    </div>
                    <div class="overlay">
                        <h2>
                            {{ $item->title }}

                            <div class="react">
                                <ion-icon name="heart"></ion-icon>
                                <span>2.3k</span>
                            </div>
                        </h2>
                        <div class="icon">
                            <a href="#">
                                <ion-icon name="cloud-download-outline"></ion-icon>
                            </a>
                            <a href="#">
                                <ion-icon name="heart-outline"></ion-icon>
                            </a>
                            <a href="#">
                                <ion-icon name="star-outline"></ion-icon>
                            </a>
                            <a href="#">
                                <ion-icon name="bookmark-outline"></ion-icon>
                            </a>
                        </div>
                        @isset($item->image)
                            <div class="dimension">
                                {{ $item->image->width }} * {{ $item->image->height }}
                            </div>
                        @endisset

                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body mb-3 p-0">
                    <div class="ct-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <a href="{{ asset('assets/images/media/img11.jpg') }}" target="_blank">
                            <img class="img-responsive" src="{{ asset('assets/images/media/img11.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="row mt-2 ml-1">
                        <div class="col-12">
                            <h3 class="mb-0">Kakashi</h3>
                        </div>
                        <div class="col-12 mb-3" style="font-size:12px">
                            Upload by <span class="text-bold"> Adi</span>
                        </div>
                        <div class="col-12">
                            <table>
                                <tr>
                                    <td style="width:100px">Description</td>
                                    <td style="width:30px">:</td>
                                    <td>test/img</td>
                                </tr>
                                <tr>
                                    <td style="width:100px">Extension</td>
                                    <td style="width:30px">:</td>
                                    <td>.jpg</td>
                                </tr>
                                <tr>
                                    <td style="width:100px">Path</td>
                                    <td style="width:30px">:</td>
                                    <td>fline.test/images/001.jpg</td>
                                </tr>
                                <tr>
                                    <td style="width:100px">Upload Date</td>
                                    <td style="width:30px">:</td>
                                    <td>29/02/2021</td>
                                </tr>
                                <tr>
                                    <td style="width:100px">Resolution</td>
                                    <td style="width:30px">:</td>
                                    <td>1920 x 1080</td>
                                </tr>
                                <tr>
                                    <td style="width:100px">Duration</td>
                                    <td style="width:30px">:</td>
                                    <td>2.30 min</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
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
