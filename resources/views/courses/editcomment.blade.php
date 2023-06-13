@extends('layouts.webApp')

@section('content')
    <section class="choosecourse">
        <div class="container">
            <h2>Edit Your Comment</h2>
            <form class="customform" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" value="{{ $comment->id }}" name="id">

                        <input type="text" name="title" value="{{ $comment->title }}" placeholder="Review Subject" required>
                        <select name="rating" id="" required>
                            <option disabled selected>Select Your Rating</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                        <button type="submit">Submit</button>
                    </div>
                    <div class="col-md-6">
                        <textarea name="content" id="" cols="30" rows="10" placeholder="Review Description" required>{{ $comment->content }}</textarea>
                    </div>
                </div>
            </form>
        </div>
    </section>



@endsection
