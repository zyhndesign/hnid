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

    //点击空白处影藏搜索子菜单
    $(document).on("click",function(evt){
        HNID.UIManager.hideSubMenu()
    });

    //点击搜索子菜单的时候阻止事件冒泡从而阻止影藏搜索子菜单
    $("#hnid_sub_nav").on("click",function(evt){
        evt.stopPropagation();
    })
});