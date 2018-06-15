+function ($) {
  $(function(){

    var intro = introJs();

    intro.setOptions({
      steps: [
      {
          element: '.nav-user',
          intro: '<p class="h4 text-uc"><strong>1: Logout Quick Bar</strong></p><p>Logout and set your information</p>',
          position: 'bottom'
        },
        {
          element: '#nav header',
          intro: '<p class="h4 text-uc"><strong>2: Project switch</strong></p><p>You can quick switch your projects here.(Need to explore)</p>',
          position: 'right'
        },
        {
          element: '#workset',
          intro: '<p class="h4 text-uc"><strong>3: Workset</strong></p><p>Do detail operations</p>',
          position: 'left'
        },        
        {
          element: '#nav footer',
          intro: '<p class="h4 text-uc"><strong>4: Click to fold</strong></p><p>Click here and the nav will fold.</p>',
          position: 'top'
        }
      ],
      showBullets: true
    });

    intro.start();

  });
}(jQuery);