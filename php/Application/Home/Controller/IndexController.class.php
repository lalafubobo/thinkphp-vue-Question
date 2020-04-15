<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    //得到问卷主题
    public function showQuest(){
        $username=$_POST['username']; 
        $userpwd=$_POST['password']; 
        $user=M("auinfo");
        $data=$user->select();
       //$responsedata=array("data"=>$data);
       echo json_encode($data);
        
    }

    //得到问卷题目
    public function getTitle(){
        $Qid = $_GET['Qid'];
        //$Qid = 1;
        $arry=[];
        $user=M("subject");
        $subject=$user->where("Qid=".$Qid)->select();
        foreach ($subject as $key => $value) {
            //$dt=json_encode($value);
            $sid= $value['sid'];
            $option=M("option");
            $reulst=$option->where("Sid=".$sid)->select();
            array_push($arry,$reulst);
        }

        $data = [
            "option"=>$arry,
            "title"=>$subject
        ];
        echo json_encode($data);
       
    }

    //得到该用户所发布的问卷
    public function getConByUser(){
        $username=$_GET['username'];

        // $username='付梓豪'; 
        $user=M("auinfo");
        $condition['Aname'] = $username;
        $subject=$user->where( $condition)->select();
        echo json_encode($subject);
        
    }


    
    //得到该用户所参与的问卷
    public function getJonByUser(){
        $username=$_GET['username'];

        // $username='付梓豪'; 
        $user=M("antopic");
        $condition['Aname'] = $username;
        $subject=$user->where( $condition)->select();
        echo json_encode($subject);
        
    }


   //创建问卷
   public function creatQuest(){
        $Qname=$_GET['qname'];
        $Qdate=$_GET['qdate'];
        $Uid=$_GET['uid'];

        $userinfo=M("questionnaire");   
        $userdata=array("Qname"=>$Qname,"Qdate"=> $Qdate,"uid"=>$Uid);
        $result=$userinfo->add($userdata);
        $data=array("status"=>$result);
        echo json_encode($data);
   }
    
}