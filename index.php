<?php
session_start();

require_once __DIR__ . '/controller/helper/url.php';

$host = rtrim(getHost(), '/');
$error = isset($_SESSION['errorlogin']);
unset($_SESSION['errorlogin']);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#111827">
  <meta name="description" content="Secure sales and inventory management for POS-Cashles">
  <title>Sign in | POS-Cashles</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root { --ink:#111827; --muted:#64748b; --brand:#4f46e5; --brand-dark:#3730a3; --surface:#fff; --line:#e2e8f0; }
    * { box-sizing:border-box; }
    body { margin:0; min-height:100vh; font-family:Inter,system-ui,-apple-system,sans-serif; color:var(--ink); background:#eef2ff; }
    .shell { min-height:100vh; display:grid; grid-template-columns:minmax(300px,1.05fr) minmax(380px,.95fr); }
    .story { position:relative; display:flex; flex-direction:column; justify-content:flex-end; padding:clamp(32px,6vw,72px); color:#fff; background:linear-gradient(145deg,rgba(17,24,39,.28),rgba(17,24,39,.82)),linear-gradient(135deg,#4338ca,#0f766e); overflow:hidden; }
    .story::before { content:""; position:absolute; width:480px; height:480px; border:1px solid rgba(255,255,255,.18); border-radius:50%; top:-180px; right:-160px; box-shadow:0 0 0 90px rgba(255,255,255,.04),0 0 0 180px rgba(255,255,255,.025); }
    .story-inner { position:relative; max-width:580px; }
    .brand { position:absolute; top:clamp(32px,6vw,72px); left:clamp(32px,6vw,72px); font-size:1.15rem; font-weight:700; letter-spacing:.02em; }
    .brand-dot { display:inline-grid; place-items:center; width:38px; height:38px; margin-right:10px; border-radius:12px; background:#fff; color:var(--brand); }
    .story h1 { max-width:540px; margin:0 0 18px; font-size:clamp(2.25rem,5vw,4.5rem); line-height:1.02; letter-spacing:-.045em; }
    .story p { max-width:480px; margin:0; color:#dbeafe; font-size:clamp(1rem,1.5vw,1.125rem); line-height:1.7; }
    .panel { display:grid; place-items:center; min-height:100vh; padding:32px; background:var(--surface); }
    .login { width:min(100%,440px); }
    .eyebrow { margin:0 0 8px; color:var(--brand); font-size:.78rem; font-weight:700; letter-spacing:.14em; text-transform:uppercase; }
    h2 { margin:0 0 8px; font-size:clamp(1.8rem,4vw,2.35rem); letter-spacing:-.035em; }
    .subtitle { margin:0 0 30px; color:var(--muted); }
    .alert { margin-bottom:20px; padding:12px 14px; border:1px solid #fecaca; border-radius:10px; background:#fff1f2; color:#9f1239; }
    .field { margin-bottom:18px; }
    label { display:block; margin-bottom:8px; font-size:.875rem; font-weight:600; }
    input { width:100%; height:50px; border:1px solid var(--line); border-radius:10px; padding:0 14px; background:#fff; color:var(--ink); font:inherit; outline:none; transition:border-color .18s,box-shadow .18s; }
    input:focus { border-color:#818cf8; box-shadow:0 0 0 4px rgba(99,102,241,.12); }
    .password-wrap { position:relative; }
    .password-wrap input { padding-right:88px; }
    .toggle { position:absolute; right:8px; top:8px; height:34px; border:0; border-radius:7px; padding:0 10px; background:transparent; color:var(--brand); font-weight:600; cursor:pointer; }
    .row { display:flex; align-items:center; justify-content:space-between; margin:4px 0 22px; }
    .check { display:flex; align-items:center; gap:8px; color:var(--muted); font-size:.875rem; }
    .check input { width:16px; height:16px; accent-color:var(--brand); }
    .submit { width:100%; height:52px; border:0; border-radius:10px; background:var(--brand); color:#fff; font:700 1rem Inter,sans-serif; cursor:pointer; box-shadow:0 10px 24px rgba(79,70,229,.22); transition:transform .15s,background .15s; }
    .submit:hover { background:var(--brand-dark); transform:translateY(-1px); }
    .submit:active { transform:translateY(0); }
    .submit:disabled { opacity:.65; cursor:wait; }
    .fineprint { margin:22px 0 0; color:#94a3b8; font-size:.75rem; text-align:center; }
    @media (max-width:860px) { .shell { grid-template-columns:1fr; } .story { min-height:220px; justify-content:center; } .story h1 { margin-top:70px; font-size:2.35rem; } .story p { display:none; } .brand { top:28px; left:28px; } .panel { min-height:calc(100vh - 220px); } }
    @media (max-width:480px) { .story { min-height:180px; padding:24px; } .brand { top:20px; left:24px; } .story h1 { margin-top:48px; font-size:1.9rem; } .panel { padding:24px 20px; } }
    @media (prefers-reduced-motion:reduce) { * { transition:none!important; } }
  </style>
</head>
<body>
  <main class="shell">
    <section class="story" aria-label="POS-Cashles overview">
      <div class="brand"><span class="brand-dot">P</span>POS-Cashles</div>
      <div class="story-inner">
        <h1>Run every sale with clarity.</h1>
        <p>Manage inventory, track transactions, and understand your business from one fast, focused workspace.</p>
      </div>
    </section>
    <section class="panel" aria-labelledby="login-title">
      <div class="login">
        <p class="eyebrow">Welcome back</p>
        <h2 id="login-title">Sign in to your account</h2>
        <p class="subtitle">Enter your credentials to continue.</p>
        <?php if ($error): ?>
          <div class="alert" role="alert">The username or password is incorrect.</div>
        <?php endif; ?>
        <form id="login-form" method="post" action="<?= htmlspecialchars($host . '/fatawu/auth', ENT_QUOTES, 'UTF-8') ?>">
          <div class="field">
            <label for="username">Username</label>
            <input id="username" name="username" type="text" autocomplete="username" required autofocus>
          </div>
          <div class="field">
            <label for="userpassword">Password</label>
            <div class="password-wrap">
              <input id="userpassword" name="userpassword" type="password" autocomplete="current-password" required>
              <button class="toggle" type="button" aria-controls="userpassword" aria-label="Show password">Show</button>
            </div>
          </div>
          <div class="row">
            <label class="check"><input type="checkbox" name="remember" value="1"> Remember me</label>
          </div>
          <button class="submit" type="submit" name="authenticate" value="1">Sign in</button>
        </form>
        <p class="fineprint">Authorized personnel only · POS-Cashles</p>
      </div>
    </section>
  </main>
  <script>
    const toggle = document.querySelector('.toggle');
    const password = document.querySelector('#userpassword');
    toggle.addEventListener('click', () => {
      const reveal = password.type === 'password';
      password.type = reveal ? 'text' : 'password';
      toggle.textContent = reveal ? 'Hide' : 'Show';
      toggle.setAttribute('aria-label', reveal ? 'Hide password' : 'Show password');
    });
    document.querySelector('#login-form').addEventListener('submit', function () {
      const button = this.querySelector('.submit');
      button.disabled = true;
      button.textContent = 'Signing in…';
    });
  </script>
</body>
</html>
