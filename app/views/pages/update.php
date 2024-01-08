<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/check_session.php'; ?>
<?php
$image = $_SESSION['user_image'];
$name = $_SESSION['user_name'];
$lastname = $_SESSION['user_lastname'];
?>

            <?php 
            
             $project=$data['project_to_update'];
            ?>

            <div id="popup" class=" fixed inset-0 bg-gray-500 bg-opacity-75 overflow-y-auto ">
                <div class="flex items-center justify-center min-h-screen">
                    <div class="bg-white p-8 rounded shadow-md">
                        <h2 class="text-center font-bold underline ">Add a New Project</h2>
                        <form action="<?= URLROOT . ' /projects/update_project/' . $project->project_ID ?>" method="post" class="flex flex-col">
                            <div class="flex flex-col">
                                <label for="projectName">Project Name:</label>
                                <input class=" border-2 border-black rounded" type="text" id="projectName" name="projectName" maxlength="200" value="<?php echo $project->Nom_project; ?>">
                            </div>
                            <div class="flex flex-col">
                                <label for="description">Description:</label>
                                <textarea class=" border-2 border-black rounded" id="description" name="description" rows="4" cols="50" maxlength="3000" ><?php echo $project->descrip; ?></textarea>
                            </div>
                            <div class="flex flex-col">
                                <label for="startDate">Start Date:</label>
                                <input class=" border-2 border-black rounded" type="date" id="startDate" name="startDate"  value="<?php echo $project->Date_de_debut; ?>" >
                            </div>
                            <div class="flex flex-col">
                                <label for="endDate">End Date:</label>
                                <input class=" border-2 border-black rounded" type="date" id="endDate" name="endDate"  value="<?php echo $project->date_fin; ?>">
                            </div>
                            <button  class=" hover:bg-green-400 p-2  mt-2 text-center text-black text-xs font-medium bg-gray-200 rounded-full" name="submit" type="submit" value="Add Project">UPDATE</button>
                        </form>
                    </div>
                </div>
            </div>



    </main>
    <?php require APPROOT . '/views/inc/footer.php'; ?>