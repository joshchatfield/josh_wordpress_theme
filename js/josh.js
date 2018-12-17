document.write('this is javascript from enqeue');
//document.getElementById('title').style.color = 'blue';
var today = new Date();
var year = today.getFullYear();
var month = today.getMonth() + 1;
var date = today.getDate();
document.getElementById('date_field').value = year + '-' + month + '-' + date;