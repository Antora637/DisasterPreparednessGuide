<?php
session_start();
if(!isset($_SESSION['user'])) {
    header("Location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Disaster Preparedness Guide</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header>
  <div class="header-inner">
    <div class="header-left">
      <h1>🛡️ Disaster Preparedness Guide</h1>
      <p>Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?>! &nbsp;|&nbsp; 📅 <span id="date"></span></p>
    </div>
    <a href="logout.php" class="logout-btn">🔓 Logout</a>
  </div>
</header>

<nav>
  <a href="#guides">⚠️ Guides</a>
  <a href="#shelter">🏘️ Shelter</a>
  <a href="#contacts">📞 Contacts</a>
  <a href="#checklist">✅ Checklist</a>
</nav>

<!-- GUIDES -->
<section id="guides">
  <h2>⚠️ Disaster Guides</h2>
  <div class="tabs">
    <button class="tb active" onclick="show('eq',this)">🌍 Earthquake</button>
    <button class="tb" onclick="show('fl',this)">🌊 Flood</button>
    <button class="tb" onclick="show('fi',this)">🔥 Fire</button>
    <button class="tb" onclick="show('cy',this)">🌀 Cyclone</button>
  </div>

  <div id="eq" class="tab card active">
    <h3>🌍 Earthquake</h3>
    <h4>✅ Before</h4>
    <ul><li>Secure heavy furniture</li><li>Keep emergency kit ready</li></ul>
    <h4>⚡ During</h4>
    <ul><li>Drop, Cover and Hold On</li><li>Stay away from windows</li></ul>
    <h4>🔄 After</h4>
    <ul><li>Check for gas leaks</li><li>Expect aftershocks</li></ul>
  </div>

  <div id="fl" class="tab card">
    <h3>🌊 Flood</h3>
    <h4>✅ Before</h4>
    <ul><li>Know flood risk area</li><li>Store food on upper floors</li></ul>
    <h4>⚡ During</h4>
    <ul><li>Move to higher ground</li><li>Turn off electricity</li></ul>
    <h4>🔄 After</h4>
    <ul><li>Drink boiled water only</li><li>Disinfect wet items</li></ul>
  </div>

  <div id="fi" class="tab card">
    <h3>🔥 Fire</h3>
    <h4>✅ Before</h4>
    <ul><li>Install smoke detectors</li><li>Plan escape route</li></ul>
    <h4>⚡ During</h4>
    <ul><li>Crawl low under smoke</li><li>Call fire service: 199</li></ul>
    <h4>🔄 After</h4>
    <ul><li>Don't re-enter until cleared</li><li>Seek medical help</li></ul>
  </div>

  <div id="cy" class="tab card">
    <h3>🌀 Cyclone</h3>
    <h4>✅ Before</h4>
    <ul><li>Know nearest shelter</li><li>Store 3-day food &amp; water</li></ul>
    <h4>⚡ During</h4>
    <ul><li>Go to cyclone shelter</li><li>Stay away from coast</li></ul>
    <h4>🔄 After</h4>
    <ul><li>Watch for power lines</li><li>Avoid floodwater</li></ul>
  </div>
</section>

<!-- SHELTER -->
<section id="shelter">
  <h2>🏘️ Shelter Locator — Pabna District</h2>
  <div class="shelter-box">
    <p class="shelter-hint">Select your upazila to find the nearest emergency shelters.</p>
    <div class="search-row">
      <select id="upazilaSelect">
        <option value="">-- Select Upazila --</option>
        <option value="Pabna Sadar">Pabna Sadar</option>
        <option value="Ishwardi">Ishwardi</option>
        <option value="Bera">Bera</option>
      </select>
      <button onclick="searchShelter()">🔍 Find Shelter</button>
    </div>
    <div id="shelterResult"></div>
  </div>
</section>

<!-- CONTACTS -->
<section id="contacts">
  <h2>📞 Emergency Contacts</h2>
  <div class="cgrid">
    <div class="cc">
      <div class="ic">🚨</div>
      <h4>National Emergency</h4>
      <div class="num">999</div>
      <p>Police, Fire &amp; Ambulance</p>
    </div>
    <div class="cc">
      <div class="ic">🚒</div>
      <h4>Fire Service</h4>
      <div class="num">199</div>
      <p>Fire &amp; Civil Defense</p>
    </div>
    <div class="cc">
      <div class="ic">🚑</div>
      <h4>Ambulance</h4>
      <div class="num">1990</div>
      <p>Emergency Medical</p>
    </div>
    <div class="cc">
      <div class="ic">👮</div>
      <h4>Police</h4>
      <div class="num">100</div>
      <p>Bangladesh Police</p>
    </div>
    <div class="cc">
      <div class="ic">🌊</div>
      <h4>Flood Warning</h4>
      <div class="num">1090</div>
      <p>Flood Forecasting</p>
    </div>
    <div class="cc">
      <div class="ic">🏥</div>
      <h4>Health Hotline</h4>
      <div class="num">16400</div>
      <p>DGHS Emergency</p>
    </div>
    <div class="cc">
      <div class="ic">🧒</div>
      <h4>Child Helpline</h4>
      <div class="num">1098</div>
      <p>Child Protection</p>
    </div>
    <div class="cc">
      <div class="ic">👩</div>
      <h4>Women Helpline</h4>
      <div class="num">10921</div>
      <p>Women Support</p>
    </div>
    <div class="cc">
      <div class="ic">🛡️</div>
      <h4>DDM Helpline</h4>
      <div class="num">10941</div>
      <p>Disaster Management</p>
    </div>
  </div>
</section>

<!-- CHECKLIST -->
<section id="checklist">
  <h2>✅ Emergency Checklist</h2>
  <div class="card">
    <div class="pi">
      <span id="pt">0 of 10</span>
      <span id="pp">0%</span>
    </div>
    <div class="pb">
      <div class="pf" id="pb"></div>
    </div>
    <div class="list" id="list"></div>
    <button class="btn reset-btn" onclick="reset()">🔄 Reset</button>
  </div>
</section>

<footer>🛡️ Disaster Preparedness Guide | Emergency: <strong>999</strong></footer>

<script src="script.js"></script>
</body>
</html>
