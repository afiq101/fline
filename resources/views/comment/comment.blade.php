@extends('layouts.master')

@section('css')
    <link href="{{ URL::asset('assets/css/hover.css') }}" id="style-css" rel="stylesheet">

    <style>
        .second {
            width: 100%;
            background-color: #454545;
            border-radius: 4px;
        }

        .scroll::-webkit-scrollbar {
            display: none;
        }

        .scroll {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

    </style>
@endsection

@section('content')
    <div class="container">
        <div class="card shadow-2" style="background-color: #1F1F1F; border-radius: 10px">
            <div class="card-header">
                <b>{{ __($owner[0]->title) }}</b>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        @if ($owner[0]->extension == '.mp4')
                            <video autoplay muted loop style="width: 20vw; border-radius: 10px 0 0 10px">
                                <source src="{{ asset('assets/images/media/' . $owner[0]->path) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img src="{{ asset('assets/images/media/' . $owner[0]->path) }}"
                                style="width: 20vw; border-radius: 10px 0 0 10px" alt="">
                        @endif
                    </div>
                    <div class="col-6">
                        <div class="row">
                            @if ($owner[0]->userimage != null)
                                <img class="rounded-circle"
                                    src="{{ asset('assets/images/profile/' . $owner[0]->userimage) }}" alt="user"
                                    width="40">
                            @else
                                <img class="rounded-circle"
                                    src="https://static.vecteezy.com/system/resources/previews/000/439/863/original/vector-users-icon.jpg"
                                    alt="user" width="40">
                            @endif
                            <p class="mt-auto mb-auto ml-2"> {{ __($owner[0]->name) }} - <span
                                    class="text-muted">{{ date('d/m/Y', strtotime($owner[0]->uploaded_at)) }}</span> </p>
                        </div>
                        <hr style="background-color: white">
                        <b>Description</b>
                        <br>
                        <span class="text-muted ml-3">{{ __($owner[0]->description) }}</span>

                        <br>
                        <br>
                        <b>Comments ({{ $comments->count() }})</b>
                        <br>
                        <input id="commentInp" type="text" placeholder="Add comment..." class="form-control mt-2 mb-2">
                        <div class="scroll" style="overflow-y: auto; height: 25vw;">
                            @foreach ($comments as $comment)
                                <div class="row ml-3 mr-1 mb-2">
                                    <div class="d-flex justify-content-center py-2" style="width: 100%">
                                        <div class="second py-2 px-2"> <span class="text1">{{ $comment->comment }}</span>
                                            <div class="d-flex justify-content-between py-1 pt-2">
                                                <div>
                                                    @if ($comment->userimage != null)
                                                        <img class="rounded-circle"
                                                            src="{{ asset('assets/images/profile/' . $comment->userimage) }}"
                                                            width="18">
                                                    @else
                                                        <img class="rounded-circle"
                                                            src="https://static.vecteezy.com/system/resources/previews/000/439/863/original/vector-users-icon.jpg"
                                                            alt="user" width="18">
                                                    @endif
                                                    <span class="mt-auto mb-auto ml-2 text-muted">{{ $comment->name }} -
                                                        {{ date('d/m/Y', strtotime($comment->commented_at)) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        var commentField = document.getElementById('commentInp');

        commentField.addEventListener("keyup", async function(event) {
            // Number 13 is the "Enter" key on the keyboard
            if (event.keyCode === 13) {
                event.preventDefault();

                axios.post("/api/post-comment/{{ $mid }}", {
                        comment: commentField.value
                    })
                    .then((data) => {
                        swal("Comment Added!", "You submitted a new comment!", "success")
                            .then((value) => {
                                window.location.reload();
                            });
                    });
            }
        });
    </script>
@endpush
