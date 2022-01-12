@extends('template')

@section('title', 'Input Stock')

@section('import')
  <link rel="stylesheet" href="{{ asset('storage/css/input-stock.css') }}">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection

@section('content')
  <div class="container">
    <div class="search-box">
      <input type="text" name="" id="search-field" placeholder="Search by Name">
      <button id="search-submit"><i class="bi bi-search"></i></button>
    </div>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <td>ID</td>
          <td>Image</td>
          <td>Name</td>
          <td>Description</td>
          <td>Category</td>
          <td>Stock</td>
          <td>Action</td>
        </tr>
      </thead>
      <tbody id="table-of-product">
        {{-- <tr>
          <td id="name">a</td>
          <td id="name">a</td>
          <td id="description">a</td>
          <td id="category">a</td>
          <td id="price">a</td>
          <td id="stock">a</td>
          <td id="action">
            <button id="add-input"><i class="bi bi-plus"></i></button>
            <button id="update-product"><i class="bi bi-pencil-square"></i></button>
            <button id="delete-product"><i class="bi bi-x"></i></button>
          </td>
        </tr> --}}
      </tbody>
    </table>
    <div class="add-product-button">
      <button id="add-product-button"><i class="bi bi-plus"></i> Add Product</button>
    </div>
    <div class="add-category">
      <button id="add-category-button"><i class="bi bi-plus"></i> Add Category</button>
    </div>
    <div id="message" class="">

    </div>
    <div class="field">

    </div>
  </div>

  {{-- Templates --}}
  @include('template.input-stock-template')
  @include('js.input-script')


@endsection