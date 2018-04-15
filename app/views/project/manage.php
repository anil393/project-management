<?php require APP_DIR.'/views/common/header.php';?>
<body>
    <form id="frm" name="frm" action="<?=APP_URL?>/project/add" method="POST">
        <div id="fieldsets">
            <div class="fieldset">
                <input type="text" name="institution[]" placeholder="Institution">
                <input type="text" name="course[]" placeholder="Course">
            </div>
        </div>
        <button id="add_more" type="button">Add More</button>
        <button id="submit" type="submit">Submit</button>
        <button id="submit_with_confirm" type="button">Submit With Confirm</button>
        <input type="hidden" name="add_again" id="add_again">
    </form>
</body>
<?php require APP_DIR.'/views/common/footer.php';?>


