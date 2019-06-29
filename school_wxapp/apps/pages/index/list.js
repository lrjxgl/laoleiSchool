//index.js
//获取应用实例
const app = getApp()
var comm = require("../../common.js");
console.log(comm)
Page({
  data: {
    articleList: []
  },
  //事件处理函数
  bindViewTap: function () {
    wx.navigateTo({
      url: '../logs/logs'
    })
  },
  onLoad: function () {
    this.getPage();

  },
  onReachBottom:function(){
    this.getList();
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
  getList: function () {
    var that = this;
    comm.get({
      url: comm.apiHost + "/wxapp.php",
      success: function (res) {
        var articleList=that.data.articleList;

        for(var i in res.data.list){
          articleList.push(res.data.list[i]);
        }
        that.setData({ articleList: articleList });

      }
    })
  },
  goArticle: function (event) {
    var id = event.currentTarget.dataset.id;
    wx.navigateTo({
      url: '../index/show?id=' + id,
    })
  }
})
