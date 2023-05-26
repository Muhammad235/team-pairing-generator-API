
// async function logJSONData() {
//   const response = await fetch("http://localhost:8000/toget.php");
//   const jsonData = await response.json();
//   console.log(jsonData);
//   console.log(hello);
// }

fetch('labaikaschools.com/BuildTogether/all_users.php')
    .then(response => response.text())
    .then(data => console.log(data));

// console.log('hello');