var xmlHttp;
function S_xmlhttprequest(){
  if(window.ActiveXobject){
    xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
  }else if(window.XMLHttpRequest){
    xmlHttp = new XMLHttpRequest();
  }
}
function funtest100(){
  var f = document.getElementById("userid").value;//获取文本框内容
  S_xmlhttprequest();
  xmlHttp.open("GET","php/chkforlogin.php?id="+f,true);//找开请求
  xmlHttp.onreadystatechange = byphp;//准备就绪执行
  xmlHttp.send(null);//发送
}
function byphp(){
  //判断状态


  if(xmlHttp.readyState==1){//Ajax状态
    document.getElementById('useridSpan').innerHTML = "正在判断";
  }
  if(xmlHttp.readyState==4){//Ajax状态
    if(xmlHttp.status==200){//服务器端状态
      var bytest100 = xmlHttp.responseText;
  var useridRegex =  /^[0-9]{12}$/;  
var useridValue = document.getElementById("userid").value;;
      //alert(bytest100);
      if(!useridRegex.test(useridValue)) {document.getElementById('useridSpan').innerHTML = "<span class='glyphicon glyphicon-remove' title='学号不符合规范'></span>";}
      else{
      document.getElementById('useridSpan').innerHTML = bytest100;
      } 
    }  
  }

}
