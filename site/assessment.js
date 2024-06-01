document.addEventListener("DOMContentLoaded", function() {
    const fitnessLevelSelect = document.getElementById("fitness_level");
    const assessmentForm = document.querySelector("form[action='assessment.php']");
    
    fitnessLevelSelect.addEventListener("change", function() {
        const selectedLevel = fitnessLevelSelect.value;
        const feedback = document.getElementById("assessment_feedback");

        if (selectedLevel === "beginner") {
            feedback.textContent = "As a beginner, focus on building a solid foundation with basic exercises.";
        } else if (selectedLevel === "intermediate") {
            feedback.textContent = "As an intermediate, start incorporating more complex movements and moderate intensity.";
        } else if (selectedLevel === "advanced") {
            feedback.textContent = "As an advanced user, aim for high-intensity workouts and advanced training techniques.";
        } else {
            feedback.textContent = "";
        }
    });
});
