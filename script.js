document.getElementById("myImg").src="https://www.w3schools.com/howto/img_avatar2.png";

function changeText(id){
    id.innerHTML="Lord";
}
function changeTamim(id){
    id.innerHTML="DotBaba";
}
document.getElementById("btnlg").onclick=displayDate();
function displayDate(){
    document.getElementById("date").innerHTML=Date();
}
function uppercase(){
    var x=document.getElementById("userName");
    x.value=x.value.toUpperCase();
}
function m(id){
    id.innerHTML="Dashing man";
}
function o(id){
    id.innerHTML="Soumya Sarker";
}
document.getElementById("fbtn").addEventListener("click",myFun);
function myFun(){
    alert("heuxhu");
}
function newDoc(){
    window.location.assign("file:///C:/Users/Hp/Desktop/desk-project/cricket/index.html")
}
function shakib(){
    window.location.assign("https://www.cricbuzz.com/profiles/544/shakib-al-hasan");
}
function litton(){
    window.location.assign("https://www.cricbuzz.com/profiles/8540/liton-das");
}
function ebadot(){
   window.history.back();
}
function shorif(){
    alert("error");
}
function hasan(){
    alert(error);
}


async function getLiveScores() {
    const apiKey = '3b283a22-8bb4-41a0-9614-cdd425f64cfb';  // Replace with your CricAPI key
    const url = `https://api.cricapi.com/v1/currentMatches?apikey=${apiKey}`;

    try {
        const response = await fetch(url);
        const data = await response.json();
        displayScores(data);
    } catch (error) {
        console.error('Error fetching live scores:', error);
        document.getElementById('scoreboard').innerHTML = 'Failed to load scores';
    }
}

function displayScores(data) {
    const scoreboard = document.getElementById('scoreboard');
    scoreboard.innerHTML = '';

    if (data && data.data && data.data.length > 0) {
        data.data.forEach(match => {
            if (match.matchStarted) {
                const matchInfo = `
                    <div class="match">
                        <h3>${match.name}</h3>
                        <p>${match.status}</p>
                        <p>${match.score[0]?.inningName || ''}: ${match.score[0]?.runs || ''}/${match.score[0]?.wickets || ''} (${match.score[0]?.overs || ''})</p>
                        <p>${match.score[1]?.inningName || ''}: ${match.score[1]?.runs || ''}/${match.score[1]?.wickets || ''} (${match.score[1]?.overs || ''})</p>
                    </div>
                `;
                scoreboard.innerHTML += matchInfo;
            }
        });
    } else {
        scoreboard.innerHTML = 'No live matches currently.';
    }
}

getLiveScores();
setInterval(getLiveScores, 60000); // Refresh scores every minute

