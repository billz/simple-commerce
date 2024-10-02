
$(document).on("click", "#addbasket-button", function(e) {
    //e.preventDefault();
    var formData = $('#ajax-orderform').serialize();
    $('#basket-status').removeClass('ab-status-hidden').addClass('ab-status-visible').delay(500).animate({ opacity: 1 }, 700);
    $.post('ajax/addtobasket.php?',{'data': formData},function(data){
       jsonData = JSON.parse(data);
    });
});

$('.js-remove-basket-item').on('click', function (e) {
    e.preventDefault();
    var item_id = $(this).data('id');
    $.post('ajax/removefrombasket.php',{'item_id':item_id},function(data){
        jsonData = JSON.parse(data);
        var row = $(document.getElementById("basket-item-" + item_id));
        row.fadeOut( "slow", function() {
            row.remove();
        });
    });
    location.reload();
});

$('.js-update-basket-item').on('change', function (e) {
    var item_id = $(this).data('id');
    var subtotal = $('#subtotal').val();
    var total = $('#total').val();
    var free_ship = $('#free_shipping').val();
    var quantity = $("#basket-item-qty-" + item_id).val();
    var item_price = $("#basket-item-price-" + item_id).val();
    var last_quantity = $("#basket-item-lastQty-" + item_id).val();
    var delta = parseInt(quantity) - parseInt(last_quantity);
    var item_price_qty = parseInt(item_price) * parseInt(last_quantity);
    var item_price_change = parseInt(delta) * parseInt(item_price);
    var new_subtotal = parseInt(subtotal) + parseInt(item_price_change);
    var new_subtotal_formatted = formatCurrency(String(new_subtotal));
    var e = document.getElementById("destination");
    var shipping = e.options[e.selectedIndex].dataset.price;
    if ( typeof shipping !== 'undefined' ) {
        shippingFormat = formatCurrency(shipping);
        $('h4.shipping_rate').html(shippingFormat);
    // } else {
    //     shipping = '0000';
    //     shippingFormat = formatCurrency(shipping);
    }

    $.post('ajax/updatebasket.php',{'item_id':item_id,'quantity':quantity},function(data){
        jsonData = JSON.parse(data);
        if(quantity == 0) {
            var row = $(document.getElementById("basket-item-" + item_id));
            row.fadeOut( "slow", function() {
                row.remove();
            });
        }
    });

    if (total !== '' && parseInt(new_subtotal) < 10000) {
        var new_total = parseInt(total) + parseInt(item_price_change) + parseInt(shipping);
        var new_total_formatted = formatCurrency(String(new_total));
        $('h2.basket_total').html(new_total_formatted);
        $('input[name="total"]').val(new_total);
    } else if ( parseInt(new_subtotal) >= 10000 && typeof shipping !== 'undefined' ) {
        shippingFormat = 'Free';
        shipping = "0000";
        var new_total = parseInt(new_subtotal);
        var new_total_formatted = formatCurrency(String(new_total));
        $('h4.shipping_rate').html(shippingFormat);
        $('h2.basket_total').html(new_total_formatted);
        $('input[name="total"]').val(new_total);
    }
    $('h4.basket_subtotal').html(new_subtotal_formatted);
    $('input[name="shipping_rate"]').val(shipping);
    $('input[name="subtotal"]').val(new_subtotal);
    $("input[name='basket-item-lastQty-" + item_id + "']").val(quantity)
});

$('#destination').change(function() {
    var shipping = event.target.options[event.target.selectedIndex].dataset.price;
    var subtotal = $('#subtotal').val();
    var total, totalFormat;

    if (parseInt(subtotal) >= 10000 ) {
        shippingFormat = 'Free';
        shipping = "0000";
        total = parseInt(subtotal);
    } else {
        total = parseInt(subtotal) + parseInt(shipping);
        shippingFormat = formatCurrency(shipping);
    }
    totalFormat = formatCurrency(String(total));
    $('h4.shipping_rate').html(shippingFormat);
    $('h2.basket_total').html(totalFormat);
    $('input[name="shipping_rate"]').val(shipping);
    $('input[name="total"]').val(total);
});

function formatCurrency(num) {
    num = num.substring(0, num.length - 2);
    var formatter = new Intl.NumberFormat('fr-FR', {
        style: 'currency',
        currency: 'EUR'
    });
    return formatter.format(num);
}

$('#ajax-bakset').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) {
    e.preventDefault();
    return false;
  }
});

// image zoom
$(document).ready(function(){
    $('.image-zoom')
    .wrap('<span style="display:inline-block"></span>')
    .css('display', 'block')
    .parent()
    .zoom({
      url: $(this).find('img').attr('data-zoom')
    });
  });
