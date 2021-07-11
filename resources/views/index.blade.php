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

        .comment {
            position: relative;
            width: 45px;
            height: 45px;
            bottom: 50px;
            left: 8px;
            background-color: rgba(0, 0, 0, 0.4);
            border-radius: 50%;
        }

        .comment a {
            color: inherit;
            text-decoration: none;
        }

        .comment a:hover {
            color: inherit;
            text-decoration: none;
        }

        .comment ion-icon {
            font-size: 30px;
            display: block;
            margin: auto;
            padding-top: 6px;
        }

        .comment .noti {
            position: relative;
            bottom: 43px;
            left: 30px;
            width: 21px;
            height: 21px;
            background-color: #FA5F01;
            border-radius: 50%;
            text-align: center;

        }

    </style>
@endsection

@section('content')
    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Launch demo modal
    </button> --}}
    <div class="container-fluid">
        <form method="POST" action="{{ route('home.store') }}">
            @csrf
            <div class="d-flex flex-row">
                <input type="text" name="search" class="form-control" placeholder="Search for FLINEs">
                <input type="submit" class="btn btn-primary ml-1" value="Search">
            </div>
        </form>

        @isset($search)
            <div class="my-3">
                <p class="font-weight-normal">Showing results for query <span
                        class="font-weight-bolder">{{ $search }}</span>
                </p>
            </div>
        @endisset

        @if ($images->count() == 0)
            <div class="my-5">
                <p class="font-weight-bolder text-center text-muted">No FLINEs matches your query</p>
            </div>
        @endif

        <div class="grid masonry">
            <!-- .grid-sizer empty element, only used for element sizing -->
            <div class="grid-sizer"></div>
            <div class="gutter-sizer"></div>

            @foreach ($images as $item)
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
                                <a href="#">
                                    <ion-icon name="cloud-download-outline"></ion-icon>
                                </a>
                                <a href="#" onclick="onLikeMedia('{{ $item->id }}')">
                                <ion-icon @if ($item->user_like) name="heart" @else
                                                                                                                                    name="heart-outline" @endif id="likeIcon_{{ $item->id }}">
                                    </ion-icon>
                                </a>
                                <a href="#" onclick="onStarMedia('{{ $item->id }}')">
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

                        </div>
                    </div>
                </div>
            @endforeach
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
                        <div class="comment">
                            <a href="/comment/1">
                                <ion-icon name="chatbubbles-outline"></ion-icon>
                                <div id="commendnoti" class="noti">
                                    3
                                </div>
                            </a>
                        </div>
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
        async function onStarMedia(id) {
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
    </script>
@endsection
