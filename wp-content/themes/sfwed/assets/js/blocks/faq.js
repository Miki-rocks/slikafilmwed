$(window).on('load', function() {
    class Accordion {
        constructor(element) {
            this.rootElement = $(element);

            const items = this.rootElement.find('button');

            function toggleAccordion() {
                const itemToggle = $(this).attr('aria-expanded');

                items.attr('aria-expanded', 'false');

                if (itemToggle === 'false') {
                    $(this).attr('aria-expanded', 'true');
                }
            }

            items.on('click', toggleAccordion);
        }
    }

    // Find all elements with the class "accordion" and initialize Accordion for each one
    $('.accordion').each(function () {
        new Accordion(this);
    });
});
