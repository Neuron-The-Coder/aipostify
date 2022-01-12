<script>

  // get OverallSales
  function getOverallSales(){
    $.ajax({
      method : "GET",
      url : "{{ url('/api/sales/overall-sales') }}",
      data : {
        _token : "{{ csrf_token() }}",
        from : $('#date-from').val(),
        to : $('#date-to').val()
      },
      success : function(res){
        let data = [{
          x : [],
          y : [],
          type : 'bar'
        }];

        let layout = {
          xaxis : {
            type : 'category'
          }
        }

        res.detail.forEach((i) => {
          let rawdate = i.date.split("-", 2);
          data[0].x.push(i.date);
          data[0].y.push(i.total);
        });

        console.log(data);

        Plotly.newPlot('overall-sales-graph', data);

        updateInsightOverall(res.overall);
        updateInsightGender(res.popular);

      }
    });
  }

  function updateProfitFromSales(res){



  }

  function updateInsightAge(){



  }

  function updateInsightOverall(overall){
    let el = $(".prediction-information .overall");
    
    // Most Popular
    $(".most .image img", el).attr('src', overall[0].image);
    $(".most .title", el).html(overall[0].name);
    $(".most .number", el).html(overall[0].ratio);

    let last = overall.length - 1;
    // Least Popular
    $(".least .image img", el).attr('src', overall[last].image);
    $(".least .title", el).html(overall[last].name);
    $(".least .number", el).html(overall[last].ratio);

    // Pie Chart
    let data = [{
      values : [],
      labels : [],
      type : 'pie'
    }];

    
    overall.forEach((i) => {
      data[0].labels.push(i.name);
      data[0].values.push(i.ratio);
    });
    
    let layout = {
      height : 400,
      width : 500
    };

    console.log(data);
    
    Plotly.newPlot('product-insight', data, layout);

  }

  function updateInsightGender(popular){
    let el = $('.gender .gender-results');

    if (popular.male.length > 0){
      $('.male .image img', el).attr('src', popular.male[0].image);
      $('.male .title', el).html(popular.male[0].name);
      $('.male .number', el).html(popular.male[0].quantity);
    }
    if (popular.female.length > 0){
      $('.female .image img', el).attr('src', popular.female[0].image);
      $('.female .title', el).html(popular.female[0].name);
      $('.female .number', el).html(popular.female[0].quantity);
    }
    if (popular.unknown.length > 0){
      $('.unknown .image img', el).attr('src', popular.unknown[0].image);
      $('.unknown .title', el).html(popular.unknown[0].name);
      $('.unknown .number', el).html(popular.unknown[0].quantity);
    }


  }

  function getDate(date = new Date()){
    return `${date.getFullYear()}-${(date.getMonth() + 1).toString().padStart(2, '0')}-${(date.getDate()).toString().padStart(2, '0')}`

  }

  function getYearMonth(date){
    return `${date.getFullYear()}-${(date.getMonth() + 1).toString().padStart(2, '0')}`
  }

  //Init
  $('#date-to').val(getDate());
  getOverallSales();



</script>