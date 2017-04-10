$(document).ready(function(){

    //admin login

    $(".log").click(function(){
        var name = $(".name").val();
        var password = $(".password").val();
        $.ajax({
            url:'login.php',
            type:'post',
            data:{ajax_name:name, ajax_password:password},
            success:function(res){
                if(res == "success"){
                    location.replace("home.php");
                }else{
                    $(".error").text("Try again!");
                }
            }
        })
    })
    $(".pencil").click(function(){
        id = $(this).attr("data-id");
        arm_name = $(this).attr("data-arm_name");
        eng_name = $(this).attr("data-eng_name");
        $(".id").val(id);
        $(".arm_name").val(arm_name);
        $(".eng_name").val(eng_name);
    })

    $(".img-thumbnail").click(function(){
        id = $(this).attr("id");
        products_id = window.location.href.split("=").pop();
        $.ajax({
            url:'primary_image.php',
            type:'post',
            data:{ajax_id:id, ajax_products_id:products_id},
            success:function(data){
                if(data == 1) {
                    $(".complex").css("opacity",0.5);
                    $('#' + id).css("opacity", 1);
                }else if(data == 0){
                    $('#'+id).css("opacity", 0.5);
                }
            }
        })
    })


    $(".img-thumbnail").click(function(){
        id = $(this).attr("id");
        product_id = window.location.href.split("=").pop();
        $.ajax({
            url:'slide.php',
            type:'post',
            data:{ajax_id:id, ajax_product_id:product_id},
            success:function(res){
                if(res == 1){
                    $('#' + id).css("background", "grey");
                }else if(res == 0){
                    $('#'+id).css("background", "#fff");
                }
            }
        })
    })

    $(".glyphicon-remove").click(function() {
         if(confirm("Are you sure to delete?")) {
                    var del_key = $(this).data("type");
                    var id = [];
                    $(":checkbox:checked").each(function (i) {
                        id[i] = $(this).val();
                    })
                    $.ajax({
                        url: 'delete.php',
                        type: 'post',
                        data: {id: id, del_key: del_key},
                        success: function () {
                            for (i = 0; i < id.length; i++) {
                                $('#' + id[i] + '').fadeOut();
                            }
                        }
                    })
            }
            if($(":checkbox:checked").length < 1){
             alert("No selected item, Please select an item!");
            }
    })

    // add products to the basket

    $("body").on("click", ".add_product", function(){
        var id = $(this).attr('id');
        $.ajax({
            url:'add.php',
            type:'post',
            dataType:'json',
            data:{id:id},
            success:function(data){

                       // increase the number withun badge in accordance to the number of selected items

                       var count = $(".badge").text();
                       $(".badge").text(++count);

                       var number_select = '<td><select>';
                       for(var i = 1; i <= data.max_amount; ++i){
                           number_select += '<option>' + i + '</option>';
                       }
                       number_select += '</select></td>';

                       $(".table").find('tbody')
                           .append($('<tr><td>' + '<img style = "width:90px; height:80px"' +
                               ' src = "uploads/'+ data.image + '"></td><td>' + data.eng_name + '</td>' + number_select +
                               '</td><td>' + data.price + '</td><td>' + data.total_price +
                               '</td><td><span class = "glyphicon glyphicon-stop choosen_remove" id = ' + id +'></span></td></tr>' ));
                   }
        })
    })
    // not allow to close the slidedown of the shopping card by clicking on it

    $(".table").click(function(event) {
        event.stopPropagation();
    })

    //change the amount of each product

    $('select').on('change', function() {
        var data_product_id = $(this).attr('id');
        var id = $(this).val();
            $.ajax({
                url:'add_number.php',
                type:'post',
                data:{id:id, data_product_id:data_product_id},
                success:function(res) {
                    var obj = JSON.parse(res);
                    $("#" + data_product_id).closest('tr').find('.total_amount').text(obj.product_total_price);
                    $("#total").text(obj.total_price);

                }
        })
    })

    //remove choosen product from card

    $(".table").on("click", ".choosen_remove", function(){
        var del_id = $(this).attr("id");
        $.ajax({
            url:'delete.php',
            type:'post',
            data:{del_id:del_id},
            success:function(data){
                $("#" + del_id).parent().parent().fadeOut(300, function(){
                    $("#" + del_id).parent().parent().remove();
                });

                $("#total").text(data);

                //decreasing the number whithin badge in accordance to its minimization and products remove

                var count = $(".badge").text();
                $(".badge").text(--count);

            }
        })
    })

    //user registration

$("#register").click(function () {
    var first_name = $(".first_name").val();
    var last_name = $(".last_name").val();
    var email = $(".email").val();
    var password = $(".password").val();
    var repassword = $(".repassword").val();
    var mobile = $(".mobile").val();
    var address = $(".address").val();
    $.ajax({
        url:'register.php',
        type:'post',
        data:{first_name:first_name, last_name:last_name, email:email, password:password, repassword:repassword,
            mobile:mobile, address:address},
        success:function(data){
            $("#signup_msg").html(data);
            if(data == 'inserted'){
                location.replace("index.php");
            }
        }
    })
})

    //user login

    $(".login").click(function () {
        var email = $(".email").val();
        var password = $(".password").val();
        $.ajax({
            url:'login.php',
            type:'post',
            data:{email:email, password:password},
            success:function(res){
                if(res == 'selected'){
                    location.replace("buy.php");
                }
                if(res == 'fail'){
                    $("#e-msg").text("There is no user for this email!");
                }
            }
        })
    })

    //prevent close of the div after click on the buy button

    $(".buy").click(function (ev) {
        ev.stopPropagation();
    })

})