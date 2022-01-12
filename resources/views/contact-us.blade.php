@extends('template')

@section('title', 'Contact Us')

@section('import')
  <link rel="stylesheet" href="{{ asset('storage/css/contact-us.css') }}">
@endsection

@section('content')
  <div class="header">
    <div class="header-container">
      <div class="header-title">About Us</div>
      <div class="header-text">Let's get to know each other well</div>
    </div>
  </div>

  <div class="achievement">
    <div class="achievement-container">
      <div class="achievement-title">
        WE ARE TRUSTED AND RELIABLE
      </div>
      <div class="achievement-text">
        For the past two decades, trust has been touted as the all-powerful lubricant that keeps the economic wheels turning and greases the right connections—
      </div>
      <div class="achievement-all">
        <div class="achievement-list">
          <div class="achievement-number">150.000 +</div>
          <div class="achievement-description">happy AiPostify users</div>
        </div>
        <div class="achievement-list">
          <div class="achievement-number">1.000 +</div>
          <div class="achievement-description">companies rely on this tool</div>
        </div>
      </div>
    </div>
  </div>

  <div class="about-us">
    <div class="about-us-container">
      <div class="about-us-left">
        <div class="about-us-title">
          ABOUT US
        </div>
        <div class="about-us-text">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex veniam voluptate, consequatur voluptates deserunt atque deleniti maxime numquam minima neque, repudiandae reprehenderit itaque inventore amet. Accusantium enim veritatis magni, quaerat esse voluptatibus minus qui maiores ipsam eos nulla, a, laborum ullam. Maiores soluta culpa quidem dolore alias ad eveniet veritatis.
        </div>
        <div class="about-us-contacts">
          <a href="#" disabled>
            <i class="bi bi-phone"></i>
            <p>+62 812 xxxx xxxx</p>
          </a>
          <a href="" target="_blank">
            <i class="bi bi-facebook"></i>
            <p>AiPostify Team</p>
          </a>
          <a href="" target="_blank">
            <i class="bi bi-twitter"></i>
            <p>@@aipostify</p>
          </a>
          <a href="" target="_blank">
            <i class="bi bi-instagram"></i>
            <p>@@aipostify_team</p>
          </a>
        </div>

      </div>
      <div class="about-us-right">
        <span></span>
      </div>
    </div>
  </div>

  <script>

  </script>

@endsection