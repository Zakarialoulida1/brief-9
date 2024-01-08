<?php 
class Stats extends Controller{
    private  $statsmodel;
    public function __construct()
    {
        $this->statsmodel=$this->model('stat');
    }
    public function get_stats(){
      $project1=$this->statsmodel->getstats( $_SESSION['user_id']);
      $project2=$this->statsmodel->get_project_withless_tasks( $_SESSION['user_id']);
      $data=[
        'Nom_project1'=>$project1->Nom_project,
        'taskcount1' =>$project1->taskcount,
        'Nom_project2'=>$project2->Nom_project,
        'taskcount2'=>$project2->taskcount
      ];
        $this->view('stats/get_stats',$data);

    }
}