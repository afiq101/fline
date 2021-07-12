@extends('layouts.master')

@section('css')

    <link href="{{ URL::asset('assets/css/hover.css') }}" id="style-css" rel="stylesheet">

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

        .floatingButtonWrap {
            display: block;
            position: fixed;
            bottom: 45px;
            right: 45px;
            z-index: 999999999;
        }

        .floatingButtonInner {
            position: relative;
        }

        .floatingButton {
            display: block;
            width: 60px;
            height: 60px;
            background: black;
            color: #f6993f;
            position: absolute;
            border-radius: 50% 50%;
            bottom: 0px;
            right: 0px;
            border: 5px solid #f6993f;
            opacity: 1;
            transition: all 0.4s;
        }

        .floatingButton .fa {
            font-size: 20px !important;
        }

        .floatingButton.open,
        .floatingButton:hover,
        .floatingButton:focus,
        .floatingButton:active {
            opacity: 1;
            color: #f6993f;
        }


        .floatingButton .fa {
            transform: rotate(0deg);
            transition: all 0.4s;
            margin: 15px 18px;
        }

        .floatingButton.open .fa {
            transform: rotate(270deg);
        }

        .floatingMenu {
            position: absolute;
            bottom: 61px;
            right: 0px;
            display: none;
        }

        .floatingMenu li {
            width: 100%;
            float: right;
            list-style: none;
            text-align: right;
            margin-bottom: 5px;
        }

        .floatingMenu li a {
            padding: 8px 15px;
            display: inline-block;
            background: #f6993f;
            color: black;
            border-radius: 5px;
            overflow: hidden;
            white-space: nowrap;
            transition: all 0.4s;
            /* -webkit-box-shadow: 1px 3px 5px rgba(0, 0, 0, 0.22);
                                                                        box-shadow: 1px 3px 5px rgba(0, 0, 0, 0.22); */
            /* -webkit-box-shadow: 1px 3px 5px rgba(211, 224, 255, 0.5);
                                                                box-shadow: 1px 3px 5px rgba(211, 224, 255, 0.5); */
        }

        .floatingMenu li a:hover {
            margin-right: 10px;
            text-decoration: none;
        }

        .dark-bg {
            max-width: 488px;
            width: 100%;
            background: linear-gradient(0deg, rgba(31, 26, 29, 0.3), rgba(31, 26, 29, 0.3))
        }

        .banner {
            height: 233px;
            width: 100%;
            position: absolute;
            top: 0px;
            left: 0px;
        }

        .profile {
            position: relative;
        }

    </style>
@endsection

