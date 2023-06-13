@extends('layouts.webApp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


            </div>
        </div>
    </div>
</div>

<section class="choosecourse">
    <div class="container">
        <div class="row">
            <div class="col-md-6"  data-aos="fade-up">
                <h2>Choose a Course</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4" data-aos="fade-left">
                <div class="coursebox">
                    <img src="/assets/images/course-1.png" alt="" />
                    <strong>Chiropractic Assistant Training</strong>
                </div>
            </div>
            <div class="col-md-4"  data-aos="fade-up">
                <div class="coursebox">
                    <img src="/assets/images/course-2.png" alt="" />
                </div>
            </div>
            <div class="col-md-4"  data-aos="fade-right">
                <div class="coursebox">
                    <img src="/assets/images/course-3.png" alt="" />
                    <strong>Government Courses</strong>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-left">
                <div class="coursebox">
                    <img src="/assets/images/course-4.png" alt="" />

                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up">
                <div class="coursebox">
                    <img src="/assets/images/course-5.png" alt="" />
                    <strong>Live Seminars</strong>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-right">
                <div class="coursebox">
                    <img src="/assets/images/course-6.png" alt="" />

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
