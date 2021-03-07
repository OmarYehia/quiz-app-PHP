
<div class="container mt-sm-5 my-1">
    <form id="form" action="" method="POST">
        <div class="question ml-sm-5 pl-sm-5 pt-2">
            <div class="py-2 h5"><b>Q: <?php echo $current_question->get_question();   ?> ?</b></div>
            <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                <?php foreach($current_question->get_options() as $option) {?>
                <label class="options"><?php echo $option;   ?> <input type="radio" name="radio" value="<?php echo $option;   ?>"> <span class="checkmark"></span> </label>
                <?php } ?>
            </div>
        </div>
        
        <div class="d-flex align-items-center pt-3">
            <div id="prev" > <input type="submit" class="btn btn-primary" value="Previous"></div>
            <div id="next" class="ml-auto mr-sm-5"> <input type="submit" class="btn btn-success" value="Next"></div>
        </div>
        
    </form>
</div>

<script>
    const prev = document.querySelector("#prev");
    const next = document.querySelector("#next");
    const form = document.querySelector("#form");

    /* Saves answer in the session storage for scoring later on and
       redirects him to next/prev page */
    prev.addEventListener("click", () => {
        try {
            let person_answer = document.querySelector("input[name='radio']:checked").value;
            sessionStorage.setItem("<?php echo $current_page ?>", ["<?php echo trim($current_question->get_question());  ?>", "<?php echo $current_question->get_answer();  ?>", person_answer])
            form.action = "<?php echo $exam->move_previous(); ?>";
        } catch {
            sessionStorage.setItem("<?php echo $current_page ?>", ["<?php echo trim($current_question->get_question());  ?>", "<?php echo $current_question->get_answer();  ?>", ""])
            form.action = "<?php echo $exam->move_previous(); ?>";
            alert("Please note that you have to answer the questions again when you go back");
        }
        
    })

    next.addEventListener("click", () => {
        try {
            let person_answer = document.querySelector("input[name='radio']:checked").value;
            sessionStorage.setItem("<?php echo $current_page ?>", ["<?php echo trim($current_question->get_question());  ?>", "<?php echo $current_question->get_answer();  ?>", person_answer])
            form.action = "<?php echo $exam->move_next(); ?>";
        } catch {
            sessionStorage.setItem("<?php echo $current_page ?>", ["<?php echo trim($current_question->get_question());  ?>", "<?php echo $current_question->get_answer();  ?>", ""])
            form.action = "<?php echo $exam->move_next(); ?>";
        }
    })
</script>