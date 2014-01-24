// JavaScript Document
//全局方法整理
/*
HNID.UIManager.toggleSubMenuShowHide() 切换子菜单显示/隐藏
*/

var HNID= HNID||{};

HNID.UIManager=function(){
	//私有属性及方法
	var subMenuIsHidden=true;
	
	return{
		//公共属性及方法开始		
		toggleSubMenuShowHide:function(){
			if(subMenuIsHidden){
                $("#hnid_sub_nav").css("height","auto");
                subMenuIsHidden=false;
            }else{
                $("#hnid_sub_nav").css("height",0);
                subMenuIsHidden=true;
            }
        },
		hideSubMenu:function(){
			if(!subMenuIsHidden){
				$("#hnid_sub_nav").css("height",0);
				subMenuIsHidden=true;
            }
        }
    }
}();
$(document).ready(function(e) {

    //绑定子菜单点击相关事件
    $("#hnid_expand_menu_btn").on("click",function(evt){
        HNID.UIManager.toggleSubMenuShowHide();
        return false;
    });

    $(document).on("click",function(evt){
        HNID.UIManager.hideSubMenu()
    });
});