<script>

  function message(msg, status){
    let el = $("#message");
    el.removeClass("fail").removeClass("success");
    (status == 1) ? el.addClass("success") : el.addClass("fail");
    (status == 1) ? deleteField() : null;
    el.html(msg);

    setTimeout(() => {
      el.html("");
      el.removeClass("fail").removeClass("success");
    }, 5000);

    $('html').animate({
      scrollTop: $("#message").offset().top,
    }, 0);
  }
  
  function sendForm(form_id, url, data_append){
    let form = $('#' . form_id)[0];
    let data = new FormData(form);

    data.append("_token", "{{ csrf_token() }}");
    data_append(form, data);
    
    $.ajax({
      method : "POST",
      type:"POST",
      url : url,
      data : data,
      contentType : false,
      processData : false,
      success : function(res){
        message(res.message, res.status);
        getProduct("");
      }

    })

  }

  function deleteField(){
    $('.field').empty();
  }

  function addField(el){
    deleteField();
    $('.field').append(el);
    $('html').animate({
      scrollTop: $(".field").offset().top,
    }, 0);
  }

  function addRow(el){
    $('#table-of-product').append(el);
  }

  function deleteRow(){
    $('#table-of-product').empty();
  }

  function getTemplate(id){
    return $($(`template#${id}`).html().trim());
  }

  function getProduct(query){
    deleteRow();
    addRow(getTemplate('product-loading'));

    $.ajax({
      url: "{{ url('/api/products') }}",
      method: "POST",
      data: {
        _token : "{{ csrf_token() }}",
        search : query,
        with_category : true
      },
      success : function(res) {
        deleteRow();
        if (res.length == 0) {
          let el = getTemplate('product-not-found');
          addRow(el);
        }

        else {
          res.forEach((i) => {
            let el = getTemplate('product-row');

            $('#id', el).html(i.id);
            $('#image img', el).attr('src', i.image);
            $('#name', el).html(i.name);
            $('#description', el).html(i.description);
            $('#category', el).html(i.categories);
            $('#stock', el).html(i.stock);

            $('#action #add-input', el).on('click', (e) => {
              let element = getTemplate('add-stock');
              $('.title', element).val('Add New Stock - ' + i.name);
              $('#add-stock-name', element).val(i.name);
              $('#submit', element).on('click', (e) => {
                e.preventDefault();
                sendForm('add-stock', "{{ url('/api/products/add-stock') }}", (form, data) => {
                  data.append('id', i.id);
                  data.append('price_per_unit', $('#add-stock-price-per-unit', form).val());
                  data.append('quantity', $('#add-stock-quantity', form).val());
                  data.append('total_price', $('#add-stock-total', form).val());
                  data.append('user_id', {{ Auth::id() }});
                });

              });
              $('#cancel', element).on('click', (e) => {
                deleteField();
              });

              addField(element);
            });

            addRow(el);

          });
        }
      }
    });

  }

  // Search Product
  $('#search-submit').on('click', (e) => {
    let q = $('#search-field').val();
    getProduct(q);
  });

  // Add Product
  $('#add-product-button').on('click', (e) => {

    $.ajax({
      url : "{{ url('/api/categories') }}",
      method : "GET",
      success : function(res){
        let el = getTemplate('add-product');
  
        res.forEach((i) => {
          let checkbox = getTemplate('category-checkbox');
          $('input', checkbox).attr('value', i.id).attr('id', i.name);
          $('label', checkbox).attr('for', i.name).html(i.name);
          $('#add-product-categories', el).append(checkbox);
        });
  
    
        $("#submit", el).on('click', (e) => {
          e.preventDefault();
          sendForm('add-product-form', "{{ url('/api/products/add') }}", (form, data) => {
            
            data.append("name", $('#add-product-name', form).val());
            data.append("description", $('#add-product-description', form).val());
            data.append("image", document.querySelector("#add-product-image").files[0]);
            
            let categories = $('#add-product-categories input[type=checkbox]:checked', form);
            
            categories.each((idx, el) => {
              data.append("categories[]", el.value);
            });
          });
        });
    
        $("#cancel", el).on('click', (e) => {
          deleteField();
        });
    
        addField(el);
      }
    });

  });

  // Add Category
  $('#add-category-button').on('click', (e) => {

    let template = $('template#add-category').html().trim();
    let el = $(template);

    $("#submit", el).on('click', (e) => {
      e.preventDefault();

      sendForm('add-category-form', "{{ url('/api/categories/add') }}", function(form, data) {
        data.append('_token', "{{ csrf_token() }}");
        data.append('name', $('input[name=name]', form).val()); 
      });

    });

    $("#cancel", el).on('click', (e) => {
      deleteField();
    });

    addField(el);
  });


  //Init
  getProduct("");

</script>