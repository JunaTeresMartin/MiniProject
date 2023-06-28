document.addEventListener("DOMContentLoaded", function() {
    // Get a reference to the child select element
    const childSelect = document.getElementById("childSelect");
  
    // Define the child data with their names
    const childData = [
      { name: "Child A" },
      { name: "Child B" },
      { name: "Child C" }
      // Add more child data here...
    ];
  
    // Populate the child select options
    childData.forEach(function(child) {
      const option = document.createElement("option");
      option.value = child.name;
      option.text = child.name;
      childSelect.appendChild(option);
    });
  
    // Initialize the chart with the first child data
    const initialChild = childData[0];
    fetchDataAndCreateChart(initialChild.name);
  
    // Update the chart when the child selection changes
    childSelect.addEventListener("change", function() {
      const selectedChild = childSelect.value;
      fetchDataAndCreateChart(selectedChild);
    });
  
    // Function to fetch data and create the chart
    function fetchDataAndCreateChart(childName) {
      // Make an AJAX request to fetch the height and weight data for the selected child from the server
      const url = `fetch_data.php?childName=${childName}`;
      const xhr = new XMLHttpRequest();
      xhr.open("GET", url, true);
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            const data = JSON.parse(xhr.responseText);
            const heightData = data.height;
            const weightData = data.weight;
            createChart(heightData, weightData);
          } else {
            console.error("Error fetching data:", xhr.status);
          }
        }
      };
      xhr.send();
    }
  
    // Function to create the chart
    function createChart(heightData, weightData) {
      const ctx = document.getElementById("chart").getContext("2d");
      new Chart(ctx, {
        type: "line",
        data: {
          labels: heightData.map(entry => entry.timestamp), // Assuming timestamp is a property in the height data
          datasets: [{
            label: "Height",
            data: heightData.map(entry => entry.height),
            backgroundColor: "rgba(75, 192, 192, 0.2)",
            borderColor: "rgba(75, 192, 192, 1)",
            borderWidth: 1
          },
          {
            label: "Weight",
            data: weightData.map(entry => entry.weight),
            backgroundColor: "rgba(192, 75, 75, 0.2)",
            borderColor: "rgba(192, 75, 75, 1)",
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            x: {
              type: "time",
              time: {
                unit: "day" // Customize the time unit as per your data resolution
              }
            },
            y: {
              beginAtZero: true
            }
          }
        }
      });
    }
  });
  