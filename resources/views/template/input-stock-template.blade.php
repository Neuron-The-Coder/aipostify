<template id="product-row">
  <tr>
    <td id="id">a</td>
    <td id="image"><img src="" alt="" srcset=""></td>
    <td id="name">a</td>
    <td id="description">a</td>
    <td id="category">a</td>
    <td id="stock">a</td>
    <td id="action">
      <button id="add-input"><i class="bi bi-plus"></i></button>
      <button id="update-product"><i class="bi bi-pencil-square"></i></button>
      <button id="delete-product"><i class="bi bi-x"></i></button>
    </td>
  </tr>
</template>

<template id="product-not-found">
  <tr class="not-found">
    <td colspan="7">Product Not Found</td>
  </tr>
</template>

<template id="product-loading">
  <tr class="not-found">
    <td colspan="7">Fetching. Please wait...</td>
  </tr>
</template>

<template id="add-category">
  <div class="title">New Category</div>
  <form action="" id="add-category-form">
    <input type="text" name="name" id="add-category-name" placeholder="Category Name">
    <div class="buttons">
      <button id="submit">Confirm</button>
      <button id="cancel">Cancel</button>
    </div>
  </form>
</template>

<template id="add-product">
  <div class="title">New Product</div>
  <form action="" enctype="multipart/form-data" id="add-product-form">
    <input type="text" name="name" id="add-product-name" placeholder="Product Name">
    <textarea type="" name="description" id="add-product-description" placeholder="Product Description"></textarea>
    <div id="add-product-categories">
      
    </div>
    <div class="file-section">
      <label for="add-product-image">Image</label>
      <input type="file" name="image" id="add-product-image" placeholder="Product Image">
    </div>
    <div class="buttons">
      <button id="submit">Confirm</button>
      <button id="cancel">Cancel</button>
    </div>
  </form>
</template>

<template id="add-stock">
  <div class="title">Add New Stock</div>
  <form action="" enctype="multipart/form-data" id="add-product-form">
    <input type="text" name="name" id="add-stock-name" placeholder="Product Name" disabled>
    <input type="number" name="price_per_unit" id="add-stock-price-per-unit" placeholder="Price Per Unit">
    <input type="number" name="quantity" id="add-stock-quantity" placeholder="Quantity">
    <input type="number" name="total" id="add-stock-total" placeholder="Total Price">

    <div class="buttons">
      <button id="submit">Confirm</button>
      <button id="cancel">Cancel</button>
    </div>
  </form>
</template>

<template id="category-checkbox">
  <div class="category">
    <input type="checkbox" name="categories[]" value="">
    <label for=""></label>
  </div>
</template>