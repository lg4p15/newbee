function getcookie(item){
var arr = document.cookie.match(new RegExp("(^| )"+item+"=([^;]*)(;|$)"));
return arr?arr[2]:arr;
}