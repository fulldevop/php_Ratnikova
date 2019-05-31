'use strict';

$(document).ready(() => {
  $("#login").on('click', () => {
    $(".auth-block").addClass("auth-block-visible");
  });

  $(".close-auth-btn").on('click', () => {
    $(".auth-block").removeClass("auth-block-visible");
  });

  $(".buy-btn").on('click', function (elem) {
    var id = elem.target.id;

    $.ajax({
      url: "/product/addBasket/",
      type: "POST",
      dataType: "json",
      data: {
        id: id,
      },
      error: function () {
        alert("Что-то пошло не так...");
      },
      success: function (answer) {
        $('.count').html(answer);
      }
    })
  });

  $(".delete-good").on('click', function (elem) {
    var id = elem.target.id;

    $.ajax({
      url: "/basket/delete/",
      type: "POST",
      dataType: "json",
      data: {
        id: id,
      },
      error: function () {
        alert("Что-то пошло не так...");
      },
      success: function (answer) {
        if (answer.quantity > 0) {
          $('#count-input_' + answer.id).val(answer.quantity);
          let sum = $('#price-good_' + answer.id).data('price') * $('#count-input_' + answer.id).val();
          $('#sum-good_' + answer.id).attr('data-sum', sum).text(`${sum.toLocaleString()}`);
        } else {
          $('#cart-good_' + answer.id).remove();
        }

        if (answer.count) {
          $('.count').html(answer.count);

          let totalSum = 0;
          $.each($('.sum-product'), function () {
            totalSum += parseInt(this.dataset.sum);
          });
          $('#total-sum').text(totalSum.toLocaleString());
        } else {
          $('.count').html(0);
          location.reload();
        }
      }
    })
  });

  $(function () {
    $.each($('.price-good'), function () {
      let price = this.getAttribute('data-price');
      let parent = this.parentElement;
      let count = parent.querySelector('.count-input').value;
      let sum = price * count;
      parent.querySelector('.sum-product').innerHTML = sum.toLocaleString();
      parent.querySelector('.sum-product').setAttribute('data-sum', sum);
    });


    let totalSum = 0;
    $.each($('.sum-product'), function () {
      totalSum += parseInt(this.dataset.sum);
    });
    $('#total-sum').text(totalSum.toLocaleString());
  });
});