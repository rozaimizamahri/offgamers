@extends('layouts.front.app')

@section('title', 'Offgamers')

@section('content')

<section id="wrapper">

    <div class="login-register">
        <div class="login-box card">
            <div class="card-body"> 
                <form class="form-horizontal" id="registerform" action="{{url('/register/post')}}" method="post">
                @csrf

					<p class="m-b-5 m-t-10" style="font-size:12px; text-align:center;">Offgamers</p>
					
                    @if(Session::has('msg_failed'))
                        <p style="color:#ff0000;">{{Session::get('msg_failed')}}</p>
                    @endif

                    <div class="input-group mb-3">
					  <input type="text" id="name" class="form-control name" name="name" value="" required="" placeholder="Full Name" autocomplete="off">
					  <div class="input-group-append">
						<div class="input-group-text">
						  <span class="fa fa-user"></span>
						</div>
					  </div>
					</div>
					
					<div class="input-group mb-3">
					  <input type="email" id="email" class="form-control email" name="email" value="" required="" placeholder="Email Address" autocomplete="off">
					  <div class="input-group-append">
						<div class="input-group-text">
						  <span class="fa fa-user"></span>
						</div>
					  </div>
					</div>
					
					<div class="input-group mb-3">
					  <input type="password" id="password" class="form-control password" name="password" value="" required="" placeholder="Password" autocomplete="off"> 
					  <div class="input-group-append">
						<div class="input-group-text">
						  <span class="fa fa-lock"></span>
						</div>
					  </div>
					</div> 

                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Register</button>
                        </div>
                    </div>  

                    <a href="{{url('/login')}}">Login</a>
                </form> 
            </div>
        </div>
    </div>
	
</section>

@endsection
