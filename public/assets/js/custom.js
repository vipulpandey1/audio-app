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