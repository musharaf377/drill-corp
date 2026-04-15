/**
 * Theme Main Scripts
 * @since 1.0.0
 */
(function ($) {
  "use strict";

  jQuery(document).ready(function ($) {
  
    /*-------------------------------
            back to top
        ------------------------------*/
    $(document).on("click", ".back-to-top", function () {
      $("html,body").animate(
        {
          scrollTop: 0,
        },
        2000
      );
    });
  });

  $(window).on("resize", function () {});

  

  $(window).on("load", function () {
    /*-----------------------------
            preloader
    -----------------------------*/
    var preLoder = $("#preloader");
    preLoder.fadeOut(1000);
  });


   /* ==============================
     Mobile menu click function
    =============================== */

  function openMobileMenu() {
    $('.navbar-toggler').addClass('active');
    $('body').addClass('menu-open');
    $('.mobile-menu-overlay').fadeIn(300);
    $('#drillcorp_main_menu').fadeIn(300).addClass('show');
  }

  function closeMobileMenu() {
    $('#drillcorp_main_menu').fadeOut(300, function() {
      $(this).removeClass('show');
    });
    $('.navbar-toggler').removeClass('active');
    $('.mobile-menu-overlay').fadeOut(300, function() {
      $('body').removeClass('menu-open');
    });
  }

  // Toggle navbar menu
  $(document).on("click", ".navbar-toggler", function (e) {
    e.preventDefault();
    if ($('#drillcorp_main_menu').hasClass('show')) {
      closeMobileMenu();
    } else {
      openMobileMenu();
    }
  });

  // Close menu when clicking a nav link
  $(document).on('click', '#drillcorp_main_menu .nav-link', function () {
    closeMobileMenu();
  });

  // Close menu when clicking the overlay
  $(document).on('click', '.mobile-menu-overlay', function () {
    closeMobileMenu();
  });

  // Close menu when clicking outside
  $(document).on('click', function (e) {
    if (!$(e.target).closest('#drillcorp_main_menu').length &&
      !$(e.target).closest('.navbar-toggler').length &&
      !$(e.target).hasClass('mobile-menu-overlay') &&
      $('#drillcorp_main_menu').hasClass('show')) {
      closeMobileMenu();
    }
  });

  /**
   * Dropdown Menu Click Function - Desktop & Mobile
   */
  $(document).on("click", "#drillcorp_main_menu .menu-item-has-children > a", function (e) {
    if ($(this).next(".sub-menu").length > 0) {
      e.preventDefault();
      var $submenu = $(this).next(".sub-menu");
      var $parent = $(this).parent();

      // Close other open submenus
      $('#drillcorp_main_menu .menu-item-has-children').not($parent).each(function () {
        $(this).find('> .sub-menu').slideUp(300);
        $(this).find('> a').removeClass('submenu-open');
      });

      // Toggle current submenu
      if ($submenu.is(':visible')) {
        $submenu.slideUp(300);
        $(this).removeClass('submenu-open');
      } else {
        $submenu.slideDown(300);
        $(this).addClass('submenu-open');
      }
    }
  });

  // Close submenus when clicking elsewhere
  $(document).on('click', function (e) {
    if (!$(e.target).closest('#drillcorp_main_menu .menu-item-has-children').length) {
      $('#drillcorp_main_menu .sub-menu').slideUp(300);
      $('#drillcorp_main_menu .menu-item a').removeClass('submenu-open');
    }
  });

    
})(jQuery);
