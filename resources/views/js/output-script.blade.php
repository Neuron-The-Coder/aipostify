<script>
  
  function makeDateTime(){
    let date = new Date()

    return `${date.getFullYear()}-${(date.getMonth() + 1).toString().padStart(2, '0')}-${date.getDate().toString().padStart(2, '0')} ${date.getHours().toString().padStart(2, '0')}:${date.getMinutes().toString().padStart(2, '0')}`;

  }

  function scrollTo(selector){
    let el = $(selector)
    $('html').animate({
      scrollTop: $(selector).offset().top,
    }, 0);
  };

  function resetAdditionalInformation(){
    $('#additional-info-form #additional-info-name').val("");
    $('#additional-info-form #additional-info-age').val("");
    $('#additional-info-form #additional-info-address').val("");
    $('#additional-info-form #additional-info-gender').val("Unknown");
    let bill = JSON.parse(localStorage.getItem('bill'));
    bill.additional_information.name =  $('#additional-info-form #additional-info-name').val();
    bill.additional_information.age =  $('#additional-info-form #additional-info-age').val();
    bill.additional_information.address =  $('#additional-info-form #additional-info-address').val();
    bill.additional_information.gender =  $('#additional-info-form #additional-info-gender').val();
    localStorage.setItem('bill', JSON.stringify(bill));

  }

  function resetBill(){
    resetAdditionalInformation();
    let bill = JSON.parse(localStorage.getItem('bill'));
    bill.products = {};
    localStorage.setItem('bill', JSON.stringify(bill));
    makeReview();

  }

  if (localStorage.getItem('bill') == null) localStorage.setItem('bill', JSON.stringify({
    additional_information : {
      name : "",
      age : 0,
      gender : "Male",
      address : ""
    },
    products : {}
  }));

  function makeReview(){
    let bill = JSON.parse(localStorage.getItem('bill'));
    let review = $('.review-area');
    $('.review-product-row').remove();

    $('.header .date', review).html(makeDateTime());
    $('.header .name', review).html(`Name : ${bill.additional_information.name} (${bill.additional_information.gender})`);
    $('.header .age', review).html(`Age : ${(bill.additional_information.age != "") ? bill.additional_information.age : "-" }`);
    $('.header .address', review).html(`Address : ${bill.additional_information.address}`);

    let tbody = $('#review-product-area', review);

    console.log($('.header .name', review))
    let sum = 0;

    for (const [key, value] of Object.entries(bill.products)){
      let row = getTemplate('review-product-row');
      $('#review-product-name', row).html(value.name);
      $('#review-product-quantity', row).html(value.quantity);
      $('#review-product-price-per-unit', row).html(value.price_per_unit);
      $('#review-product-total', row).html(value.total_price);
      $('#review-product-delete', row).on('click', (e) => {
        e.preventDefault();
        delete bill.products[key];
        localStorage.setItem('bill', JSON.stringify(bill));
        makeReview();
      });
      row.insertBefore('#review-product-grand-total');
      sum += parseInt(value.total_price);

      
    }
    $('#review-product-grand-total-value').html(sum);
  }

  function billAddProduct(id, name, quantity, price_per_unit, total){
    let bill = JSON.parse(localStorage.getItem('bill'));
    if (total == "" || total == null) total = quantity * price_per_unit;
    let infos = {
      id : id,
      name : name,
      quantity : quantity,
      price_per_unit : price_per_unit,
      total_price : total
    };

    bill.products[id] = infos;
    localStorage.setItem('bill', JSON.stringify(bill));
    makeReview();

  }

  function message(msg, status){
    let el = $("#message");
    el.removeClass("fail").removeClass("success");
    (status == 1) ? el.addClass("success") : el.addClass("fail");
    // (status == 1) ? deleteField() : null;
    el.html(msg);

    setTimeout(() => {
      el.html("");
      el.removeClass("fail").removeClass("success");
    }, 5000);

    scrollTo('#message');
  }
  
  function getTemplate(id){
    return $($('template#' + id).html().trim());
  }

  function displayProductDetails(id, name, stock){
    $('.product-detail-area').empty();
    let detail_form = getTemplate('product-detail-template');
    $('.product-name', detail_form).val(name);
    $('#product-add', detail_form).on('click', (e) => {
      e.preventDefault();
      let quantity = $('.product-quantity', detail_form).val();
      let price_per_unit = $('.product-price-per-unit', detail_form).val();
      let total = $('.product-total', detail_form).val();
      
      if (quantity > stock || quantity < 0 || quantity == "") message('Quantity CANNOT BE NEGATIVE and CANNOT EXCEED STOCK and MUST BE FILLED', 0);
      else if (price_per_unit == "" && total == "") message('Either Price per Unit or Total Price MUST BE FILLED', 0);
      else {
        billAddProduct(id, name, quantity, price_per_unit, total);
        message('Successfully add product to bill', 1);
      };
    });
    $('.product-detail-area').append(detail_form);
    scrollTo('.step-2');
  }

  function getProduct(str = ""){
    $('.product-area').empty();
    $('.product-area').append(getTemplate('notification'));

    $.ajax({
      url: "{{ url('/api/products') }}",
      method: "POST",
      data: {
        _token : "{{ csrf_token() }}",
        search : str,
        with_category : true
      },
      success : function(res) {
        $('.product-area').empty();

        if(res.length == 0){
          let msg = getTemplate('notification');
          $(msg).html('Product not Found. Use another keyword');
          $('.product-area').append(msg);
        }
        else {
          res.forEach((i) => {
            let card = getTemplate('product-grid');
            $('.product-image img', card).attr('src', i.image);
            $('.product-name', card).html(i.name);
            $('.product-quantity', card).html(i.stock);
            
            if (i.stock == 0) $('.product-quantity', card).addClass('red');
            else if (i.stock > 10) $('.product-quantity', card).addClass('green');
            else $('.product-quantity', card).addClass('yellow');

            card.on('click', (e) => {
              e.preventDefault();
              displayProductDetails(i.id, i.name, i.stock);
            });

            $('.product-area').append(card);
          });
        }


      }
    });
  }

  $('#search-submit').on('click', (e) => {
    e.preventDefault();
    let str = $('#search-box').val();
    getProduct(str);
  })

  $('#send-bill').on('click', (e) => {
    e.preventDefault();
    let bill = JSON.parse(localStorage.getItem('bill'));
    bill["_token"] = "{{ csrf_token() }}";
    bill.additional_information["user_id"] = "{{ Auth::id() }}";
    $.ajax({
      method : "POST",
      url : "{{ url('/api/products/bill') }}",
      data : bill,
      success : function(res){
        message(res.message, res.status);
        if(res.status == "1" || res.status == 1) {
          resetBill();
          getProduct();
        };
      }
    });
  });

  $('#trash-bill').on('click', (e) => {
    e.preventDefault();
    resetBill();
  });

  // Init
  getProduct();

  let temp_bill = JSON.parse(localStorage.getItem('bill'));

  $('#additional-info-form #additional-info-name').val(temp_bill.additional_information.name);
  $('#additional-info-form #additional-info-age').val(temp_bill.additional_information.age);
  $('#additional-info-form #additional-info-address').val(temp_bill.additional_information.address);
  $('#additional-info-form #additional-info-gender').val(temp_bill.additional_information.gender);
  $('.additional-info-update').each((idx, el) => {
    $(this).on('change', (e) => {
      let bill = JSON.parse(localStorage.getItem('bill'));
      bill.additional_information.name =  $('#additional-info-form #additional-info-name').val();
      bill.additional_information.age =  $('#additional-info-form #additional-info-age').val();
      bill.additional_information.address =  $('#additional-info-form #additional-info-address').val();
      bill.additional_information.gender =  $('#additional-info-form #additional-info-gender').val();
      localStorage.setItem('bill', JSON.stringify(bill));
      makeReview();
    });
  });
  $('#reset-info').on('click', (e) => {
    e.preventDefault();
    resetAdditionalInformation();
  });

  makeReview();

</script>