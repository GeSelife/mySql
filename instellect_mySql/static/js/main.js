$(function () {
    //选项卡
    $('.pro_listsOne').click(function () {
        $(this).children('dl').toggle();
    })

    $('.lists-one').click(function () {
        $('.pro').toggle();

        if($('.pro')[0].style.display=='none'){
            $('.content')[0].style.paddingLeft='10px';
        }else {
            $('.content')[0].style.paddingLeft='240px';

        }
    })
})