
$('.service-examples-carousel').owlCarousel({
    loop:true,
    margin:30,
    rtl: true,
    dots:false,
    dotsEach:true,
    // center:true,
    autoplay:true,
    autoplaySpeed:1000,
    autoplayTimeout:5000,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        768:{
            items:2
        },
        1200:{
            items:3
        },
        1400:{
            items:4
        }
    }
})

$('.top-services-carousel').owlCarousel({
    loop:true,
    margin:0,
    rtl: true,
    dots:false,
    dotsEach:true,
    // center:true,
    autoplay:true,
    autoplaySpeed:1000,
    autoplayTimeout:5000,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        768:{
            items:2
        },
        1200:{
            items:3
        },
        1400:{
            items:4
        }
    }
})

$(document).on('hidden.bs.modal', function (event) {
  if ($('.modal:visible').length) {
    $('body').addClass('modal-open');
  }
});

$(function() {
    $(".partitioned-input").keyup(function () {
        if (this.value.length == 4) {
            console.log('here');
          $(this).closest('form').first().find('.btn').focus();
        }
    });
});

$(function() {
    $(".show-more").click(function () {
          $(this).closest('.show-more-box').css('max-height','unset');
          $(this).css('display','none')
    });
});



$(function() {
    $("#galleryOpenBtn").click(function () {
          $(this).closest('.show-more-box').css('max-height','unset');
        $(this).closest("#galleryWrapper").find('#galleryAdd').addClass('active');

    });
    $("#galleryAddBtn").click(function () {
        $(this).closest('#galleryAdd').removeClass('active');
  });
});



$(function() {
    $(".counter-btn").click(function () {
        const inc = $(this).data('inc');
        const sib =$(this).parent().find('.counter');
        const num = Number.parseInt(sib.text()) + Number.parseInt(inc);
        sib.text(num);
        if(num==1&&inc<0){
            $(this).attr('disabled','disabled');
        }
        if(num>1){
            $(this).parent().find('.counter-btn').removeAttr('disabled');
        }
    });
    $("#period").on('input',function(){
        if($(this).val()=='other'){
            $("#selectPeriod").removeClass('d-none');
        }
        else{
            $("#selectPeriod").addClass('d-none');
        }
    })

    $(".additional-service-check").change(function(){
        const additionalServiceId = $(this).data('additional-service-id');
        const div = $(this).closest('.add-additional-service').find('.additional-service[data-additional-service-id="'+additionalServiceId+'"]');
        console.log('div',div);
        if($(this).is(':checked')){
            div.removeClass('d-none');
        }
        else{
            div.addClass('d-none');

        }
    });
    $(".additional-service-period-add").change(function(){
        const div = $(this).closest('.add-additional-service').find('.additional-service-period-count');
        console.log(div.text());
        if($(this).val()==2){
            div.removeClass('d-none');
        }
        else{
            div.addClass('d-none');

        }
    })
});




$( ".btn-animate-fade" ).click(function() {
    $( this ).slideUp( "fast", function() {
    });
    $($(this).data('target')).slideDown( "slow", function() {
    });
  });


  $('.btn-open-chat').on('click',function(){
      $("#chatSideNav").css('right','0%');
  })

  $('.btn-close-chat').on('click',function(){
    $("#chatSideNav").css('right','-100%');
})