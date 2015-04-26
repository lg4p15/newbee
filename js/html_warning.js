var ctt=getpara('ctt');
var rl=getpara('rl');
ctt=ctt?decodeURI(ctt):'出错了';
rl=rl?decodeURI(rl):'index.html';
document.getElementById('content').innerText=ctt;
document.title=ctt;
document.getElementById("returnlink").href=rl;