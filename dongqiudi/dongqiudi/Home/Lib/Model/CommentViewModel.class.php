<?php
class CommentViewModel extends ViewModel{
	public $viewFields = array(
		'comment'=>array('*','_type'=>'LEFT'),
		'user'=>array('user_id'=>'username_id','username','headimg','_on'=>'comment.user_id=user.user_id'),
		'news'=>array('id','title','_on'=>'comment.news_id=news.id'),
	);
}
?>