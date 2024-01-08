<?php 
class projects extends Controller{
    public $userModel;
    public function __construct()
    {
        $this->userModel=$this->model('Project');
    } 
    public function create()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
          

            // init data
            $data=[
                'Membre_id'=>$_SESSION['user_id'],
                'Nom_project'=> trim($_POST['projectName']),
                'descrip'=> trim($_POST['description']),
                'Date_de_debut'=> trim($_POST['startDate']),
                'date_fin'=>trim($_POST['endDate']),
            ];

            if (!empty($data['Nom_project']) && !empty($data['descrip']) && !empty($data['Date_de_debut']) && !empty($data['date_fin'])) {
                // validated

                

                /************registring data by class User from the model that they have a function register ************** */
                if ($this->userModel->create($data)) {

                    redirect('projects/projects');
                } else {
                    die('something went wrong');
                }
            } else {
                // load the view
                $this->view('pages/index', $data);
            }
        }
    }
    public function projects(){
       $myprojects= $this->userModel->fetch_my_projects($_SESSION['user_id']);
    //    var_dump($myprojects);
    //    die();
    $data = [
        'projects' => $myprojects,
        'project_to_update' => '',
      ];
        $this->view('pages/index',$data);

    }
    public function delete_project($id){
    
        $this->userModel->delete_project($id);
         redirect('projects/projects');
    }
    public function project_to_update($id){ 
        
        $myprojects= $this->userModel->fetch_project($id);
        // var_dump($myprojects);
        // die();
     $data = [
         'project_to_update' => $myprojects
       ];
         $this->view('pages/update',$data);
 
     }
    public function update_project($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){


            // var_dump($id);
            // die();

            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
          

            // init data
            $data=[
                'Membre_id'=>$id,
                'Nom_project'=> trim($_POST['projectName']),
                'descrip'=> trim($_POST['description']),
                'Date_de_debut'=> trim($_POST['startDate']),
                'date_fin'=>trim($_POST['endDate']),
            ];
           


            if (!empty($data['Nom_project']) && !empty($data['descrip']) && !empty($data['Date_de_debut']) && !empty($data['date_fin'])) {
                // validated
//  var_dump($this->userModel->update_project($id,$data));
//             die();
                

                /************registring data by class User from the model that they have a function register ************** */
                if ($this->userModel->update_project($id,$data)) {

                    redirect('projects/projects');
                } else {
                    die('something went wrong');
                }
            } else {
                // load the view
                $this->view('pages/index', $data);
            }
        }


    }
  


}



?>