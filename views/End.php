<html>
    <link rel="stylesheet" href="resources/end.css">
    <body>
    <center>
        <h2> Exam End! </h2>

        <div class="total-score">
        </div>
        <button class="show active">Show Questions and Answers</button>
        <button class="hide">Hide Questions and Answers</button>
        <div class="score">
        
        </div>

        <button id="reset">Press here to retake the exam</button>
    </center>

    <script>
        /* Calculating scores 
         The idea behind this is it takes the values from the sessionStorage and process it
        */
        const scoresEl = document.querySelector(".score");
        let score = 0;
        for(let i = 0; i < sessionStorage.length; i++){
            /* The Elements */
            const questionEl = document.createElement("h3");
            const answerEl = document.createElement("h4");
            const correctAnswerEl = document.createElement("h4");
            const hr = document.createElement("hr");

            let answers = sessionStorage.getItem(i+1).split(",");
            
            questionEl.innerText = `${answers[0]}`;
            correctAnswerEl.innerText = `Correct answer: ${answers[1]}`;
            answerEl.innerText = `Your answer: ${answers[2]}`;

            if(answers[1] === answers[2]) {
                score++;
                questionEl.style.color = "green";
                correctAnswerEl.style.color = "green";
                answerEl.style.color = "green";
            } else {
                questionEl.style.color = "red";
                correctAnswerEl.style.color = "red";
                answerEl.style.color = "red";
            }

            scoresEl.appendChild(questionEl);
            scoresEl.appendChild(correctAnswerEl);
            scoresEl.appendChild(answerEl);
            scoresEl.appendChild(hr);
        }

        const totalScoreEl = document.createElement("h2");
        totalScoreEl.innerText = `Total Score: ${score} / <?php echo $exam->getQuestion_number();  ?>`
        document.querySelector(".total-score").appendChild(totalScoreEl);

        /* Retake the exam */
        const resetBtn = document.querySelector("#reset");
        resetBtn.addEventListener("click", e => {
            sessionStorage.clear();
            location = "/phpcourse/quiz";
        });

        /* Show answers */
        const showBtn = document.querySelector(".show");
        const hideBtn = document.querySelector(".hide");

        showBtn.addEventListener("click", e => {
            scoresEl.classList.add("active");
            hideBtn.classList.add("active");
            showBtn.classList.remove("active");
        });

        hideBtn.addEventListener("click", e => {
            scoresEl.classList.remove("active");
            hideBtn.classList.remove("active");
            showBtn.classList.add("active");
        });
    </script>
    </body
    
    
</html>

