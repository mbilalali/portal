@extends('layouts.webApp')

@section('content')


    <section class="choosecourse">
        <div class="container">
            <div class="row">
                <div class="col-md-6"  data-aos="fade-up">
                    <h2>Choose a Course</h2>
                </div>
            </div>
            <div class="row">
{{--                {{ dd($posts) }}--}}
                @foreach($posts as $post)

                    <div class="col-md-3 course-wrap">
                        <div class="coursebox">
                            <div class="courseimg">
                                <img src="/{{ $post->image }}" alt="img" />
                            </div>
                            <h4>{{ $post->title }}</h4>
                            <h5>${{ $post->price }}</h5>
                            <h3>Category: <a href="/category/{{ $post->category->slug }}">{{ $post->category->title }}</a></h3>
                            <h3>Author: {{ $post->user->name }}</h3>
                            <p>{{ Str::limit($post->content, 100) }}</p>
                            <a href="course/{{ $post->id }}" class="btn">Read More</a>
                            <form action="/cart/store" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $post->id }}">
{{--                                {{ dd(session('cart')) }}--}}
                                <input type="number" name="qty" value="{{ (isset(session('cart')[ $post->id]))? session('cart')[ $post->id]['data']['qty'] : 0 }}" required>
                                <button type="submit" class="btn">Add To Cart</button>
                            </form>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
