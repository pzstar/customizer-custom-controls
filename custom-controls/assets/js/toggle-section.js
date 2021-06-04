jQuery(document).ready(function ($) {
    $("body").on("click", ".hash-themes-switch-section.hash-themes-switch", function () {
        var controlName = $(this).siblings("input").data("customize-setting-link");
        var controlValue = $(this).siblings("input").val();
        var iconClass = "dashicons-visibility";
        if (controlValue === "off") {
            iconClass = "dashicons-hidden";
            $("[data-control=" + controlName + "]")
                    .parent()
                    .addClass("hash-themes-section-hidden")
                    .removeClass("hash-themes-section-visible");
        } else {
            $("[data-control=" + controlName + "]")
                    .parent()
                    .addClass("hash-themes-section-visible")
                    .removeClass("hash-themes-section-hidden");
        }
        $("[data-control=" + controlName + "]")
                .children()
                .attr("class", "dashicons " + iconClass);
    });
});
