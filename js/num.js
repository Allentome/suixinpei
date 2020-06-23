var _canvas,_ifstart,_B_x,_B_y,_return_str;//全局变量，匈牙利命名法(前加_表示全局变量)
function can_click() {

};
function start() {
    try {
        function drawscreen() {
            _canvas.fillStyle = "#eeeeee";//设置填充颜色
            _canvas.fillRect(0, 0, 70, 50);//用填充颜色填充指定区域
        };
        function write_text(_str) {
            _canvas.fillStyle = "green";
            _canvas.font = "20px _sans";//字体，字体大小
            _canvas.textBaseline = "top";//基线，基于哪里对齐
            _canvas.fillText(_str, 12, 5);//字写于指定位置
        };
        function getabc() {
            var _str = "a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,0,1,2,3,4,5,6,7,8,9";//分割字符串，成为数组
            var _str_array = _str.split(",");
            return_str = "";
            var rNum = 0;
            var patternStr='';
            for ( i = 0; i < 4; i++) {
                rNum = Math.random()
                var _rnd = Math.floor(rNum * _str_array.length);
                patternStr=patternStr+'['+_str_array[_rnd]+']'
                return_str += _str_array[_rnd];
            };
            document.getElementById('validateCode').setAttribute('pattern',patternStr);
        };
        function drawLine(){
            _canvas.moveTo(5,10);//指定起始点
            _canvas.lineTo(60,30);//指定终止点
            _canvas.lineWidth = 2;//指定线宽
            _canvas.strokeStyle = 'red';//指定线条颜色
            _canvas.stroke();//画线
        }
        drawscreen();
        getabc();//获得随机字串
        write_text(return_str);//向画布上画字串
        drawLine();//画线
    } catch(e) {
        alert(e);
    }
};
window.onload=function(){
    var canvas = document.getElementById("myCanvas");
     _canvas = canvas.getContext("2d");
    _return_str = "";
     _ifstart = false;
     _B_x = 0;
     _B_y = 0;
     start();
     canvas.onclick=start;
}