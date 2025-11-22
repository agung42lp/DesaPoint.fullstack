# 🏘️ DesaPoint

Sistem informasi pengelolaan data desa berbasis web dengan teknologi modern.

![Live Demo](https://img.shields.io/badge/demo-desapoint.my.id-green)
![Laravel](https://img.shields.io/badge/Laravel-12-red)
![Vue](https://img.shields.io/badge/Vue.js-3-green)

## 🚀 Tech Stack

- **Backend:** Laravel 12, Sanctum API
- **Frontend:** Vue 3, Inertia.js
- **Styling:** Tailwind CSS
- **Build Tool:** Vite
- **Database:** MySQL

## 📋 Prerequisites

- PHP 8.2+
- Composer
- Node.js 18+
- MySQL 8.0+

## 🔧 Installation

1. **Clone repository**
```bash
git clone https://github.com/agung42lp/DesaPoint.fullstack.git
cd DesaPoint.fullstack
```

2. **Install dependencies**
```bash
composer install
npm install
```

3. **Setup environment**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Configure database** di `.env`
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=desapoint
DB_USERNAME=root
DB_PASSWORD=
```

5. **Run migration**
```bash
php artisan migrate
```

6. **Build assets**
```bash
npm run build
```

7. **Start development server**
```bash
php artisan serve
npm run dev
```

Akses: `http://localhost:8000`

## 📦 Production Deployment

1. Build production assets:
```bash
npm run build
```

2. Optimize Laravel:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

3. Set `.env`:
```env
APP_ENV=production
APP_DEBUG=false
```

## 🌐 Live Demo

[https://desapoint.my.id](https://desapoint.my.id)

## 📝 License

MIT License

## 👤 Author

**Agung**
- GitHub: [@agung42lp](https://github.com/agung42lp)

## 🤝 Contributing

Pull requests are welcome!

---

⭐ Star this repo if you find it helpful!
