// JavaScript Document

 function initialize() {
  var myLatlng = new google.maps.LatLng(37.328735, 126.851724);
  var myOptions = {
   zoom: 15,
   center: myLatlng

  }
  var map = new google.maps.Map(document.getElementById("map_home"), myOptions);
 
  var marker = new google.maps.Marker({
   position: myLatlng, 
   map: map, 
   title:"(주)우리집"
  });   
  
 
  var infowindow = new google.maps.InfoWindow({
   content: "(주)우리집 주소, 전화번호, 팩스, sns등"
  });
 
  infowindow.open(map,marker);
 }
 
 
 window.onload=function(){
  initialize();
 }

