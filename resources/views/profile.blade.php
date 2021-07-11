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
            text-align: center;
            background: black;
            color: #f6993f;
            line-height: 50px;
            position: absolute;
            border-radius: 50% 50%;
            bottom: 0px;
            right: 0px;
            border: 5px solid #f6993f;
            /* opacity: 0.3; */
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
            color: #fff;
        }


        .floatingButton .fa {
            transform: rotate(0deg);
            transition: all 0.4s;
        }

        .floatingButton.open .fa {
            transform: rotate(270deg);
        }

        .floatingMenu {
            position: absolute;
            bottom: 70px;
            right: 0px;
            /* width: 200px; */
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
            -webkit-box-shadow: 1px 3px 5px rgba(211, 224, 255, 0.5);
            box-shadow: 1px 3px 5px rgba(211, 224, 255, 0.5);
        }

        .floatingMenu li a:hover {
            margin-right: 10px;
            text-decoration: none;
        }

    </style>
@endsection

@section('content')
    <div class="container-fluid rounded p-3" style="background-color: #1f1f1f">
        <div class="container" style="max-width: 488px; width: 100%;">
            <div class="d-flex flex-column">
                <div class="contain hovereffect d-flex justify-content-center p-3">
                    <img style="width:200px; height:200px; border-radius:50%" src="{{ asset('assets/images/profile/'.auth()->user()->userimage) }}" alt="">
                </div>
                <div class="p-3 text-center row justify-content-center">
                    <div class="col-12">
                        <h3>{{auth()->user()->name}}</h3>
                    </div>
                    <div class="col-12 text-center row p-3 justify-content-center" style="color: #636b6f">
                        <div class="col-4 row" >
                            <div class="col-12">
                                <h4>Like</h4>
                            </div>
                            <div class="col-12">
                                <h4>{{$medias->count()}}</h4>
                            </div>
                        </div>
                        <div class="col-4 row" >
                            <div class="col-12">
                                <h4>Post</h4>
                            </div>
                            <div class="col-12">
                                <h4>{{$totalPost}}</h4>
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
        
    </div>
    <div class="grid masonry">
        <!-- .grid-sizer empty element, only used for element sizing -->
        <div class="grid-sizer"></div>
        <div class="gutter-sizer"></div>

        @foreach($medias as $item)
        
        <div class="grid-item">
            <div class="contain hovereffect" data-toggle="modal" data-target="#imageModal">
                @isset($item->image)
                    <img class="img-responsive" src="{{ asset($item->full_path) }}" alt="">
                @else
                    <video autoplay muted loop>
                        <source src="{{ asset($item->full_path) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                @endisset
                <div class="fav">
                    <ion-icon name="star" @if (!$item->user_star) style="display:none;" @endif id="starIconTop_{{ $item->media_id }}"></ion-icon>
                </div>
                <div class="overlay">
                    <h2>
                        <span>{{ $item->title }}</span>
                        <div class="react">
                            <ion-icon name="heart"></ion-icon>
                            <span id="likeCount_{{ $item->media_id }}">{{ $item->like_count }}</span>
                        </div>
                    </h2>
                    <div class="icon">
                        <a href="#">
                            <ion-icon name="cloud-download-outline"></ion-icon>
                        </a>
                        <a href="#" onclick="onLikeMedia({{ $item->media_id }})">
                        <ion-icon @if ($item->user_like) name="heart" @else
                                    name="heart-outline" @endif
                                id="likeIcon_{{ $item->media_id }}">
                            </ion-icon>
                        </a>
                        <a href="#" onclick="onStarMedia({{ $item->media_id }})">
                        <ion-icon @if ($item->user_star) name="star" @else
                                    name="star-outline" @endif
                                id="starIcon_{{ $item->media_id }}">
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

                </div>
            </div>
        </div>
    
    @endforeach
</div>

    <!-- Modal -->
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
                                Kaneki Ken
                            </h3>
                        </div>
                        <a id="link-modal" target="_blank">
                            <img id="img-modal" class="img-responsive">
                        </a>
                        <video id="video-modal" muted controls>
                            <source id="videosrc-modal" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="accordionModal" class="accordion shadow">
                                <!-- Accordion item 1 -->
                                <div class="card" style="border:0px">
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
                <a href="#">Edit Profile</a>
            </li>
        </ul>
    </div>
</div>
@endsection

@section('script-bottom')
    <script>
         $(document).ready(function(){
            $('.floatingButton').on('click',
            function(e){
                e.preventDefault();
                $(this).toggleClass('open');
                if($(this).children('.fa').hasClass('fa-plus'))
                {
                    $(this).children('.fa').removeClass('fa-plus');
                    $(this).children('.fa').addClass('fa-close');
                } 
                else if ($(this).children('.fa').hasClass('fa-close')) 
                {
                    $(this).children('.fa').removeClass('fa-close');
                    $(this).children('.fa').addClass('fa-plus');
                }
                $('.floatingMenu').stop().slideToggle();
            }
        );
        $(this).on('click', function(e) {
            var container = $(".floatingButton");

            // if the target of the click isn't the container nor a descendant of the container
            if (!container.is(e.target) && $('.floatingButtonWrap').has(e.target).length === 0) 
            {
                if(container.hasClass('open'))
                {
                    container.removeClass('open');
                }
                if (container.children('.fa').hasClass('fa-close')) 
                {
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

        $(document).on("click", ".grid-item", function() {
            $("#img-modal").hide();
            $("#video-modal").hide();
            var imagePath = $(this).children().find("img").attr("src");
            var title = $(this).children().find("span").first().text();
            if (typeof imagePath === 'undefined') {
                var videoPath = $(this).children().find("video").find('source').attr("src");
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

            $("#title-modal").text(title)
        });

        // Like Media Script
        async function onLikeMedia(id) {
            var res = await axios.post('{{ route('like.store') }}', {
                media_id: id
            });

            var data = res.data;

            if (data.status == 1) {
                $('#likeIcon_' + data.media_id).attr('name', 'heart');
            } else if (data.status == 0) {
                $('#likeIcon_' + data.media_id).attr('name', 'heart-outline');
            }

            $('#likeCount_' + data.media_id).html(data.like_count);
        }

        // Star Media Script
        async function onStarMedia(id) {
            var res = await axios.post('{{ route('star.store') }}', {
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
    </script>
@endsection
