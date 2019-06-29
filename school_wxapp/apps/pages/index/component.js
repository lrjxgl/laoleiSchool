// pages/index/component.js
var comm = require("../../common.js");
Page({

  /**
   * 页面的初始数据
   */
  data: {
    articleList:[],
    pageLoad:false
     
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
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function () {

  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function () {

  },
  getPage: function () {
    var that = this;
    comm.get({
      url: comm.apiHost + "/wxapp.php?",
      success: function (res) {
        console.log(res);
        that.setData({ articleList: res.data.list,pageLoad:true });
        
      }
    })
  },
  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {

  },
  onMyEvent:function(e){
    var id=e.detail.id;
    wx.navigateTo({
      url: '../index/show?id='+id,
    })
  }
})