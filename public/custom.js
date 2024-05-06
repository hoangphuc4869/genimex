var translators = document.querySelectorAll(".translation");
var selector = document.querySelector("#postLang");

// console.log(title.value);

if (translators && selector) {
    selector.addEventListener("change", () => {
        if (selector.value != "en") {
            translators.forEach((trans) => {
                trans.classList.add("active");
            });
            var titleTrans = document.querySelector("#en-title");
            var contentTrans = document.querySelector("#summernote2");
            // console.log(contentTrans);
            var title = document.querySelector("#title");
            var content = document.querySelector("#summernote");
            // console.log(content.value);
            titleTrans.value = title.value;
            contentTrans.value = content.value;
            console.log(titleTrans, contentTrans);
        } else {
            translators.forEach((trans) => {
                trans.classList.remove("active");
            });
        }
    });
}

var bars = document.querySelector(".bars");
var close = document.querySelector(".close");
var menuWrap = document.querySelector(".menu-mobile-wrap");
var menu = document.querySelector(".main_menu_mobile");
// console.log(bars, close, menu);

if (bars) {
    bars.addEventListener("click", () => {
        menuWrap.classList.add("active");
    });

    document.addEventListener("click", (e) => {
        if (!bars.contains(e.target) && !menu.contains(e.target)) {
            menuWrap.classList.remove("active");
        }
    });
}

if (document.querySelector("#editor")) {
    ClassicEditor.create(document.querySelector("#editor")).catch((error) => {
        console.error(error);
    });
}

var swiper = new Swiper(".apartment_slider", {
    // slidesPerView: 2,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    slidesPerView: 2,
    spaceBetween: 30,
});
