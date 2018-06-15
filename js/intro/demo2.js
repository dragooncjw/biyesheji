+function ($) {
    $(function(){

        var intro = introJs();

        intro.setOptions({
            steps: [
                {
                    element: '#flot-live',
                    intro: '<p class="h4 text-uc"><strong>1: Real-time data graph</strong></p><p>Show real-time data in this graphic</p>',
                    position: 'top'
                },
                {
                    element: '#static-data',
                    intro: '<p class="h4 text-uc"><strong>2: Static data graph</strong></p><p>show data in 30 seconds</p>',
                    position: 'left'
                },
                {
                    element: '#details_of_data',
                    intro: '<p class="h4 text-uc"><strong>3: Details</strong></p><p>Show maximun,minimun temperature and items and temperature difference.</p>',
                    position: 'top'
                }
            ],
            showBullets: true
        });

        intro.start();

    });
}(jQuery);