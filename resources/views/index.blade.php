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
    <div class="grid masonry">
        <!-- .grid-sizer empty element, only used for element sizing -->
        <div class="grid-sizer"></div>
        <div class="gutter-sizer"></div>
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
        <div class="grid-item">
            <div class="contain hovereffect">
                <img class="img-responsive" src="{{ asset('assets/images/media/imggif1.gif') }}" alt="">
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
        <div class="grid-item">
            <div class="contain hovereffect">
                <img class="img-responsive" src="{{ asset('assets/images/media/imggif2.gif') }}" alt="">
                <div class="overlay">
                    <h2>
                        Title
                        <div class="react">
                            <ion-icon name="heart"></ion-icon>
                            <span>1.5k</span>
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
        <div class="grid-item">
            <div class="contain hovereffect">
                <img class="img-responsive" src="{{ asset('assets/images/media/img6.jpg') }}" alt="">
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
        <div class="grid-item">
            <div class="contain hovereffect">
                <img class="img-responsive" src="{{ asset('assets/images/media/imggif3.gif') }}" alt="">
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
        <div class="grid-item">
            <div class="contain hovereffect">
                <img class="img-responsive" src="{{ asset('assets/images/media/img7.jpg') }}" alt="">
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
        <div class="grid-item">
            <div class="contain hovereffect">
                <video autoplay muted loop>
                    <source src="{{ asset('assets/images/media/vid2.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
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
        <div class="grid-item">
            <div class="contain hovereffect">
                <img class="img-responsive" src="{{ asset('assets/images/media/img8.jpg') }}" alt="">
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
        <div class="grid-item">
            <div class="contain hovereffect">
                <img class="img-responsive" src="{{ asset('assets/images/media/img10.jpg') }}" alt="">
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
        <div class="grid-item">
            <div class="contain hovereffect">
                <img class="img-responsive" src="{{ asset('assets/images/media/img11.jpg') }}" alt="">
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
        <div class="grid-item">
            <div class="contain hovereffect">
                <img class="img-responsive" src="{{ asset('assets/images/media/img12.jpg') }}" alt="">
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
        <div class="grid-item">
            <div class="contain hovereffect">
                <video autoplay muted loop>
                    <source src="{{ asset('assets/images/media/vid1.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

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
        // layout Masonry after each image loads
        // $grid.imagesLoaded().progress(function() {
        //     $grid.masonry('layout');
        // });

        video.addEventListener('loadeddata', (event) => {
            console.log('Yay! The readyState just increased to  ' +
                'HAVE_CURRENT_DATA or greater for the first time.');
            $grid.masonry('layout');
        });

        // $grid.on('.grid video', function() {
        //     $grid.masonry('layout');
        // });
    </script>
@endsection
