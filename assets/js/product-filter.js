(function ($) {
  $(document).ready(function () {
    // Hide/Show Filter Panel
    $(document).on("click", ".drilllcorp-filter-button", function (e) {
      $(".drilllcorp-woo-sidebar-overlay").addClass("show");
    });

    $(document).on("click", ".drilllcorp-woo-sidebar .close", function (e) {
      $(".drilllcorp-woo-sidebar-overlay").removeClass("show");
    });

    $(".drilllcorp-woo-sidebar-overlay").click(function (e) {
      var wooSideBar = $(".drilllcorp-woo-sidebar");
      if (!wooSideBar.is(e.target) && wooSideBar.has(e.target).length === 0) {
        $(".drilllcorp-woo-sidebar-overlay").removeClass("show");
      }
    });

    // List View / Grid View
    $(document).on("click", ".drilllcorp-layout-view .list-view", function () {
      $(".drilllcorp-product-cat").addClass("list");
    });
    $(document).on("click", ".drilllcorp-layout-view .grid-view", function () {
      $(".drilllcorp-product-cat").removeClass("list");
    });

    // Function for Filter Products with Ajax call
    function drilllcorpFilterProducts(paged = 1) {
      $("ul.products").html("<div class='drilllcorp-loader'>Loading...</div>");

      var brandFilters = [];
      var sizeFilters = [];
      var packSizeFilters = [];

      $(".brand-filter input[type=checkbox]:checked").each(function () {
        brandFilters.push($(this).val());
      });

      $(".size-filter input[type=checkbox]:checked").each(function () {
        sizeFilters.push($(this).val());
      });

      $(".pack-size-filter input[type=checkbox]:checked").each(function () {
        packSizeFilters.push($(this).val());
      });

      $.ajax({
        type: "GET",
        url: wc_add_to_cart_params.ajax_url,
        data: {
          action: "drilllcorp_filter_products",
          current_url: window.location.href,
          paged: paged,
          in_stock: $("input#in_stock:checked").val(),
          out_stock: $("input#stock_out:checked").val(),
          new: $("input#filter_new:checked").val(),
          offer: $("input#filter_offer:checked").val(),
          popular: $("input#filter_popular:checked").val(),
          min_price: $("input#min_price").val(),
          max_price: $("input#max_price").val(),
          color: $(".colour-filter li.active").text(),
          brand: brandFilters,
          size: sizeFilters,
          pack_size: packSizeFilters,
          sort_by: $("select[name='drilllcorp_orderby']").val(),
        },
        success: function (res) {
          // console.log(res);
          $("ul.products").html(res.products);

          var plural_s = res.showing_items == 1 ? "" : "s";
          var showing_items_html =
            "Showing " + parseInt(res.showing_items) + " item" + plural_s;

          $(".woocommerce-header-area-wrap .woocommerce-result-count").html(
            showing_items_html
          );

          $(".woocommerce-pagination").html(res.pagination);
        },
        error: function (err) {
          console.log(err);
        },
      });
    }

    // Filter + Pagination (Ajax)
    $(document).on("click", ".woocommerce-pagination a.page-numbers", function (e) {
      e.preventDefault();

      var paged = $(this).text();

      if ($(this).hasClass("next")) {
        paged = parseInt($(".woocommerce-pagination .current").text()) + 1;

      } else if ($(this).hasClass("prev")) {
        paged = parseInt($(".woocommerce-pagination .current").text()) - 1;
      }

      drilllcorpFilterProducts(paged);

    });

    // Filter products by availibility, price range, attributes
    $(".drilllcorp-filter-box").on("click", "input, li", function (e) {
      $(".drilllcorp-woo-sidebar .clear-all").show();

      if (e.target.tagName.toLowerCase() === "li") {
        $(this)
          .closest(".drilllcorp-filter-box")
          .find("li")
          .removeClass("active");
        $(this).addClass("active");
      }

      drilllcorpFilterProducts();
    });

    // Products Sort By
    $("select[name='drilllcorp_orderby']").on("change", function () {
      $(".drilllcorp-woo-sidebar .clear-all").show();
      drilllcorpFilterProducts();
    });

    // Price Filter
    $("#min_price, #max_price").on("change", function () {
      $(".drilllcorp-woo-sidebar .clear-all").show();

      adjustPriceRangeOnSlide();
      drilllcorpFilterProducts();
    });

    $("#min_price,#max_price").on("paste keyup", function () {
      $(".drilllcorp-woo-sidebar .clear-all").show();

      adjustPriceRangeOnWrite();
      drilllcorpFilterProducts();
    });

    function adjustPriceRangeOnSlide() {
      var min_price_range = parseInt($("#min_price").val());

      var max_price_range = parseInt($("#max_price").val());

      if (min_price_range > max_price_range) {
        $("#max_price").val(min_price_range);
      }

      $("#slider-range").slider({
        values: [min_price_range, max_price_range],
      });
    }

    function adjustPriceRangeOnWrite() {
      var min_price_range = parseInt($("#min_price").val());

      var max_price_range = parseInt($("#max_price").val());

      if (min_price_range == max_price_range) {
        max_price_range = min_price_range + 100;

        $("#min_price").val(min_price_range);
        $("#max_price").val(max_price_range);
      }

      $("#slider-range").slider({
        values: [min_price_range, max_price_range],
      });
    }

    $(function () {
      $("#slider-range").slider({
        range: true,
        orientation: "horizontal",
        min: 0,
        max: 1000,
        values: [0, 1000],
        step: 1,

        slide: function (event, ui) {
          if (ui.values[0] == ui.values[1]) {
            return false;
          }

          $("#min_price").val(ui.values[0]);
          $("#max_price").val(ui.values[1]);

          $(".drilllcorp-woo-sidebar .clear-all").show();

          drilllcorpFilterProducts();
        },
      });

      $("#min_price").val($("#slider-range").slider("values", 0));
      $("#max_price").val($("#slider-range").slider("values", 1));
    });
  });
})(jQuery);
