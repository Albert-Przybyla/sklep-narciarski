$(window).scroll(function() {
    if ($(this).scrollTop() > 1){
    $('nav').addClass("sticky");
    $('navigation').addClass("stickynav");
    }   
    else{
    $('nav').removeClass("sticky");
    $('navigation').addClass("stickynav");
    }
    });

    function scroll(e) {

        var href = $(this).attr('href');
    
        e.preventDefault();
    
        $('html, body').animate({
            scrollTop: $(href).offset().top
        }, 800);
    
        location.hash = href;
    
    };


    const menu = document.querySelector('.menu');
    const nav = document.querySelector('.navigation');
    const handleClick = () => {
        menu.classList.toggle('menu--active');
        nav.classList.toggle('navigation--active');
    }
    const mouseon = () => {
        menu.classList.toggle('menu--mouse')
    }
 
    menu.addEventListener('click', handleClick);
    menu.addEventListener('mouseover', mouseon);
    
    $('a[href^="#"]').click(scroll);

    $('#right').click(function(){
        var currentSlide = $('.slide.active');
        var nextSlide = currentSlide.next();

        currentSlide.removeClass('active');
        

        if(nextSlide.length == 0) {
            $('.slide').first().addClass('active');
        }else{
            nextSlide.addClass('active');
        }
    });

    $('#left').click(function(){
        var currentSlide = $('.slide.active');
        var prevSlide = currentSlide.prev();

        currentSlide.removeClass('active');
        
        if(prevSlide.length == 0) {
            $('.slide').last().addClass('active');
        }else{
            prevSlide.addClass('active');
        }
    });

    // const question = document.getElementsById('name');

    // document.getElementsById('form').addEventListener('submit', Event =>{

    //     Event.preventDefault();

    //     const error = validate();

    //     if(error === ''){
    //         const xhr = new XMLHttpRequest();

    //         xhr.onload = function(){
    //             // if(this.status === 200){

    //             // }
    //             xhr.open('POST', 'addToCart.php', true);
    //             xhr.setRequestHeader("Content-type", "application/x=www=form-urlencoded");
    //             xhr.send('question='+JSON.stringify({ val: question.value}))
    //         }
    //     }
    // })


