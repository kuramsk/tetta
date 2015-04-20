/**
 * Created by fhow on 4/20/15.
 */
$(function(){
    setVendors();
});
function setVendors(){
    $('#vendors-a').after('<ul id="vendors-menu" class="dropdown-menu" role="menu" aria-labelledby="drop4"></ul>');
    $.ajax({
        type: "POST",
        url: "/api/get-vendors-list",
        success: function (json) {
            var data = JSON.parse(json);
            $('#vendors-menu').empty();
            data.forEach(function (el) {
                $('#vendors-menu').append('<li role="presentation"><a role="vendor" vendor-id="' + el.id + '" tabindex="-1" target="_blank">' + el.name + '</a></li>');
            });
            setModels();
        }
    });
}
function setModels() {
    $("#vendors-a").click(function(){
        //Включаем текущий
        $('#vendors-a').parent('div').removeClass('select-inactive');
        $('#vendors-a').parent('div').addClass('select-active');

        //Оключаем остальные
        $('#models-a').parent('div').removeClass('select-active');
        $('#models-a').parent('div').addClass('select-inactive');
        $('#models-menu').remove();

        $('#complectations-a').parent('div').removeClass('select-active');
        $('#complectations-a').parent('div').addClass('select-inactive');
        $('#complectations-menu').remove();

        $('#search-a').parent('div').removeClass('select-active');
        $('#search-a').parent('div').addClass('select-inactive');
        $('#search-menu').remove();

        //
    });

    $("[role=vendor]").click(function () {

        //Оключаем остальные

        $('#models-a').parent('div').removeClass('select-active');
        $('#models-a').parent('div').addClass('select-inactive');
        $('#models-menu').remove();

        $('#complectations-a').parent('div').removeClass('select-active');
        $('#complectations-a').parent('div').addClass('select-inactive');
        $('#complectations-menu').remove();

        $('#search-a').parent('div').removeClass('select-active');
        $('#search-a').parent('div').addClass('select-inactive');
        $('#search-menu').remove();

        //
        $('#vendors-a').parent('div').removeClass('select-active');

        $('#models-a').attr("data-toggle", "dropdown");

        $('#models-a').parent('div').removeClass('select-inactive');
        $('#models-a').parent('div').addClass('select-active');
        $('#models-a').parent('div').append('<ul id="models-menu" class="dropdown-menu" role="menu" aria-labelledby="drop4"> </ul>');

        var vendor = $(this).attr('vendor-id');
        $.ajax({
            type: "POST",
            url: "/api/get-models-list",
            data: "vendor_id=" + vendor,
            success: function (json) {
                var data = JSON.parse(json);
                $('#models-menu').empty();
                if(data.length != 0){
                    data.forEach(function (el) {
                        $('#models-menu').append('<li role="presentation"><a role="models" model-id="' + el.id + '" tabindex="-1" target="_blank">' + el.name + '</a></li>');
                    });
                    setComplectation();
                }else{
                    $('#models-menu').append('<li role="presentation"><a role="models" tabindex="-1" target="_blank">Предложений нет</a></li>');
                }

            }
        });
    });
}

function setComplectation() {
    $("#models-a").click(function(){
        //Включаем текущий
        $('#models-a').parent('div').removeClass('select-inactive');
        $('#models-a').parent('div').addClass('select-active');

        //Оключаем остальные

        $('#complectations-a').parent('div').removeClass('select-active');
        $('#complectations-a').parent('div').addClass('select-inactive');
        $('#complectations-menu').remove();

        $('#search-a').parent('div').removeClass('select-active');
        $('#search-a').parent('div').addClass('select-inactive');
        $('#search-menu').remove();

        //
    });
    $("[role=models]").click(function () {
        //Оключаем остальные

        $('#complectations-a').parent('div').removeClass('select-active');
        $('#complectations-a').parent('div').addClass('select-inactive');
        $('#complectations-menu').remove();

        $('#search-a').parent('div').removeClass('select-active');
        $('#search-a').parent('div').addClass('select-inactive');
        $('#search-menu').remove();

        //

        $('#models-a').parent('div').removeClass('select-active');

        $('#complectations-a').attr("data-toggle", "dropdown");

        $('#complectations-a').parent('div').removeClass('select-inactive');
        $('#complectations-a').parent('div').addClass('select-active');
        $('#complectations-a').parent('div').append('<ul id="complectations-menu" class="dropdown-menu" role="menu" aria-labelledby="drop4"> </ul>');

        var model = $(this).attr('model-id');
        $.ajax({
            type: "POST",
            url: "/api/get-complectations-list",
            data: "model_id=" + model,
            success: function (json) {
                var data = JSON.parse(json);
                $('#complectations-menu').empty();
                if(data.length != 0){
                    data.forEach(function (el) {
                        $('#complectations-menu').append('<li role="presentation"><a role="complectation" complectation-id="' + el.id + '" tabindex="-1" target="_blank">' + el.name + '</a></li>')
                    });
                    setSearch();
                }else{
                    $('#complectations-menu').append('<li role="presentation"><a role="complectation" tabindex="-1" target="_blank">' + el.name + '</a></li>')
                }
            }
        });
    });
}

function setSearch(){
    $("#complectations-a").click(function(){
        //Включаем текущий
        $('#complectations-a').parent('div').removeClass('select-inactive');
        $('#complectations-a').parent('div').addClass('select-active');

        //Оключаем остальные

        $('#search-a').parent('div').removeClass('select-active');
        $('#search-a').parent('div').addClass('select-inactive');
        $('#search-menu').remove();

        //
    });
    $("[role=complectation]").click(function () {
        var complectation = $(this).attr('complectation-id');
        $('#complectations-a').parent('div').removeClass('select-active');

        $('#search-a').parent('div').removeClass('select-inactive');
        $('#search-a').parent('div').addClass('select-active');
        startSearch(complectation);
    });
}
function startSearch(complectation){
    $("#search-a").click(function(){
        $.ajax({
            type: "POST",
            url: "/api/get-orders-list",
            data: "complectation_id=" + complectation,
            success: function (json) {
                var data = JSON.parse(json);
                if(data.length == 0){
                    drawData(false);
                }else{
                    drawData(data);
                }
            }
        });
    });
}
function drawData(data){
    if(data){
        $('.orders-list').empty();
        data.forEach(function (el){
            $('.orders-list').append('<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 pb30" car-id="'+el.id+'"> ' +
            '<a href="/orders/'+el.id+'"><div class="car-offer" style="background: url('+el.main_img+') center no-repeat; background-size: cover;"> ' +
            '<div class="car-offer-caption text-right">Продаётся '+el.vendor_id+' '+el.model_id+'</div> ' +
            '<div class="car-offer-price text-right"> '+el.price+' руб.</div> ' +
            '<div class="car-offer-description text-right">'+el.description+'</div>' +
            '</div> </a>' +
            '</div>');
        });
    }else{
        $('.orders-list').empty();
        data.forEach(function (el){
            $('.orders-list').append('<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 pb30">' +
            'Таких машин в данный момент в продаже нет.' +
            '</div>');
        });
    }

}