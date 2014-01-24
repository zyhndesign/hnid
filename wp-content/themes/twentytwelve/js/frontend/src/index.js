// JavaScript Document

$(document).ready(function (e) {
    //变量定义
    var headLineBtnPrev = $("#hnid_headline>.hnid_btn_prev"), hnidNewsBtnPrev = $("#hnid_news>.hnid_btn_prev"),
        hnidInnovationBtnPrev = $("#hnid_innovation>.hnid_btn_prev"), hnidProductBtnPrev = $("#hnid_product>.hnid_btn_prev");
    var headLineBtnNext = $("#hnid_headline>.hnid_btn_next"), hnidNewsBtnNext = $("#hnid_news>.hnid_btn_next"),
        hnidInnovationBtnNext = $("#hnid_innovation>.hnid_btn_next"), hnidProductBtnNext = $("#hnid_product>.hnid_btn_next");
    var headLineUl=$("#hnid_headline > ul"),newsUl=$("#hnid_news > ul"),innovationUl=$("#hnid_innovation > ul"),
        productUl=$("#hnid_product > ul");
    var currentHeadlineScreen = 1;
    var maxHeadlineScreen = $("#hnid_headline>ul>li").length;
    var currentNewsScreen = 1;
    var maxNewsScreen = Math.ceil($("#hnid_news>ul>li").length / 3);
    var currentInnovationScreen = 1;
    var maxInnovationScreen = Math.ceil($("#hnid_innovation>ul>li").length / 4);
    var currentProductScreen = 1;
    var maxProductScreen = Math.ceil($("#hnid_product>ul>li").length / 4);

    //初始化“上一页”
    headLineBtnPrev.addClass("hnid_hidden");
    hnidNewsBtnPrev.addClass("hnid_hidden");
    hnidInnovationBtnPrev.addClass("hnid_hidden");
    hnidProductBtnPrev.addClass("hnid_hidden");

    //绑定headline “上一页”、“下一页”事件
    headLineBtnPrev.on("click", function (evt) {
        if (currentHeadlineScreen > 1) {
            currentHeadlineScreen -= 1;
            headLineUl.css("left", -100 * (currentHeadlineScreen - 1) + "%");
            if (currentHeadlineScreen == 1) {
                headLineBtnPrev.addClass("hnid_hidden");
            }
            if (currentHeadlineScreen == maxHeadlineScreen - 1) {
                headLineBtnNext.removeClass("hnid_hidden");
            }
        }

        return false;
    });

    headLineBtnNext.on("click", function (evt) {
        if (currentHeadlineScreen < maxHeadlineScreen) {
            currentHeadlineScreen += 1;
            headLineUl.css("left", -100 * (currentHeadlineScreen - 1) + "%");
            if (currentHeadlineScreen == maxHeadlineScreen) {
                headLineBtnNext.addClass("hnid_hidden");
            }
            if (currentHeadlineScreen == 2) {
                headLineBtnPrev.removeClass("hnid_hidden");
            }
        }

        return false;
    });

    //绑定news “上一页”、“下一页”事件
    hnidNewsBtnPrev.on("click", function (evt) {
        if (currentNewsScreen > 1) {
            currentNewsScreen -= 1;
            newsUl.css("left", -100 * (currentNewsScreen - 1) + "%");
            if (currentNewsScreen == 1) {
                hnidNewsBtnPrev.addClass("hnid_hidden");
            }
            if (currentNewsScreen == maxNewsScreen - 1) {
                hnidNewsBtnNext.removeClass("hnid_hidden");
            }
        }
        return false;
    });
    hnidNewsBtnNext.on("click", function (evt) {
        if (currentNewsScreen < maxNewsScreen) {
            currentNewsScreen += 1;
            newsUl.css("left", -100 * (currentNewsScreen - 1) + "%");
            if (currentNewsScreen == maxNewsScreen) {
                hnidNewsBtnNext.addClass("hnid_hidden");
            }
            if (currentNewsScreen == 2) {
                hnidNewsBtnPrev.removeClass("hnid_hidden");
            }
        }
        return false;
    });

    //绑定innovation “上一页”、“下一页”事件
    hnidInnovationBtnPrev.on("click", function (evt) {
        if (currentInnovationScreen > 1) {
            currentInnovationScreen -= 1;
            innovationUl.css("left", -100 * (currentInnovationScreen - 1) + "%");
            if (currentInnovationScreen == 1) {
                hnidInnovationBtnPrev.addClass("hnid_hidden");
            }
            if (currentInnovationScreen == maxInnovationScreen - 1) {
                hnidInnovationBtnNext.removeClass("hnid_hidden");
            }
        }
        return false;
    });
    hnidInnovationBtnNext.on("click", function (evt) {
        if (currentInnovationScreen < maxInnovationScreen) {
            currentInnovationScreen += 1;
            innovationUl.css("left", -100 * (currentInnovationScreen - 1) + "%");
            if (currentInnovationScreen == maxInnovationScreen) {
                hnidInnovationBtnNext.addClass("hnid_hidden");
            }
            if (currentInnovationScreen == 2) {
                hnidInnovationBtnPrev.removeClass("hnid_hidden");
            }
        }
        return false;
    });

    //绑定product “上一页”、“下一页”事件
    hnidProductBtnPrev.on("click", function (evt) {
        if (currentProductScreen > 1) {
            currentProductScreen -= 1;
            productUl.css("left", -100 * (currentProductScreen - 1) + "%");
            if (currentProductScreen == 1) {
                hnidProductBtnPrev.addClass("hnid_hidden");
            }
            if (currentProductScreen == maxProductScreen - 1) {
                hnidProductBtnNext.removeClass("hnid_hidden");
            }
        }
        return false;
    });
    hnidProductBtnNext.on("click", function (evt) {
        if (currentProductScreen < maxProductScreen) {
            currentProductScreen += 1;
            productUl.css("left", -100 * (currentProductScreen - 1) + "%");
            if (currentProductScreen == maxProductScreen) {
                hnidProductBtnNext.addClass("hnid_hidden");
            }
            if (currentProductScreen == 2) {
                hnidProductBtnPrev.removeClass("hnid_hidden");
            }
        }
        return false;
    });
});