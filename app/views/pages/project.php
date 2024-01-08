
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/check_session.php'; ?>

<div id="popup" class=" fixed inset-0 bg-gray-500 bg-opacity-75 overflow-y-auto">
  <div class="flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded shadow-md">
      <h2 class="text-center font-bold underline ">Add a New Project</h2>
      <form action="<?php echo URLROOT; ?>/projects/create" method="post" class="flex flex-col">
        <div class="flex flex-col">
          <label for="projectName">Project Name:</label>
          <input class=" border-2 border-black rounded" type="text" id="projectName" name="projectName" maxlength="200">
        </div>
        <div class="flex flex-col">
          <label for="description">Description:</label>
          <textarea class=" border-2 border-black rounded" id="description" name="description" rows="4" cols="50" maxlength="3000"></textarea>
        </div>
        <div class="flex flex-col">
          <label for="startDate">Start Date:</label>
          <input class=" border-2 border-black rounded" type="date" id="startDate" name="startDate">
        </div>
        <div class="flex flex-col">
          <label for="endDate">End Date:</label>
          <input class=" border-2 border-black rounded" type="date" id="endDate" name="endDate">
        </div>
        <input class=" hover:bg-green-400 p-2  mt-2 text-center text-black text-xs font-medium bg-gray-200 rounded-full" name="submit" type="submit" value="Add Project">
      </form>
    </div>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>