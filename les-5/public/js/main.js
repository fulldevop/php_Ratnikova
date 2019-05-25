'use strict';

$(document).ready(() => {
  $("#login").on('click', () => {
    $(".auth-block").addClass("auth-block-visible");
  });

  $(".close-auth-btn").on('click', () => {
    $(".auth-block").removeClass("auth-block-visible");
  });
});