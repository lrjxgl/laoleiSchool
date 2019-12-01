
module.exports={
  apiHost:"http://school.com/laoleiSchool/school_php/",
  get:function(ops){
    var callback=ops.success;
		if(ops.url.indexOf("?") < 0){
			ops.url+="?";
		}
    wx.request({
      url: ops.url + "&access_token=" + this.get_access_token(),
      success:function(res){
          callback(res.data);
      }
    })
  },
  post:function(ops){
    var callback = ops.success;
		if(ops.url.indexOf("?") < 0){
			ops.url+="?";
		}
    wx.request({
      url: ops.url+"&access_token="+this.get_access_token(),
      method:"POST",
      data:ops.data,
      header:{
        "content-type": "application/x-www-form-urlencoded"
      },
      success: function (res) {
        callback(res.data);
      }
    })
  },
  isLogin:function(){
    var u = wx.getStorageSync("sslogin");
    if (u){
      return JSON.parse(u); 
    }
    return false;
  },
  login:function(){
    wx.getSetting({
       success:function(res){
         if (res.authSetting['scope.userInfo']) {
           wx.getUserInfo({
             success:function(res){
               var userInfo = res.userInfo
               var nickName = userInfo.nickName;
               var avatarUrl = userInfo.avatarUrl;         
               wx.setStorageSync("sslogin", JSON.stringify(userInfo));
             } 
           });
         }
       } 
    });
  },
  get_access_token:function(){
    return "access_token";
  }
}