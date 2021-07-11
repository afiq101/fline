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

        .ct-header {
            width: 100%;
            height: 200px;
        }

        .ct-header img {
            object-fit: cover;
            width: 100%;
            height: 100%;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

    </style>
@endsection

@section('content')
    <div class="container-fluid rounded p-3" style="max-width: 488px; width: 100%;">
        <div class="d-flex flex-column">
            <div class="contain hovereffect d-flex justify-content-center">
                <img style="width:200px; height:200px; border-radius:50%" src="{{ asset('assets/images/media/img9.jpg') }}" alt="">
            </div>
                <div class="p-5 text-center">
                    <div class="col-12">
                        <h3>NyzMni
                        </h3>
                    </div>
                    <!-- <div class="col-12">
                        <table>
                            <tr>
                                <td style="width:100px">Description</td>
                                <td style="width:30px">:</td>
                                <td>test/img</td>
                            </tr>
                            <tr>
                                <td style="width:100px">Upload Date</td>
                                <td style="width:30px">:</td>
                                <td>29/02/2021</td>
                            </tr>
                            <tr></tr>
                        </table>
                    </div> -->
                </div>
        </div>
    </div>
    <div class="grid masonry">
        <!-- .grid-sizer empty element, only used for element sizing -->
        <div class="grid-sizer"></div>
        <div class="gutter-sizer"></div>
        @for ($i = 0; $i < 5; $i++)
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        <div class="grid-item">
            <div class="contain hovereffect">
                <img class="img-responsive" src="{{ asset('assets/images/media/img9.jpg') }}" alt="">
                <div class="fav">
                    <ion-icon name="star"></ion-icon>
                </div>
                <div class="overlay">
                    <h2>
                        Title
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
                    <div class="dimension">
                        1920x1080
                    </div>
                </div>
            </div>
        </div>
    </button>
    @endfor
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body mb-3 p-0">
                    <div class="ct-header">
                        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button> --}}
                        <img class="img-responsive" src="{{ asset('assets/images/media/img11.jpg') }}" alt="">
                    </div>
                    <div class="row mt-2 ml-1">
                        <div class="col-12">
                            <h3>Title
                                <div class="float-right mr-2">
                                    Upload by <span class="text-bold"> Adi</span>
                                </div>
                            </h3>
                        </div>
                        <div class="col-12">
                            <table>
                                <tr>
                                    <td style="width:100px">Description</td>
                                    <td style="width:30px">:</td>
                                    <td>test/img</td>
                                </tr>
                                <tr>
                                    <td style="width:100px">Upload Date</td>
                                    <td style="width:30px">:</td>
                                    <td>29/02/2021</td>
                                </tr>
                                <tr></tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
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
