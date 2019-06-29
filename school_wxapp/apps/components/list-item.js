// compoments/list-item.js
Component({
  /**
   * 组件的属性列表
   */
  properties: {
    aitems: {
      type: Array,
      observer:function(n,o){
  
        this.setData({ listItems: n });
      }
    },
    a: String
  },
  
  /**
   * 组件的初始数据
   */
  data: {
   listItems:[]
  
  },
  lifetimes:{
    created: function () {
      
    },
    attached: function () {
      console.log(this.data.aitems);
    
      console.log(typeof (this.data.aitems))
      
      this.setData({listItems:this.data.aitems});
      console.log(this.data.listItems)
    },
    detached:function(){
      console.log(this.data.aitems);
    }
  },
  
  /**
   * 组件的方法列表
   */
  methods: {
    onLoad: function () {
      console.log(this.data.items);
     
    },
    onTap:function(e){
      var myEventDetail = {
        id: e.currentTarget.dataset.id
      } // detail对象，提供给事件监听函数
      var myEventOption = {} // 触发事件的选项
      this.triggerEvent('myevent', myEventDetail, myEventOption)
    }
  }
})
