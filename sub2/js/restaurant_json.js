var xhr = new XMLHttpRequest();                 // XMLHttpRequest 객체를 생성한다.

xhr.onload = function() {                       // When readystate changes
 
  //if(xhr.status === 200) {                      // If server status was ok
    responseObject = JSON.parse(xhr.responseText);  //서버로 부터 전달된 json 데이터를 responseText 속성을 통해 가져올 수 있다.
	                                               

    var newContent = '';
    
    newContent='<p>음식점의 이미지를 업그레이드, <span>신선함</span>을 지키는 약속</p>';
    newContent+='<ul>';
    
    for (var i = 0; i < responseObject.restaurant.length; i++) { 
        newContent+='<li>';
        newContent+='<img src="'+responseObject.restaurant[i].img+'" alt="">';
        newContent+='<dl>';
        newContent+='<dt>'+responseObject.restaurant[i].title+'</dt>';
        newContent+='<dd>'+responseObject.restaurant[i].content+'</dd>'
        newContent+='</dl>';
        newContent+='</li>'
    }
   
    newContent+='</ul>';
    newContent+='<a href="#">서비스 신청하기</a>';
 
    document.getElementById('content').innerHTML = newContent;

  //}
};

xhr.open('GET', 'data/restaurant.json', true);        // 요청을 준비한다.
xhr.send(null);                                 // 요청을 전송한다
