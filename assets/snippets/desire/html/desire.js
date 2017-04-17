var desireCount = 0;
var defaultConfig = {
    'active': 'active', //клас елемента который находиться в сравнении
    'desireSelector':'.to-desire', // селектор елементов для сравнения
    'desireCount':'#desire-count', // блок с количеством елементов с равнении
};
config = $.extend( defaultConfig, desire_config );


function setDesireCount() {
    if($(config['desireCount']).length){
        $(config['desireCount']).text(desireCount)
    }
}
function setCompareClass() {
    $.get('desire-list',function (cookie) {
        cookie = JSON.parse(cookie);
        for(var data in cookie){
            if($(config['desireSelector']+'[data-id="'+data+'"]').length){
                $(config['desireSelector']+'[data-id="'+data+'"]').addClass(defaultConfig['active'])
            }
            desireCount ++;
        }
        setDesireCount();
    })
}
setCompareClass();

$('body').on('click',config['desireSelector'],function (e) {

    e.preventDefault();
    elem = $(this);
    id = elem.attr('data-id');
    if(elem.hasClass(config['active'])){// убираем из желаный
        $.get('delete-from-desire',{
            id:id
        },function () {
            elem.removeClass(config['active'])
            desireCount --;
            setDesireCount();

            if (typeof callBackDeleteFromDesire == 'function') {
                callBackDeleteFromDesire(elem);
            }

        })

    }
    else{ //добавляем
        $.get('add-to-desire',{
            id:id
        },function () {
            elem.addClass(config['active'])
            desireCount ++;
            setDesireCount();
            if (typeof callBackAddToDesire == 'function') {
                callBackAddToDesire(elem);
            }
        })
    }


})