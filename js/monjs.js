
$(function(){
    
    // Afficher l'ancien pwd lors de l'event hover sur l'icone show-old-pwd
    
    var txtOldpwd=$('.oldpwd');
    
    $('.show-old-pwd').hover(
       fnOver: function(){
        txtOldPwd.attr(name:'type',value:'text');
    },
        fnOut function(){
            txtOldpwd.attr(name:'type',value:'password');
        }
    
    )

    // Afficher le nouveau pwd lors de l'event hover sur l'icone show-new-pwd
    
    var txtNewpwd=$('.newpwd');
    
    $('.show-new-pwd').hover(
       fnOver: function(){
        txtNewpwd.attr(name:'type',value:'text');
    },
        fnOut function(){
            txtNewpwd.attr(name:'type',value:'password');
        }
    
    )
});