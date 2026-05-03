// DATE
document.getElementById('date').textContent = new Date().toLocaleString();

// TABS
function show(id, btn) {
    document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.tb').forEach(b => b.classList.remove('active'));
    document.getElementById(id).classList.add('active');
    btn.classList.add('active');
}

// SHELTER
var shelters = {
    "Pabna Sadar": ["Pabna Government College (500 people)", "Pabna Zilla School (400 people)", "Government Edward College (450 people)"],
    "Ishwardi":    ["Ishwardi Government College (600 people)", "Ishwardi Pilot High School (350 people)"],
    "Bera":        ["Bera Degree College (450 people)", "Bera Government High School (300 people)"]
};

function searchShelter() {
    var u = document.getElementById('upazilaSelect').value;
    var div = document.getElementById('shelterResult');
    if(!u) { div.innerHTML = '<div class="no-result">Please select an upazila first.</div>'; return; }
    var html = '<p class="shelter-found">📍 ' + shelters[u].length + ' shelters found in ' + u + '</p><ul>';
    shelters[u].forEach(function(s) { html += '<li>' + s + '</li>'; });
    div.innerHTML = html + '</ul>';
}

// CHECKLIST
var items = [
    "💧 Drinking water",
    "🍱 Non-perishable food",
    "🩹 First aid kit",
    "🔦 Flashlight",
    "📻 Battery radio",
    "😷 Dust masks",
    "💊 Medicines",
    "🧴 Sanitizer",
    "💰 Emergency cash",
    "📓 Contact list"
];
var s = JSON.parse(localStorage.getItem('cl') || '{}');

function render() {
    var el = document.getElementById('list');
    el.innerHTML = '';
    items.forEach(function(item, i) {
        var d = document.createElement('div');
        d.className = 'ci' + (s[i] ? ' done' : '');
        d.innerHTML = '<input type="checkbox" id="c' + i + '" ' + (s[i] ? 'checked' : '') + '>' +
                      '<label for="c' + i + '">' + item + '</label>';
        d.querySelector('input').onchange = function() {
            s[i] = !s[i];
            localStorage.setItem('cl', JSON.stringify(s));
            render();
        };
        el.appendChild(d);
    });
    var n = Object.values(s).filter(Boolean).length;
    var p = Math.round(n / items.length * 100);
    document.getElementById('pt').textContent = n + ' of ' + items.length;
    document.getElementById('pp').textContent = p + '%';
    document.getElementById('pb').style.width = p + '%';
}

function reset() {
    if(confirm('Reset checklist?')) {
        localStorage.removeItem('cl');
        Object.keys(s).forEach(function(k) { delete s[k]; });
        render();
    }
}

render();
