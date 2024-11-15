$(function () {
    $('a.page-scroll[href*="#"]:not([href="#"])').on("click", function () {
        if (
            location.pathname.replace(/^\//, "") ==
                this.pathname.replace(/^\//, "") &&
            location.hostname == this.hostname
        ) {
            var t = $(this.hash);
            if (
                ((t = t.length ? t : $("[name=" + this.hash.slice(1) + "]")),
                t.length)
            )
                return (
                    $("html, body").animate(
                        { scrollTop: t.offset().top - 70 },
                        1200,
                        "easeInOutExpo"
                    ),
                    !1
                );
        }
    });
});
