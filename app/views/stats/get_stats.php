<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/check_session.php'; ?>

<?php
$image = $_SESSION['user_image'];
$name = $_SESSION['user_name'];
$lastname = $_SESSION['user_lastname'];


?>

<div id="sidebar" class=" bg-gray-100 hidden fixed w-full lg:flex lg:w-64 lg:flex-col lg:fixed lg:inset-y-0  z-50 ">

    <div class="flex-1 flex flex-col min-h-0 bg-[#9ad0d3]">
        <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
            <div class="flex  justify-between items-center  px-4">
                <button id="fermernav"><i class=" lg:hidden text-black fas fa-times fa-2xl"></i></button>
                <img class="lg: h-12 inline-block m-2 " src="<?php echo URLROOT . '/img/logo.png'; ?>" alt="Workflow">
            </div>
            <div class="mt-5 flex-1 px-2 space-y-1">

                <a href="<?php echo URLROOT; ?>/stats/get_stats" id="btnproject" class=" cursor-pointer text-black hover:bg-[#BFD8D5] hover:bg-opacity-75 group flex items-center px-2 py-2 text-sm font-medium rounded-md" x-state-description="undefined: &quot;bg-indigo-800 text-black&quot;, undefined: &quot;text-black hover:bg-[#BFD8D5] hover:bg-opacity-75&quot;">
                    <svg class=" cursor-pointer mr-3 flex-shrink-0 h-6 w-6 text-black" xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M139.6 35.5a12 12 0 0 0 -17 0L58.9 98.8l-22.7-22.1a12 12 0 0 0 -17 0L3.5 92.4a12 12 0 0 0 0 17l47.6 47.4a12.8 12.8 0 0 0 17.6 0l15.6-15.6L156.5 69a12.1 12.1 0 0 0 .1-17zm0 159.2a12 12 0 0 0 -17 0l-63.7 63.7-22.7-22.1a12 12 0 0 0 -17 0L3.5 252a12 12 0 0 0 0 17L51 316.5a12.8 12.8 0 0 0 17.6 0l15.7-15.7 72.2-72.2a12 12 0 0 0 .1-16.9zM64 368c-26.5 0-48.6 21.5-48.6 48S37.5 464 64 464a48 48 0 0 0 0-96zm432 16H208a16 16 0 0 0 -16 16v32a16 16 0 0 0 16 16h288a16 16 0 0 0 16-16v-32a16 16 0 0 0 -16-16zm0-320H208a16 16 0 0 0 -16 16v32a16 16 0 0 0 16 16h288a16 16 0 0 0 16-16V80a16 16 0 0 0 -16-16zm0 160H208a16 16 0 0 0 -16 16v32a16 16 0 0 0 16 16h288a16 16 0 0 0 16-16v-32a16 16 0 0 0 -16-16z" />
                    </svg>
                    My stats
                </a>



                <a href="<?php echo URLROOT; ?>/projects/projects" id="btnproject" class=" cursor-pointer text-black hover:bg-[#BFD8D5] hover:bg-opacity-75 group flex items-center px-2 py-2 text-sm font-medium rounded-md" x-state-description="undefined: &quot;bg-indigo-800 text-black&quot;, undefined: &quot;text-black hover:bg-[#BFD8D5] hover:bg-opacity-75&quot;">
                    <svg class=" cursor-pointer mr-3 flex-shrink-0 h-6 w-6 text-black" x-description="Heroicon name: outline/folder" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                    </svg>
                    My Projects
                </a>

            </div>

        </div>
        <div class="w-full flex justify-between items-center border-t border-black p-4">


            <div class="ml-3 flex flex-col">

                <img class='inline-block h-14 w-14 rounded-full  ' src="<?php echo URLROOT . '/img/' . $image; ?>" alt=''>


                <p class="text-sm font-medium text-black">
                    <?php echo  $name;
                    echo $lastname;

                    ?>



                </p>

            </div>

            <a href="<?php echo URLROOT; ?>/users/logout" class="p-4 w-fit h-fit text-center text-black text-xs font-medium bg-red-400 rounded-full">LOG OUT</a>


        </div>
    </div>
</div>
<div class=" lg:pl-64 flex flex-col flex-1">
    <div class="sticky top-0 z-10 lg:hidden pl-1 pt-1 sm:pl-3 sm:pt-3 bg-gray-100">
        <button type="button" class="burgermenu -ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
            <span class="sr-only">Open sidebar</span>
            <svg class="h-6 w-6" x-description="Heroicon name: outline/menu" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    <main class="flex-1 ">





        <div class="bg-gray-100">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">

                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        your stats
                    </h3>
                    <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">

                        <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                PROJECT WITH MOST TASKS
                            </dt>
                            <dd class="mt-1 text-3xl font-semibold text-gray-900">
                                <?php echo $data['Nom_project1'] ?>
                            </dd>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                count task of   <?php echo $data['Nom_project1'] ?>
                            </dt>
                            <dd class="mt-1 text-3xl font-semibold text-gray-900">
                                <?php echo $data['taskcount1'] ?>
                            </dd>
                        </div>

                      

                        <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                            <dt class="text-sm font-medium text-gray-500 truncate">
                            PROJECT WITH the fewst TASKS
                            </dt>
                            <dd class="mt-1 text-3xl font-semibold text-gray-900">
                            <?php echo $data['Nom_project2'] ?>
                            </dd>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                            count task of <?php echo $data['Nom_project2'] ?>
                            <dd class="mt-1 text-3xl font-semibold text-gray-900">
                            <?php echo $data['taskcount2'] ?>
                            </dd>
                        </div>
                      

                    </dl>
                </div>

            </div>
        </div>

    </main>


    <script>

    </script>
    <?php require APPROOT . '/views/inc/footer.php'; ?>