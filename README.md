# IMZAMI Core — Autonomous Telecom & MFS Robotic SIM Gateway Engine

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 12" />
  <img src="https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.2+" />
  <img src="https://img.shields.io/badge/Hardware-Android_SIM_Pool-3DDC84?style=for-the-badge&logo=android&logoColor=white" alt="Android SIM Pool" />
  <img src="https://img.shields.io/badge/Carriers-GP_|_Robi_|_BL_|_Airtel_|_Teletalk-06b6d4?style=for-the-badge" alt="Carriers" />
  <img src="https://img.shields.io/badge/MFS-bKash_|_Nagad_|_Rocket_|_Upay-e2136e?style=for-the-badge" alt="MFS" />
  <img src="https://img.shields.io/badge/License-MIT-blue?style=for-the-badge" alt="License" />
</p>

---

## 🚀 Overview

**IMZAMI Core** is an enterprise-grade, high-throughput **Autonomous Robotic SIM Gateway & Carrier Automation Engine**. It bridges standard cloud REST APIs directly with physical Android multi-SIM hardware nodes (`iRobotic` agent app), enabling zero-delay mobile recharge (Flexiload / Easyload), automated USSD dialing, SMS balance polling, and Mobile Financial Service (MFS) automation for **bKash, Nagad, Rocket, and Upay**.

Designed for fintech platforms, top-up aggregators, and enterprise software vendors requiring sub-3-second transaction turnaround with 99.98% delivery reliability.

---

## 🏗️ High-Level System Architecture

```
                                  ┌────────────────────────┐
                                  │ External Merchant Apps │
                                  │ & E-Commerce Checkouts │
                                  └───────────┬────────────┘
                                              │ REST API (JSON)
                                              ▼
                        ╔══════════════════════════════════════════╗
                        ║           IMZAMI CORE GATEWAY            ║
                        ║ ──────────────────────────────────────── ║
                        ║  • Carrier Prefix Auto-Detector          ║
                        ║  • Intelligent SIM Load Balancer         ║
                        ║  • Dual-SIM Hardware Task Dispatcher     ║
                        ║  • Regex SMS Intelligence Engine         ║
                        ║  • Real-Time Telemetry & Health Monitor  ║
                        ╚══════════════════════════════════════════╝
                                              ▲
                                              │ HTTP Protocol
                                              │ (Bypasses CSRF)
                                              ▼
                        ╔══════════════════════════════════════════╗
                        ║     PHYSICAL ANDROID SIM FLEET POOL      ║
                        ║           (iRobotic Android App)         ║
                        ║ ──────────────────────────────────────── ║
                        ║  Device 1: GP & Robi SIMs                ║
                        ║  Device 2: Banglalink & Airtel SIMs      ║
                        ║  Device 3: Teletalk & bKash Agent SIMs   ║
                        ╚══════════════════════════════════════════╝
                                              │
                              ┌───────────────┴───────────────┐
                              │ Automated USSD Dialing & App  │
                              │ Accessibility Automation      │
                              ▼                               ▼
                     ┌──────────────────┐           ┌──────────────────┐
                     │ Telecom Networks │           │  MFS Providers   │
                     │ GP, Robi, BL, TT │           │ bKash, Nagad, DBBL│
                     └──────────────────┘           └──────────────────┘
```

---

## 🌟 Key Features

### 1. 🤖 Hardware Robotic SIM Gateway Protocol
- **Autonomous Heartbeat (`/irobotic/get_list`)**: Android hardware nodes poll the core engine, report live SIM battery/operator states, and pull pending tasks.
- **Instant Status Acknowledgment (`/irobotic/make_update/{id}`)**: Android devices report transaction execution outcomes, USSD response strings, transaction IDs, and updated SIM balances.
- **Direct Carrier SMS Feed (`/irobotic/smsin`)**: Immediate relay of carrier confirmation and OTP SMS messages straight into the database.

### 2. ⚡ Intelligent Unified Merchant API (v1)
- **Zero-Config Carrier Auto-Detection**: Number prefixes (`017`, `013` ➔ GP; `018` ➔ Robi; `019`, `014` ➔ Banglalink; `016` ➔ Airtel; `015` ➔ Teletalk) are automatically detected.
- **Smart Device Load Balancing**: Orders are auto-routed to active hardware nodes matching the target telecom operator with the highest available SIM balance.
- **Real-Time Order Tracking (`/api/v1/recharge/{id}`)**: Check progress (`pending`, `processing`, `success`, `failed`), TrxID, and assigned hardware device.

