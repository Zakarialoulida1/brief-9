<?php
class Tasks extends Controller
{

    public $userModel;
    public function __construct()
    {
        $this->userModel = $this->model('task');
    }

    public function task($id)
    {
        // var_dump($id);
        // die();
        $data = [
            'titre' => '',
            'id_project' => $id,
            'titre' => '',


        ];
        $this->view('tasks/task', $data);
    }
    public function add_task($id_project)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // var_dump($_POST['titre']);
            // die();

            // init data
            $data = [
                'id_user' => $_SESSION['user_id'],
                'titre' => trim($_POST['titre']),
                'deadline' => $_POST['deadline'],
                'status' => $_POST['status'],
                'id_project' => $id_project,
            ];

            if (!empty($data['titre'])) {
                // validated



                /************registring data by class User from the model that they have a function register ************** */
                if ($this->userModel->add_task($data)) {
                    $this->view('tasks/task', $data);
                } else {
                    die('something went wrong');
                }
            } else {
                // load the view
                $this->view('tasks/task', $data);
            }
        }
    }
    public function fetch_tasks($id)
    {
        $myprojects = $this->userModel->fetch_tasks($id);
        echo json_encode($myprojects);
    }
    public function fetch_tasks_doing($id)
    {
        $myprojects = $this->userModel->fetch_tasks_doing($id);
        echo json_encode($myprojects);
    }
    public function fetch_tasks_done($id)
    {
        $myprojects = $this->userModel->fetch_tasks_done($id);
        echo json_encode($myprojects);
    }

    public function edit_tasks($id_task)
    {

        $task = $this->userModel->fetch_task($id_task);
        // var_dump($task);
        // die();

        $this->view('tasks/update_tasks', $task);
    }
    public function update_task($id_task)
    {


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            // var_dump($id);
            // die();

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);



            $data = [

                'titre' => trim($_POST['titre']),
                'deadline' => $_POST['deadline'],
                'status' => $_POST['status'],

            ];

            if (!empty($data['titre'])) {
                // validated

                //         var_dump($this->userModel->update_task($id_task,$data));
                // die();

                /************registring data by class User from the model that they have a function register ************** */
                if ($this->userModel->update_task($id_task, $data)) {
                    $task = $this->userModel->fetch_task($id_task);




                    header("location: http://localhost/brief--9%20/tasks/task/$task->id_project");
                    // $this->view('tasks/task',$task->id_project);
                    // redirect('tasks/task');

                } else {
                    die('something went wrong');
                }
            } else {
                // load the view
                $this->view('tasks/fetch_tasks', $id_task);
            }
        }
    }

    public function archive_task($id_task)
    {
        // var_dump($id_task);
        // die();
        // $this->userModel->archive_task($id_task);
        if ($this->userModel->archive_task($id_task)) {
            $task = $this->userModel->fetch_task($id_task);




            header("location: http://localhost/brief--9%20/tasks/task/$task->id_project");
            // $this->view('tasks/task',$task->id_project);
            // redirect('tasks/task');

        } else {
            die('something went wrong');
        }
    }

    public function search_task($id_project)
    {

        /*********************** */

        if (isset($_POST['input'])) {
            $input = $_POST['input'];
            $tasks = $this->userModel->found_task($input,$id_project);


foreach ($tasks as $task) {
    // Start the container
    echo '<div class="bg-white p-2 rounded mt-1 border-b border-grey  hover:bg-grey-lighter w-full">';

    // Display task title
    echo '<p>' . $task['titre'] . '</p>';
echo '<div class="bg-white p-2 rounded mt-1 border-b border-grey  hover:bg-grey-lighter flex items-center justify-between">';
    // Display deadline
    echo '<span class="bg-red-400 p-2 rounded mt-1 border-b border-grey  hover:bg-grey-lighter flex  justify-between">' . $task['deadline'] . '</span>';

    
    echo '<a href="' . URLROOT . '/tasks/archive_task/' . $task['id_task'] . '"><i class="fa-solid fa-box-archive bg-red-400 p-1 rounded cursor-pointer h-[20px]"></i>';
    echo '</a>';

    // Display edit icon and link
    echo '<a href="' . URLROOT . '/tasks/edit_tasks/' . $task['id_task'] . '"><i class="fa-regular fa-pen-to-square bg-green-400 p-1 rounded cursor-pointer h-[20px]"></i>';
    echo '</a>';

    // Close the container
    echo '</div>';
    echo '</div>';

/*************************** 
 *
*/


    
}
        }
    }
}
