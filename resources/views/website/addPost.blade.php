@extends('layouts.webApp')

@section('content')


    <section class="choosecourse">
        <div class="container">
            <div class="row">
                <div class="col-md-6"  data-aos="fade-up">
                    <h2>Add a Course</h2>
                </div>
            </div>
            <form class="customform" method="POST" enctype="multipart/form-data">
                @csrf
                   <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="title" placeholder="Course Title" required>
                            <input type="number" name="price" placeholder="Course Price" required>
                            <select name="category" id="">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                            <input type="file" name="image" id="" required>
                            <button type="submit">Submit</button>
                        </div>
                       <div class="col-md-6">
                           <textarea name="postcontent" id="" cols="30" rows="10" placeholder="Course Description" required></textarea>
                       </div>
                    </div>
            </form>
        </div>
    </section>
@endsection
