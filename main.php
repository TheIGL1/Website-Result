<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Resutl API Request </title>
<style>
  /* Simple CSS for styling */
  body {
    font-family: Arial, sans-serif;
    margin: 20px;
  }
  label {
    display: block;
    margin-bottom: 5px;
  }
  input[type="text"] {
    width: 100%;
    margin-bottom: 10px;
  }
  button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
  }
  button:hover {
    background-color: #0056b3;
  }
  #response {
    white-space: pre-wrap; /* Preserve line breaks */
  }
</style>
</head>
<body>
<h1>API Request Demo</h1>

<label for="board">Board:</label>
<input type="text" id="board" placeholder="Enter board">

<label for="exam">Exam:</label>
<input type="text" id="exam" placeholder="Enter exam">

<label for="year">Year:</label>
<input type="text" id="year" placeholder="Enter year">

<label for="roll">Roll:</label>
<input type="text" id="roll" placeholder="Enter roll">

<button onclick="makeRequest()">Submit</button>

<div id="response"></div>
<div id="request-url"></div>

<script>
function makeRequest() {
  const board = document.getElementById("board").value;
  const exam = document.getElementById("exam").value;
  const year = document.getElementById("year").value;
  const roll = document.getElementById("roll").value;
  
  // Construct API URL with user inputs
  const apiUrl = `https://apis.neopandora.com/bresult_v1/data.php?board=${board}&exam=${exam}&year=${year}&roll=${roll}`;

  // Display the API request URL
  document.getElementById("request-url").textContent = `API Request URL: ${apiUrl}`;

  // Make API request
  fetch(apiUrl)
    .then(response => response.json())
    .then(data => {
      // Display API response in a div
      document.getElementById("response").textContent = JSON.stringify(data, null, 2); // format JSON for readability
    })
    .catch(error => {
      console.error('Error:', error);
      document.getElementById("response").textContent = "Error fetching data from API.";
    });
}
</script>

</body>
</html>
