<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>IMZAMI Core — Autonomous Telecom & MFS Robotic SIM Gateway</title>
  <meta name="description" content="Next-generation autonomous robotic SIM gateway and high-speed API engine for Mobile Recharge, USSD automation, and MFS Cash-In/Out in Bangladesh." />
  
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

  <!-- Tailwind CSS CDN for instant styling -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          fontFamily: {
            sans: ['Plus Jakarta Sans', 'sans-serif'],
            heading: ['Outfit', 'sans-serif'],
            mono: ['JetBrains Mono', 'monospace'],
          },
          colors: {
            brand: {
              50: '#ecfeff',
              100: '#cffafe',
              400: '#22d3ee',
              500: '#06b6d4',
              600: '#0891b2',
            },
            accent: {
              indigo: '#6366f1',
              emerald: '#10b981',
              violet: '#8b5cf6',
              amber: '#f59e0b',
            },
            dark: {
              base: '#070a12',
              surface: '#0d1322',
              card: '#121a2d',
              border: 'rgba(255, 255, 255, 0.08)',
            }
          },
          animation: {
            'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
            'float': 'float 6s ease-in-out infinite',
          },
          keyframes: {
            float: {
              '0%, 100%': { transform: 'translateY(0px)' },
              '50%': { transform: 'translateY(-10px)' },
            }
          }
        }
      }
    }
  </script>

  <style>
    body {
      background-color: #070a12;
      color: #e2e8f0;
      font-family: 'Plus Jakarta Sans', sans-serif;
      overflow-x: hidden;
    }
    h1, h2, h3, h4, .font-heading {
      font-family: 'Outfit', sans-serif;
    }
    .gradient-mesh {
      background: radial-gradient(circle at 20% 15%, rgba(6, 182, 212, 0.15) 0%, transparent 45%),
                  radial-gradient(circle at 80% 30%, rgba(99, 102, 241, 0.15) 0%, transparent 50%),
                  radial-gradient(circle at 50% 80%, rgba(16, 185, 129, 0.12) 0%, transparent 50%);
    }
    .glass-card {
      background: rgba(18, 26, 45, 0.7);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border: 1px solid rgba(255, 255, 255, 0.08);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .glass-card:hover {
      border-color: rgba(6, 182, 212, 0.3);
      box-shadow: 0 10px 30px -10px rgba(6, 182, 212, 0.15);
    }
    .glow-cyan {
      box-shadow: 0 0 25px -5px rgba(6, 182, 212, 0.4);
    }
    .glow-emerald {
      box-shadow: 0 0 25px -5px rgba(16, 185, 129, 0.4);
    }
    /* Custom Scrollbar */
    ::-webkit-scrollbar {
      width: 8px;
      height: 8px;
    }
    ::-webkit-scrollbar-track {
      background: #070a12;
    }
    ::-webkit-scrollbar-thumb {
      background: #1e293b;
      border-radius: 4px;
    }
    ::-webkit-scrollbar-thumb:hover {
      background: #334155;
    }
  </style>
</head>
<body class="selection:bg-cyan-500 selection:text-black">

  <!-- Ambient Glow Background -->
  <div class="fixed inset-0 gradient-mesh pointer-events-none z-0"></div>

  <!-- Top Announcement Bar -->
  <div class="relative z-50 bg-gradient-to-r from-cyan-950/60 via-slate-900/80 to-indigo-950/60 border-b border-cyan-500/20 py-2 px-4 text-center text-xs sm:text-sm text-cyan-300 flex items-center justify-center gap-2">
    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-cyan-500/20 text-cyan-300 border border-cyan-400/30">
      ⚡ Gateway v2.4 Active
    </span>
    <span>Autonomous Android SIM Pool Engine & Instant Regex OTP Engine live!</span>
    <a href="#simulator" class="underline hover:text-white font-medium ml-1">Launch Live Simulator →</a>
  </div>

  <!-- Navigation -->
  <header class="sticky top-0 z-40 backdrop-blur-xl bg-dark-base/80 border-b border-white/5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
      <!-- Logo -->
      <a href="#" class="flex items-center gap-3 group">
        <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-cyan-500 to-indigo-500 p-0.5 shadow-lg group-hover:shadow-cyan-500/30 transition">
          <div class="w-full h-full bg-dark-base rounded-[10px] flex items-center justify-center font-bold text-cyan-400 font-mono text-lg">
            ⚡
          </div>
        </div>
        <div>
          <div class="flex items-center gap-2">
            <span class="text-xl font-extrabold tracking-tight text-white font-heading">IMZAMI<span class="text-cyan-400">.CORE</span></span>
            <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
              LIVE
            </span>
          </div>
          <p class="text-[11px] text-slate-400 tracking-wider">ROBOTIC RECHARGE & SMS GATEWAY</p>
        </div>
      </a>

      <!-- Desktop Nav -->
      <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-300">
        <a href="#features" class="hover:text-cyan-400 transition">Features</a>
        <a href="#ecosystem" class="hover:text-cyan-400 transition">Supported Carriers</a>
        <a href="#architecture" class="hover:text-cyan-400 transition">Architecture</a>
        <a href="#simulator" class="hover:text-cyan-400 transition flex items-center gap-1.5 text-cyan-300 font-semibold">
          <span class="w-2 h-2 rounded-full bg-cyan-400 animate-ping"></span>
          Simulator
        </a>
        <a href="#code-samples" class="hover:text-cyan-400 transition">SDK Docs</a>
        <a href="#endpoints" class="hover:text-cyan-400 transition">API Matrix</a>
      </nav>

      <!-- Action Buttons -->
      <div class="flex items-center gap-3">
        <a href="#simulator" class="hidden sm:inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-semibold bg-white/5 hover:bg-white/10 text-slate-200 border border-white/10 transition">
          <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
          API Console
        </a>
        <a href="#simulator" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-xs font-bold bg-gradient-to-r from-cyan-500 to-indigo-600 hover:from-cyan-400 hover:to-indigo-500 text-white shadow-lg shadow-cyan-500/20 transition transform hover:-translate-y-0.5">
          <span>Test Endpoint</span>
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </a>
      </div>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="relative pt-16 pb-24 overflow-hidden z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      
      <!-- System Uptime Badge -->
      <div class="flex justify-center mb-6">
        <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-slate-900/90 border border-slate-700/60 shadow-xl backdrop-blur-md">
          <span class="flex h-2.5 w-2.5 relative">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
          </span>
          <span class="text-xs font-semibold text-slate-300">Carrier Hub Status: <span class="text-emerald-400 font-bold">100% Operational</span></span>
          <span class="text-slate-600">|</span>
          <span class="text-xs text-slate-400">Average USSD Latency: <span class="text-cyan-400 font-mono font-medium">&lt; 2.4s</span></span>
        </div>
      </div>

      <!-- Headline -->
      <div class="text-center max-w-4xl mx-auto">
        <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight text-white leading-tight">
          Next-Gen <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-teal-300 to-indigo-400">Robotic Telecom</span> & MFS Gateway Engine
        </h1>
        <p class="mt-6 text-lg sm:text-xl text-slate-400 max-w-3xl mx-auto leading-relaxed">
          High-throughput carrier automation engine connecting cloud REST APIs with physical multi-SIM Android hardware. Execute automated Flexiload, USSD dialing, and MFS Cash-In/Out in seconds.
        </p>

        <!-- CTA Buttons -->
        <div class="mt-10 flex flex-wrap items-center justify-center gap-4">
          <a href="#simulator" class="px-8 py-4 rounded-xl text-sm font-bold bg-gradient-to-r from-cyan-500 via-teal-500 to-indigo-600 hover:from-cyan-400 hover:to-indigo-500 text-white shadow-xl shadow-cyan-500/25 transition transform hover:-translate-y-0.5 flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            <span>Launch Live API Simulator</span>
          </a>
          <a href="#endpoints" class="px-8 py-4 rounded-xl text-sm font-semibold bg-slate-900/90 hover:bg-slate-800 text-slate-200 border border-slate-700/80 shadow-lg transition flex items-center gap-2">
            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            <span>API Reference Spec</span>
          </a>
        </div>
      </div>

      <!-- Live KPI Metrics Counter Cards -->
      <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-4 max-w-5xl mx-auto">
        <div class="glass-card p-5 rounded-2xl text-center">
          <div class="text-2xl sm:text-3xl font-extrabold text-cyan-400 font-heading" id="stat-total-vol">৳28.5M+</div>
          <div class="text-xs text-slate-400 mt-1 uppercase tracking-wider font-semibold">Processed Volume</div>
          <div class="text-[10px] text-emerald-400 mt-1 flex items-center justify-center gap-1">
            <span>↑ 18.4% this month</span>
          </div>
        </div>

        <div class="glass-card p-5 rounded-2xl text-center">
          <div class="text-2xl sm:text-3xl font-extrabold text-emerald-400 font-heading" id="stat-success-rate">99.98%</div>
          <div class="text-xs text-slate-400 mt-1 uppercase tracking-wider font-semibold">Success Delivery</div>
          <div class="text-[10px] text-slate-400 mt-1">Autonomous failover</div>
        </div>

        <div class="glass-card p-5 rounded-2xl text-center">
          <div class="text-2xl sm:text-3xl font-extrabold text-indigo-400 font-heading">5 Telcos + 4 MFS</div>
          <div class="text-xs text-slate-400 mt-1 uppercase tracking-wider font-semibold">Unified Protocol</div>
          <div class="text-[10px] text-indigo-300 mt-1">GP, Robi, BL, bKash, Nagad</div>
        </div>

        <div class="glass-card p-5 rounded-2xl text-center">
          <div class="text-2xl sm:text-3xl font-extrabold text-amber-400 font-heading" id="stat-latency">&lt; 2.4s</div>
          <div class="text-xs text-slate-400 mt-1 uppercase tracking-wider font-semibold">Avg Turnaround</div>
          <div class="text-[10px] text-amber-300 mt-1">Direct USSD & App execution</div>
        </div>
      </div>

    </div>
  </section>

  <!-- Live Interactive API Simulator & Playground -->
  <section id="simulator" class="py-20 relative z-20 border-t border-slate-800/80 bg-slate-950/40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      
      <div class="text-center max-w-3xl mx-auto mb-12">
        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-cyan-500/10 text-cyan-400 border border-cyan-500/20">
          Live Interactive Console
        </span>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-3">
          Interactive Gateway Playground
        </h2>
        <p class="text-slate-400 mt-3 text-sm sm:text-base">
          Test real API requests directly in your browser. Dispatch simulated recharges, query device heartbeat, or parse live carrier SMS.
        </p>
      </div>

      <!-- Playground Component -->
      <div class="glass-card rounded-3xl p-6 lg:p-8 shadow-2xl border border-slate-800">
        
        <!-- Tab Navigation -->
        <div class="flex flex-wrap items-center justify-between gap-4 border-b border-slate-800 pb-4 mb-6">
          <div class="flex flex-wrap gap-2">
            <button onclick="switchPlaygroundTab('recharge')" id="tab-btn-recharge" class="px-4 py-2 rounded-xl text-xs font-bold transition flex items-center gap-2 bg-cyan-500/20 text-cyan-300 border border-cyan-500/30">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
              <span>1. Create Recharge (POST)</span>
            </button>
            <button onclick="switchPlaygroundTab('heartbeat')" id="tab-btn-heartbeat" class="px-4 py-2 rounded-xl text-xs font-medium text-slate-400 hover:text-white hover:bg-slate-800/60 transition flex items-center gap-2">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
              <span>2. iRobotic Device Poll</span>
            </button>
            <button onclick="switchPlaygroundTab('sms')" id="tab-btn-sms" class="px-4 py-2 rounded-xl text-xs font-medium text-slate-400 hover:text-white hover:bg-slate-800/60 transition flex items-center gap-2">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
              <span>3. SMS Intelligence & OTP Parser</span>
            </button>
          </div>

          <div class="flex items-center gap-2 text-xs text-slate-400 font-mono">
            <span class="inline-block w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
            <span>REST API Endpoint</span>
          </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
          
          <!-- Left: Input Form Controls -->
          <div class="lg:col-span-6 space-y-5">
            
            <!-- Tab 1: Recharge Form -->
            <div id="tab-content-recharge" class="space-y-4">
              <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">Recipient Mobile Number</label>
                <div class="relative">
                  <input type="text" id="sim-number" value="01712345678" placeholder="e.g. 017XXXXXXXX, 018XXXXXXXX" class="w-full bg-slate-900/90 border border-slate-700/80 rounded-xl px-4 py-2.5 text-sm text-white font-mono focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500">
                  <span id="detected-carrier-badge" class="absolute right-3 top-2.5 text-[11px] font-bold px-2 py-0.5 rounded bg-cyan-500/20 text-cyan-300 border border-cyan-500/30">
                    GP Detected
                  </span>
                </div>
                <p class="text-[11px] text-slate-500 mt-1">Carriers (GP, Robi, BL, Airtel, Teletalk) auto-detected from prefix.</p>
              </div>

              <div class="grid grid-cols-2 gap-4">
                <div>
                  <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">Amount (BDT)</label>
                  <input type="number" id="sim-amount" value="100" min="10" step="10" class="w-full bg-slate-900/90 border border-slate-700/80 rounded-xl px-4 py-2.5 text-sm text-white font-mono focus:outline-none focus:border-cyan-500">
                </div>
                <div>
                  <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">Service Type</label>
                  <select id="sim-type" class="w-full bg-slate-900/90 border border-slate-700/80 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-cyan-500">
                    <option value="recharge">Prepaid Flexiload</option>
                    <option value="postpaid">Postpaid Bill Pay</option>
                    <option value="skitto">Skitto Recharge</option>
                    <option value="cash_in">bKash/Nagad Cash In</option>
                    <option value="cash_out">bKash/Nagad Cash Out</option>
                  </select>
                </div>
              </div>

              <!-- Presets -->
              <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">Quick Presets</label>
                <div class="flex flex-wrap gap-2">
                  <button type="button" onclick="setRechargePreset('01712345678', '100', 'recharge')" class="px-2.5 py-1 rounded-lg text-xs bg-slate-800 hover:bg-slate-700 text-slate-300">
                    Grameenphone (017)
                  </button>
                  <button type="button" onclick="setRechargePreset('01812345678', '200', 'recharge')" class="px-2.5 py-1 rounded-lg text-xs bg-slate-800 hover:bg-slate-700 text-slate-300">
                    Robi (018)
                  </button>
                  <button type="button" onclick="setRechargePreset('01912345678', '50', 'recharge')" class="px-2.5 py-1 rounded-lg text-xs bg-slate-800 hover:bg-slate-700 text-slate-300">
                    Banglalink (019)
                  </button>
                  <button type="button" onclick="setRechargePreset('01899887766', '500', 'cash_in')" class="px-2.5 py-1 rounded-lg text-xs bg-pink-950/40 border border-pink-500/20 hover:bg-pink-900/40 text-pink-300">
                    bKash Cash In
                  </button>
                </div>
              </div>

              <button onclick="executeRechargeTest()" id="btn-submit-recharge" class="w-full py-3 px-4 rounded-xl text-sm font-bold bg-gradient-to-r from-cyan-500 to-indigo-600 hover:from-cyan-400 hover:to-indigo-500 text-white shadow-lg shadow-cyan-500/20 transition flex items-center justify-center gap-2">
                <span>Dispatch Recharge via REST API</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
              </button>
            </div>

            <!-- Tab 2: iRobotic Heartbeat Form -->
            <div id="tab-content-heartbeat" class="space-y-4 hidden">
              <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">Hardware Device ID</label>
                <input type="text" id="dev-id" value="ROBOT-ANDROID-GP-01" class="w-full bg-slate-900/90 border border-slate-700/80 rounded-xl px-4 py-2.5 text-sm text-white font-mono focus:outline-none focus:border-cyan-500">
              </div>
              <div class="grid grid-cols-2 gap-4">
                <div>
                  <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">Current SIM Balance</label>
                  <input type="text" id="dev-balance" value="7850.50" class="w-full bg-slate-900/90 border border-slate-700/80 rounded-xl px-4 py-2.5 text-sm text-white font-mono focus:outline-none focus:border-cyan-500">
                </div>
                <div>
                  <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">Carrier Networks</label>
                  <input type="text" id="dev-operator" value="GP, Robi" class="w-full bg-slate-900/90 border border-slate-700/80 rounded-xl px-4 py-2.5 text-sm text-white font-mono focus:outline-none focus:border-cyan-500">
                </div>
              </div>
              <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">Device Hardware Info</label>
                <input type="text" id="dev-info" value="Samsung Galaxy A14, Android 13, Battery 94%" class="w-full bg-slate-900/90 border border-slate-700/80 rounded-xl px-4 py-2.5 text-sm text-white font-mono focus:outline-none focus:border-cyan-500">
              </div>
              <button onclick="executeHeartbeatTest()" id="btn-submit-heartbeat" class="w-full py-3 px-4 rounded-xl text-sm font-bold bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-400 hover:to-teal-500 text-white shadow-lg shadow-emerald-500/20 transition flex items-center justify-center gap-2">
                <span>Simulate Hardware Heartbeat & Poll Task</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
              </button>
            </div>

            <!-- Tab 3: SMS Intelligence Form -->
            <div id="tab-content-sms" class="space-y-4 hidden">
              <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">SMS Sender Header</label>
                <input type="text" id="sms-sender" value="bKash" placeholder="e.g. bKash, 167, GP Flexi" class="w-full bg-slate-900/90 border border-slate-700/80 rounded-xl px-4 py-2.5 text-sm text-white font-mono focus:outline-none focus:border-cyan-500">
              </div>
              <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">Raw Carrier SMS Body</label>
                <textarea id="sms-body" rows="3" class="w-full bg-slate-900/90 border border-slate-700/80 rounded-xl p-3 text-xs text-white font-mono focus:outline-none focus:border-cyan-500">You have received Cash In of Tk 1,500.00 from 01755123456. Fee Tk 0.00. Balance Tk 14,250.75. TrxID 9K48X7P2Q1 at 16/09/2026 03:00</textarea>
              </div>

              <!-- SMS Presets -->
              <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">Sample SMS Messages</label>
                <div class="flex flex-wrap gap-2">
                  <button type="button" onclick="setSmsPreset('bKash', 'You have received Cash In of Tk 1,500.00 from 01755123456. Fee Tk 0.00. Balance Tk 14,250.75. TrxID 9K48X7P2Q1 at 16/09/2026 03:00')" class="px-2.5 py-1 rounded-lg text-xs bg-slate-800 hover:bg-slate-700 text-slate-300">
                    bKash Cash-In
                  </button>
                  <button type="button" onclick="setSmsPreset('NAGAD', 'Cash In Tk 2,000.00 from 01811223344 successful. Balance: Tk 8,500.00. TxnID: 7HA99KJ3 at 16-Sep-2026 03:15:10')" class="px-2.5 py-1 rounded-lg text-xs bg-slate-800 hover:bg-slate-700 text-slate-300">
                    Nagad Cash-In
                  </button>
                  <button type="button" onclick="setSmsPreset('GP Flexiload', 'Recharge successful for 01712345678. Amount: Tk 200.00. Balance: Tk 1,840.00. TrxID: GPF88319201')" class="px-2.5 py-1 rounded-lg text-xs bg-slate-800 hover:bg-slate-700 text-slate-300">
                    GP Flexiload
                  </button>
                  <button type="button" onclick="setSmsPreset('VERIFY', 'Your security verification OTP code is 849201. Valid for 5 minutes. Do not share with anyone.')" class="px-2.5 py-1 rounded-lg text-xs bg-indigo-950/40 border border-indigo-500/20 hover:bg-indigo-900/40 text-indigo-300">
                    OTP Verification
                  </button>
                </div>
              </div>

              <button onclick="executeSmsTest()" id="btn-submit-sms" class="w-full py-3 px-4 rounded-xl text-sm font-bold bg-gradient-to-r from-violet-500 to-indigo-600 hover:from-violet-400 hover:to-indigo-500 text-white shadow-lg shadow-violet-500/20 transition flex items-center justify-center gap-2">
                <span>Run Intelligent Regex Parser</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
              </button>
            </div>

          </div>

          <!-- Right: Live Terminal & JSON Response Display -->
          <div class="lg:col-span-6 flex flex-col">
            <div class="flex items-center justify-between bg-slate-900/90 rounded-t-2xl px-4 py-2.5 border border-slate-700/80 border-b-0">
              <div class="flex items-center gap-2">
                <div class="w-3 h-3 rounded-full bg-rose-500/80"></div>
                <div class="w-3 h-3 rounded-full bg-amber-500/80"></div>
                <div class="w-3 h-3 rounded-full bg-emerald-500/80"></div>
                <span class="text-xs text-slate-400 font-mono ml-2" id="res-endpoint-label">POST /api/v1/recharge/create</span>
              </div>
              <div class="flex items-center gap-3">
                <span class="text-[11px] font-mono text-slate-500" id="res-time-label">Ready</span>
                <button onclick="copyResponseJson()" class="text-xs text-slate-400 hover:text-white transition flex items-center gap-1">
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                  <span>Copy</span>
                </button>
              </div>
            </div>

            <!-- Terminal Output Body -->
            <div class="flex-1 bg-slate-950/95 rounded-b-2xl p-4 border border-slate-700/80 font-mono text-xs overflow-auto max-h-[360px] text-cyan-300">
              <pre id="json-response" class="whitespace-pre leading-relaxed font-mono">// Execute any action on the left to see real-time server JSON response.
{
  "status": "ready",
  "gateway": "IMZAMI.CORE v2.4",
  "mode": "Live Production / Simulator",
  "connected_devices": 1,
  "queue_latency": "2.4ms"
}</pre>
            </div>
          </div>

        </div>

      </div>

    </div>
  </section>

  <!-- Supported Telecom & Financial Ecosystem -->
  <section id="ecosystem" class="py-20 relative z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      
      <div class="text-center max-w-3xl mx-auto mb-16">
        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-indigo-500/10 text-indigo-400 border border-indigo-500/20">
          Full Coverage
        </span>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-3">
          Supported Telecoms & MFS Providers
        </h2>
        <p class="text-slate-400 mt-3 text-sm sm:text-base">
          Native hardware dialers & app bots customized for all Bangladeshi network operators and mobile financial networks.
        </p>
      </div>

      <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
        
        <!-- GP -->
        <div class="glass-card p-5 rounded-2xl flex flex-col items-center text-center group">
          <div class="w-14 h-14 rounded-2xl bg-sky-500/10 border border-sky-500/30 flex items-center justify-center text-sky-400 font-extrabold text-lg mb-3 group-hover:scale-110 transition">
            GP
          </div>
          <h3 class="font-bold text-white text-sm">Grameenphone</h3>
          <p class="text-[11px] text-slate-400 mt-0.5">Prefix: 017, 013</p>
          <span class="mt-3 px-2 py-0.5 rounded text-[10px] font-mono bg-sky-500/10 text-sky-300 border border-sky-500/20">
            Flexiload *566#
          </span>
        </div>

        <!-- Robi -->
        <div class="glass-card p-5 rounded-2xl flex flex-col items-center text-center group">
          <div class="w-14 h-14 rounded-2xl bg-rose-500/10 border border-rose-500/30 flex items-center justify-center text-rose-400 font-extrabold text-lg mb-3 group-hover:scale-110 transition">
            Robi
          </div>
          <h3 class="font-bold text-white text-sm">Robi Axiata</h3>
          <p class="text-[11px] text-slate-400 mt-0.5">Prefix: 018</p>
          <span class="mt-3 px-2 py-0.5 rounded text-[10px] font-mono bg-rose-500/10 text-rose-300 border border-rose-500/20">
            Easyload *222#
          </span>
        </div>

        <!-- Banglalink -->
        <div class="glass-card p-5 rounded-2xl flex flex-col items-center text-center group">
          <div class="w-14 h-14 rounded-2xl bg-orange-500/10 border border-orange-500/30 flex items-center justify-center text-orange-400 font-extrabold text-lg mb-3 group-hover:scale-110 transition">
            BL
          </div>
          <h3 class="font-bold text-white text-sm">Banglalink</h3>
          <p class="text-[11px] text-slate-400 mt-0.5">Prefix: 019, 014</p>
          <span class="mt-3 px-2 py-0.5 rounded text-[10px] font-mono bg-orange-500/10 text-orange-300 border border-orange-500/20">
            Recharge *124#
          </span>
        </div>

        <!-- Airtel -->
        <div class="glass-card p-5 rounded-2xl flex flex-col items-center text-center group">
          <div class="w-14 h-14 rounded-2xl bg-red-500/10 border border-red-500/30 flex items-center justify-center text-red-400 font-extrabold text-lg mb-3 group-hover:scale-110 transition">
            Airtel
          </div>
          <h3 class="font-bold text-white text-sm">Airtel BD</h3>
          <p class="text-[11px] text-slate-400 mt-0.5">Prefix: 016</p>
          <span class="mt-3 px-2 py-0.5 rounded text-[10px] font-mono bg-red-500/10 text-red-300 border border-red-500/20">
            Recharge *778#
          </span>
        </div>

        <!-- Teletalk -->
        <div class="glass-card p-5 rounded-2xl flex flex-col items-center text-center group">
          <div class="w-14 h-14 rounded-2xl bg-emerald-500/10 border border-emerald-500/30 flex items-center justify-center text-emerald-400 font-extrabold text-lg mb-3 group-hover:scale-110 transition">
            TT
          </div>
          <h3 class="font-bold text-white text-sm">Teletalk</h3>
          <p class="text-[11px] text-slate-400 mt-0.5">Prefix: 015</p>
          <span class="mt-3 px-2 py-0.5 rounded text-[10px] font-mono bg-emerald-500/10 text-emerald-300 border border-emerald-500/20">
            Govt USSD *152#
          </span>
        </div>

        <!-- bKash -->
        <div class="glass-card p-5 rounded-2xl flex flex-col items-center text-center group">
          <div class="w-14 h-14 rounded-2xl bg-pink-500/10 border border-pink-500/30 flex items-center justify-center text-pink-400 font-extrabold text-lg mb-3 group-hover:scale-110 transition">
            bKash
          </div>
          <h3 class="font-bold text-white text-sm">bKash MFS</h3>
          <p class="text-[11px] text-slate-400 mt-0.5">Cash In / Cash Out</p>
          <span class="mt-3 px-2 py-0.5 rounded text-[10px] font-mono bg-pink-500/10 text-pink-300 border border-pink-500/20">
            USSD *247# & App
          </span>
        </div>

        <!-- Nagad -->
        <div class="glass-card p-5 rounded-2xl flex flex-col items-center text-center group">
          <div class="w-14 h-14 rounded-2xl bg-amber-500/10 border border-amber-500/30 flex items-center justify-center text-amber-400 font-extrabold text-lg mb-3 group-hover:scale-110 transition">
            Nagad
          </div>
          <h3 class="font-bold text-white text-sm">Nagad Postal</h3>
          <p class="text-[11px] text-slate-400 mt-0.5">Cash In / Out / Bill</p>
          <span class="mt-3 px-2 py-0.5 rounded text-[10px] font-mono bg-amber-500/10 text-amber-300 border border-amber-500/20">
            USSD *167# & App
          </span>
        </div>

        <!-- Rocket -->
        <div class="glass-card p-5 rounded-2xl flex flex-col items-center text-center group">
          <div class="w-14 h-14 rounded-2xl bg-purple-500/10 border border-purple-500/30 flex items-center justify-center text-purple-400 font-extrabold text-lg mb-3 group-hover:scale-110 transition">
            DBBL
          </div>
          <h3 class="font-bold text-white text-sm">DBBL Rocket</h3>
          <p class="text-[11px] text-slate-400 mt-0.5">MFS & Topup</p>
          <span class="mt-3 px-2 py-0.5 rounded text-[10px] font-mono bg-purple-500/10 text-purple-300 border border-purple-500/20">
            USSD *322#
          </span>
        </div>

        <!-- Upay -->
        <div class="glass-card p-5 rounded-2xl flex flex-col items-center text-center group">
          <div class="w-14 h-14 rounded-2xl bg-blue-500/10 border border-blue-500/30 flex items-center justify-center text-blue-400 font-extrabold text-lg mb-3 group-hover:scale-110 transition">
            Upay
          </div>
          <h3 class="font-bold text-white text-sm">UCB Upay</h3>
          <p class="text-[11px] text-slate-400 mt-0.5">MFS & Payments</p>
          <span class="mt-3 px-2 py-0.5 rounded text-[10px] font-mono bg-blue-500/10 text-blue-300 border border-blue-500/20">
            USSD *268#
          </span>
        </div>

        <!-- Skitto -->
        <div class="glass-card p-5 rounded-2xl flex flex-col items-center text-center group">
          <div class="w-14 h-14 rounded-2xl bg-yellow-500/10 border border-yellow-500/30 flex items-center justify-center text-yellow-400 font-extrabold text-lg mb-3 group-hover:scale-110 transition">
            Skitto
          </div>
          <h3 class="font-bold text-white text-sm">GP Skitto</h3>
          <p class="text-[11px] text-slate-400 mt-0.5">Youth Telecom</p>
          <span class="mt-3 px-2 py-0.5 rounded text-[10px] font-mono bg-yellow-500/10 text-yellow-300 border border-yellow-500/20">
            Digital Flexiload
          </span>
        </div>

      </div>

    </div>
  </section>

  <!-- Architecture & System Flow -->
  <section id="architecture" class="py-20 relative z-10 border-t border-slate-800/80 bg-slate-950/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      
      <div class="text-center max-w-3xl mx-auto mb-16">
        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
          How It Works
        </span>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-3">
          4-Stage Autonomous Robotic Workflow
        </h2>
        <p class="text-slate-400 mt-3 text-sm sm:text-base">
          From HTTP API call to real carrier USSD execution and SMS callback in less than 3 seconds.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        
        <!-- Step 1 -->
        <div class="glass-card p-6 rounded-2xl relative">
          <div class="w-10 h-10 rounded-xl bg-cyan-500/20 text-cyan-400 font-extrabold flex items-center justify-center text-lg mb-4 font-mono">
            01
          </div>
          <h3 class="text-lg font-bold text-white mb-2">Merchant API Request</h3>
          <p class="text-xs text-slate-400 leading-relaxed">
            Your backend or app sends an encrypted JSON request to <code class="text-cyan-300 font-mono">POST /api/v1/recharge/create</code>.
          </p>
        </div>

        <!-- Step 2 -->
        <div class="glass-card p-6 rounded-2xl relative">
          <div class="w-10 h-10 rounded-xl bg-indigo-500/20 text-indigo-400 font-extrabold flex items-center justify-center text-lg mb-4 font-mono">
            02
          </div>
          <h3 class="text-lg font-bold text-white mb-2">Intelligent Carrier Router</h3>
          <p class="text-xs text-slate-400 leading-relaxed">
            Our algorithm detects the carrier from phone prefix and selects the hardware SIM node with highest balance & lowest latency.
          </p>
        </div>

        <!-- Step 3 -->
        <div class="glass-card p-6 rounded-2xl relative">
          <div class="w-10 h-10 rounded-xl bg-emerald-500/20 text-emerald-400 font-extrabold flex items-center justify-center text-lg mb-4 font-mono">
            03
          </div>
          <h3 class="text-lg font-bold text-white mb-2">Robotic Device Execution</h3>
          <p class="text-xs text-slate-400 leading-relaxed">
            The Android iRobotic app claims the pending task, dials carrier USSD or launches app automation, and captures carrier response.
          </p>
        </div>

        <!-- Step 4 -->
        <div class="glass-card p-6 rounded-2xl relative">
          <div class="w-10 h-10 rounded-xl bg-amber-500/20 text-amber-400 font-extrabold flex items-center justify-center text-lg mb-4 font-mono">
            04
          </div>
          <h3 class="text-lg font-bold text-white mb-2">SMS & Webhook Dispatch</h3>
          <p class="text-xs text-slate-400 leading-relaxed">
            Incoming carrier confirmation SMS is pushed to <code class="text-cyan-300 font-mono">/irobotic/smsin</code>, TrxID is parsed, and webhook fires.
          </p>
        </div>

      </div>

    </div>
  </section>

  <!-- Feature Grid -->
  <section id="features" class="py-20 relative z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      
      <div class="text-center max-w-3xl mx-auto mb-16">
        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-cyan-500/10 text-cyan-400 border border-cyan-500/20">
          Core Capabilities
        </span>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-3">
          Engineered for Extreme Reliability & Scale
        </h2>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <div class="glass-card p-6 rounded-2xl">
          <div class="w-12 h-12 rounded-xl bg-cyan-500/10 text-cyan-400 flex items-center justify-center mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/></svg>
          </div>
          <h3 class="text-lg font-bold text-white mb-2">Automated Prefix Detection</h3>
          <p class="text-xs text-slate-400 leading-relaxed">
            Zero configuration required. The gateway detects GP (017/013), Robi (018), BL (019/014), Airtel (016), and Teletalk (015) automatically.
          </p>
        </div>

        <div class="glass-card p-6 rounded-2xl">
          <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-400 flex items-center justify-center mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
          </div>
          <h3 class="text-lg font-bold text-white mb-2">AI & Regex SMS Parser</h3>
          <p class="text-xs text-slate-400 leading-relaxed">
            Built-in extraction engine extracts TrxID, TxnID, transacted amount, operator fee, and remaining balance from any telecom or MFS SMS in 1ms.
          </p>
        </div>

        <div class="glass-card p-6 rounded-2xl">
          <div class="w-12 h-12 rounded-xl bg-indigo-500/10 text-indigo-400 flex items-center justify-center mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
          </div>
          <h3 class="text-lg font-bold text-white mb-2">Multi-Device SIM Pooling</h3>
          <p class="text-xs text-slate-400 leading-relaxed">
            Attach dozens of physical Android gateway devices. Traffic automatically balances across available SIM cards to prevent carrier throttling.
          </p>
        </div>

        <div class="glass-card p-6 rounded-2xl">
          <div class="w-12 h-12 rounded-xl bg-violet-500/10 text-violet-400 flex items-center justify-center mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
          </div>
          <h3 class="text-lg font-bold text-white mb-2">Instant OTP Interception</h3>
          <p class="text-xs text-slate-400 leading-relaxed">
            Query incoming verification codes via API in real-time. Ideal for automated account verification, OTP forwarding, and fintech reconciliation.
          </p>
        </div>

        <div class="glass-card p-6 rounded-2xl">
          <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-400 flex items-center justify-center mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
          </div>
          <h3 class="text-lg font-bold text-white mb-2">Sub-3-Second Turnaround</h3>
          <p class="text-xs text-slate-400 leading-relaxed">
            Direct USSD channel access ensures your top-up transactions are executed faster than traditional web aggregator APIs.
          </p>
        </div>

        <div class="glass-card p-6 rounded-2xl">
          <div class="w-12 h-12 rounded-xl bg-rose-500/10 text-rose-400 flex items-center justify-center mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
          </div>
          <h3 class="text-lg font-bold text-white mb-2">Zero CSRF Friction</h3>
          <p class="text-xs text-slate-400 leading-relaxed">
            Gateway endpoints are explicitly optimized for hardware clients and native Android automation agents with CSRF bypass and rate-limiting.
          </p>
        </div>

      </div>

    </div>
  </section>

  <!-- Developer SDK Quick Start & Code Snippets -->
  <section id="code-samples" class="py-20 relative z-10 border-t border-slate-800/80 bg-slate-950/40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      
      <div class="text-center max-w-3xl mx-auto mb-16">
        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-cyan-500/10 text-cyan-400 border border-cyan-500/20">
          Developers First
        </span>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-3">
          Integration in Less Than 5 Minutes
        </h2>
        <p class="text-slate-400 mt-3 text-sm sm:text-base">
          Copy-paste ready code samples for PHP, Python, Node.js, and cURL.
        </p>
      </div>

      <div class="max-w-4xl mx-auto glass-card rounded-3xl overflow-hidden border border-slate-800 shadow-2xl">
        <!-- Language Switcher Bar -->
        <div class="bg-slate-900/90 px-6 py-3 border-b border-slate-800 flex items-center justify-between">
          <div class="flex items-center gap-2">
            <button onclick="switchCodeLang('curl')" id="code-tab-curl" class="px-3 py-1.5 rounded-lg text-xs font-bold bg-cyan-500/20 text-cyan-300 border border-cyan-500/30">cURL</button>
            <button onclick="switchCodeLang('php')" id="code-tab-php" class="px-3 py-1.5 rounded-lg text-xs font-medium text-slate-400 hover:text-white">PHP / Laravel</button>
            <button onclick="switchCodeLang('node')" id="code-tab-node" class="px-3 py-1.5 rounded-lg text-xs font-medium text-slate-400 hover:text-white">Node.js (Axios)</button>
            <button onclick="switchCodeLang('python')" id="code-tab-python" class="px-3 py-1.5 rounded-lg text-xs font-medium text-slate-400 hover:text-white">Python</button>
          </div>
          <button onclick="copySnippetCode()" class="text-xs text-slate-400 hover:text-white transition flex items-center gap-1.5">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
            <span id="copy-snippet-text">Copy Code</span>
          </button>
        </div>

        <!-- Code Block -->
        <div class="p-6 bg-slate-950 font-mono text-xs text-slate-300 overflow-x-auto leading-relaxed">
          <pre id="snippet-code">curl -X POST https://api.imzami.com/api/v1/recharge/create \
  -H "Content-Type: application/json" \
  -d '{
    "number": "01712345678",
    "amount": 100,
    "type": "recharge"
  }'</pre>
        </div>
      </div>

    </div>
  </section>

  <!-- Complete Endpoints Reference Matrix -->
  <section id="endpoints" class="py-20 relative z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      
      <div class="text-center max-w-3xl mx-auto mb-16">
        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-indigo-500/10 text-indigo-400 border border-indigo-500/20">
          API Reference
        </span>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-3">
          Complete Gateway Endpoints Directory
        </h2>
        <p class="text-slate-400 mt-3 text-sm sm:text-base">
          All endpoints accept and return UTF-8 JSON payloads with HTTP status codes.
        </p>
      </div>

      <div class="glass-card rounded-3xl overflow-hidden border border-slate-800 shadow-xl">
        <div class="overflow-x-auto">
          <table class="w-full text-left text-sm text-slate-300">
            <thead class="bg-slate-900/90 text-xs font-mono uppercase text-slate-400 border-b border-slate-800">
              <tr>
                <th class="px-6 py-4">Method</th>
                <th class="px-6 py-4">Endpoint</th>
                <th class="px-6 py-4">Category</th>
                <th class="px-6 py-4">Description</th>
                <th class="px-6 py-4 text-right">Action</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-800 font-mono text-xs">
              
              <tr class="hover:bg-slate-800/30 transition">
                <td class="px-6 py-4"><span class="px-2.5 py-1 rounded font-bold text-[10px] bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">POST</span></td>
                <td class="px-6 py-4 font-bold text-cyan-300">/api/v1/recharge/create</td>
                <td class="px-6 py-4 text-slate-400 font-sans">Client API</td>
                <td class="px-6 py-4 text-slate-400 font-sans">Create topup/cash task with auto carrier prefix detection</td>
                <td class="px-6 py-4 text-right font-sans">
                  <button onclick="testEndpointFromTable('recharge')" class="text-xs text-cyan-400 hover:underline">Test</button>
                </td>
              </tr>

              <tr class="hover:bg-slate-800/30 transition">
                <td class="px-6 py-4"><span class="px-2.5 py-1 rounded font-bold text-[10px] bg-sky-500/20 text-sky-300 border border-sky-500/30">GET</span></td>
                <td class="px-6 py-4 font-bold text-cyan-300">/api/v1/recharge/{id}</td>
                <td class="px-6 py-4 text-slate-400 font-sans">Client API</td>
                <td class="px-6 py-4 text-slate-400 font-sans">Query order status, TrxID, and assigned hardware SIM</td>
                <td class="px-6 py-4 text-right font-sans">
                  <a href="/api/v1/recharge/1" target="_blank" class="text-xs text-cyan-400 hover:underline">Query</a>
                </td>
              </tr>

              <tr class="hover:bg-slate-800/30 transition">
                <td class="px-6 py-4"><span class="px-2.5 py-1 rounded font-bold text-[10px] bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">POST</span></td>
                <td class="px-6 py-4 font-bold text-emerald-300">/irobotic/get_list</td>
                <td class="px-6 py-4 text-slate-400 font-sans">Hardware Sync</td>
                <td class="px-6 py-4 text-slate-400 font-sans">Android SIM device heartbeat & pending task fetch</td>
                <td class="px-6 py-4 text-right font-sans">
                  <button onclick="testEndpointFromTable('heartbeat')" class="text-xs text-cyan-400 hover:underline">Test</button>
                </td>
              </tr>

              <tr class="hover:bg-slate-800/30 transition">
                <td class="px-6 py-4"><span class="px-2.5 py-1 rounded font-bold text-[10px] bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">POST</span></td>
                <td class="px-6 py-4 font-bold text-emerald-300">/irobotic/make_update/{id}</td>
                <td class="px-6 py-4 text-slate-400 font-sans">Hardware Sync</td>
                <td class="px-6 py-4 text-slate-400 font-sans">Report completed USSD / transaction ID & new balance</td>
                <td class="px-6 py-4 text-right font-sans">
                  <span class="text-xs text-slate-600">Hardware</span>
                </td>
              </tr>

              <tr class="hover:bg-slate-800/30 transition">
                <td class="px-6 py-4"><span class="px-2.5 py-1 rounded font-bold text-[10px] bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">POST</span></td>
                <td class="px-6 py-4 font-bold text-violet-300">/irobotic/smsin</td>
                <td class="px-6 py-4 text-slate-400 font-sans">SMS Intelligence</td>
                <td class="px-6 py-4 text-slate-400 font-sans">Push incoming SMS from device & parse TrxID/OTP</td>
                <td class="px-6 py-4 text-right font-sans">
                  <button onclick="testEndpointFromTable('sms')" class="text-xs text-cyan-400 hover:underline">Test</button>
                </td>
              </tr>

              <tr class="hover:bg-slate-800/30 transition">
                <td class="px-6 py-4"><span class="px-2.5 py-1 rounded font-bold text-[10px] bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">POST</span></td>
                <td class="px-6 py-4 font-bold text-violet-300">/api/v1/sms/parse</td>
                <td class="px-6 py-4 text-slate-400 font-sans">SMS Intelligence</td>
                <td class="px-6 py-4 text-slate-400 font-sans">Direct regex parser tester for OTP, balance, & TrxID</td>
                <td class="px-6 py-4 text-right font-sans">
                  <button onclick="testEndpointFromTable('sms')" class="text-xs text-cyan-400 hover:underline">Test</button>
                </td>
              </tr>

              <tr class="hover:bg-slate-800/30 transition">
                <td class="px-6 py-4"><span class="px-2.5 py-1 rounded font-bold text-[10px] bg-sky-500/20 text-sky-300 border border-sky-500/30">GET</span></td>
                <td class="px-6 py-4 font-bold text-cyan-300">/api/v1/devices</td>
                <td class="px-6 py-4 text-slate-400 font-sans">Fleet Monitor</td>
                <td class="px-6 py-4 text-slate-400 font-sans">List all connected Android SIM units & online status</td>
                <td class="px-6 py-4 text-right font-sans">
                  <a href="/api/v1/devices" target="_blank" class="text-xs text-cyan-400 hover:underline">View</a>
                </td>
              </tr>

              <tr class="hover:bg-slate-800/30 transition">
                <td class="px-6 py-4"><span class="px-2.5 py-1 rounded font-bold text-[10px] bg-sky-500/20 text-sky-300 border border-sky-500/30">GET</span></td>
                <td class="px-6 py-4 font-bold text-cyan-300">/api/v1/stats</td>
                <td class="px-6 py-4 text-slate-400 font-sans">Telemetry</td>
                <td class="px-6 py-4 text-slate-400 font-sans">Real-time volume, delivery rate %, active SIM count</td>
                <td class="px-6 py-4 text-right font-sans">
                  <a href="/api/v1/stats" target="_blank" class="text-xs text-cyan-400 hover:underline">View</a>
                </td>
              </tr>

              <tr class="hover:bg-slate-800/30 transition">
                <td class="px-6 py-4"><span class="px-2.5 py-1 rounded font-bold text-[10px] bg-sky-500/20 text-sky-300 border border-sky-500/30">GET</span></td>
                <td class="px-6 py-4 font-bold text-emerald-300">/api/v1/health</td>
                <td class="px-6 py-4 text-slate-400 font-sans">Health Check</td>
                <td class="px-6 py-4 text-slate-400 font-sans">Service health, DB ping, and hardware daemon check</td>
                <td class="px-6 py-4 text-right font-sans">
                  <a href="/api/v1/health" target="_blank" class="text-xs text-emerald-400 hover:underline">Ping</a>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>

    </div>
  </section>

  <!-- Footer -->
  <footer class="border-t border-slate-800/80 bg-slate-950 py-12 relative z-10 text-slate-400 text-xs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col md:flex-row items-center justify-between gap-6">
        
        <div class="flex items-center gap-3">
          <div class="w-8 h-8 rounded-lg bg-gradient-to-tr from-cyan-500 to-indigo-500 flex items-center justify-center font-bold text-white text-sm">
            ⚡
          </div>
          <div>
            <span class="font-bold text-white text-sm">IMZAMI.CORE</span>
            <p class="text-[11px] text-slate-500">Autonomous Telecom & MFS Robotic SIM Gateway Engine</p>
          </div>
        </div>

        <div class="flex flex-wrap items-center gap-6">
          <a href="#simulator" class="hover:text-cyan-400 transition">Simulator</a>
          <a href="#ecosystem" class="hover:text-cyan-400 transition">Carriers</a>
          <a href="#code-samples" class="hover:text-cyan-400 transition">SDKs</a>
          <a href="#endpoints" class="hover:text-cyan-400 transition">Endpoints</a>
          <a href="/api/v1/health" target="_blank" class="hover:text-emerald-400 transition flex items-center gap-1">
            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
            <span>Health Check</span>
          </a>
        </div>

        <div class="text-center md:text-right">
          <p>© 2026 api.imzami.com — All Rights Reserved.</p>
          <p class="text-[11px] text-slate-500 mt-0.5">Enterprise Telecom Infrastructure Built with Laravel & Hardware Automation</p>
        </div>

      </div>
    </div>
  </footer>

  <!-- Frontend JavaScript for Live Interactive Playground -->
  <script>
    // Tab switching
    function switchPlaygroundTab(tab) {
      document.getElementById('tab-content-recharge').classList.add('hidden');
      document.getElementById('tab-content-heartbeat').classList.add('hidden');
      document.getElementById('tab-content-sms').classList.add('hidden');

      document.getElementById('tab-btn-recharge').className = "px-4 py-2 rounded-xl text-xs font-medium text-slate-400 hover:text-white hover:bg-slate-800/60 transition flex items-center gap-2";
      document.getElementById('tab-btn-heartbeat').className = "px-4 py-2 rounded-xl text-xs font-medium text-slate-400 hover:text-white hover:bg-slate-800/60 transition flex items-center gap-2";
      document.getElementById('tab-btn-sms').className = "px-4 py-2 rounded-xl text-xs font-medium text-slate-400 hover:text-white hover:bg-slate-800/60 transition flex items-center gap-2";

      const activeBtnClass = "px-4 py-2 rounded-xl text-xs font-bold transition flex items-center gap-2 bg-cyan-500/20 text-cyan-300 border border-cyan-500/30";

      if (tab === 'recharge') {
        document.getElementById('tab-content-recharge').classList.remove('hidden');
        document.getElementById('tab-btn-recharge').className = activeBtnClass;
        document.getElementById('res-endpoint-label').innerText = 'POST /api/v1/recharge/create';
      } else if (tab === 'heartbeat') {
        document.getElementById('tab-content-heartbeat').classList.remove('hidden');
        document.getElementById('tab-btn-heartbeat').className = activeBtnClass;
        document.getElementById('res-endpoint-label').innerText = 'POST /irobotic/get_list';
      } else if (tab === 'sms') {
        document.getElementById('tab-content-sms').classList.remove('hidden');
        document.getElementById('tab-btn-sms').className = activeBtnClass;
        document.getElementById('res-endpoint-label').innerText = 'POST /api/v1/sms/parse';
      }
    }

    // Auto carrier detector indicator in simulator
    const simNumberInput = document.getElementById('sim-number');
    if (simNumberInput) {
      simNumberInput.addEventListener('input', function(e) {
        const val = e.target.value.replace(/\D/g, '');
        const badge = document.getElementById('detected-carrier-badge');
        if (val.startsWith('017') || val.startsWith('013')) {
          badge.innerText = 'GP (Grameenphone)';
          badge.className = 'absolute right-3 top-2.5 text-[11px] font-bold px-2 py-0.5 rounded bg-sky-500/20 text-sky-300 border border-sky-500/30';
        } else if (val.startsWith('018')) {
          badge.innerText = 'Robi Axiata';
          badge.className = 'absolute right-3 top-2.5 text-[11px] font-bold px-2 py-0.5 rounded bg-rose-500/20 text-rose-300 border border-rose-500/30';
        } else if (val.startsWith('019') || val.startsWith('014')) {
          badge.innerText = 'Banglalink';
          badge.className = 'absolute right-3 top-2.5 text-[11px] font-bold px-2 py-0.5 rounded bg-orange-500/20 text-orange-300 border border-orange-500/30';
        } else if (val.startsWith('016')) {
          badge.innerText = 'Airtel BD';
          badge.className = 'absolute right-3 top-2.5 text-[11px] font-bold px-2 py-0.5 rounded bg-red-500/20 text-red-300 border border-red-500/30';
        } else if (val.startsWith('015')) {
          badge.innerText = 'Teletalk';
          badge.className = 'absolute right-3 top-2.5 text-[11px] font-bold px-2 py-0.5 rounded bg-emerald-500/20 text-emerald-300 border border-emerald-500/30';
        } else {
          badge.innerText = 'Carrier Auto-Detect';
          badge.className = 'absolute right-3 top-2.5 text-[11px] font-bold px-2 py-0.5 rounded bg-slate-800 text-slate-400 border border-slate-700';
        }
      });
    }

    function setRechargePreset(number, amount, type) {
      document.getElementById('sim-number').value = number;
      document.getElementById('sim-amount').value = amount;
      document.getElementById('sim-type').value = type;
      simNumberInput.dispatchEvent(new Event('input'));
    }

    function setSmsPreset(sender, body) {
      document.getElementById('sms-sender').value = sender;
      document.getElementById('sms-body').value = body;
    }

    function testEndpointFromTable(tab) {
      switchPlaygroundTab(tab);
      document.getElementById('simulator').scrollIntoView({ behavior: 'smooth' });
    }

    // Run Recharge Test
    async function executeRechargeTest() {
      const number = document.getElementById('sim-number').value;
      const amount = document.getElementById('sim-amount').value;
      const type   = document.getElementById('sim-type').value;

      renderLoading('POST /api/v1/recharge/create');
      const start = performance.now();

      try {
        const response = await fetch('/api/v1/recharge/create', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
          body: JSON.stringify({ number, amount, type })
        });

        const data = await response.json();
        const duration = Math.round(performance.now() - start);
        renderResponse(data, `HTTP ${response.status} • ${duration}ms`);
      } catch (err) {
        renderResponse({ error: 'Network / Server Error', detail: err.message }, 'Failed');
      }
    }

    // Run Heartbeat Test
    async function executeHeartbeatTest() {
      const deviceid   = document.getElementById('dev-id').value;
      const balance    = document.getElementById('dev-balance').value;
      const operator   = document.getElementById('dev-operator').value;
      const deviceinfo = document.getElementById('dev-info').value;

      renderLoading('POST /irobotic/get_list');
      const start = performance.now();

      try {
        const response = await fetch('/irobotic/get_list', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
          body: JSON.stringify({ deviceid, balance, operator, deviceinfo, apps_name: 'iRobotic-Engine' })
        });

        const data = await response.json();
        const duration = Math.round(performance.now() - start);
        renderResponse(data, `HTTP ${response.status} • ${duration}ms`);
      } catch (err) {
        renderResponse({ error: 'Heartbeat error', detail: err.message }, 'Failed');
      }
    }

    // Run SMS Parser Test
    async function executeSmsTest() {
      const text = document.getElementById('sms-body').value;
      const sender = document.getElementById('sms-sender').value;

      renderLoading('POST /api/v1/sms/parse');
      const start = performance.now();

      try {
        const response = await fetch('/api/v1/sms/parse', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
          body: JSON.stringify({ text, sender })
        });

        const data = await response.json();
        const duration = Math.round(performance.now() - start);
        renderResponse(data, `HTTP ${response.status} • ${duration}ms`);
      } catch (err) {
        renderResponse({ error: 'Parser error', detail: err.message }, 'Failed');
      }
    }

    function renderLoading(endpoint) {
      document.getElementById('res-endpoint-label').innerText = endpoint;
      document.getElementById('res-time-label').innerText = 'Executing...';
      document.getElementById('json-response').innerText = '// Processing request against gateway engine...';
    }

    function renderResponse(data, statusText) {
      document.getElementById('res-time-label').innerText = statusText;
      document.getElementById('json-response').innerText = JSON.stringify(data, null, 2);
    }

    function copyResponseJson() {
      const content = document.getElementById('json-response').innerText;
      navigator.clipboard.writeText(content).then(() => {
        const timeLabel = document.getElementById('res-time-label');
        const original = timeLabel.innerText;
        timeLabel.innerText = 'Copied to Clipboard!';
        setTimeout(() => timeLabel.innerText = original, 2000);
      });
    }

    // SDK Code Switcher
    const codeSnippets = {
      curl: `curl -X POST https://api.imzami.com/api/v1/recharge/create \\
  -H "Content-Type: application/json" \\
  -d '{
    "number": "01712345678",
    "amount": 100,
    "type": "recharge"
  }'`,
      php: `<?php
use Illuminate\\Support\\Facades\\Http;

$response = Http::post('https://api.imzami.com/api/v1/recharge/create', [
    'number' => '01712345678',
    'amount' => 100,
    'type'   => 'recharge',
]);

if ($response->successful()) {
    $order = $response->json()['order'];
    echo "Order queued with ID: " . $order['request_id'];
}`,
      node: `const axios = require('axios');

async function sendRecharge() {
  const response = await axios.post('https://api.imzami.com/api/v1/recharge/create', {
    number: '01712345678',
    amount: 100,
    type: 'recharge'
  });

  console.log('Recharge Status:', response.data.status);
  console.log('Assigned Carrier:', response.data.carrier.name);
}

sendRecharge();`,
      python: `import requests

url = "https://api.imzami.com/api/v1/recharge/create"
payload = {
    "number": "01712345678",
    "amount": 100,
    "type": "recharge"
}

response = requests.post(url, json=payload)
data = response.json()

print(f"Request ID: {data['request_id']}")
print(f"Carrier: {data['carrier']['name']}")`
    };

    function switchCodeLang(lang) {
      const tabs = ['curl', 'php', 'node', 'python'];
      tabs.forEach(t => {
        const btn = document.getElementById('code-tab-' + t);
        if (t === lang) {
          btn.className = "px-3 py-1.5 rounded-lg text-xs font-bold bg-cyan-500/20 text-cyan-300 border border-cyan-500/30";
        } else {
          btn.className = "px-3 py-1.5 rounded-lg text-xs font-medium text-slate-400 hover:text-white";
        }
      });
      document.getElementById('snippet-code').innerText = codeSnippets[lang];
    }

    function copySnippetCode() {
      const code = document.getElementById('snippet-code').innerText;
      navigator.clipboard.writeText(code).then(() => {
        const label = document.getElementById('copy-snippet-text');
        label.innerText = 'Copied!';
        setTimeout(() => label.innerText = 'Copy Code', 2000);
      });
    }

    // Fetch initial stats if available
    window.addEventListener('DOMContentLoaded', async () => {
      try {
        const res = await fetch('/api/v1/stats');
        const data = await res.json();
        if (data && data.stats) {
          if (data.stats.total_amount_bdt) {
            document.getElementById('stat-total-vol').innerText = '৳' + (data.stats.total_amount_bdt / 1000000).toFixed(1) + 'M+';
          }
          if (data.stats.success_rate) {
            document.getElementById('stat-success-rate').innerText = data.stats.success_rate + '%';
          }
        }
      } catch (e) {
        // Fallback gracefully to default numbers
      }
    });
  </script>
</body>
</html>
