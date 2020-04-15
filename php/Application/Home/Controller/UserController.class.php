<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    
    //验证是否已用此用户
    public function checkName()
    {
        $username=$_GET['name'];
        $userinfo=M("userinfo");
        $result=$userinfo->where("Uname='$username'")->select();

        if(count($result)>0){
            $data=array("success"=>true);
        }
        echo json_encode($data);
    }
    //注册
    public function useradd(){
        
            // 取出提交值
        $username=$_POST['name'];
        $userpwd=$_POST['pwd'];
        $usersex=$_POST['sex'];
        $userhob=$_POST['hob'];
        
        // 实现增加数据到数据库   
        $userinfo=M("userinfo");   
        $userdata=array("Uname"=>$username,"Upassword"=> $userpwd,"gender"=>$usersex,"hob"=>$userhob);
        $result=$userinfo->add($userdata);
        $data=array("status"=>$result);
        echo json_encode($data);
        
        
    }


    //登录
    public function login(){

        $username=$_POST['username']; 
        $userpwd=$_POST['password'];  //md5($_POST['password'])

        $userinfo=M("userinfo");
        $result=$userinfo->where("Uname='$username' and Upassword='$userpwd'")->select();

      // $data=array("data"=>0);
        if(count($result)>0){
            $data=array("data"=>1,"userinfo"=>$result);
        }
        echo json_encode($data);
    }


    //提交问卷
    public function submitQuest(){
        $uid=$_POST['uid']; 
        $qid=$_POST['qid'];

        $userinfo=M("answer");
        $userdata=array("Uid"=>$uid,"Qid"=> $qid);
        $result=$userinfo->add($userdata);
        $data=array("status"=>$result);
        echo json_encode($data);
        
    }

    //检查问卷是否已参与
    public function checkQuest(){
        $uid=$_GET['uid'];

        $userinfo=M("answer");
        $result=$userinfo->where("Uid='$uid'")->select();

        echo json_encode($result);
    }

   
    
}