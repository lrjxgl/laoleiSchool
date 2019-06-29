//app.js
var comm = require("common.js");
App({
  onLaunch: function () {
    var islg = comm.isLogin();
    if (!islg) {
      comm.login();
    }

  },
  globalData: {
    userInfo: null
  }
})