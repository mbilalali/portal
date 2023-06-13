<div class="head">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a href="javascript:;" class="logo">
                    <img src="{{ URL::to('/') }}/assets/images/logo.png" alt="">
                </a>
            </div>
            <div class="col-md-9">
                <ul class="topinfo pull-right">
                    <li>Call Today To Register By Phone </li>
                    <li><a href="tel:1-888-900-3382">Toll Free 1-888-900-3382</a></li>
                </ul>
                <ul class="navbar-nav navbar  pull-right">
                    <li><a href="/" class="active">HOME</a></li>
                    <li><a href="/add-post">ADD A COURSE</a></li>
                    <li><a href="/courses">ALL COURSES</a></li>
                    <li><a href="/cart">CART ({{ count(session('cart')) }})</a></li>
                    @if (Auth::check())
                        <li><a href="/logout" class="btn green">Logout</a></li>
                    @else
                        <li><a href="/register" class="btn">Enroll</a></li>
                        <li><a href="/login" class="btn green">Login</a></li>
                    @endif

                </ul>
            </div>
        </div>
    </div>
</div>
<div class="card-body">
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
</div>
