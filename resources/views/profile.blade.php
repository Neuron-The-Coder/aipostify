@extends('template')

@section('title', 'Profile')

@section('import')
  <link rel="stylesheet" href="{{ asset('storage/css/profile.css') }}">
  <script src="https://cdn.plot.ly/plotly-2.8.3.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection

@section('content')
  <div class="container-">
    <div class="user-profile">
      <h1>Hello, {{ Auth::user()->name }}</h1>
      <h2>Here is your overall report</h2>
    </div>
    <div class="date-selector">
      <form action="" id="date-range">
        <input type="date" name="from" id="date-from" value="2020-01-01">
        <input type="date" name="from" id="date-to" value="2022-01-01">
        <div class="buttons">
          <button id="readjust" class="submit">Readjust</button>
        </div>
      </form>
    </div>
    <div class="prediction-sales">
      <div class="left">
        <h1 class="title">Profit from sales</h1>
        <div class="overall-sales">
          <div class="number">1.000.000,00 IDR</div>
          <div class="text">For the overall month</div>
        </div>
        <div class="margin-sales">
          <div class="number">5.5%</div>
          <div class="text">Increase from previous margin</div>
        </div>
      </div>
      <div class="right">
        {{-- <img src="{{ asset('storage/images/pred.png') }}" alt="" srcset=""> --}}
        <div id="overall-sales-graph"></div>
      </div>
    </div>

    <div class="prediction-information">
      <div class="overall">
        <div class="overall-result most">
          <div class="header">Most Popular</div>
          <div class="image">
            <img src="" alt="" srcset="">
          </div>
          <div class="title">Most Popular</div>
          <div class="info">Price / Quantities Sold</div>
          <div class="number">
            AAA
          </div>
        </div>
        <div class="overall-result least">
          <div class="header">Least Popular</div>
          <div class="image">
            <img src="" alt="" srcset="">
          </div>
          <div class="title">Least Popular</div>
          <div class="info">Price / Quantities Sold</div>
          <div class="number">
            BBB
          </div>
        </div>
      </div>
      <div class="pie">
        <div class="title">Price / Quantities Sold for all Products</div>
        <div id="product-insight"></div>
      </div>
      <div class="gender">
        <h1>Most Popular by Gender</h1>
        <div class="gender-results">
          <div class="overall-result male">
            <div class="header"><i class="bi bi-gender-male"></i></div>
            <div class="image">
              <img src="" alt="" srcset="">
            </div>
            <div class="title">-</div>
            <div class="info">Quantity Bought</div>
            <div class="number">
              -
            </div>
          </div>
          <div class="overall-result unknown">
            <div class="header"><i class="bi bi-gender-ambiguous"></i></div>
            <div class="image">
              <img src="" alt="" srcset="">
            </div>
            <div class="title">-</div>
            <div class="info">Quantity Bought</div>
            <div class="number">
              -
            </div>
          </div>
          <div class="overall-result female">
            <div class="header"><i class="bi bi-gender-female"></i></div>
            <div class="image">
              <img src="" alt="" srcset="">
            </div>
            <div class="title">-</div>
            <div class="info">Quantity Bought</div>
            <div class="number">
              -
            </div>
          </div>
        </div>
      </div>
      <div class="age">
        
      </div>
    </div>

  </div>

  @include('js.profile-script')

@endsection
