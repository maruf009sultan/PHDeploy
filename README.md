<img src="https://raw.githubusercontent.com/maruf009sultan/phphost/main/.github/assets/banner.png" alt="PHDeploy Hero Banner" style="width:100%;max-width:900px;display:block;margin:auto;"/>

<h1 align="center">🚀 PHDeploy: Deploy PHP Instantly to Vercel & Render 🚀</h1>
<p align="center">
  <b>The EASIEST way to launch PHP projects to the cloud — no config headaches, just click and go!</b>
</p>
<p align="center">
  <a href="https://github.com/maruf009sultan/phphost/stargazers"><img src="https://img.shields.io/github/stars/maruf009sultan/phphost.svg?style=flat&color=yellow" alt="Stars"></a>
  <a href="https://vercel.com/"><img src="https://img.shields.io/badge/vercel-ready-brightgreen?logo=vercel" alt="Vercel"></a>
  <a href="https://render.com/"><img src="https://img.shields.io/badge/render-docker-blue?logo=docker" alt="Render"></a>
  <img src="https://img.shields.io/badge/php-8.2-blue?logo=php" alt="PHP">
</p>

---

## 🎉 What is PHDeploy?

**PHDeploy** is your all-in-one solution to deploy PHP sites instantly to [Vercel](https://vercel.com/) and [Render](https://render.com/) — even if they only officially support Node.js!  
It handles the quirks for you:

- **Vercel**: Deploy PHP using serverless `/api` endpoints and a simple config file.
- **Render**: Use a ready-to-go Dockerfile for full PHP stack deployments.

**No more fighting with settings or manual uploads!**  
Just push your code, connect your repo, and watch your PHP app go live.

---

## 🦄 Features

- ⚡ **One Click Deploy**: Vercel & Render support out of the box.
- 🐘 **Modern PHP**: Uses PHP 8.2+ for maximum compatibility.
- 🗂️ **/api Power**: For Vercel, just drop your PHP files into `/api`!
- 🐳 **Dockerfile for Render**: Zero config needed — works instantly.
- 📦 **Web-based Archive Manager**: Upload, unzip, and zip files right in your browser.
- 📊 **Resource Monitor**: See RAM/Disk usage with a pretty UI.
- 🔒 **Self-contained**: No external dependencies.
- 💛 **Open Source & Free**: MIT Licensed.

---

## 🚀 Quick Start

### 🌩️ Deploy to Vercel

1. **Fork or clone this repo.**
2. **Drop your PHP files in `/api`.**
3. **(Optional) Edit `vercel.json`** if needed.
4. **Push to GitHub.**
5. [![Deploy to Vercel](https://vercel.com/button)](https://vercel.com/import/project?template=https://github.com/maruf009sultan/phphost)
6. **Done!** Visit your Vercel URL and see your PHP site in action.

#### ⚠️ Vercel Limitations & Power
Vercel uses a **serverless** architecture for PHP (and all other backends except Node.js), which means:

- Each `/api/*.php` file is run in a stateless, short-lived serverless function.
- There are **cold starts** — the first request is slower.
- **No persistent file storage**: You can't write to disk or keep files between requests.
- **Limited execution time**: Functions will be killed after a certain time (10s for Hobby, 60s for Pro).
- **Limited memory/CPU**: For heavy-duty PHP or long-running scripts, use Render!
- **No background jobs, sockets, or cron jobs**.

**Vercel is perfect for:**
- Simple APIs, forms, contact pages, webhooks, and light websites.
- Demos, prototypes, and instant deployments with almost zero config.

**Not good for:**
- Anything that needs file uploads, persistent storage, long scripts, or background processing.

---

### 🐳 Deploy to Render

1. **Fork or clone this repo.**
2. **Push to GitHub.**
3. **Go to [Render](https://render.com/), click "New Web Service", connect your repo.**
4. **Render detects the included `Dockerfile` and sets up PHP Apache for you.**
5. **Done!** Full power, real server, persistent storage.

**Render is better for:**
- Full-featured traditional PHP apps (WordPress, Laravel, file uploads, etc.)
- Apps needing persistent storage, background jobs, or cron.
- Custom PHP extensions, Composer, or anything you’d do on VPS.

---

## 🧰 Built-in Tools

### 📦 Archive Unzipper/Zipper (`/api/uz.php`)
Upload `.zip`, `.rar`, `.gz` files and extract them, or zip up folders for download — right from your browser!  
Perfect for importing/exporting site contents or assets instantly.

<img src="https://raw.githubusercontent.com/maruf009sultan/phphost/main/.github/assets/unzipper.png" width="600">

---

### 📊 System Resource Monitor (`/api/index.php` or `/index.php`)
Get real-time RAM and disk stats in a clean dashboard.  
Great for checking your Render server health!

---

## 📂 Project Structure

```
/
├── /api/           # PHP endpoints for Vercel (put your PHP scripts here)
│   ├── uz.php      # Archive upload/unzip/zip tool
│   └── index.php   # System resource monitor
├── Dockerfile      # Magic for Render.com deployment
├── vercel.json     # Vercel config (if needed)
└── ...
```

---

## 🛠️ Customizing

- **PHP Version**: Edit the `Dockerfile` if you need another PHP version.
- **Vercel Routes**: Tweak `vercel.json` for custom routing or rewrites.
- **More Tools**: Add your own PHP scripts into `/api` — they become endpoints!

---

## ❤️ Why PHDeploy?

- No other repo makes deploying a PHP site to Vercel or Render *this* easy.
- No more uploading/extracting files by hand — use the built-in web tools!
- Zero lock-in, zero cost, zero learning curve.

---

## 🌟 Show Some Love!

If you found this helpful, **please star this repo**!  
It helps others discover PHDeploy and motivates future updates.

<p align="center">
  <a href="https://github.com/maruf009sultan/phphost/stargazers">
    <img src="https://img.shields.io/github/stars/maruf009sultan/phphost.svg?style=for-the-badge&color=ffdf5d">
    <br>
    <b>⭐ Star on GitHub ⭐</b>
  </a>
</p>

---

## 🤝 Contributing

PRs, issues, and feedback are welcome! Open an issue or submit a pull request.

---

## 📜 License

MIT

---

<details>
<summary><b>FAQ</b></summary>

**Q: Can I use this for any PHP project?**  
A: Yes! Just copy your PHP scripts into `/api` for Vercel, or anywhere for Render.

**Q: Does it support Composer or frameworks?**  
A: For complex setups, use the Dockerfile and deploy to Render for best results.

**Q: Is it secure?**  
A: This is a starter/project template. Secure your endpoints before going to production.

**Q: How do I upload files on Vercel?**  
A: Vercel doesn’t support persistent file storage. Use Render for file uploads or anything that needs to save files.

**Q: Can I use PHP sessions or cookies?**  
A: Yes, but remember: serverless functions on Vercel are stateless. Store session data externally if you need persistence.

**Q: Can I use a database?**  
A: Yes! Both Vercel and Render work great with remote DBs like MySQL, PostgreSQL, or SQLite (on Render).

**Q: How do I add more endpoints?**  
A: Just add more `.php` files to `/api` (for Vercel) or anywhere (for Render). That’s it!

</details>

---

> **Made with 💜 by [maruf009sultan](https://github.com/maruf009sultan)**