@section('content')
    {{-- <div class="banner" @isset(auth()->user()->userimage) style="background-image:
        url({{ asset('assets/images/media/img1.jpg') }})" @else style="background-image:
        url({{ asset('assets/images/media/img2.jpg') }})" @endisset>

    </div> --}}
    <div class="container dark-bg profile">
        <div class="banner" @isset(auth()->user()->userimage) style="background-image:
            url({{ asset('assets/images/media/img1.jpg') }})" @else style="background-image:
            url({{ asset('assets/images/media/img2.jpg') }})" @endisset>

        </div>
        <div class="d-flex flex-column">
            <div class="contain hovereffect d-flex justify-content-center p-3" style="cursor: unset;">
                @isset(auth()->user()->userimage)
                    <img style="width:200px; height:200px; border-radius:50%"
                        src="{{ asset('assets/images/profile/' . auth()->user()->userimage) }}" alt="">
                @else
                    <img style="width:200px; height:200px; border-radius:50%"
                        src="{{ asset('assets/images/profile/default-photo.png') }}" alt="">
                @endisset
            </div>
            <div class="p-3 text-center row justify-content-center">
                <div class="col-12">
                    <h3>{{ auth()->user()->name }}</h3>
                </div>
                <div class="col-12 text-center row p-3 justify-content-center">
                    <div class="col-4 row">
                        <div class="col-12">
                            <h4>Like</h4>
                        </div>
                        <div class="col-12">
                            <h4>{{ $medias->count() }}</h4>
                        </div>
                    </div>
                    <div class="col-4 row">
                        <div class="col-12">
                            <h4>Post</h4>
                        </div>
                        <div class="col-12">
                            <h4>{{ $totalPost }}</h4>
                        </div>
                    </div>
                    <div class="col-4 row">
                        <div class="col-12">
                            <h4>Star</h4>
                        </div>
                        <div class="col-12">
                            <h4>5</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid masonry">
        <!-- .grid-sizer empty element, only used for element sizing -->
        <div class="grid-sizer"></div>
        <div class="gutter-sizer"></div>

        @foreach ($medias as $item)
            <div class="grid-item" onclick="getMedia(event,{{ $item->id }})">
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
                        <ion-icon name="star" @if (!$item->user_star) style="display:none;" @endif
                            id="starIconTop_{{ $item->id }}"></ion-icon>
                    </div>
                    <div class="overlay">
                        <h2>
                            <span>{{ $item->title }}</span>
                            <div class="react">
                                <ion-icon name="heart"></ion-icon>
                                <span id="likeCount_{{ $item->id }}">{{ $item->like_count }}</span>
                            </div>
                        </h2>
                        <div class="icon">
                            <a href="#" onclick="downloadMedia(event,'{{ $item->path }}')">
                                <ion-icon name="cloud-download-outline"></ion-icon>
                            </a>
                            <a href="#" onclick="onLikeMedia(event,'{{ $item->id }}')">
                            <ion-icon @if ($item->user_like) name="heart" @else
                                                                                                                                                                                                                                                                                        name="heart-outline" @endif id="likeIcon_{{ $item->id }}">
                                </ion-icon>
                            </a>
                            <a href="#" onclick="onStarMedia(event,'{{ $item->id }}')">
                            <ion-icon @if ($item->user_star) name="star" @else
                                                                                                                                                                                                                                                                                        name="star-outline" @endif id="starIcon_{{ $item->id }}">
                                </ion-icon>
                            </a>
                            {{-- <a href="#" >
                                <ion-icon name="bookmark-outline"></ion-icon>
                            </a> --}}
                        </div>
                        @isset($item->image)
                            <div class="dimension">
                                {{ $item->image->width }} * {{ $item->image->height }}
                            </div>
                        @endisset
                        <div id="noti" hidden>
                            {{ $item->userComment }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
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
                            <h3 id="title-modal" class="position-absolute" style="top:10px;left:10px">

                            </h3>
                        </div>
                        <a id="link-modal" target="_blank">
                            <img id="img-modal" class="img-responsive">
                        </a>
                        <video id="video-modal" muted controls>
                            <source id="videosrc-modal" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <div class="comment">
                            <a href="">
                                <ion-icon name="chatbubbles-outline"></ion-icon>
                                <div id="commentnoti" class="noti">
                                    3
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="accordionModal" class="accordion shadow">
                                <!-- Accordion item 1 -->
                                <div class="card" style="border:0px;border-radius:0px">
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
                                                    <td style="width:100px">Description</td>
                                                    <td style="width:30px">:</td>
                                                    <td id="m-desc"></td>
                                                </tr>
                                                <tr>
                                                    <td style="width:100px">Extension</td>
                                                    <td style="width:30px">:</td>
                                                    <td id="m-ext"></td>
                                                </tr>
                                                <tr>
                                                    <td style="width:100px">Path</td>
                                                    <td style="width:30px">:</td>
                                                    <td id="m-path"></td>
                                                </tr>
                                                <tr>
                                                    <td style="width:100px">Upload Date</td>
                                                    <td style="width:30px">:</td>
                                                    <td id="m-date"></td>
                                                </tr>
                                                <tr>
                                                    <td style="width:100px">Resolution</td>
                                                    <td style="width:30px">:</td>
                                                    <td id="m-dimension"></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editprofileModal" tabindex="-1" role="dialog" aria-labelledby="editprofileModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-3">
                    <div class="row justify-content-center">

                        <div class="col-md-12">
                            <form method="POST" action="/updateprofile" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="contain hovereffect d-flex justify-content-center p-5">
                                    @isset(auth()->user()->userimage)
                                        <img style="width:200px; height:200px; border-radius:50%"
                                            src="{{ asset('assets/images/profile/' . auth()->user()->userimage) }}" alt="">
                                    @else
                                        <img style="width:200px; height:200px; border-radius:50%"
                                            src="{{ asset('assets/images/profile/default-photo.png') }}" alt="">
                                    @endisset
                                    <input type="file" name="userimage"
                                        style="opacity: 0.0; position: absolute; top: 0; left: 0; bottom: 0; right: 0; width: 100%; height:100%;" />
                                </div>
                                <div class="form-group row">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div> --}}

                                <div class="form-group row mb-0 p-2">
                                    <div class="col-md-12" style="width: 100%">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="floatingButtonWrap">
        <div class="floatingButtonInner">
            <a href="#" class="floatingButton">
                <i class="fa fa-plus icon-default"></i>
            </a>
            <ul class="floatingMenu">
                <li>
                    <a href="#">Your Media</a>
                </li>
                <li>
                    <a href="" data-toggle="modal" data-target="#editprofileModal">Update Profile</a>
                </li>
            </ul>
        </div>
    </div>
