@extends('template')

@section('title', 'AiPostify')

@section('import')
  <link rel="stylesheet" href="{{ asset("storage/css/index.css") }}">
@endsection

@section('content')
<div class="header">
  <div class="header-overlay"></div>
  <div class="header-container">
    <div class="header-title">
      We work together with you to create a better financial and stock planner with your business.
    </div>
    <div class="header-slogan">
      We are here for you.
    </div>
    <a class="header-contact-us" href="{{ url("/contact-us") }}">
      Contact Us
    </a>
  </div>
</div>

<div class="planner">
  <div class="planner-container">
    <div class="planner-left">
      <div class="planner-title">
        Subscription Planner
      </div>
      <div class="planner-text">
        We provide several subscription options based on your needs.
      </div>
      <div class="planner-learn-more">
        Learn More
      </div>
    </div>
    <div class="planner-right">
      <img src="{{ asset("storage/images/planner.jpg") }}" alt="" srcset="">
    </div>
  </div>
</div>

<div class="ease">
  <div class="ease-overlay"></div>
  <div class="ease-container">
    <div class="ease-title">EASY TO USE</div>
    <div class="ease-text">
      <p>Just import your company stock and financial flow.</p>
      <p><strong>And let us do the rest.</strong></p>
    </div>
    <div class="ease-learn-more">LEARN MORE</div>
  </div>
</div>

@endsection