<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/check_session.php'; ?>
<div class="flex justify-around items-center p-8 text-xl bg-[#1f9fa6]">

    <a href="<?php echo URLROOT; ?>/projects/projects " class="inline  p-4  text-sm text-gray-900 border border-gray-300 rounded-lg bg-GREEN-500 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        BACK</a>
    <form class="">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative flex">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="text" id="default-search" class="inline w-[50vw] p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="search" required>
        </div>
    </form>

    <button id="addTaskButton" CLASS="bg-[#9ad0d9]  p-2 rounded"> Add Task</a>

</div>


<div class=" h-screen w-[100%] flex flex-wrap justify-evenly  items-start p-8 overflow-x-scroll  bg-[#9ad0d3]">
    <div class="rounded bg-grey-light w-96 p-2 m-3" id="todo">
        <div class="flex justify-between py-1">
            <h3 class="text-sm">To do</h3>
        </div>
        <div class="text-sm mt-2">


        </div>
    </div>
    <div class="rounded bg-grey-light w-96 p-2 m-3" id="doing">
        <div class="flex justify-between py-1">
            <h3 class="text-sm">DOING</h3>
        </div>
        <div class="text-sm mt-2">


        </div>
    </div>
    <div class="rounded bg-grey-light w-96 p-2 m-3 hidden" id="search_result">
        <div class="flex justify-between py-1">
            <h3 class="text-sm">Search_result</h3>
        </div>
        <div class="text-sm mt-2">


        </div>
    </div>
    <div class="rounded bg-grey-light w-96 p-2 m-3" id="done">
        <div class="flex justify-between py-1">
            <h3 class="text-sm">Done</h3>
        </div>
        <div class="text-sm mt-2">


        </div>
    </div>
</div>


