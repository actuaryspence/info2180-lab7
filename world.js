window.onload = () => {
    
    const countryFind = document.getElementById('country');
    const checkBtn = document.getElementById('lookup');
    const allCheckBox = document.getElementById('all');
    const answer = document.getElementById('result');
    
    const xhttp = new XMLHttpRequest();
    
    checkBtn.onclick = () => {
        xhttp.onreadystatechange = handleRequest;
        if (allCheckBox.checked) {
            xhttp.open('GET', 'world.php?all=true', true);
        } else {
            xhttp.open('GET', `world.php?country=${countryFind.value}`, true);
        }
        xhttp.send();
    }
    
    const handleRequest = () => {
        if (xhttp.readyState === XMLHttpRequest.DONE) {
            if (xhttp.status === 200) {
                const response = xhttp.responseText;
                answer.innerHTML = response;
            } 
        } 
    }
}