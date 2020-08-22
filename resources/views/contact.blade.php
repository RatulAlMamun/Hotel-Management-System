@extends('master')

@section('content')
    <!-- CONTACT -->
    <section class="contact py-5">
        <h1 class="text-center text-uppercase pt-5">Get in Touch With us</h1>
        <hr>
        <div class="container">
            <div class="row py-3">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                     @if(session('contactadd'))
                                   <div class="alert alert-success">{{session('contactadd')}}</div>
                                   @endif
                    <form action="{{route('docontact.submit')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Enter Your Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Enter Email Address</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>

                        <div class="form-group">
                            <label for="phone">Enter Your Phone Number</label>
                            <input type="tel" class="form-control" name="phone" placeholder="Enter your Number">
                        </div>

                        <div class="form-group">
                            <label for="message">Enter Your Message</label><br>
                            <textarea name="subject" class="form-control" placeholder="Type your Message"></textarea>
                        </div>

                        <input type="submit" class="btn btn-primary btn-block text-uppercase" value="Send Message">
                    </form>
                </div>

                <div class="col-md-3"></div>
            </div>
        </div>
    </section>
    <!-- ./CONTACT -->

@endsection