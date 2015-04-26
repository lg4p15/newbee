var user = getpara('u');
user=user?decodeURI(user):'';
document.getElementById('userid').innerHTML=user;