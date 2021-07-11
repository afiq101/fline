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
    <div class="container-fluid rounded p-3" style="max-width: 488px; width: 100%;">
        <div class="d-flex flex-column">
            <div class="contain hovereffect d-flex justify-content-center p-3">
                <img style="width:200px; height:200px; border-radius:50%" src="{{ asset('assets/images/profile/'.auth()->user()->userimage) }}" alt="">
            </div>
                <div class="p-5 text-center">
                    <div class="col-12">
                        <h3>{{auth()->user()->name}}
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

        @foreach($medias as $media)
        
        <button type="button" data-toggle="modal" data-target="#exampleModalCenter">
        <div class="grid-item">
            <div class="contain hovereffect">
                <img class="img-responsive" src="{{ asset('assets/images/media/'.$media->path) }}" alt="">
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
    
    @endforeach
    
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
    </script>
@endsection
