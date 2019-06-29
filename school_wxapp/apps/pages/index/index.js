//index.js
//获取应用实例
const app = getApp()
var comm = require("../../common.js");
Page({
  data: {
    articleList: [],
    imgUrls: [
      'https://img.deitui.com/?w=320&h=160&text=deituiCMS',
      'https://img.deitui.com/?w=320&h=160&text=deituiCMS',
      'https://img.deitui.com/?w=320&h=160&text=deituiCMS'
    ],
    indicatorDots: true,
    autoplay: true,
    interval: 5000,
    duration: 1000
  },
  
  onLoad: function () {
    
    this.getPage();
  },
  onShareAppMessage:function(){

  },
  onPullDownRefresh:function(){
    this.getPage();
  },
  getPage: function () {
    var that = this;
    comm.get({
      url: comm.apiHost + "/wxapp.php",
      success: function (res) {
        console.log(res);
        that.setData({ articleList: res.data.list });

      }
    })
  },
  getUserInfo: function(e) {
    console.log(e)
    app.globalData.userInfo = e.detail.userInfo
    this.setData({
      userInfo: e.detail.userInfo,
      hasUserInfo: true
    })
  },
  goArticle: function (event) {
    var id = event.currentTarget.dataset.id;
    wx.navigateTo({
      url: '../index/show?id=' + id,
    })
  },
  goList:function(){
    wx.navigateTo({
      url: '../index/list',
    })
  }
})
