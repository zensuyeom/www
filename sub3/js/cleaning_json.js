var xhr = new XMLHttpRequest();                 // XMLHttpRequest 객체를 생성한다.

xhr.onload = function() {                       // When readystate changes
 
  //if(xhr.status === 200) {                      // If server status was ok
    responseObject = JSON.parse(xhr.responseText);  //서버로 부터 전달된 json 데이터를 responseText 속성을 통해 가져올 수 있다.
	                                               

    var newContent = '';
    
    newContent='<div>';
    newContent+='<p>';
    newContent+='<span>더 깨끗하게 더 안전하게, 세스코 쇼핑</span>';
    newContent+='세스코 쇼핑은 지난 41여년간 해충방제 서비스를 통해 축적된 위생관리에 대한 서비스와 컨설팅 노하우를 지닌 국내 대표 생활환경위생기업 세스코가 업종별, 환경별로 발생 가능한 다양한 토탈 환경위생문제에 대한 최적의 현장 맞춤형 토탈 솔루션을 온라인을 통해 고객 여러분께 언제 어디서나 가장 즐겁고 편리하게 제안해 드릴 수 있도록 만든 세스코의 또 하나의 도약입니다.';
    newContent+='</p>';
    newContent+='</div>';
    newContent+='<ul>';
    
    for (var i = 0; i < responseObject.cleaning.length; i++) { 
        newContent+='<li>';
        newContent+='<a herf="'+responseObject.cleaning[i].link_none+'">';
        newContent+='<img src="'+responseObject.cleaning[i].img+'" alt="'+responseObject.cleaning[i].title+'">';
        newContent+='<dl>';
        newContent+='<dt>'+responseObject.cleaning[i].title+'</dt>';
        newContent+='<dd>'+responseObject.cleaning[i].normal+'<span>'+responseObject.cleaning[i].price+'</span>'+'</dd>';
        newContent+='<dd><span>'+responseObject.cleaning[i].member+'</span></dd>';
        newContent+='</dl>';
        newContent+='<span class="border_top"></span>';
        newContent+='<span class="border_right"></span>';
        newContent+='<span class="border_bottom"></span>';
        newContent+='<span class="border_left"></span>';
        newContent+='</a>'
    }
    
    newContent+='</ul>'
 
    document.getElementById('content').innerHTML = newContent;

  //}
};

xhr.open('GET', 'data/cleaning.json', true);        // 요청을 준비한다.
xhr.send(null);                                 // 요청을 전송한다
