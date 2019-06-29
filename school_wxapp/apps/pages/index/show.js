// pages/index/show.js
var comm = require("../../common.js");
var inSubmit=false;
var inSubmitTimer;
Page({

  /**
   * 页面的初始数据
   */
  data: {
      data:{},
      commenList:[],
      cmform:{
         content:"" 
      },
      cm_content:""
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
      this.getPage();
  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {

  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function () {

  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide: function () {

  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload: function () {

  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {
    return {
      title: '自定义转发标题',
      path: '/page/user?id=123',
      imageUrl:'http://img.deitui.com/?w=320&h=200&text=deituiCMS'
    }
  },
  getPage: function () {
    var that = this;
    comm.get({
      url: comm.apiHost + "/wxapp.php?a=show",
      success: function (res) {
        console.log(res);
        that.setData({ data: res.data.data });

      }
    })
  },
  formSubmit:function(e){
    var that=this;
    if (inSubmit){
      return false;
    }
    inSubmit=true;
    inSubmitTimer=setTimeout(function(){
      inSubmit=false;
      clearTimeout(it)
    },1000)
    comm.post({
      url:comm.apiHost+"wxapp.php?a=post",
      data:e.detail.value,
      success:function(res){
        var cmList=that.data.commenList;
        cmList.push(res.data);
        
        that.setData({commentList:cmList});
        that.setData({cm_content:""});
        console.log(that.data.commentList);
      }
    })
  }
})