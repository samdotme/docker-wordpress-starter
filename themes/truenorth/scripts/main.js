(function() {
  'use strict';

  $ = jQuery;
  $(document).foundation({
    equalizer: {
      equalize_on_stack: true
    }
  });

  function setupMobileMenuToggle() {
    var hamburgerIcon = $('.hamburger-menu-icon');
    var navigationMenu = $('.navigation-menu');
    if (hamburgerIcon !== null && navigationMenu !== null)
      hamburgerIcon.click(function () {
        navigationMenu.toggle(300);
      });
  }

  function setupHomeMenuToggle() {
    $('.homeMenuBlock').hover(
      function () {
        $(this).toggleClass('display-content'); },
      function () {
        $(this).toggleClass('display-content'); }
    );
  }

  function init() {
    $(document).foundation('equalizer', 'reflow');
    setupMobileMenuToggle();
    setupHomeMenuToggle();
  }

  $(document).ready(function () {
    init();
  });


})();
