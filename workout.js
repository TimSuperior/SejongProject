document.addEventListener("DOMContentLoaded", function() {
    const logWorkoutButton = document.getElementById("log_workout");
    logWorkoutButton.addEventListener("click", function() {
        const exercise = document.getElementById("exercise").value;
        const sets = document.getElementById("sets").value;
        const reps = document.getElementById("reps").value;
        const rest = document.getElementById("rest").value;
        
        if (exercise && sets && reps && rest) {
            // AJAX request to log workout
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "log_workout.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert("Workout logged successfully!");
                    // Optionally update UI with new workout
                }
            };
            xhr.send(`exercise=${exercise}&sets=${sets}&reps=${reps}&rest=${rest}`);
        } else {
            alert("Please fill out all fields.");
        }
    });

    // Fetch and display progress data
    fetch("fetch_progress.php")
        .then(response => response.json())
        .then(data => {
            const progressChart = document.getElementById("progress_chart").getContext("2d");
            new Chart(progressChart, {
                type: 'line',
                data: {
                    labels: data.dates,
                    datasets: [{
                        label: 'Weight (kg)',
                        data: data.weights,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        fill: false
                    }]
                },
                options: {
                    scales: {
                        x: {
                            type: 'time',
                            time: {
                                unit: 'month'
                            }
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
});
