var request = function(paras){ 
    var url = location.href; 
    var paraString = url.substring(url.indexOf("?")+1,url.length).split("&"); 
    var paraObj = {} 
    for (i=0; j=paraString[i]; i++){ 
      paraObj[j.substring(0,j.indexOf("=")).toLowerCase()] = j.substring(j.indexOf("=")+1,j.length); 
    } 
    var returnValue = paraObj[paras.toLowerCase()]; 
    if(typeof(returnValue)=="undefined"){ 
      return ""; 
    }else{ 
      return returnValue; 
    } 
}
var dofollow = function(obj, groupid, type) {
      var url = "/users/dofollow/" + groupid + '?type=' + type;
      $.getJSON(url, function(data) {
            if(data.errCode) {
                  $('#pop').find('p').text(data.errMsg);
                  maskShow();
                  return;
            }
            if(data.status) {
                  //关注成功
                  $(obj).attr('class', 'btn_focused');
                  $(obj).attr('onclick', 'dofollow(this,'+groupid+',\'unfollow\')');
                  $(obj).html('取消关注');
                  $('#follower_total').html(data.follower_total);
                  if($('#followGroups')) {
                        $('#followGroups').html(data.followGroups);
                  }
                  // alert('关注成功');
            } else {
                  //取消关注
                  $(obj).attr('class', 'btn_focus');
                  $(obj).attr('onclick', 'dofollow(this,'+groupid+',\'follow\')');
                  $(obj).html('+关注');
                  $('#follower_total').html(data.follower_total);
                  if($('#followGroups')) {
                        $('#followGroups').html(data.followGroups);
                  }
                  // alert('取消成功');
            }
      });
}

var doaction = function(obj, type, action, id) {
      var url = '';
      if(action == 'report') {
            url = '/'+type+'/report/' + id;
      } else if(action == 'up') {
            url = '/'+type+'/up/' + id;
      }
      $.getJSON(url, function(data) {
            if(data.errCode) {
                  $('#pop').find('p').text(data.errMsg);
                  maskShow();
                  return;
            }
            if(data.up) {
                  if(type == 'topics') {
                        $('#topic_up').html(data.up);
                        return;
                  }
                  $($(obj)[0].childNodes[1]).html(data.up);
            } else if(data.report) {
                  $('#pop').find('p').text('举报成功');
                  maskShow();
            }
      });
}

var reply = function(type, id) {
      var url = '';
      if(type == 'topics') {
            url = "/topics/create_reply/" + id;
      } else if(type == 'replies'){
            url = "/replies/create_reply/" + id;
      } else {
            alert('url错误');
            return;
      }
      var _data = {
            'content' : ''
      }
      _data['content'] = $('textarea').val();
      $.ajax({
            type: "get",
            url: url,
            data: _data,
            success: function (data) {
                  if(data.errCode) {
                        $('#pop').find('p').text(data.errMsg);
                        maskShow();
                        return;
                  }
                  if(data.reply_html) {
                        $('#all_replies').prepend(data.reply_html);
                        $('textarea').val('');
                        return;
                  }
            }
      });
}

var replyToreply = function(obj, replyId, replyName) {
      $('#comm_send').attr('onclick',"reply('replies',"+replyId+")");
      $('textarea').attr('placeholder', '回复'+replyName+'的评论');
}

var topic = function() {
      // 将options传给ajaxForm
      $('#topicForm').ajaxForm();
      $('#topicForm').ajaxSubmit(function(data) {
            if(data.errCode) {
                  $('#pop').find('p').text(data.errMsg);
                  maskShow();
                  return;
            }
            if(data.topicHtml) {
                  $('.list_item').prepend(data.topicHtml);
                  $("input[name='title']").val('');
                  $("textarea[name='content']").val('');
                  //删除图片资源
                  $('.remove').click();
            }
      });
      return false;
}