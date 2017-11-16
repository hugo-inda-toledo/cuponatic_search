<style>
    .empty-box{
        margin: 50%;
    }
</style>
<br>
<h1 class="my-4">Busqueda de cupones<br>
    <small>Escribe un criterio en la barra de busqueda</small>
</h1>

<div class="row">
    <div class="col-sm-12">
        <div class="input-group">
            <input type="text" name="Coupon[keyword]" placeholder="Busca por..." class="form-control" id="coupon-keyword">
            <span class="input-group-btn">
                <button type="button" onclick="Javascript:doSearch();" id="search-button" class="btn btn-default">Buscar</button>
            </span>
        </div>
    </div>
</div>
<br><br>

<div id="search-response-div">
    <div class="empty-box"></div>
</div>


<?= $this->Html->script('jquery-3.2.1.js');?>

<script>
    $(document).ready(function(){
        $('#coupon-keyword').keyup(function(e){
            if(e.keyCode == 13)
            {
                doSearch();
            }
        });
    });
    
    function doSearch()
    {
        $('#search-response-div').html('<div class="row"><div class="col-sm-12"><small class="text-center">Buscando cupones...</small></div></div><div class="empty-box"></div>');
        var button = $('#search-button');
        var buttonHtml = $.trim(button.html());

        var re = new RegExp(/^.*\//);
        var webroot =  re.exec(window.location.href);   

        $.ajax({
            url :  webroot + 'coupons/search',
            type : 'post',
            data : {
                keyword : $('#coupon-keyword').val(),
            },
            beforeSend : function() {
                button.attr('disabled', true);
                button.html('<i class="fa fa-spinner fa-spin"></i>');
            },
            complete : function (){
                button.attr('disabled', false);
                button.html(buttonHtml);
            },
            success : function(response) {

                console.log(response);

                if(response.total != 0)
                {
                    var boxs = '<div class="row">';

                    $.each(response.data.coupons, function(x, coupon) {

                        boxs += '<div class="col-lg-4 col-sm-6 portfolio-item" id="coupon-'+ coupon.id +'">';
                        boxs += '<div class="card h-100">';
                        boxs += '<a href="#"><img class="card-img-top" src="'+ coupon.image_url+'" alt=""></a>';
                        boxs += '<div class="card-body">';
                        boxs += '<h4 class="card-title">';
                        boxs += '<a href="#">'+ coupon.coupon_title +'</a>';
                        boxs += '</h4>';
                        boxs += '<p class="card-text">' + coupon.coupon_description + '</p>';
                        boxs += '</div>';
                        boxs += '</div>';
                        boxs += '</div>';
                    });

                    boxs += '</div>';

                    $('#search-response-div').html(boxs);
                }
                else
                {
                    var html = '<div class="row"><div class="col-sm-12"><h4 class="text-danger text-center"><strong>No se encontraron cupones</strong></h4></div></div><div class="empty-box"></div>';
                    $('#search-response-div').html(html);
                }

            },
            error : function(error) {
                console.log('Error:');
                console.log(error.responseText);
            }
        });
    }
</script>