@endsection

@section('script-bottom')
    <script>
        $(document).ready(function() {
            $('.floatingButton').on('click',
                function(e) {
                    e.preventDefault();
                    $(this).toggleClass('open');
                    if ($(this).children('.fa').hasClass('fa-plus')) {
                        $(this).children('.fa').removeClass('fa-plus');
                        $(this).children('.fa').addClass('fa-close');
                    } else if ($(this).children('.fa').hasClass('fa-close')) {
                        $(this).children('.fa').removeClass('fa-close');
                        $(this).children('.fa').addClass('fa-plus');
                    }
                    $('.floatingMenu').stop().slideToggle();
                }
            );
            $(this).on('click', function(e) {
                var container = $(".floatingButton");

                // if the target of the click isn't the container nor a descendant of the container
                if (!container.is(e.target) && $('.floatingButtonWrap').has(e.target).length === 0) {
                    if (container.hasClass('open')) {
                        container.removeClass('open');
                    }
                    if (container.children('.fa').hasClass('fa-close')) {
                        container.children('.fa').removeClass('fa-close');
                        container.children('.fa').addClass('fa-plus');
                    }
                    $('.floatingMenu').hide();
                }
            });
        });

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

        async function getMedia(event, id) {
            $("#img-modal").hide();
            $("#video-modal").hide();
            var res = await axios.post("/api/getMedia", {
                mid: id
            });

            var data = res.data.success[0];
            var imagePath = $(event.path[2]).children().find("img").attr("src");
            var noti = $(event.path[2]).children().find("#noti").text();
            if (typeof imagePath === 'undefined') {
                var videoPath = $(event.path[2]).children().find("video").find('source').attr("src");
                var video = $("#video-modal");
                video.get(0).pause();
                $("#videosrc-modal").attr("src", videoPath);
                video.get(0).load();
                video.get(0).play();
                $("#video-modal").show();
            } else {
                $("#img-modal").prop("src", imagePath);
                $("#link-modal").attr("href", imagePath);
                $("#img-modal").show();
            }

            $("#title-modal").text(data.mediattl)
            $("#m-desc").text(data.mediadesc)
            $("#m-ext").text(data.mediaex)
            $("#m-path").text('/assets/images/media/' + data.mediapath)
            $("#m-date").text(data.mediadateup)
            $("#m-dimension").text(data.imgwidth + ' x ' + data.imgheight)
            $("#commentnoti").text(noti)
            $(".comment a").attr("href", "/comment/" + id)
            $("#imageModal").modal('show');
        }

        // Like Media Script
        async function onLikeMedia(e, id) {
            e.preventDefault();
            e.stopPropagation();
            var res = await axios.post("{{ route('like.store') }}", {
                media_id: id
            });

            var data = res.data;

            if (data.status == 1) {
                $('#likeIcon_' + data.media_id).attr('name', 'heart');
            } else if (data.status == 0) {
                $('#likeIcon_' + data.media_id).attr('name', 'heart-outline');
            }

            $('#likeCount_' + data.media_id).html(data.like_count);
            // $('#imageModal').modal('hide');

        }

        // Star Media Script
        async function onStarMedia(e, id) {
            e.preventDefault();
            e.stopPropagation();
            var res = await axios.post("{{ route('star.store') }}", {
                media_id: id
            });

            var data = res.data;
            console.log(data);
            if (data.status == 1) {
                $('#starIcon_' + data.media_id).attr('name', 'star');
                $('#starIconTop_' + data.media_id).show();

            } else if (data.status == 0) {
                $('#starIcon_' + data.media_id).attr('name', 'star-outline');
                $('#starIconTop_' + data.media_id).hide();
            }
        }

        function downloadMedia(e, path) {
            e.preventDefault();
            e.stopPropagation();

            var link = document.createElement('a');
            link.href = "/assets/images/media/" + path;
            link.download = path;
            link.click();
            link.remove();

        }
    </script>
@endsection
