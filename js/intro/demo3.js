+function ($) {
    $(function(){

        var intro = introJs();

        intro.setOptions({
            steps: [
                {
                    element: '#temp_control',
                    intro: '<p class="h4 text-uc"><strong>1: Temperature Control</strong></p><p>使用led模拟</p>',
                    position: 'bottom'
                },
                {
                    element: '#elec_control',
                    intro: '<p class="h4 text-uc"><strong>2: Electrical Unit Control</strong></p><p>电器组开关装置的led模拟</p>',
                    position: 'left'
                },
                {
                    element: '#time_control',
                    intro: '<p class="h4 text-uc"><strong>3: Timing</strong></p><p>进行定时和取消定时操作</p>',
                    position: 'top'
                }
            ],
            showBullets: true
        });

        intro.start();

    });
}(jQuery);