### 3. 🔍 AI/Regex SMS Intelligence & OTP Extraction Engine
- **bKash Parser**: Extracts TrxID, Cash In / Cash Out / Send Money amounts, carrier fees, remaining balance, and customer phone numbers.
- **Nagad & Rocket Parser**: Extracts TxnID, amount, remaining balance, and sender details.
- **Telecom Flexiload Parser**: Extracts operator reference number, top-up amount, and updated SIM float.
- **Automated OTP Interception**: Extracts 4-to-8 digit verification codes from verification messages with sub-second regex evaluation.

### 4. 📊 Fleet Management & Telemetry
- **Device Fleet Monitor (`/api/v1/devices`)**: Real-time heartbeat detection (Online if active within last 5 minutes, Offline otherwise).
- **System Telemetry (`/api/v1/stats`)**: Processed transaction volume (BDT), delivery success rate %, queue latency, and carrier distribution.
- **System Health Monitor (`/api/v1/health`)**: Instant database and gateway component connectivity check.

### 5. 💎 Ultra-Modern Frontend & Interactive API Simulator
- **High-End Dark Fintech UI**: Ambient glow mesh, glassmorphism cards, and responsive modern typography (`Outfit` & `Plus Jakarta Sans`).
- **Interactive Live Simulator & Playground**:
  - Test real recharge creation in browser with auto-detected carrier badges.
  - Simulate hardware device heartbeat and pending task polling.
  - Simulate incoming SMS and inspect live regex-parsed data.
  - Interactive JSON response viewer with 1-click clipboard copy.
- **Multi-Language SDK Quick-Start**: Copy-ready code snippets in **cURL**, **PHP (Laravel/Guzzle)**, **Node.js (Axios)**, and **Python (Requests)**.

---

## 📡 Complete API Reference

### Base URL
```
http://your-domain.com
```

### 1. Submit Mobile Recharge / MFS Cash Order
Creates a new top-up or MFS transaction task. Carrier is auto-detected if not explicitly specified.

- **Method**: `POST`
- **Endpoint**: `/api/v1/recharge/create`
- **Headers**: `Content-Type: application/json`, `Accept: application/json`

#### Request Body
```json
{
  "number": "01712345678",
  "amount": 100,
  "type": "recharge",
  "telco": "GP"
}
```

| Parameter | Type | Required | Description |
|---|---|---|---|
| `number` | string | **Yes** | 11-digit Bangladeshi mobile number (`017...`, `018...`, etc.) |
| `amount` | numeric | **Yes** | Transaction amount in BDT (Minimum 10 BDT) |
| `type` | string | No | `recharge` (default), `postpaid`, `skitto`, `cash_in`, `cash_out` |
| `telco` | string | No | Carrier override (`GP`, `Robi`, `Banglalink`, `Airtel`, `Teletalk`). Auto-detected if omitted. |
| `device_id` | string/int | No | Specific hardware device ID. Auto-assigned if omitted. |

#### Response (`201 Created`)
```json
{
  "status": "success",
  "message": "Recharge order queued successfully",
  "request_id": "REQ-68C198A2B",
  "carrier": {
    "code": "GP",
    "name": "Grameenphone",
    "ussd": "*566#",
    "color": "#00a3e0",
    "type": "Telecom"
  },
  "order": {
    "id": 142,
    "request_id": "REQ-68C198A2B",
    "number": "01712345678",
    "telco": "GP",
    "amount": 100.00,
    "type": "recharge",
    "status": "pending",
    "assigned_device": {
      "id": 1,
      "device_id": "ROBOT-SIM-01"
    },
    "created_at": "2026-09-16T03:00:00+06:00"
  }
}
```

---

### 2. Check Order Status
Queries order execution status, transaction ID, and timestamp.

- **Method**: `GET`
- **Endpoint**: `/api/v1/recharge/{id}` (Accepts internal `id`, `request_id`, or `transaction_id`)

