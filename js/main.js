!(function (e) {
  "use strict";
  var i = e(window);
  e(window).on("load", function () {
    e("#loading").delay(500).fadeOut(500),
      new WOW({
        boxClass: "wow",
        animateClass: "animated",
        offset: 0,
        mobile: !1,
        live: !0,
      }).init();
  });
  var t = document.getElementById("year");
  if (
    (t && (t.innerHTML = new Date().getFullYear()),
    document.addEventListener("DOMContentLoaded", function () {
      var e = window.location.href.substr(
        window.location.href.lastIndexOf("https://html.topylo.com/") + 1
      );
      let i = document.querySelectorAll(".main-menu ul li a");
      i.forEach((i) => {
        if (i.getAttribute("href") === e || "" === i.getAttribute("href")) {
          i.classList.add("active");
          let t = i.closest("li");
          for (; t; ) {
            let s = t.querySelector("a");
            s && !s.classList.contains("active") && s.classList.add("active"),
              (t = t.closest("ul")?.closest("li"));
          }
        }
      });
    }),
    e(document).ready(function () {
      var i = e(".bd-mobile-menu-active > ul").clone(),
        t = e(".bd-offcanvas-menu nav");
      t.append(i),
        0 != e(t).find(".submenu, .mega-menu").length &&
          e(t)
            .find(".submenu, .mega-menu")
            .parent()
            .append(
              '<button class="bd-menu-close"><i class="fa fa-chevron-right"></i></button>'
            );
      var s = e(
        ".bd-offcanvas-menu nav > ul > li button.bd-menu-close, .bd-offcanvas-menu nav > ul li.has-dropdown > a"
      );
      e(s).on("click", function (i) {
        i.preventDefault();
        var t = e(this).parent(),
          s = t.siblings("li");
        t.hasClass("active")
          ? t.removeClass("active").children(".submenu, .mega-menu").slideUp()
          : (e(".bd-offcanvas-menu nav > ul > li> ul > li.active")
              .removeClass("active")
              .children(".submenu, .mega-menu")
              .slideUp(),
            t.addClass("active").children(".submenu, .mega-menu").slideDown(),
            s.removeClass("active").children(".submenu, .mega-menu").slideUp());
      }),
        e(".sidebar-toggle .bar-icon").on("click", function () {
          e(".bd-offcanvas-menu").toggleClass("active");
        });
    }),
    e(".bd-offcanvas-close,.bd-offcanvas-overlay").on("click", function () {
      e(".bd-offcanvas-area").removeClass("info-open"),
        e(".bd-offcanvas-overlay").removeClass("overlay-open");
    }),
    e(".sidebar-toggle").on("click", function () {
      e(".bd-offcanvas-area").addClass("info-open"),
        e(".bd-offcanvas-overlay").addClass("overlay-open");
    }),
    e(".body-overlay").on("click", function () {
      e(".bd-offcanvas-area").removeClass("opened"),
        e(".body-overlay").removeClass("opened");
    }),
    i.on("scroll", function () {
      250 > e(window).scrollTop()
        ? e("#header-sticky").removeClass("bd-sticky")
        : e("#header-sticky").addClass("bd-sticky");
    }),
    e("[data-background").each(function () {
      e(this).css(
        "background-image",
        "url( " + e(this).attr("data-background") + "  )"
      );
    }),
    e("[data-width]").each(function () {
      e(this).css("width", e(this).attr("data-width"));
    }),
    e("[data-bg-color]").each(function () {
      e(this).css("background-color", e(this).attr("data-bg-color"));
    }),
    e(".popup-image").magnificPopup({
      type: "image",
      gallery: { enabled: !0 },
    }),
    e(document).on("mouseover", ".chooseActive", function () {
      e(this).addClass("active"),
        e(".chooseActive").removeClass("active"),
        e(this).addClass("active");
    }),
    e(".popup-video").magnificPopup({ type: "iframe" }),
    e(
      ".bd-sorting-select, .form-select-option, .country-list, .course-level, .course-name, .course-lessons, .course-intro, .input-box-select"
    ).niceSelect(),
    e(document).ready(function () {
      var i = document.querySelector(".backtotop-wrap path"),
        t = i.getTotalLength();
      (i.style.transition = i.style.WebkitTransition = "none"),
        (i.style.strokeDasharray = t + " " + t),
        (i.style.strokeDashoffset = t),
        i.getBoundingClientRect(),
        (i.style.transition = i.style.WebkitTransition =
          "stroke-dashoffset 10ms linear");
      var s = function () {
        var s = e(window).scrollTop(),
          o = e(document).height() - e(window).height();
        i.style.strokeDashoffset = t - (s * t) / o;
      };
      s(),
        e(window).scroll(s),
        jQuery(window).on("scroll", function () {
          jQuery(this).scrollTop() > 150
            ? jQuery(".backtotop-wrap").addClass("active-progress")
            : jQuery(".backtotop-wrap").removeClass("active-progress");
        }),
        jQuery(".backtotop-wrap").on("click", function (e) {
          return (
            e.preventDefault(),
            jQuery("html, body").animate({ scrollTop: 0 }, parseInt(550, 10)),
            !1
          );
        });
    }),
    new PureCounter(),
    new PureCounter({ filesizing: !0, selector: ".filesizecount", pulse: 2 }),
    e(document).ready(function () {
      e(window).scroll(function () {
        e(".radial-progress").each(function (i) {
          var t = e(this).offset().top + e(this).outerHeight();
          e(window).scrollTop() + e(window).height() > t &&
            e(this).easyPieChart({
              lineWidth: 10,
              scaleLength: 0,
              rotate: 0,
              trackColor: !1,
              lineCap: "round",
              size: 180,
              onStep: function (i, t, s) {
                e(this.el).find(".count").text(Math.round(s));
              },
            });
        });
      }),
        e(window).scroll();
    }),
    new Swiper(".categorySliderActive", {
      slidesPerView: 5,
      spaceBetween: 30,
      loop: !1,
      roundLengths: !0,
      pagination: { el: ".bd-dots-pagination", clickable: !0 },
      navigation: {
        nextEl: ".category-nav-next",
        prevEl: ".category-nav-prev",
      },
      breakpoints: {
        1400: { slidesPerView: 5 },
        1200: { slidesPerView: 5 },
        992: { slidesPerView: 4 },
        768: { slidesPerView: 3 },
        576: { slidesPerView: 2 },
        480: { slidesPerView: 2 },
        0: { slidesPerView: 2 },
      },
    }),
    new Swiper(".categorySliderActiveTwo", {
      slidesPerView: 6,
      spaceBetween: 30,
      loop: !1,
      roundLengths: !0,
      speed: 1e3,
      autoplay: !1,
      navigation: {
        nextEl: ".category-nav-next",
        prevEl: ".category-nav-prev",
      },
      pagination: { el: ".bd-dots-pagination", clickable: !0 },
      breakpoints: {
        1400: { slidesPerView: 6 },
        1200: { slidesPerView: 5 },
        992: { slidesPerView: 4 },
        768: { slidesPerView: 3 },
        576: { slidesPerView: 3 },
        0: { slidesPerView: 2 },
      },
    }),
    new Swiper(".categorySliderActiveThree", {
      slidesPerView: 5,
      spaceBetween: 30,
      loop: !0,
      roundLengths: !0,
      pagination: { el: ".bd-dots-pagination", clickable: !0 },
      breakpoints: {
        1400: { slidesPerView: 5 },
        1200: { slidesPerView: 5 },
        992: { slidesPerView: 4 },
        768: { slidesPerView: 3 },
        576: { slidesPerView: 2 },
        480: { slidesPerView: 2 },
        0: { slidesPerView: 1 },
      },
    }),
    new Swiper(".categorySliderActiveFour", {
      slidesPerView: 1,
      spaceBetween: 30,
      loop: !1,
      roundLengths: !0,
      pagination: { el: ".bd-dots-pagination", clickable: !0 },
      breakpoints: {
        1400: { slidesPerView: 4 },
        1200: { slidesPerView: 4 },
        992: { slidesPerView: 3 },
        768: { slidesPerView: 2 },
        576: { slidesPerView: 2 },
      },
    }),
    e(document).ready(function () {
      function i(i, t) {
        var o = new Date(),
          a = i - (o = Date.parse(o) / 1e3);
        if (a <= 0) {
          clearInterval(s),
            e("#" + t + " [data-unit='days']").html("00<span>Days</span>"),
            e("#" + t + " [data-unit='hours']").html("00<span>Hours</span>"),
            e("#" + t + " [data-unit='minutes']").html(
              "00<span>Minutes</span>"
            ),
            e("#" + t + " [data-unit='seconds']").html(
              "00<span>Seconds</span>"
            );
          return;
        }
        var n = Math.floor(a / 86400),
          r = Math.floor((a - 86400 * n) / 3600),
          l = Math.floor((a - 86400 * n - 3600 * r) / 60),
          d = Math.floor(a - 86400 * n - 3600 * r - 60 * l);
        r < "10" && (r = "0" + r),
          l < "10" && (l = "0" + l),
          d < "10" && (d = "0" + d),
          e("#" + t + " [data-unit='days']").html(n + "<span>Days</span>"),
          e("#" + t + " [data-unit='hours']").html(r + "<span>Hours</span>"),
          e("#" + t + " [data-unit='minutes']").html(
            l + "<span>Minutes</span>"
          ),
          e("#" + t + " [data-unit='seconds']").html(
            d + "<span>Seconds</span>"
          );
      }
      var t = new Date("5 August 2025 14:00:00 GMT+06:00");
      t = Date.parse(t) / 1e3;
      var s = setInterval(function () {
        i(t, "countdown1"),
          i(t, "countdown2"),
          i(t, "countdown3"),
          i(t, "countdown4"),
          i(t, "countdown5");
      }, 1e3);
    }),
    new Swiper(".brandActivation", {
      slidesPerView: 6,
      spaceBetween: 30,
      loop: !0,
      roundLengths: !0,
      autoplay: !0,
      breakpoints: {
        1400: { slidesPerView: 6 },
        1200: { slidesPerView: 6 },
        992: { slidesPerView: 4 },
        768: { slidesPerView: 3 },
        576: { slidesPerView: 3 },
        0: { slidesPerView: 3 },
      },
    }),
    new Swiper(".courseActive", {
      slidesPerView: 3,
      spaceBetween: 30,
      loop: !0,
      roundLengths: !0,
      autoplay: !0,
      speed: 1200,
      breakpoints: {
        1400: { slidesPerView: 3 },
        1200: { slidesPerView: 3 },
        992: { slidesPerView: 2 },
        768: { slidesPerView: 2 },
        576: { slidesPerView: 1 },
        0: { slidesPerView: 1 },
      },
      pagination: { el: ".bd-course-pagination", clickable: !0 },
    }),
    new Swiper(".languageCourseActive", {
      slidesPerView: 4,
      spaceBetween: 30,
      loop: !0,
      roundLengths: !0,
      autoplay: !1,
      speed: 1200,
      breakpoints: {
        1400: { slidesPerView: 4 },
        1200: { slidesPerView: 3 },
        992: { slidesPerView: 2 },
        768: { slidesPerView: 2 },
        576: { slidesPerView: 1 },
        0: { slidesPerView: 1 },
      },
      navigation: {
        nextEl: ".course-navigation-next",
        prevEl: ".course-navigation-prev",
      },
    }),
    new Swiper(".testimonialActive", {
      slidesPerView: 3,
      spaceBetween: 30,
      loop: !0,
      roundLengths: !0,
      autoplay: !0,
      speed: 1200,
      breakpoints: {
        1400: { slidesPerView: 3 },
        1200: { slidesPerView: 3 },
        992: { slidesPerView: 1 },
        768: { slidesPerView: 1 },
        576: { slidesPerView: 1 },
        0: { slidesPerView: 1 },
      },
      pagination: { el: ".bd-testimonial-pagination", clickable: !0 },
    }),
    new Swiper(".testimonialActiveTwo", {
      slidesPerView: 5,
      spaceBetween: 30,
      loop: !0,
      roundLengths: !0,
      autoplay: !0,
      breakpoints: {
        1400: { slidesPerView: 4 },
        1200: { slidesPerView: 3 },
        992: { slidesPerView: 2 },
        768: { slidesPerView: 2 },
        576: { slidesPerView: 1 },
        0: { slidesPerView: 1 },
      },
    }),
    e(document).ready(function () {
      new Swiper(".testimonialActiveThree", {
        loop: !0,
        autoplay: { delay: 4e3, disableOnInteraction: !1 },
        keyboard: { enabled: !0, onlyInViewport: !0 },
        navigation: {
          nextEl: ".testimonial-button-next",
          prevEl: ".testimonial-button-prev",
        },
        effect: "slide",
      });
    }),
    new Swiper(".testimonialActiveFour", {
      slidesPerView: 1,
      spaceBetween: 30,
      observeParents: !0,
      observer: !0,
      loop: !0,
      speed: 1200,
      autoplay: { delay: 9500 },
      pagination: { el: ".bd-testimonial-pagination", clickable: !0 },
      navigation: {
        nextEl: ".testimonial-navigation-next",
        prevEl: ".testimonial-navigation-prev",
      },
      breakpoints: {
        1200: { slidesPerView: 1 },
        992: { slidesPerView: 1 },
        768: { slidesPerView: 1 },
        576: { slidesPerView: 1 },
      },
    }),
    new Swiper(".testimonialActiveFive", {
      slidesPerView: 2,
      spaceBetween: 30,
      loop: !0,
      roundLengths: !0,
      autoplay: !0,
      speed: 1200,
      pagination: { el: ".bd-testimonial-pagination", clickable: !0 },
      breakpoints: {
        1400: { slidesPerView: 2 },
        1200: { slidesPerView: 2 },
        992: { slidesPerView: 2 },
        768: { slidesPerView: 2 },
        576: { slidesPerView: 1 },
        0: { slidesPerView: 1 },
      },
    }),
    new Swiper(".bdSliderActive", {
      slidesPerView: 1,
      loop: !0,
      effect: "fade",
      autoplay: { delay: 5e3 },
      navigation: {
        nextEl: ".banner-navigation-next",
        prevEl: ".banner-navigation-prev",
      },
    }),
    new Swiper(".bookCategorySlider", {
      slidesPerView: 5,
      spaceBetween: 30,
      loop: !1,
      centeredSlides: !1,
      navigation: {
        nextEl: ".book-category-next",
        prevEl: ".book-category-prev",
      },
      breakpoints: {
        1400: { slidesPerView: 5 },
        1200: { slidesPerView: 4 },
        992: { slidesPerView: 5 },
        768: { slidesPerView: 3 },
        576: { slidesPerView: 2 },
        480: { slidesPerView: 2 },
        0: { slidesPerView: 1 },
      },
    }),
    new Swiper(".bookTradingSlider", {
      slidesPerView: 5,
      spaceBetween: 30,
      loop: !1,
      centeredSlides: !1,
      navigation: {
        nextEl: ".book-trading-next",
        prevEl: ".book-trading-prev",
      },
      breakpoints: {
        1400: { slidesPerView: 5 },
        1200: { slidesPerView: 4 },
        992: { slidesPerView: 3 },
        768: { slidesPerView: 3 },
        576: { slidesPerView: 2 },
        480: { slidesPerView: 2 },
        0: { slidesPerView: 2 },
      },
    }),
    new Swiper(".offerCardActive", {
      slidesPerView: 3,
      spaceBetween: 30,
      loop: !1,
      centeredSlides: !1,
      navigation: {
        nextEl: ".book-book-combo-next",
        prevEl: ".book-book-combo-prev",
      },
      breakpoints: {
        1400: { slidesPerView: 3 },
        1200: { slidesPerView: 3 },
        992: { slidesPerView: 2 },
        768: { slidesPerView: 2 },
        576: { slidesPerView: 1 },
        480: { slidesPerView: 1 },
        0: { slidesPerView: 1 },
      },
    }),
    new Swiper(".preOrderSlider", {
      slidesPerView: 5,
      spaceBetween: 30,
      loop: !1,
      centeredSlides: !1,
      navigation: {
        nextEl: ".book-pre-order-next",
        prevEl: ".book-pre-order-prev",
      },
      breakpoints: {
        1400: { slidesPerView: 5 },
        1200: { slidesPerView: 4 },
        992: { slidesPerView: 3 },
        768: { slidesPerView: 3 },
        576: { slidesPerView: 2 },
        480: { slidesPerView: 2 },
        0: { slidesPerView: 2 },
      },
    }),
    new Swiper(".authorActivation", {
      slidesPerView: 6,
      spaceBetween: 30,
      loop: !1,
      centeredSlides: !1,
      navigation: { nextEl: ".author-next", prevEl: ".author-prev" },
      breakpoints: {
        1400: { slidesPerView: 6 },
        1200: { slidesPerView: 6 },
        992: { slidesPerView: 5 },
        768: { slidesPerView: 3 },
        576: { slidesPerView: 2 },
        480: { slidesPerView: 2 },
        0: { slidesPerView: 1 },
      },
    }),
    e(".course-item-load-more").length > 0)
  )
    e(".grid").imagesLoaded(function () {
      var i = e(".grid").isotope({
        itemSelector: ".grid-item",
        percentPosition: !0,
        masonry: { columnWidth: ".grid-item" },
      });
      e(".course-item").on("click", "button", function () {
        var t = e(this).attr("data-filter");
        i.isotope({ filter: t });
      }),
        e(".course-item button").on("click", function (i) {
          e(this).siblings(".active").removeClass("active"),
            e(this).addClass("active"),
            i.preventDefault();
        });
      var t = e(".course-item-load-more").attr("data-show"),
        s = t,
        o = i.data("isotope");
      function a(t) {
        i.find(".hidden").removeClass("hidden");
        var s = o.filteredItems
          .slice(t, o.filteredItems.length)
          .map(function (e) {
            return e.element;
          });
        e(s).addClass("hidden"),
          i.isotope("layout"),
          0 == s.length
            ? jQuery("#course-load-more").hide()
            : jQuery("#course-load-more").show();
      }
      a(t),
        e("#course-load-more").on("click", function () {
          e(".course-item").data("clicked") &&
            ((s = t), e(".course-item").data("clicked", !1)),
            a((s += t));
        }),
        e(".course-item").on("click", function () {
          e(this).data("clicked", !0), a(t);
        });
    });
  else {
    e(".grid").imagesLoaded(function () {
      var i = e(".grid").isotope({
        itemSelector: ".grid-item",
        percentPosition: !0,
        masonry: { columnWidth: ".grid-item" },
      });
      e(".course-item").on("click", "button", function () {
        var t = e(this).attr("data-filter");
        i.isotope({ filter: t });
      }),
        e(".course-item button").on("click", function (i) {
          e(this).siblings(".active").removeClass("active"),
            e(this).addClass("active"),
            i.preventDefault();
        });
    });
    var s = e(".course-load-item-count").attr("data-show");
    e(".featured-load-item").hide(),
      e(".featured-load-item").slice(0, s).show(),
      e("body").on("click touchstart", ".load-more", function (i) {
        i.preventDefault(),
          e(".course-load-item:hidden").slice(0, s).slideDown(),
          0 == e(".course-load-item:hidden").length &&
            e(".load-more").css("display", "none");
      });
  }
  document.addEventListener("mousemove", function (e) {
    let i = e.clientX,
      t = e.clientY,
      s = i / window.innerWidth - 0.5,
      o = t / window.innerHeight - 0.5;
    document.querySelectorAll(".shape-move img").forEach(function (e, i) {
      e.style.transform = `translate(${s * (40 + 2 * i)}px, ${
        o * (40 + 2 * i)
      }px)`;
    });
  }),
    e(".bd-search-open-btn").on("click", function () {
      e(".bd-search-popup-area").addClass("bd-search-opened"),
        e(".bd-search-overlay").addClass("bd-search-opened");
    }),
    e(".bd-search-close-btn").on("click", function () {
      e(".bd-search-popup-area").removeClass("bd-search-opened"),
        e(".bd-search-overlay").removeClass("bd-search-opened");
    }),
    e(".bd-search-overlay").on("click", function () {
      e(".bd-search-popup-area").removeClass("bd-search-opened"),
        e(".bd-search-overlay").removeClass("bd-search-opened");
    }),
    e(".cartmini-open-btn").on("click", function () {
      e(".bd-sidebar-cart-area").addClass("bd-sidebar-cart-opened"),
        e(".body-overlay").addClass("opened");
    }),
    e(".cartmini-close-btn").on("click", function () {
      e(".bd-sidebar-cart-area").removeClass("bd-sidebar-cart-opened"),
        e(".body-overlay").removeClass("opened");
    }),
    e(".body-overlay").on("click", function () {
      e(".bd-sidebar-cart-area").removeClass("bd-sidebar-cart-opened"),
        e(".body-overlay").removeClass("opened");
    }),
    document.addEventListener("DOMContentLoaded", function () {
      let e = document.querySelector(".bd-grid-filter-trigger"),
        i = document.querySelector(".bd-list-filter-trigger"),
        t = document.querySelector(".display-layout-grid"),
        s = document.querySelector(".display-layout-list"),
        o = document.querySelector(".bd-grid-filter-text"),
        a = document.querySelector(".bd-list-filter-text");
      e &&
        i &&
        t &&
        s &&
        o &&
        a &&
        (e.addEventListener("click", function () {
          t.classList.add("active"),
            s.classList.remove("active"),
            e.classList.add("active"),
            i.classList.remove("active"),
            o.classList.add("active"),
            a.classList.remove("active");
        }),
        i.addEventListener("click", function () {
          s.classList.add("active"),
            t.classList.remove("active"),
            i.classList.add("active"),
            e.classList.remove("active"),
            a.classList.add("active"),
            o.classList.remove("active");
        }));
    }),
    e(".bd-filter-btn").on("click", function () {
      e("#filterContent").slideToggle(400);
    }),
    e("#show-review-box").on("click", function () {
      e("#review-box").slideToggle(700);
    });
  let o = e(".bd-ratings-wrapper");
  function a(i) {
    if (i.files && i.files[0]) {
      var t = new FileReader();
      (t.onload = function (i) {
        e("#imagePreview").css(
          "background-image",
          "url(" + i.target.result + ")"
        ),
          e("#imagePreview").hide(),
          e("#imagePreview").bdFadeIn(650);
      }),
        t.readAsDataURL(i.files[0]);
    }
  }
  o.length &&
    (o
      .find("i")
      .on("mouseover", function () {
        var i = parseInt(e(this).data("value"), 10);
        e(this)
          .parent()
          .children("i")
          .each(function (t) {
            t < i ? e(this).addClass("hover") : e(this).removeClass("hover");
          });
      })
      .on("mouseout", function () {
        e(this)
          .parent()
          .children("i")
          .each(function (i) {
            e(this).removeClass("hover");
          });
      }),
    o.find("i").on("click", function () {
      var i = parseInt(e(this).data("value"), 10),
        t = e(this).parent().children("i");
      for (let s = 0; s < t.length; s++) e(t[s]).removeClass("active");
      for (let a = 0; a < i; a++) e(t[a]).addClass("active");
      var n = parseInt(o.find("i.active").last().data("value"), 10),
        r = 0;
      (r = n), o.find("input[name=rating]").val(r);
    })),
    e(document).ready(function () {
      function i() {
        var i = e(window).scrollTop();
        e(".bd-course-menu nav ul li").each(function () {
          var t = e(this).find("a").attr("href"),
            s = e(t);
          if (s.length) {
            var o = s.offset().top - 325,
              a = o + s.outerHeight();
            i >= o &&
              i < a &&
              (e(".bd-course-menu nav ul li").removeClass("active"),
              e(this).addClass("active"));
          }
        });
      }
      e(".bd-course-menu nav ul li a").on("click", function (i) {
        var t = e(this.getAttribute("href"));
        t.length &&
          (i.preventDefault(),
          e("html, body")
            .stop()
            .animate({ scrollTop: t.offset().top - 325 }, 800));
      }),
        e(window).on("scroll", function () {
          i();
        }),
        i();
    }),
    e(document).ready(function () {
      e(".increase").on("click", function () {
        999 > e(this).prev().val() &&
          e(this)
            .prev()
            .val(+e(this).prev().val() + 1);
      }),
        e(".decrease").on("click", function () {
          e(this).next().val() > 0 &&
            e(this).next().val() > 0 &&
            e(this)
              .next()
              .val(+e(this).next().val() - 1);
        });
    }),
    document.addEventListener("DOMContentLoaded", function () {
      let e = document.querySelectorAll(".progress-item");
      e.forEach((e) => {
        let i = e.querySelector(".progress"),
          t = e.querySelector(".percentage"),
          s = parseInt(i.getAttribute("data-percentage"), 10);
        i.style.width = s + "%";
        let o = 0,
          a = setInterval(function () {
            o <= s ? ((t.textContent = o + "%"), o++) : clearInterval(a);
          }, 20);
      });
    }),
    e(document).ready(function () {
      e(window).scrollTop(0);
      var i = e("div.bd-form-setup-panel div a"),
        t = e(".bd-form-setup-content"),
        s = e(".nextBtn"),
        o = e(".prevBtn");
      t.hide(),
        i.click(function (s) {
          s.preventDefault();
          var o = e(e(this).attr("href")),
            a = e(this);
          a.hasClass("disabled") ||
            (i.removeClass("bd-step-active"),
            a.addClass("bd-step-active"),
            t.hide(),
            o.show());
        }),
        o.click(function () {
          var i = e(this).closest(".bd-form-setup-content").attr("id");
          e('div.bd-form-setup-panel div a[href="#' + i + '"]')
            .parent()
            .prev()
            .children("a")
            .removeAttr("disabled")
            .trigger("click");
        }),
        s.click(function () {
          var i = e(this).closest(".bd-form-setup-content"),
            t = e('div.bd-form-setup-panel div a[href="#' + i.attr("id") + '"]')
              .parent()
              .next()
              .children("a"),
            s = i.find(
              "input[type='text'],input[type='url'],input[type='email'],input[type='password']"
            ),
            o = !0;
          e(".form-group").removeClass("has-error");
          for (var a = 0; a < s.length; a++)
            s[a].validity.valid ||
              ((o = !1), e(s[a]).closest(".form-group").addClass("has-error"));
          o && t.removeAttr("").trigger("click");
        }),
        e("div.bd-form-setup-panel div a.bd-step-active").trigger("click");
    }),
    e("#imageUpload").change(function () {
      a(this);
    }),
    e(document).ready(function () {
      e("a.bd-campus-gallery-thumb").on("click", function (i) {
        i.preventDefault();
        var t = e(this).attr("href");
        e(t)
          .magnificPopup({
            delegate: "a",
            type: "image",
            gallery: { enabled: !0 },
          })
          .magnificPopup("open");
      });
    }),
    new Swiper(".postSliderActivation", {
      slidesPerView: 1,
      spaceBetween: 30,
      centeredSlides: !1,
      loop: !0,
      allowTouchMove: !0,
      observer: !0,
      pagination: { el: ".bd-post-slider-pagination", clickable: !0 },
      navigation: {
        nextEl: ".post-navigation-next",
        prevEl: ".post-navigation-prev",
      },
    }),
    new Swiper(".similarArticlesActivation", {
      slidesPerView: 3,
      spaceBetween: 30,
      centeredSlides: !1,
      loop: !0,
      allowTouchMove: !0,
      observer: !0,
      navigation: {
        nextEl: ".blog-navigation-next",
        prevEl: ".blog-navigation-prev",
      },
      breakpoints: {
        1400: { slidesPerView: 3 },
        1200: { slidesPerView: 3 },
        992: { slidesPerView: 2 },
        768: { slidesPerView: 2 },
        576: { slidesPerView: 1 },
        0: { slidesPerView: 1 },
      },
    }),
    new Swiper(".blogSlideActivation", {
      slidesPerView: 3,
      spaceBetween: 30,
      centeredSlides: !1,
      loop: !1,
      allowTouchMove: !0,
      observer: !0,
      pagination: { el: ".bd-dots-pagination", clickable: !0 },
      navigation: {
        nextEl: ".blog-navigation-next",
        prevEl: ".blog-navigation-prev",
      },
      breakpoints: {
        1400: { slidesPerView: 3 },
        1200: { slidesPerView: 3 },
        992: { slidesPerView: 2 },
        768: { slidesPerView: 2 },
        576: { slidesPerView: 1 },
        0: { slidesPerView: 1 },
      },
    }),
    new Swiper(".similarProductActivation", {
      slidesPerView: 4,
      spaceBetween: 30,
      centeredSlides: !1,
      loop: !0,
      allowTouchMove: !0,
      observer: !0,
      navigation: {
        nextEl: ".blog-navigation-next",
        prevEl: ".blog-navigation-prev",
      },
      breakpoints: {
        1400: { slidesPerView: 4 },
        1200: { slidesPerView: 4 },
        992: { slidesPerView: 3 },
        768: { slidesPerView: 2 },
        576: { slidesPerView: 2 },
        0: { slidesPerView: 2 },
      },
    });
  var n = new Swiper(".bd-product-details-nav", {
    spaceBetween: -20,
    slidesPerView: 4,
    centeredSlides: !1,
    navigation: {
      nextEl: ".product-details-button-next",
      prevEl: ".product-details-button-prev",
    },
  });
  new Swiper(".bd-product-details-active", {
    spaceBetween: 0,
    thumbs: { swiper: n },
    navigation: {
      nextEl: ".product-details-button-next",
      prevEl: ".product-details-button-prev",
    },
  }),
    new Swiper(".kindergartenProgramActive", {
      slidesPerView: 3,
      spaceBetween: 30,
      centeredSlides: !1,
      loop: !0,
      allowTouchMove: !0,
      observer: !0,
      pagination: { el: ".bd-testimonial-pagination", clickable: !0 },
      breakpoints: {
        1400: { slidesPerView: 3 },
        1200: { slidesPerView: 3 },
        992: { slidesPerView: 2 },
        768: { slidesPerView: 2 },
        576: { slidesPerView: 1 },
        0: { slidesPerView: 1 },
      },
    });
  var r = document.getElementById("slider-range");
  if (e("#slider-range").length) {
    noUiSlider.create(r, {
      start: [0, 1100],
      connect: !0,
      range: { min: 0, max: 2500 },
    });
    var l = document.getElementById("amount");
    r.noUiSlider.on("update", function (e, i) {
      l.value = "$" + e[0] + " - $" + e[1];
    }),
      e("#filter-btn").on("click", function () {
        e(".filter-widget").slideToggle(1e3);
      });
  }
  if (
    (e(document).ready(function () {
      e(".removeRow").click(function () {
        e(this).closest("tr").remove();
      });
    }),
    e("#showlogin").on("click", function () {
      e("#checkout-login").slideToggle(900);
    }),
    e("#showcoupon").on("click", function () {
      e("#checkout_coupon").slideToggle(900);
    }),
    e(".checkout-payment-item label").on("click", function () {
      e(this).siblings(".checkout-payment-desc").slideToggle(400);
    }),
    e(".checkout-login-form-reveal-btn").on("click", function () {
      e("#returnCustomerLoginForm").slideToggle(400);
    }),
    e(".checkout-coupon-form-reveal-btn").on("click", function () {
      e("#checkoutCouponForm").slideToggle(400);
    }),
    e("#cbox").on("click", function () {
      e("#cbox_info").slideToggle(900);
    }),
    e("#ship-box").on("click", function () {
      e("#ship-box-info").slideToggle(1e3);
    }),
    document.addEventListener("DOMContentLoaded", function () {
      var e = window.location.href.substr(
        window.location.href.lastIndexOf("https://html.topylo.com/") + 1
      );
      let i = document.querySelectorAll(".bd-dashboard-menu ul li a");
      i.forEach((i) => {
        (i.getAttribute("href") === e || "" === i.getAttribute("href")) &&
          i.classList.add("active");
      });
    }),
    jQuery("#studentEnrollChart").length > 0)
  ) {
    var d = {
        series: [
          { name: "Student Batch 1", data: [31, 60, 50, 71, 55, 90, 100] },
          { name: "Student Batch 2", data: [30, 65, 40, 60, 45, 100, 90] },
        ],
        chart: { height: 350, type: "area" },
        colors: ["#07A169", "#FFB800"],
        dataLabels: { enabled: !1 },
        stroke: { curve: "smooth" },
        xaxis: {
          categories: [
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
          ],
          offsetY: 0,
          offsetX: 5,
          labels: {
            style: {
              fontSize: "14px",
              fontWeight: 400,
              cssClass: "apexcharts-xaxis-label",
            },
          },
          axisBorder: { show: !1 },
        },
        yaxis: {
          labels: {
            style: { fontSize: "14px", fontWeight: 100 },
            formatter: function (e) {
              return e.toFixed(0) + "k";
            },
          },
        },
        tooltip: { x: { format: "dd/MM/yy HH:mm" } },
      },
      c = new ApexCharts(document.querySelector("#studentEnrollChart"), d);
    c.render();
  }
  if (jQuery("#earningsGraphChart").length > 0) {
    var d = {
        series: [
          { name: "Net Profit", data: [44, 55, 57, 56, 61, 58, 63, 60, 66] },
          { name: "Revenue", data: [76, 85, 101, 98, 87, 105, 91, 114, 94] },
          {
            name: "Free Cash Flow",
            data: [35, 41, 36, 26, 45, 48, 52, 53, 41],
          },
        ],
        chart: { type: "bar", height: 350 },
        colors: ["#07A169", "#FFB800", "#0dcaf0"],
        plotOptions: {
          bar: { horizontal: !1, columnWidth: "55%", endingShape: "rounded" },
        },
        dataLabels: { enabled: !1 },
        stroke: { show: !0, width: 2, colors: ["transparent"] },
        xaxis: {
          categories: [
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
          ],
        },
        yaxis: {
          title: {
            text: "$ (thousands)",
            style: { color: void 0, fontSize: "14px", fontWeight: 600 },
          },
          labels: { style: { fontSize: "12px" } },
        },
        fill: { opacity: 1 },
        tooltip: {
          y: {
            formatter: function (e) {
              return "$ " + e + " thousands";
            },
          },
        },
      },
      c = new ApexCharts(document.querySelector("#earningsGraphChart"), d);
    c.render();
  }
  if (jQuery("#coursesAnalyticsChart").length > 0) {
    var d = {
        series: [25, 30, 50],
        chart: { type: "donut", width: 320 },
        stroke: { show: !0, width: 0 },
        dataLabels: {
          style: { colors: ["#fff"], fontSize: "12px", fontWeight: 600 },
        },
        plotOptions: {
          pie: {
            startAngle: 0,
            endAngle: 360,
            expandOnClick: !0,
            customScale: 1,
            donut: { size: "55%", background: "#f7f7f7" },
          },
        },
        labels: ["Pending", "Processing", "Complete"],
        colors: ["#0dcaf0", "#FFB800", "#07A169"],
        legend: {
          show: !0,
          position: "bottom",
          verticalAlign: "bottom",
          align: "center",
          fontSize: "14px",
          colors: ["#F7B84B"],
          fontWeight: 400,
          labels: { colors: ["#7C7C7C"] },
          markers: {
            width: 8,
            height: 8,
            strokeWidth: 0,
            strokeColor: "#fff",
            radius: 12,
            offsetX: -2,
            offsetY: 0,
          },
          itemMargin: { horizontal: 5, vertical: 0 },
          onItemClick: { toggleDataSeries: !0 },
          onItemHover: { highlightDataSeries: !0 },
        },
      },
      c = new ApexCharts(document.querySelector("#coursesAnalyticsChart"), d);
    c.render();
  }
  if (jQuery("#quizMarkChart").length > 0) {
    var d = {
        series: [30, 30],
        chart: { type: "donut", width: 320 },
        stroke: { show: !0, width: 0 },
        dataLabels: {
          style: { colors: ["#fff"], fontSize: "12px", fontWeight: 600 },
        },
        plotOptions: {
          pie: {
            startAngle: 0,
            endAngle: 360,
            expandOnClick: !0,
            customScale: 1,
            donut: { size: "55%", background: "#f7f7f7" },
          },
        },
        labels: ["Complete Quiz", "Incomplete Quiz"],
        colors: ["#07A169", "#FFB800"],
        legend: {
          show: !0,
          position: "bottom",
          verticalAlign: "bottom",
          align: "center",
          fontSize: "14px",
          colors: ["#F7B84B"],
          fontWeight: 400,
          labels: { colors: ["#7C7C7C"] },
          markers: {
            width: 8,
            height: 8,
            strokeWidth: 0,
            strokeColor: "#fff",
            radius: 12,
            offsetX: -2,
            offsetY: 0,
          },
          itemMargin: { horizontal: 5, vertical: 0 },
          onItemClick: { toggleDataSeries: !0 },
          onItemHover: { highlightDataSeries: !0 },
        },
      },
      c = new ApexCharts(document.querySelector("#quizMarkChart"), d);
    c.render();
  }
  function a(i) {
    if (i.files && i.files[0]) {
      var t = new FileReader();
      (t.onload = function (i) {
        e("#imagePreview").css(
          "background-image",
          "url(" + i.target.result + ")"
        ),
          e("#imagePreview").hide(),
          e("#imagePreview").bdFadeIn(650);
      }),
        t.readAsDataURL(i.files[0]);
    }
  }
  e("#imageUpload").change(function () {
    a(this);
  }),
    e("#sidebarActive").on("click", function () {
      window.innerWidth > 0 && window.innerWidth <= 1199
        ? e(".bd-lesson-content, .bd-lesson-player").toggleClass("open")
        : e(".bd-lesson-content, .bd-lesson-player").toggleClass("collapsed"),
        e(".app-offcanvas-overlay").toggleClass("overlay-open");
    }),
    e(".app-offcanvas-overlay").on("click", function () {
      e(".bd-lesson-content, .bd-lesson-player").removeClass("collapsed"),
        e(".bd-lesson-content, .bd-lesson-player").removeClass("open"),
        e(".app-offcanvas-overlay").removeClass("overlay-open");
    }),
    document.querySelectorAll(".bg-flashlight").forEach((e) => {
      e.addEventListener("mousemove", (i) => {
        let t = e.getBoundingClientRect(),
          s = i.clientX - t.left,
          o = i.clientY - t.top;
        e.style.setProperty("--x", `${s}px`),
          e.style.setProperty("--y", `${o}px`);
      });
    }),
    document.addEventListener("DOMContentLoaded", function () {
      let e = document.querySelector(".yearly-plan-btn"),
        i = document.querySelector(".monthly-plan-btn"),
        t = document.querySelectorAll(".yearly-pricing"),
        s = document.querySelectorAll(".monthly-pricing");
      e &&
        i &&
        (e.addEventListener("click", function () {
          e.classList.add("active"),
            i.classList.remove("active"),
            t.forEach((e) => (e.style.display = "none")),
            s.forEach((e) => (e.style.display = "block"));
        }),
        i.addEventListener("click", function () {
          i.classList.add("active"),
            e.classList.remove("active"),
            t.forEach((e) => (e.style.display = "block")),
            s.forEach((e) => (e.style.display = "none"));
        }));
    }),
    new Swiper(".bd-program-details-active", {
      slidesPerView: 1,
      spaceBetween: 24,
      observeParents: !0,
      observer: !0,
      loop: !0,
      navigation: {
        nextEl: ".bd-program-details-next",
        prevEl: ".bd-program-details-prev",
      },
    }),
    new Swiper(".bookSlider", {
      effect: "coverflow",
      grabCursor: !0,
      centeredSlides: !0,
      coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 100,
        modifier: 3,
        slideShadows: !0,
      },
      keyboard: { enabled: !0 },
      mousewheel: { thresholdDelta: 70 },
      loop: !0,
      pagination: { el: ".swiper-pagination", clickable: !0 },
      autoplay: !0,
      breakpoints: {
        1400: { slidesPerView: 3 },
        1200: { slidesPerView: 3 },
        992: { slidesPerView: 4 },
        768: { slidesPerView: 3 },
        576: { slidesPerView: 2 },
        480: { slidesPerView: 2 },
        0: { slidesPerView: 2 },
      },
    });
})(jQuery);
