# ZS Theme

A clean, modern WordPress block theme with JetBrains Mono typography, dark mode, and a developer-friendly aesthetic. Built for Full Site Editing (FSE).

一个简洁现代的 WordPress 全站编辑区块主题，采用 JetBrains Mono 字体，支持深色模式，面向开发者风格设计。

---

[English](#english) | [中文](#中文)

---

<a id="english"></a>

## Features

- **Full Site Editing** — 8 templates, 4 template parts, 9 block patterns, 2 custom page templates
- **JetBrains Mono** — Developer-favorite monospace font loaded via `fontFace` (400/500/700 weights)
- **Dark / Light Mode** — Toggle with localStorage persistence, flash-of-wrong-theme prevention, and smooth CSS transitions
- **4 Post List Layouts** — Card (default), Grid (2-column), Compact, and Image-Top, switchable from the admin settings page
- **Keyboard Search** — Press `Ctrl+K` / `⌘K` to open a full-screen search modal with backdrop blur
- **Terminal-style Navigation** — Inner pages show a configurable label like `> $ cd /home/` with the site logo
- **Live Widgets** — Real-time clock and site running-time counter (ticking every second)
- **Admin Settings Page** — 11 configurable options with a fully Chinese UI
- **16-color Palette** — With 7 gradients, 7 shadow presets, and a complete dark style variation
- **Responsive Design** — Mobile-first with full-screen navigation overlay, stacked sidebar, and adaptive typography
- **Zero Plugin Dependencies** — File-based visit counter, built-in shortcodes, no external requirements

## Requirements

| Requirement | Version |
|---|---|
| WordPress | 6.4+ |
| PHP | 7.4+ |
| Tested up to | 6.7 |

## Installation

1. Download or clone this repository
2. Upload the `zs-theme` folder to `wp-content/themes/`
3. Activate the theme in **Appearance → Themes**
4. Configure settings in **Appearance → ZS 主题**

```bash
cd wp-content/themes/
git clone https://github.com/your-username/zs-theme.git
```

## Theme Structure

```
zs-theme/
├── assets/
│   └── js/
│       └── theme.js          # Dark mode, search modal, clock, running time
├── parts/
│   ├── header.html            # Sticky header with frosted glass effect
│   ├── footer.html            # Footer template part
│   ├── sidebar.html           # Sidebar template part
│   └── comments.html          # Comments section
├── patterns/
│   ├── hero.php               # Hero banner
│   ├── call-to-action.php     # CTA section
│   ├── features.php           # Features grid
│   ├── post-list-card.php     # Card layout (default)
│   ├── post-list-grid.php     # 2-column grid layout
│   ├── post-list-compact.php  # Compact list layout
│   ├── post-list-image-left.php # Image-top layout
│   ├── sidebar-content.php    # Avatar, posts, categories, tags, ads, links
│   └── footer-stats.php       # Visit stats, running time, copyright
├── styles/
│   └── dark.json              # Dark style variation for Site Editor
├── templates/
│   ├── index.html             # Main template
│   ├── single.html            # Single post
│   ├── page.html              # Page
│   ├── page-no-title.html     # Page without title
│   ├── page-wide.html         # Wide page
│   ├── archive.html           # Archive/category/tag
│   ├── search.html            # Search results
│   └── 404.html               # Not found
├── functions.php              # Settings, shortcodes, dark mode, counters
├── style.css                  # All styles (~930 lines)
├── theme.json                 # Theme configuration (v3, schema 6.7)
└── screenshot.png
```

## Admin Settings

Navigate to **Appearance → ZS 主题** to configure:

| Setting | Description | Default |
|---|---|---|
| Dark/Light Toggle | Show theme toggle button in header | On |
| Search Box | Show search trigger with Ctrl+K shortcut | On |
| Real-time Clock | Show live clock in footer | On |
| Running Time | Show live site uptime counter | On |
| Post Layout | Card / Grid / Compact / Image-Top | Card |
| Install Date | Date for calculating site uptime | Auto |
| Avatar URL | Sidebar avatar image | Placeholder |
| Blogger Name | Sidebar display name | ZS |
| Ad Image | Sidebar ad space image URL | — |
| Ad Link | Ad click-through URL | — |
| Inner Page Label | Terminal-style nav text for inner pages | `> $ cd /home/` |

## Shortcodes

| Shortcode | Output |
|---|---|
| `[zs_visit_count]` | Total site visits |
| `[zs_running_days]` | Days since installation |
| `[zs_total_posts]` | Published post count |
| `[zs_current_year]` | Current year |
| `[zs_running_time]` | Live uptime (X天X时X分X秒) |
| `[zs_clock]` | Real-time clock |
| `[zs_ad_image]` | Sidebar ad image |

## Dark Mode

The theme implements dark mode at three levels:

1. **CSS Custom Properties** — `.zs-dark` class on `<html>` overrides all 16 color variables
2. **Flash Prevention** — Inline `<head>` script reads `localStorage` before first paint
3. **Style Variation** — `styles/dark.json` provides a native dark option in the Site Editor

## Typography

JetBrains Mono is the default font for both body text and headings, giving the entire site a developer/terminal aesthetic. The theme uses a compact fluid type scale:

| Token | Size |
|---|---|
| x-small | 0.75rem |
| small | 0.8125rem |
| medium | 0.9375rem |
| large | 1.0625rem |
| x-large | 1.25rem |
| xx-large | 1.625rem |
| xxx-large | 2rem |

## License

GPL v2 or later. See [LICENSE](https://www.gnu.org/licenses/gpl-2.0.html).

---

<a id="中文"></a>

## 功能特性

- **全站编辑 (FSE)** — 8 个模板、4 个模板部件、9 个区块模式、2 个自定义页面模板
- **JetBrains Mono 字体** — 通过 `fontFace` 加载开发者最爱的等宽字体（400/500/700 三种字重）
- **深色 / 浅色模式** — 支持 localStorage 持久化、防闪烁、平滑 CSS 过渡动画
- **4 种文章列表布局** — 卡片（默认）、网格（双列）、紧凑、图片在上，可在后台一键切换
- **键盘搜索** — 按 `Ctrl+K` / `⌘K` 唤起全屏搜索框，支持背景模糊效果
- **终端风格导航** — 内页导航显示可配置的终端标签（如 `> $ cd /home/`），带站点 Logo
- **实时小工具** — 实时时钟和网站运行时间计数器（每秒刷新）
- **后台设置页面** — 11 项可配置选项，全中文界面
- **16 色调色板** — 含 7 组渐变、7 组阴影预设，以及完整的深色风格变体
- **响应式设计** — 移动端全屏导航覆盖层、侧边栏自动堆叠、自适应字体
- **零插件依赖** — 基于文件的访问计数器、内置短代码，无需额外插件

## 系统要求

| 要求 | 版本 |
|---|---|
| WordPress | 6.4+ |
| PHP | 7.4+ |
| 已测试至 | 6.7 |

## 安装方法

1. 下载或克隆本仓库
2. 将 `zs-theme` 文件夹上传至 `wp-content/themes/`
3. 在 **外观 → 主题** 中激活主题
4. 在 **外观 → ZS 主题** 中配置设置

```bash
cd wp-content/themes/
git clone https://github.com/your-username/zs-theme.git
```

## 后台设置

进入 **外观 → ZS 主题** 进行配置：

| 设置项 | 说明 | 默认值 |
|---|---|---|
| 深色/浅色切换 | 在顶部导航显示主题切换按钮 | 开启 |
| 搜索框 | 显示搜索触发按钮（Ctrl+K 快捷键） | 开启 |
| 实时时钟 | 在页脚显示实时时钟 | 开启 |
| 运行时间 | 显示网站实时运行时间 | 开启 |
| 文章布局 | 卡片 / 网格 / 紧凑 / 图片在上 | 卡片 |
| 网站创建日期 | 用于计算运行天数 | 自动 |
| 博主头像 | 侧边栏头像图片地址 | 占位图 |
| 博主名称 | 侧边栏显示的博主名称 | ZS |
| 广告图片 | 侧边栏广告位图片地址 | — |
| 广告链接 | 广告点击跳转链接 | — |
| 内页导航标签 | 非首页时导航栏的终端风格文字 | `> $ cd /home/` |

## 短代码

| 短代码 | 输出 |
|---|---|
| `[zs_visit_count]` | 网站总访问量 |
| `[zs_running_days]` | 建站天数 |
| `[zs_total_posts]` | 已发布文章数 |
| `[zs_current_year]` | 当前年份 |
| `[zs_running_time]` | 实时运行时间（X天X时X分X秒） |
| `[zs_clock]` | 实时时钟 |
| `[zs_ad_image]` | 侧边栏广告图片 |

## 深色模式

主题在三个层面实现深色模式：

1. **CSS 自定义属性** — 通过 `<html>` 上的 `.zs-dark` 类覆盖全部 16 个颜色变量
2. **防闪烁** — `<head>` 中的内联脚本在首次绘制前读取 `localStorage`
3. **风格变体** — `styles/dark.json` 为站点编辑器提供原生深色选项

## 字体排版

JetBrains Mono 作为正文和标题的默认字体，赋予整个网站开发者 / 终端风格的美感。主题采用紧凑的流式字号体系：

| 标记 | 大小 |
|---|---|
| x-small | 0.75rem |
| small | 0.8125rem |
| medium | 0.9375rem |
| large | 1.0625rem |
| x-large | 1.25rem |
| xx-large | 1.625rem |
| xxx-large | 2rem |

## 开源协议

GPL v2 或更高版本。详见 [LICENSE](https://www.gnu.org/licenses/gpl-2.0.html)。