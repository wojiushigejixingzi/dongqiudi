var checkVote = function(){
		var list = $('.vote');
	    var ids = '';
	    for(var j = 0; j < list.length; j++){
	        ids += list.eq(j).attr('rel')+'_';
	    }
	    if(ids){
	        url = '/poll?id=' + ids;
	        $.getJSON(url, function(data) {
	            
	            for(var i = 0; i<data.length; i++){
                    var html = $("#voteTemplate").render(data[i])
	                $('#vote_'+data[i].id).html(html)
	                setOption(data[i],data[i].id);
	            };
	            
	        });
	    }
	}
    
    var setOption = function(data,id) {
        var box = $('#vote_'+id)
	    removeEvent(id);
	    var html = '';
	    var selected = '';
	    var selStat = false;
	    for (var i = 0; i < data.options.length; i++) {
	        html += '<dd>' +
	        '<h3>' + data.options[i].title + '<span>' + data.options[i].stat + '%</span></h3>' +
	        '<div class="rank"><div class="bar" style="width:' + data.options[i].stat + '%"></div>' +
	        '</div>' +
	        '</dd>';
	        if(data.options[i].voted){
	            selected += '「<span>' + data.options[i].title+'</span>」,';
	            selStat = true;
	        }
	    };
		box.find('dd').remove()
	    
	    box.find('dl').addClass('re').append(html);
	    if (selStat) {
	        box.find('.text').html('您已经为' + selected + '投过票了');
	    }
    };
    var removeEvent = function(id) {
	    $('#vote_'+id).undelegate('dd')
	    $('#vote_'+id).undelegate('dd')
	};