#### Response (`200 OK`)
```json
{
  "status": "success",
  "data": {
    "id": 142,
    "request_id": "REQ-68C198A2B",
    "number": "01712345678",
    "telco": "GP",
    "amount": 100.00,
    "type": "recharge",
    "status": "success",
    "transaction_id": "GPF88319201",
    "device": {
      "device_id": "ROBOT-SIM-01",
      "sim_numbers": "01700000000"
    },
    "created_at": "2026-09-16T03:00:00+06:00",
    "updated_at": "2026-09-16T03:00:03+06:00"
  }
}
```

---

### 3. iRobotic Device Heartbeat & Task Pull
Used by the Android client to transmit device health, SIM numbers, and fetch the next pending task.

- **Method**: `POST`
- **Endpoint**: `/irobotic/get_list`

#### Request Body
```json
{
  "deviceid": "ROBOT-ANDROID-01",
  "deviceinfo": "Samsung Galaxy A14, Android 13, Battery 95%",
  "sim_number": "01711223344",
  "operator": "GP",
  "telco": "GP",
  "apps_name": "iRobotic Automation",
  "types1": "Prepaid",
  "types2": "Cash",
  "balance": "4850.50"
}
```

#### Response When Task Available (`200 OK`)
```json
{
  "status": "success",
  "data": {
    "id": 142,
    "telco": "GP",
    "number": "01712345678",
    "amount": 100.00,
    "type": "recharge"
  },
  "device_info": {
    "id": 1,
    "device_id": "ROBOT-ANDROID-01"
  }
}
```

#### Response When Idle (`200 OK`)
```json
{
  "status": "idle",
  "message": "No pending task found"
}
```

---

### 4. iRobotic Task Completion Update
Android device reports execution result, USSD response, and remaining balance.

- **Method**: `POST`
- **Endpoint**: `/irobotic/make_update/{service_id}`

#### Request Body
```json
{
  "device_id": "ROBOT-ANDROID-01",
  "transaction_id": "TRX99281902",
  "request_id": "REQ-68C198A2B",
  "service_status": "success",
  "balance": "4750.50"
}
```

---

### 5. iRobotic Inbound Carrier SMS Feed
Hardware device relays received SMS into the gateway for automatic parsing.

- **Method**: `POST`
- **Endpoint**: `/irobotic/smsin`

#### Request Body
```json
{
  "operator": "bKash",
  "text": "You have received Cash In of Tk 1,500.00 from 01755123456. Fee Tk 0.00. Balance Tk 14,250.75. TrxID 9K48X7P2Q1 at 16/09/2026 03:00",
  "sender": "bKash",
  "simid": "SIM1",
  "deviceid": "ROBOT-ANDROID-01",
  "simslot": 1
}
```

---

### 6. Direct SMS & OTP Parser Tester
Tests SMS parsing without storing records into the database.

- **Method**: `POST`
- **Endpoint**: `/api/v1/sms/parse`

#### Request Body
```json
{
  "sender": "bKash",
  "text": "You have received Cash In of Tk 1,500.00 from 01755123456. Fee Tk 0.00. Balance Tk 14,250.75. TrxID 9K48X7P2Q1 at 16/09/2026 03:00"
}
```

#### Response (`200 OK`)
```json
{
  "status": "success",
  "sender": "bKash",
  "parsed": {
    "provider": "bKash",
    "type": "cash_in",
    "trx_id": "9K48X7P2Q1",
    "amount": 1500.0,
    "fee": 0.0,
    "balance": 14250.75,
    "sender_number": "01755123456",
    "receiver_number": null,
    "otp": null,
    "is_financial": true
  }
}
```

---

### 7. Device Fleet Telemetry
Lists connected hardware SIM devices and their real-time status.

- **Method**: `GET`
- **Endpoint**: `/api/v1/devices`

---

### 8. System Stats & Health Check
- **Telemetry**: `GET /api/v1/stats`
- **Health Check**: `GET /api/v1/health`

---

## 💻 Developer Code Integration

### cURL
```bash
curl -X POST https://api.imzami.com/api/v1/recharge/create \
  -H "Content-Type: application/json" \
  -d '{
    "number": "01712345678",
    "amount": 100,
    "type": "recharge"
  }'
```

### PHP / Laravel (Guzzle / Http Facade)
```php
use Illuminate\Support\Facades\Http;

$response = Http::post('https://api.imzami.com/api/v1/recharge/create', [
    'number' => '01712345678',
    'amount' => 100,
    'type'   => 'recharge',
]);

if ($response->successful()) {
    $order = $response->json()['order'];
    echo "Queued order: " . $order['request_id'];
}
```

