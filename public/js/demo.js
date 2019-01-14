/**
 * FOR DEMO PURPOSES ONLY
 **/

'use strict';

// document ready
$(function() {
    var $accordionColorSelector = $("#accordion-theme-current");
    var $accordion = $("#accordion-colored");

    $accordion.addClass("accordion-" + $accordion.data("current"));
    $accordionColorSelector.addClass("btn-outline-" + $accordion.data("current"));

    $("#demo-accordion-theme-selector").on("click", ".dropdown-item", function(e) {
        e.preventDefault();

        var color = $(this).data("color");
        var current = $accordion.data("current");

        $accordion
            .removeClass("accordion-" + current)
            .addClass("accordion-" + color);

        $accordion.data("current", color);

        // Update the selector text
        $accordionColorSelector.html(color);
        $accordionColorSelector
            .removeClass("btn-outline-" + current)
            .addClass("btn-outline-" + color);
    });

    $(".navigation", ".demo-blocks").each(function(i, e) {
        var $element = $(e);

        $(".navbar-toggler", e).on("click", function() {
            $element.toggleClass("navbar-expanded");
        });
    });

    /**
     * ANIMATION BAR
     **/
    (function () {
        $(".horizontal-demo-bars").animateBar({
            orientation: "horizontal",
            step: 100,
            duration: 1000,
            elements: [
                { label: "API Pubbliche", value: 40},
                { label: "Nodi di interfacciamento", value: 20 },
                { label: "Scrypta masternode bot", value: 50 },
                { label: "Identity card", value: 20 },
                { label: "Web wallet", value: 10 },
                { label: "Piattaforma Scrypta per i masternode", value: 60}
            ]
        });

        $(".vertical-demo-bars").animateBar({
            orientation: "vertical",
            step: 100,
            duration: 1000,
            elements: [
                { value: 89},
                { value: 97 },
                { value: 81 },
                { value: 99 },
                { value: 99 }
            ]
        });
    })();
});
