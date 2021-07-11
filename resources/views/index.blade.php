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

        .dp {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

    </style>
@endsection

@section('content')
    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Launch demo modal
    </button> --}}
    <div class="grid masonry">
        <!-- .grid-sizer empty element, only used for element sizing -->
        <div class="grid-sizer"></div>
        <div class="gutter-sizer"></div>
        <div class="grid-item" data-toggle="modal" data-target="#imageModal" data-toggle="modal" data-target="#imageModal">
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
        <div class="grid-item" data-toggle="modal" data-target="#imageModal" data-toggle="modal" data-target="#imageModal">
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
        <div class="grid-item" data-toggle="modal" data-target="#imageModal">
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
        <div class="grid-item" data-toggle="modal" data-target="#imageModal">
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
        <div class="grid-item" data-toggle="modal" data-target="#imageModal">
            <div class="contain hovereffect">
                <img class="img-responsive" src="{{ asset('assets/images/media/img3.jpg') }}" alt="">
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
        <div class="grid-item" data-toggle="modal" data-target="#imageModal">
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
        <div class="grid-item" data-toggle="modal" data-target="#imageModal">
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
        <div class="grid-item" data-toggle="modal" data-target="#imageModal">
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
        <div class="grid-item" data-toggle="modal" data-target="#imageModal">
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
        <div class="grid-item" data-toggle="modal" data-target="#imageModal">
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
        <div class="grid-item" data-toggle="modal" data-target="#imageModal">
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
        <div class="grid-item" data-toggle="modal" data-target="#imageModal">
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

    <!-- Dynamic Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="ct-header">
                        <div class="ct-header-title">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h3 class="position-absolute" style="top:10px;left:10px">
                                Kaneki Ken
                            </h3>
                        </div>
                        <a href="{{ asset('assets/images/media/img9.jpg') }}" id="link-modal" target="_blank">
                            <img id="img-modal" class="img-responsive">
                        </a>
                        <video autoplay muted loop>
                            <source src="{{ asset('assets/images/media/vid2.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="accordionModal" class="accordion shadow">
                                <!-- Accordion item 1 -->
                                <div class="card">
                                    <div id="headingOne" class="card-header bg-white shadow-sm border-0">
                                        <h6 class="mb-0 font-weight-bold"><a href="#" data-toggle="collapse"
                                                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                                                class="d-block position-relative text-dark text-uppercase collapsible-link py-2">Details</a>
                                        </h6>
                                    </div>
                                    <div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionModal"
                                        class="collapse">
                                        <div class="card-body p-3">
                                            <table>
                                                <tr>
                                                    <td style="width:100px">Uploaded by</td>
                                                    <td style="width:30px">:</td>
                                                    <td>Adi Iman</td>
                                                </tr>
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
                                    {{-- <div id="headingTwo" class="card-header bg-white shadow-sm border-0">
                                        <h6 class="mb-0 font-weight-bold"><a href="#" data-toggle="collapse"
                                                data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"
                                                class="d-block position-relative text-dark text-uppercase collapsible-link py-2">Comment</a>
                                        </h6>
                                    </div>
                                    <div id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordionModal"
                                        class="collapse">
                                        <div class="row p-3">
                                            <div class="col-3">
                                                <img class="dp" src="{{ asset('assets/images/profile/user001.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="col-5"></div>
                                            <div class="col-4"></div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
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

        $(document).on("click", ".grid-item", function() {
            var imagePath = $(this).children().find("img").attr("src");
            if (typeof imagePath === 'undefined') {
                console.log("viDE")
                return;
            } else {

                $("#img-modal").prop("src", imagePath);
                $("#link-modal").attr("href", imagePath);
            }
            // console.log(imagePath)
        });
    </script>
@endsection
