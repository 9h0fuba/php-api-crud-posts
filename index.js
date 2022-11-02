document.getElementById('get-activity').addEventListener('click',  function() {
    fetch("api/post/read.php")
        .then(res => res.json())
        .then( data => {
            console.log(data)
            document.getElementById('activity').textContent = data.title
        } );
}); 

document.getElementById('get-activity')


// with then 

// document.getElementById('get-activity').addEventListener('click',  function() {
//     fetch("https://apis.scrimba.com/bored/api/activity")
//         .then(res => res.json())
//         .then( data => {
//             document.getElementById('activity').textContent = data.activity
//         } );
// }); 




//  with async / await

// document.getElementById('get-activity').addEventListener('click', async function() {
//    const response = await fetch("https://apis.scrimba.com/bored/api/activity")
//    const data =  await response.json()
//           document.getElementById('activity').textContent = data.activity
//         } );


// teleh function terpisah tapi kok lemot

// const activityBtn = document.getElementById('get-activity');

// async function tarikData () {
//     const response = await fetch("https://apis.scrimba.com/bored/api/activity")
//     const data =  await response.json()
//     document.getElementById('activity').textContent = data.activity
//          } ;
// document.getElementById('get-activity').addEventListener('click', tarikData)

// async function tarikData () {
//     const response = await fetch("belajar-PHP/php-api/api/post/read.php")
//     const data =  await response.json();
//     console.log(data);
//     document.getElementById('activity').textContent = data.activity
//          } ;
// document.getElementById('get-activity').addEventListener('click', tarikData)

