+function ($) {
    $(function(){

        var intro = introJs();

        intro.setOptions({
            steps: [
                {
                    element: '#select_level',
                    intro: '<p class="h4 text-uc"><strong>1: Level</strong></p><p>you can only select one level.</p>',
                    position: 'right'
                },
                {
                    element: '#scrollable_hover',
                    intro: '<p class="h4 text-uc"><strong>2: Messages you have received</strong></p><p>messages you have received.</p>',
                    position: 'bottom'
                },
                {
                    element: '#send_to',
                    intro: '<p class="h4 text-uc"><strong>3: receiver select</strong></p><p>you can select many people to receive your message.</p>',
                    position: 'left'
                }
            ],
            showBullets: true
        });

        intro.start();

    });
}(jQuery);