### Python
```python
import requests

url = "https://api.imzami.com/api/v1/recharge/create"
payload = {
    "number": "01712345678",
    "amount": 100,
    "type": "recharge"
}

response = requests.post(url, json=payload)
data = response.json()
print("Order Status:", data['status'])
```

### Node.js (Axios)
```javascript
const axios = require('axios');

async function createRecharge() {
  const res = await axios.post('https://api.imzami.com/api/v1/recharge/create', {
    number: '01712345678',
    amount: 100,
    type: 'recharge'
  });
  console.log('Order Details:', res.data.order);
}
createRecharge();
```

---

## 🛠️ Installation & Setup

### Prerequisites
- PHP 8.2 or higher (with `bcmath`, `curl`, `mbstring`, `pdo_mysql` or `pdo_sqlite`)
- Composer 2.x
- MySQL 8.x, MariaDB, or SQLite
- Node.js 18+ (optional, for asset bundling)

### 1. Clone & Install Dependencies
```bash
git clone https://github.com/imzami/core.git
cd core
composer install
```

### 2. Environment Configuration
```bash
cp .env.example .env
php artisan key:generate
```

Configure your database settings in `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=imzami
DB_USERNAME=root
DB_PASSWORD=your_password
```
*(Or use `DB_CONNECTION=sqlite` for lightweight deployment)*

### 3. Run Migrations
```bash
php artisan migrate
```

### 4. Start Development Server
```bash
php artisan serve
```
Open your browser at `http://localhost:8000` to interact with the **Live API Simulator and Developer Console**.

---

## 🔒 Security & CSRF Architecture

- **Hardware Bypass**: `/irobotic/*` and `/api/*` endpoints are registered with CSRF verification exemptions in `bootstrap/app.php` to prevent HTTP 419 token expiration errors on native Android apps and server-to-server HTTP clients.
- **Input Validation**: Strict input normalization on recipient phone numbers, preventing injection attacks.
- **Failover Safe**: Automated fallback virtual device simulation protects against database unavailability during live testing.

---

## 📄 License

The IMZAMI Core gateway framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

## 🤝 Let's Build Something Exceptional

I'm actively open to: **Remote Senior Full-Stack Roles** · **Freelance Contracts** · **Technical Partnerships** · **Long-Term Collaborations** in **Laravel** · **WordPress** · **React/Next.js** · **AI-powered Platforms** · **Security Audits** · **SaaS Architecture**

- 📍 **Timezone**: UTC+6 (Dhaka/Rangpur) — flexible overlap for US, EU & Asia
- ⚡ **Available**: Immediately · Production-first · Fast delivery · Transparent communication

| Platform | Link |
|---|---|
| 🌐 **Portfolio** | [imrandev.bd](https://imrandev.bd/) |
| 💼 **LinkedIn** | [linkedin.com/in/imranbru99](https://www.linkedin.com/in/imranbru99/) |
| 🐙 **GitHub** | [github.com/imranbru99](https://github.com/imranbru99) |
| 🐦 **X / Twitter** | [@imrandev_bd](https://x.com/imrandev_bd) |
| 📺 **YouTube** | [@ImranDevBD](https://www.youtube.com/@ImranDevBD) |
| 📸 **Instagram** | [@imranbru99](https://www.instagram.com/imranbru99/) |
| 📘 **Facebook** | [ExpertImranDev](https://www.facebook.com/ExpertImranDev/) |
| 🎵 **TikTok** | [@imrandev_bd](https://www.tiktok.com/@imrandev_bd) |
| 🧵 **Threads** | [@imranbru99](https://www.threads.com/@imranbru99) |
| 📌 **Pinterest** | [@imrandev_bd](https://www.pinterest.com/imrandev_bd/) |
| 💬 **WhatsApp** | [+880 1576-918420](http://wa.me/+8801576918420) |
| 📧 **Email** | [me@imrandev.bd](mailto:me@imrandev.bd) |
| 🔗 **All Links** | [linktr.ee/ExpertImranDev](https://linktr.ee/ExpertImranDev) |

> *"Security isn't an add-on — it's the foundation. Scale, speed, and trust drive every line of code I write."*  
> — **Imran Ahmed**

