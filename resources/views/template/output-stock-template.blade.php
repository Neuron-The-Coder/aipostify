<template id="product-grid">
  <div class="product-card">
    <div class="product-image"><img src="" alt="" srcset=""></div>
    <div class="product-name"></div>
    <div class="product-quantity"></div>
  </div>
</template>

<template id="review-product-row">
  <tr class="review-product-row">
    <td id="review-product-name"></td>
    <td id="review-product-quantity"></td>
    <td id="review-product-price-per-unit"></td>
    <td id="review-product-total"></td>                   
    <td id="review-product-delete">
      <button class="cancel">Delete</button>
    </td>
  </tr>
</template>

<template id="product-detail-template">
  <form action="" id="product-detail-form">
    <input type="text" name="" class="product-name" disabled>
    <input type="number" name="" id="" class="product-quantity" placeholder="Quantity">
    <input type="number" name="" id="" class="product-price-per-unit" placeholder="Price per Unit">
    <input type="number" name="" id="" class="product-total" placeholder="Total Price">
    <div class="buttons">
      <button id="product-add" class="submit">Add Button</button>
    </div>
  </form>
</template>

<template id="notification">
  <div class="loading">Loading. Please wait...</div>
</template>