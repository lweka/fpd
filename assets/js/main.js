(function () {
  const header = document.getElementById("siteHeader");
  const burgerBtn = document.getElementById("burgerBtn");
  const mainNav = document.getElementById("mainNav");

  function onScroll() {
    if (!header) return;
    header.classList.toggle("is-shrink", window.scrollY > 40);
  }

  window.addEventListener("scroll", onScroll, { passive: true });
  onScroll();

  if (burgerBtn && mainNav) {
    burgerBtn.addEventListener("click", function () {
      const isOpen = mainNav.classList.toggle("is-open");
      burgerBtn.classList.toggle("is-open", isOpen);
      burgerBtn.setAttribute("aria-expanded", String(isOpen));
    });

    mainNav.querySelectorAll("a").forEach(function (link) {
      link.addEventListener("click", function () {
        if (window.innerWidth < 760) {
          mainNav.classList.remove("is-open");
          burgerBtn.classList.remove("is-open");
          burgerBtn.setAttribute("aria-expanded", "false");
        }
      });
    });
  }

  if (typeof AOS !== "undefined") {
    AOS.init({
      once: true,
      duration: 700,
      easing: "ease-out-quart"
    });
  }

  if (typeof gsap !== "undefined") {
    const heroTitle = document.querySelector(".hero-copy h1");
    const heroSlogan = document.querySelector(".hero-copy .slogan");
    const heroCta = document.querySelector(".hero-copy .hero-cta");

    if (heroTitle && heroSlogan && heroCta) {
      gsap.from([heroTitle, heroSlogan, heroCta], {
        y: 24,
        opacity: 0,
        stagger: 0.15,
        duration: 0.8,
        ease: "power2.out"
      });
    }
  }

  function initSwiper(selector, options) {
    if (typeof Swiper === "undefined") return;
    const node = document.querySelector(selector);
    if (!node) return;
    new Swiper(selector, options);
  }

  initSwiper(".news-swiper", {
    loop: true,
    spaceBetween: 16,
    autoplay: { delay: 5000, disableOnInteraction: false },
    pagination: { el: ".news-swiper .swiper-pagination", clickable: true },
    navigation: {
      nextEl: ".news-swiper .swiper-button-next",
      prevEl: ".news-swiper .swiper-button-prev"
    },
    breakpoints: {
      0: { slidesPerView: 1 },
      760: { slidesPerView: 2 },
      1024: { slidesPerView: 3 }
    }
  });

  initSwiper(".testimonials-swiper", {
    loop: true,
    spaceBetween: 16,
    autoplay: { delay: 4500, disableOnInteraction: false },
    pagination: { el: ".testimonials-swiper .swiper-pagination", clickable: true },
    breakpoints: {
      0: { slidesPerView: 1 },
      760: { slidesPerView: 2 },
      1024: { slidesPerView: 3 }
    }
  });

  initSwiper(".events-swiper", {
    loop: true,
    spaceBetween: 16,
    autoplay: { delay: 5200, disableOnInteraction: false },
    pagination: { el: ".events-swiper .swiper-pagination", clickable: true },
    breakpoints: {
      0: { slidesPerView: 1 },
      760: { slidesPerView: 2 },
      1024: { slidesPerView: 3 }
    }
  });

  const counters = document.querySelectorAll(".counter");
  if (counters.length) {
    const counterObserver = new IntersectionObserver(
      function (entries, observer) {
        entries.forEach(function (entry) {
          if (!entry.isIntersecting) return;

          const el = entry.target;
          const target = Number(el.dataset.target || 0);
          let current = 0;
          const step = Math.max(1, Math.ceil(target / 80));

          const timer = setInterval(function () {
            current += step;
            if (current >= target) {
              el.textContent = target.toLocaleString("fr-FR");
              clearInterval(timer);
            } else {
              el.textContent = current.toLocaleString("fr-FR");
            }
          }, 20);

          observer.unobserve(el);
        });
      },
      { threshold: 0.5 }
    );

    counters.forEach(function (counter) {
      counterObserver.observe(counter);
    });
  }

  const filterButtons = document.querySelectorAll(".filter-btn");
  const newsItems = document.querySelectorAll(".news-item");

  if (filterButtons.length && newsItems.length) {
    filterButtons.forEach(function (button) {
      button.addEventListener("click", function () {
        const filter = button.dataset.filter;

        filterButtons.forEach(function (btn) {
          btn.classList.remove("active");
        });

        button.classList.add("active");

        newsItems.forEach(function (item) {
          const type = item.dataset.type;
          const show = filter === "all" || type === filter;
          item.classList.toggle("hidden", !show);
        });
      });
    });
  }

  const forms = document.querySelectorAll("form");
  forms.forEach(function (form) {
    form.addEventListener("submit", function (event) {
      event.preventDefault();
      const btn = form.querySelector('button[type="submit"]');
      if (!btn) return;

      const prev = btn.textContent;
      btn.textContent = "Envoyé";
      btn.disabled = true;

      setTimeout(function () {
        btn.textContent = prev;
        btn.disabled = false;
        form.reset();
      }, 1300);
    });
  });
})();
