// JavaScript Document

$(document).ready(function(e) {
    //变量定义
	var currentHeadlineScreen=1;
	var maxHeadlineScreen=$("#hnid_headline>ul>li").length;
	var currentNewsScreen=1;
	var maxNewsScreen=Math.ceil($("#hnid_news>ul>li").length/3);
	var currentInnovationScreen=1;
	var maxInnovationScreen=Math.ceil($("#hnid_innovation>ul>li").length/4);
	
	//绑定子菜单点击相关事件
	$("#hnid_expand_menu_btn").on("click",function(evt){
		HNID.UIManager.toggleSubMenuShowHide();
		evt.preventDefault();
		evt.stopPropagation();
		})
	$("#hnid_sub_nav").on("click",function(evt){
		evt.stopPropagation();
		})
	$(document).on("click",function(evt){
		HNID.UIManager.hideSubMenu()
		})
	
	//初始化“上一页”
	$("#hnid_headline>.hnid_btn_prev").addClass("hnid_hidden");
	$("#hnid_news>.hnid_btn_prev").addClass("hnid_hidden");
	$("#hnid_innovation>.hnid_btn_prev").addClass("hnid_hidden");
	
	//绑定headline “上一页”、“下一页”事件
	$("#hnid_headline>.hnid_btn_prev").on("click",function(evt){
		if(currentHeadlineScreen>1){
				currentHeadlineScreen-=1;			
				$("#hnid_headline > ul").css("left",-100*(currentHeadlineScreen-1)+"%")			
				if(currentHeadlineScreen==1){
					$("#hnid_headline>.hnid_btn_prev").addClass("hnid_hidden");
				}
				if(currentHeadlineScreen==maxHeadlineScreen-1){
					$("#hnid_headline>.hnid_btn_next").removeClass("hnid_hidden");	
				}
			};
			evt.preventDefault();
		})
	$("#hnid_headline>.hnid_btn_next").on("click",function(evt){
	if(currentHeadlineScreen<maxHeadlineScreen){
			currentHeadlineScreen+=1;			
			$("#hnid_headline > ul").css("left",-100*(currentHeadlineScreen-1)+"%")			
			if(currentHeadlineScreen==maxHeadlineScreen){
				$("#hnid_headline>.hnid_btn_next").addClass("hnid_hidden");
			}
			if(currentHeadlineScreen==2){
				$("#hnid_headline>.hnid_btn_prev").removeClass("hnid_hidden");	
			}
		};
		evt.preventDefault();
	})
	
	//绑定news “上一页”、“下一页”事件
	$("#hnid_news>.hnid_btn_prev").on("click",function(evt){
		if(currentNewsScreen>1){
				currentNewsScreen-=1;			
				$("#hnid_news > ul").css("left",-100*(currentNewsScreen-1)+"%")			
				if(currentNewsScreen==1){
					$("#hnid_news>.hnid_btn_prev").addClass("hnid_hidden");
				}
				if(currentNewsScreen==maxNewsScreen-1){
					$("#hnid_news>.hnid_btn_next").removeClass("hnid_hidden");	
				}
			};
		evt.preventDefault();
		})
	$("#hnid_news>.hnid_btn_next").on("click",function(evt){
	if(currentNewsScreen<maxNewsScreen){
			currentNewsScreen+=1;			
			$("#hnid_news > ul").css("left",-100*(currentNewsScreen-1)+"%")			
			if(currentNewsScreen==maxNewsScreen){
				$("#hnid_news>.hnid_btn_next").addClass("hnid_hidden");
			}
			if(currentNewsScreen==2){
				$("#hnid_news>.hnid_btn_prev").removeClass("hnid_hidden");	
			}
		};
	evt.preventDefault();
	})
	
	//绑定innovation “上一页”、“下一页”事件
	$("#hnid_innovation>.hnid_btn_prev").on("click",function(evt){
		if(currentInnovationScreen>1){
				currentInnovationScreen-=1;			
				$("#hnid_innovation > ul").css("left",-100*(currentInnovationScreen-1)+"%")			
				if(currentInnovationScreen==1){
					$("#hnid_innovation>.hnid_btn_prev").addClass("hnid_hidden");
				}
				if(currentInnovationScreen==maxInnovationScreen-1){
					$("#hnid_innovation>.hnid_btn_next").removeClass("hnid_hidden");	
				}
			};
		evt.preventDefault();
		})
	$("#hnid_innovation>.hnid_btn_next").on("click",function(evt){
	if(currentInnovationScreen<maxInnovationScreen){
			currentInnovationScreen+=1;			
			$("#hnid_innovation > ul").css("left",-100*(currentInnovationScreen-1)+"%")			
			if(currentInnovationScreen==maxInnovationScreen){
				$("#hnid_innovation>.hnid_btn_next").addClass("hnid_hidden");
			}
			if(currentInnovationScreen==2){
				$("#hnid_innovation>.hnid_btn_prev").removeClass("hnid_hidden");	
			}
		};
	evt.preventDefault();
	})
	
	
});