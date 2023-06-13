@extends('layouts.webApp')

@section('content')


    <section class="states_section">

        <div class="container">
            <div class="shadow_box add_spaces">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="small_section_titles">
                            <h4>{{ $post->title }}</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="course_details">
                            <p>{{ $post->content }} </p>

                            <a href="" class="course_details_btn">View Approved Courses</a>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <section class="reviews">
        <div class="container">
            <h2 class="center">Recent Reviews</h2>
            <div class="row">
                @foreach($post->mainComments as $comment)

                    <div class="col-md-12">
                        <div class="revbox">
                            <div class="row">
                                <div class="col-md-12">

                                    <strong> {{ $comment->user->name }}</strong>
                                    <h5> {{ $comment->date }}</h5>
                                    <ul class="rating">

                                        @for($i = 0; $i < $comment->rating; ++$i)
                                           <li> <i class="fa fa-star" aria-hidden="true"></i></li>
                                        @endfor
                                    </ul>
                                    <p> {{ $comment->content }}</p>
                                    @foreach($comment->reply as $reply)
                                        <div class="response">
                                            <strong>  {{ $reply->title }}  </strong>
                                            <p>{{ $reply->content }}</p>

                                        </div>

                                    @endforeach
                                    @if($comment->user_id == Auth::id())
                                        <a href="/comment/{{ $comment->id }}">Edit Comment</a> | <a href="edit">Delete Comment</a>
                                    @else
                                        <a href="javascript:;">Reply</a>
                                        <form action="{{route('addreply', $post->id)}}"  class="customform" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="hidden" value="{{ $comment->id }}" name="id">
                                                    <input type="hidden" value="{{ $post->id }}" name="postid">

                                                    <input type="text" name="subject" placeholder="Review Subject" required>
                                                    <select name="rating" id="" required>
                                                        <option disabled selected>Select Your Rating</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                    <button type="submit" name="submit1">Submit</button>
                                                </div>
                                                <div class="col-md-6">
                                                    <textarea name="commentdesc" id="" cols="30" rows="10" placeholder="Review Description" required></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <section class="choosecourse">
        <div class="container">
        <h2>Submit A Review</h2>

        <form class="customform" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <input type="hidden" value="{{ $post->id }}" name="id">

                    <input type="text" name="subject" placeholder="Review Subject" required>
                    <select name="rating" id="" required>
                        <option disabled selected>Select Your Rating</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                    <button type="submit" name="submit2">Submit</button>
                </div>
                <div class="col-md-6">
                    <textarea name="commentdesc" id="" cols="30" rows="10" placeholder="Review Description" required></textarea>
                </div>
            </div>
        </form>
        </div>
    </section>



@endsection
