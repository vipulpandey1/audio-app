function dependentDropdown(e,child){
    let val = e.target.value;
    let url = e.target.getAttribute('data-url');
    $.ajax({
        url : url,
        type:"get",
        data:{id:val},
        success:function(res){
           
            $(document).find('#'+child+' option').html('');

            res.sub_cate.map((resp)=>{
                $(document).find('#'+child).append("<option value="+resp.id+">"+resp.name+" ("+resp.id+")</option>");
            });
        },
        error:function(res){
            console.log(res.responseText);
        }
    });
}
function MediaDropdown(e,child){
    let val = e.target.value;
    let url = e.target.getAttribute('data-url');
    $.ajax({
        url : url,
        type:"get",
        data:{id:val},
        success:function(res){
           console.log(res);
             $('#pro_media').html('<option value="">-- Select Media --</option>');
                        $.each(res, function (key, value) {
                            $("#pro_media").append('<option value="' + value
                                .id + '">' + value.title + '</option>');
                        });
        },
        error:function(res){
            console.log(res.responseText);
        }
    });
}
function MediaDropdown1(url,val,mdId){
    // let val = e.target.value;
    // let url = e.target.getAttribute('data-url');
    $.ajax({
        url : url,
        type:"get",
        data:{id:val},
        success:function(res){
           console.log(res);
             $('#pro_media').html('<option value="">-- Select Media --</option>');
                        $.each(res, function (key, value) {
                            let selected = value.id == mdId ? "selected" : "";
                            $("#pro_media").append('<option value="' + value
                                .id + '" '+selected+' >' + value.title + '</option>');
                        });
            
        },
        error:function(res){
            console.log(res.responseText);
        }
    });
}

function getAdsMedia(url,id){
    $.ajax({
        url : url,
        type:"get",
        data:{id:id},
        success:function(res){
          $('#editModel').modal('show');
           console.log(res)
            // $(document).find('#'+child+' option').html('');

            // res.sub_cate.map((resp)=>{
            //     $(document).find('#'+child).append("<option value="+resp.id+">"+resp.name+" ("+resp.id+")</option>");
            // });
        },
        error:function(res){
            console.log(res.responseText);
        }
    });
}



$(function() {
    // set csrf token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $(document).on('click','.toggle-button',function(){
        let url = $(this).attr('data-url');
        let id = $(this).attr('data-id');
        let status = $(this).is(':checked') ? 1 : 2 ;
        $.ajax({
            url:url,
            type:"post",
            data:{id:id,status:status},
            success:function(res){
                if(res.status == 200){
                    window.location.reload();
                }
            },error:function(res){
                console.log(res.responseText);
            }
    
        });
    });
    
     $(document).on('click','.toggle-button-ft',function(){
        let url = $(this).attr('data-url');
        let id = $(this).attr('data-id');
        let status = $(this).is(':checked') ? 1 : 0 ;
        $.ajax({
            url:url,
            type:"post",
            data:{id:id,status:status},
            success:function(res){
                if(res.status == 200){
                    window.location.reload();
                }
            },error:function(res){
                console.log(res.responseText);
            }
    
        });
    });


    $(document).on('click','.toggle-button-popup',function(){
        let url = $(this).attr('data-url');
        let id = $(this).attr('data-id');
        let popup_status = $(this).is(':checked') ? 1 : 2 ;
        $.ajax({
            url:url,
            type:"post",
            data:{id:id,popup_status:popup_status},
            success:function(res){
                if(res.status == 200){
                    window.location.reload();
                }
            },error:function(res){
                console.log(res.responseText);
            }
    
        });
    });

    
});
