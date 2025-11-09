# 🧩 お問い合わせフォームアプリ

Laravel 8 / Docker / PHP / Nginx / Fortify / FormRequest を使用したお問い合わせ管理システムです。

---

## 🚀 環境構成

| 項目 | バージョン・内容 |
|------|------------------|
| Laravel | 8.x |
| PHP | 8.1 |
| Nginx | latest |
| DB | MySQL 8.x |
| 認証 | Laravel Fortify |
| バリデーション | FormRequest |
| コンテナ管理 | Docker / docker-compose |

---

## ⚙️ セットアップ手順

```bash
# コンテナ起動
docker-compose up -d --build

# 依存パッケージインストール
composer install

# 環境設定ファイル作成
cp .env.example .env

# アプリキー生成
php artisan key:generate

# マイグレーション & ダミーデータ投入
php artisan migrate:fresh --seed

# npmビルド（必要に応じて）
npm install && npm run dev
