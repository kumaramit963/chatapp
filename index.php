<?php
// Kruti Dev Hindi Typing Tool with Full Alt Codes + Copy Function
?>
<!DOCTYPE html>
<html lang="hi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kruti Dev Hindi Typing Tool</title>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #f8f9fa;
        margin: 0;
        padding: 30px;
        text-align: center;
    }
    h1 {
        color: #d63384;
        margin-bottom: 10px;
    }
    .container {
        background: #fff;
        width: 700px;
        margin: 0 auto;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    .output {
        font-family: 'Kruti Dev 010', sans-serif;
        font-size: 24px;
        background: #f0f0f0;
        padding: 20px;
        border-radius: 10px;
        text-align: left;
        min-height: 100px;
        white-space: pre-wrap;
        color: #000;
        position: relative;
    }
    textarea {
        width: 100%;
        height: 150px;
        margin-top: 20px;
        font-size: 20px;
        padding: 12px;
        border-radius: 10px;
        border: 1px solid #ccc;
        resize: none;
        outline: none;
    }
    .stats {
        margin-top: 15px;
        display: flex;
        justify-content: space-between;
        font-size: 18px;
        color: #444;
    }
    button.copy-btn {
        background: #d63384;
        color: white;
        border: none;
        padding: 8px 16px;
        font-size: 16px;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.3s;
        margin-top: 10px;
    }
    button.copy-btn:hover {
        background: #b1256a;
    }
</style>
</head>
<body>

<div class="container">
    <h1>📝 Kruti Dev Hindi Live Typing Tool</h1>

    <div class="output" id="outputBox"></div>
    <button class="copy-btn" id="copyBtn">📋 Copy Output</button>

    <textarea id="inputBox" placeholder="Start typing here..."></textarea>
    
    <div class="stats">
        <div>⏱️ Time: <span id="timer">0</span> sec</div>
        <div>⚡ Speed: <span id="speed">0</span> WPM</div>
    </div>
</div>

<script>
// ---------------------------------------------------------------------
// BASIC CHARACTER MAP
// ---------------------------------------------------------------------
const krutiMap = {
    'a':'अ','A':'आ','b':'ु','B':'ऊ','c':'च','C':'छ','d':'क','D':'ख',
    'e':'े','E':'ै','f':'न','F':'ण','g':'ग','G':'घ','h':'ह','H':'ः',
    'i':'ी','I':'इ','j':'े','J':'ै','k':'ि','K':'क','l':'ल','L':'ळ',
    'm':'म','M':'ं','n':'ट','N':'ठ','o':'प','O':'फ','p':'र','P':'ृ',
    'q':'थ','Q':'ध','r':'र','R':'ऱ','s':'ा','S':'श','t':'त','T':'थ',
    'u':'ु','U':'ऊ','v':'स','V':'ष','w':'ौ','W':'औ','x':'श','X':'क्ष',
    'y':'य','Y':'ज्ञ','z':'ज़','Z':'ऽ',
    '0':'०','1':'१','2':'२','3':'३','4':'४','5':'५','6':'६','7':'७','8':'८','9':'९',
    ' ':' ','\n':'\n'
};

// ---------------------------------------------------------------------
// FULL ALT + CODE MAP (from chart)
// ---------------------------------------------------------------------
const altMap = {
    '0149':'।','0250':'॥','0171':'‘','0187':'’','0178':'“','0180':'”',
    '020':'–','021':'—','0252':'×','0253':'÷','0256':'₹','0255':'°','0254':'•',
    '0176':'°','0177':'±','0221':'=','0190':'।','0191':'?','0222':'(','0223':')',
    '0224':'{','0225':'ज्ञ','0226':'त्र','0227':'क्ष','0228':'श्र','0229':'र्',
    '0230':'ट्ट','0231':'ट्ठ','0232':'ड्ड','0233':'ढ़','0234':'ण्ठ','0235':'ण्द',
    '0236':'न्द','0237':'ल्ल','0238':'श्री','0239':'क्र','0240':'क्त','0241':'त्र',
    '0242':'ज्ञ','0243':'क्ष','0244':'श्र','0245':'रु','0246':'रू','0247':'झ',
    '0248':'ठ','0249':'ढ','0251':'र्‍','0257':'ँ','0258':'ं','0259':'ः','0260':'ँ','0261':'ऽ'
};

// ---------------------------------------------------------------------
// TIMER + SPEED
// ---------------------------------------------------------------------
let startTime = null;
let timerInterval = null;

function startTimer() {
    if (!startTime) {
        startTime = new Date();
        timerInterval = setInterval(() => {
            let elapsed = Math.floor((new Date() - startTime) / 1000);
            document.getElementById('timer').innerText = elapsed;
        }, 1000);
    }
}

function calculateSpeed() {
    let elapsed = Math.floor((new Date() - startTime) / 1000);
    if (elapsed > 0) {
        let words = document.getElementById('inputBox').value.trim().split(/\s+/).length;
        let wpm = Math.round((words / elapsed) * 60);
        document.getElementById('speed').innerText = wpm;
    }
}

// ---------------------------------------------------------------------
// LIVE INPUT HANDLER
// ---------------------------------------------------------------------
document.getElementById('inputBox').addEventListener('input', function() {
    startTimer();
    let input = this.value;
    let output = "";

    for (let ch of input) {
        output += krutiMap[ch] || ch;
    }

    document.getElementById("outputBox").innerText = output;
    calculateSpeed();
});

// ---------------------------------------------------------------------
// COPY FUNCTION
// ---------------------------------------------------------------------
document.getElementById('copyBtn').addEventListener('click', function() {
    const outputText = document.getElementById('outputBox').innerText;
    if (outputText.trim() === '') {
        alert('⚠️ No text to copy!');
        return;
    }
    navigator.clipboard.writeText(outputText).then(() => {
        this.innerText = '✅ Copied!';
        setTimeout(() => { this.innerText = '📋 Copy Output'; }, 1500);
    }).catch(() => {
        alert('❌ Copy failed. Please copy manually.');
    });
});
</script>

</body>
</html>
