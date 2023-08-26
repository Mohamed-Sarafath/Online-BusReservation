const faqButtons = document.querySelectorAll(".faq-btn");
const faqAnswers = document.querySelectorAll(".faq-answer");

//click event listeners
faqButtons.forEach((button, index) => {
  button.addEventListener("click", () => {
    // Hide other answer otherthan clicked ansr
    faqAnswers.forEach((answer) => {
      answer.classList.remove("show-answer");
    });

    // Showing ansr
    faqAnswers[index].classList.toggle("show-answer");
  });
});