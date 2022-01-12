@extends('template')

@section('title', 'Output')

@section('import')
  <link rel="stylesheet" href="{{ asset('storage/css/output-stock.css') }}">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection

@section('content')
  <div class="container">

    <div class="" id="message"></div>

    <div class="step step-1">
      <div class="title">Step 1 : Pick your Product</div>
      <div class="search-area">
        <input type="text" name="" id="search-box">
        <button id="search-submit"><i class="bi bi-search"></i></button>
      </div>
      <div class="product-area">

      </div>
    </div>

    <div class="step step-2">
      <div class="title">Step 2 : Adjust the Product Details</div>
      <div class="product-detail-area">
        <div class="loading">Click the product above to proceed</div>
        {{-- <form action="" id="product-detail-form">
          <input type="text" name="" class="product-name" disabled>
          <input type="number" name="" id="" class="product-quantity">
          <input type="number" name="" id="" class="product-price-per-unit">
          <input type="number" name="" id="" class="product-total">
          <div class="buttons">
            <button id="product-add" class="submit">Add Button</button>
          </div>
        </form> --}}
      </div>
    </div>

    <div class="step step-3">
      <div class="title">Step 3 : Give the additional info about your customer</div>
      <div class="additional-info-area">
        <form action="" id="additional-info-form">
          <input type="text" name="" id="additional-info-name" placeholder="Customer Name" class="additional-info-update">
          <input type="number" name="" id="additional-info-age" placeholder="Customer Age Estimation" class="additional-info-update">
          <select name="" id="additional-info-gender" class="additional-info-update" value="Male">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Unknown">Unknown</option>
          </select>
          <textarea name="" id="additional-info-address" placeholder="Customer Address" class="additional-info-update"></textarea>
          <div class="buttons">
            <button id="reset-info" class="cancel">Reset</button>
          </div>
        </form>
      </div>
    </div>

    <div class="step step-4">
      <div class="title">Step 4 : Review your bill</div>
      <div class="review-area">
        <div class="review-title">
          Sample Bill
        </div>
        <div class="header">
          <div class="date">10 10 10</div>
          <div class="name"></div>
          <div class="age"></div>
          <div class="address"></div>
        </div>
        <table class="table table-striped table-hover detail">
          <thead>
            <tr>
              <td>Name</td>
              <td>Quantity</td>
              <td>Price per Item</td>
              <td>Total</td>
              <td>Action</td>
            </tr>
          </thead>
          <tbody id="review-product-area">
            <tr id="review-product-grand-total" class="table-success">
              <td colspan="4" id="review-product-grand-total-text">Total</td>
              <td id="review-product-grand-total-value"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="step step-5">
      <div class="title">Step 5 : Submit or Trash your bill</div>
      <form action="">
        <div class="buttons">
          <button class="submit" id="send-bill">Send Bill</button>
          <button class="cancel" id="trash-bill">Trash Bill</button>
        </div>
      </form>
    </div>
  </div>

  @include('template.output-stock-template')
  @include('js.output-script')

@endsection
