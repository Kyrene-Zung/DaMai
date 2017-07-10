<template>
  <div class="tab">
    <div class="container">
      <ul class="mui-row" id="list">
        <li class="mui-col-xs-3 active" >人气最高</li>
        <li class="mui-col-xs-3 " >最新上线</li>
        <li class="mui-col-xs-3 " >比赛时间</li>
      </ul> 

      <!-- <div id="content">
        <div>111111111111111111</div>
        <div>2222</div>
        <div>333</div>
        <div>444</div>
      </div> -->

    </div>
  </div>
</template>

<script type="es6">
export default {
  name: 'slide',
  data () {
    return {

    }
  },
  mounted(){
    this.init();
  },
  methods:{
    init(){
       clickSlideMenu()
    }
  },
  props:['']
}

function clickSlideMenu(){
  var slider=document.getElementById('list');
  var content=document.getElementById('content');
  var lis=slider.querySelectorAll('li');
  for (var i = 0; i < lis.length; i++) {
      lis[i].index=i;
      lis[i].onclick=function(){
        for (var i = 0; i < lis.length; i++) {
          lis[this.index].setAttribute('class','active');
        }       
        
    }
  }
}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style text="text/css" scoped>
.tab .container ul{list-style: none;margin:0rem 0.5rem;padding:0 0.5rem;width: 100%;}
.tab .container ul li{font-size:0.7rem;text-align:center;color:#ccc;height:2rem;line-height:2rem;}
.tab .container ul li+li{margin-left:1.5rem;}
.tab .container ul li.active{color:black;border-bottom:3px solid #000;}
</style>
