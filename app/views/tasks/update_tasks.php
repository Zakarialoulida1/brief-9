<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/check_session.php'; ?>

<div id="taskForm" class=" fixed inset-0 bg-gray-700 bg-opacity-75 z-10 flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md">
        <form action="<?php echo URLROOT . '/tasks/update_task/' . $data->id_task ?>" method="post">
            <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Add Task :</h1>
            <label for="taskName" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Task Name:</label>
            <input id="taskName" name="titre" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" value="<?php echo $data->titre ;?>" />
            <!-- Ajoutez d'autres champs nécessaires pour votre formulaire de tâche -->
            <div class="flex flex-col m-4">
                <label for="startDate">DEADLINE</label>
                <input value="<?php echo $data->deadline ;?>" class=" border-2 border-black rounded" type="date" id="startDate" name="deadline">
                <label for="startDate">STATUS</label>
                <select name="status" id="" class="border-2 border-black rounded">
                    <option value="-1">to do </option>
                    <option value="0">doing </option>
                    <option value="1"> done</option>
                </select>
            </div>
            <div class="flex items-center justify-start w-full">
                <input id="submitTask" value="Update Task" type="submit" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">
                <button id="cancelTask" class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm close">Cancel</button>
            </div>
            
        </form>
        <button id="closeTaskForm" class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600 close" aria-label="close modal" role="button">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <line x1="18" y1="6" x2="6" y2="18" />
                <line x1="6" y1="6" x2="18" y2="18" />
            </svg>
        </button>
    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>