<div id="taskForm" class="hidden fixed inset-0 bg-gray-700 bg-opacity-75 z-10 flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md">
        <form action="<?php echo URLROOT . '/tasks/add_task/' . $data['id_project'] ?>" method="post">
            <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Add Task :</h1>
            <label for="taskName" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Task Name:</label>
            <input id="taskName" name="titre" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="" />

            <div class="flex flex-col m-4">
                <label for="startDate">DEADLINE</label>
                <input class=" border-2 border-black rounded" type="date" id="startDate" name="deadline" required>
                <label for="startDate">STATUS</label>
                <select name="status" id="" class="border-2 border-black rounded">
                    <option value="-1">to do </option>
                    <option value="0">doing </option>
                    <option value="1"> done</option>
                </select>
            </div>
            <div class="flex items-center justify-start w-full">
                <input id="submitTask" value="Add Task" type="submit" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">
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


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<script>
    $(document).ready(function() {

        function fetchTaskstodo() {

            const fetchUrl = '<?php echo URLROOT . '/tasks/fetch_tasks/' . $data['id_project']; ?>';
            console.log(fetchUrl);
            //   console.log(fetchUrl);

            $.ajax({
                url: fetchUrl,
                type: 'GET',
                dataType: 'json',
                success: function(tasks) {
                    // console.log(tasks);

                    tasks.forEach(task => {

                        /*****************************paragraph************************ */
                        const tagElement = document.createElement("div");
                        tagElement.className = "bg-white p-2 rounded mt-1 border-b border-grey  hover:bg-grey-lighter w-full ";
                        tagElement.textContent = task.titre;
                        /**************deadline******************/
                        const deadline = document.createElement("span");
                        deadline.className = "bg-red-400 p-2 rounded mt-1 border-b border-grey  hover:bg-grey-lighter flex  justify-between";
                        deadline.textContent = task.deadline;

                        /*********************archiver icone and url ********** */
                        const archive = document.createElement("i");
                        archive.className = "fa-solid fa-box-archive bg-red-400 p-1 rounded cursor-pointer h-[20px]  ";
                        const anchorElement2 = document.createElement("a");
                        anchorElement2.href = " <?php echo URLROOT . '/tasks/archive_task/'; ?>" + task.id_task; // Replace '#' with the actual href value
                        anchorElement2.appendChild(archive);

                        /*****************edit*** */
                        const edit = document.createElement("i");
                        edit.className = "fa-regular fa-pen-to-square bg-green-400 p-1 rounded cursor-pointer h-[20px]";
                        const anchorElement = document.createElement("a");
                        anchorElement.href = " <?php echo URLROOT . '/tasks/edit_tasks/'; ?>" + task.id_task; // Replace '#' with the actual href value
                        anchorElement.appendChild(edit);
                        /*********div contenant les 2 icons archive et edit et deadline******* */

                        const container = document.createElement("div");
                        container.className = "bg-white p-2 rounded mt-1 border-b border-grey  hover:bg-grey-lighter flex items-center justify-between";
                        container.appendChild(deadline);
                        container.appendChild(anchorElement2);
                        container.appendChild(anchorElement);


                        /********************** */

                        tagElement.appendChild(container);

                        $(tagElement).appendTo('#todo');


                    });
                },
                error: function(error) {
                    console.error('Error fetching tasks:', error);
                }
            });
        }
        /******************** */







        /*************************** */

        $('#addTaskButton').click(function() {
            $('#taskForm').removeClass('hidden');
        });

        $('#closeTaskForm').click(function() {
            $('#taskForm').addClass('hidden');
        });

        $('#cancelTask').click(function() {
            $('#taskForm').addClass('hidden');
        });

        fetchTaskstodo();



        /********** */

        function fetchTasksdoing() {

            const fetchUrl = '<?php echo URLROOT . '/tasks/fetch_tasks_doing/' . $data['id_project']; ?>';

            //   console.log(fetchUrl);

            $.ajax({
                url: fetchUrl,
                type: 'GET',
                dataType: 'json',
                success: function(tasks) {
                    // console.log(tasks);

                    tasks.forEach(task => {



                        /*****************************paragraph************************ */
                        const tagElement = document.createElement("div");
                        tagElement.className = "bg-white p-2 rounded mt-1 border-b border-grey  hover:bg-grey-lighter w-full ";
                        tagElement.textContent = task.titre;
                        /**************deadline******************/
                        const deadline = document.createElement("span");
                        deadline.className = "bg-red-400 p-2 rounded mt-1 border-b border-grey  hover:bg-grey-lighter flex  justify-between";
                        deadline.textContent = task.deadline;

                        /*********************archiver icone and url ********** */
                        const archive = document.createElement("i");
                        archive.className = "fa-solid fa-box-archive bg-red-400 p-1 rounded cursor-pointer h-[20px]  ";
                        const anchorElement2 = document.createElement("a");
                        anchorElement2.href = " <?php echo URLROOT . '/tasks/archive_task/'; ?>" + task.id_task; // Replace '#' with the actual href value
                        anchorElement2.appendChild(archive);

                        /*****************edit*** */
                        const edit = document.createElement("i");
                        edit.className = "fa-regular fa-pen-to-square bg-green-400 p-1 rounded cursor-pointer h-[20px]";
                        const anchorElement = document.createElement("a");
                        anchorElement.href = " <?php echo URLROOT . '/tasks/edit_tasks/'; ?>" + task.id_task; // Replace '#' with the actual href value
                        anchorElement.appendChild(edit);
                        /*********div contenant les 2 icons archive et edit et deadline******* */

                        const container = document.createElement("div");
                        container.className = "bg-white p-2 rounded mt-1 border-b border-grey  hover:bg-grey-lighter flex items-center justify-between";
                        container.appendChild(deadline);
                        container.appendChild(anchorElement2);
                        container.appendChild(anchorElement);



                        /********************** */

                        tagElement.appendChild(container);

                        $(tagElement).appendTo('#doing');


                    });
                },
                error: function(error) {
                    console.error('Error fetching tasks:', error);
                }
            });
        }

        fetchTasksdoing();

        function fetchTasksdone() {
            const fetchUrl = '<?php echo URLROOT . '/tasks/fetch_tasks_done/' . $data['id_project']; ?>';

            //   console.log(fetchUrl);

            $.ajax({
                url: fetchUrl,
                type: 'GET',
                dataType: 'json',
                success: function(tasks) {
                    // console.log(tasks);

                    tasks.forEach(task => {

                        /*****************************paragraph************************ */
                        const tagElement = document.createElement("div");
                        tagElement.className = "bg-white p-2 rounded mt-1 border-b border-grey  hover:bg-grey-lighter w-full ";
                        tagElement.textContent = task.titre;
                        /**************deadline******************/
                        const deadline = document.createElement("span");
                        deadline.className = "bg-red-400 p-2 rounded mt-1 border-b border-grey  hover:bg-grey-lighter flex  justify-between";
                        deadline.textContent = task.deadline;

                        /*********************archiver icone and url ********** */
                        const archive = document.createElement("i");
                        archive.className = "fa-solid fa-box-archive bg-red-400 p-1 rounded cursor-pointer h-[20px]  ";
                        const anchorElement2 = document.createElement("a");
                        anchorElement2.href = " <?php echo URLROOT . '/tasks/archive_task/'; ?>" + task.id_task; // Replace '#' with the actual href value
                        anchorElement2.appendChild(archive);

                        /*****************edit*** */
                        const edit = document.createElement("i");
                        edit.className = "fa-regular fa-pen-to-square bg-green-400 p-1 rounded cursor-pointer h-[20px]";
                        const anchorElement = document.createElement("a");
                        anchorElement.href = " <?php echo URLROOT . '/tasks/edit_tasks/'; ?>" + task.id_task; // Replace '#' with the actual href value
                        anchorElement.appendChild(edit);
                        /*********div contenant les 2 icons archive et edit et deadline******* */

                        const container = document.createElement("div");
                        container.className = "bg-white p-2 rounded mt-1 border-b border-grey  hover:bg-grey-lighter flex items-center justify-between";
                        container.appendChild(deadline);
                        container.appendChild(anchorElement2);
                        container.appendChild(anchorElement);



                        /********************** */

                        tagElement.appendChild(container);

                        $(tagElement).appendTo('#done');

                    });
                },
                error: function(error) {
                    console.error('Error fetching tasks:', error);
                }
            });
        }
        fetchTasksdone();


        $("#default-search").keyup(function() {
            var input = $(this).val();
            console.log("gggggg");
            if (input != "") {
                // alert(input);
                const fetchUrl = '<?php echo URLROOT . '/tasks/search_task/' . $data['id_project']; ?>';
                $.ajax({
                    url: fetchUrl,
                    method: "POST",
                    data: {

                        input: input
                    },
                    // dataType: 'json',
                    success: function(tasks) {
                        console.log(tasks);
                        $("#search_result").html(tasks);


                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching tasks:', status, error);
                    }
                });
                $("#todo").hide();
                $("#doing").hide();
                $("#done").hide();
                $("#search_result").show()

            } else {
                $("#todo").show();
                $("#doing").show();
                $("#done").show();
                $("#search_result").hide()

            }

        })







    })
</script>




<?php require APPROOT . '/views/inc/footer.php'; ?>