# インターン課題環境構築手順

## Dockerの基本知識
Dockerの基本的な概念については、以下のリンクを参考にしてください：
- [Docker入門（1）](https://qiita.com/Sicut_study/items/4f301d000ecee98e78c9)
- [Docker入門（2）](https://qiita.com/takusan64/items/4d622ce1858c426719c7)

## セットアップ手順

手順3からは `docker` ディレクトリで実行します。

1. **リポジトリをクローン**
   ```bash
   git clone <リポジトリURL>
   ```

2. **dockerディレクトリに移動**
   ```bash
   cd <クローンしたディレクトリ>/docker
   ```

3. **Dockerイメージのビルド**
   ```bash
   docker compose build
   ```

4. **コンテナの起動**
   ```bash
   docker compose up -d
   ```
   PCの3306番をほかの MySQL（Windows に入れた MySQL など）が使っていると、`ports are not available: exposing port TCP 0.0.0.0:3306` のエラーになり、コンテナが起動しません。そのときは、dbのポートをPCに公開しない上書きファイル `compose.noport.yml` を足して起動します。
   ```bash
   docker compose -f docker-compose.yml -f compose.noport.yml up -d
   ```
   - アプリは Docker のネットワークの中で `db` という名前でDBに接続するので、公開を外しても動きます。PCから MySQL Workbench などで直接つなぐことはできなくなります
   - `!reset` を使うので、Docker Compose 2.24 以上が必要です（`docker compose version` で確認できます）

5. **ブラウザで http://localhost にアクセス**

## PHP周りのバージョン
- **PHP**: 7.3
- **FuelPHP**: 1.8

## ログについて
- **アクセスログ**: Dockerのコンテナのログ
- **FuelPHPのエラーログ**: /var/www/html/my_fuel_project/fuel/app/logs/
  - 年月日ごとにログが管理されている
  - tail -f {見たいログファイル}でログを出力

## MySQLコンテナ設定
このプロジェクトには、MySQLを使用するDBコンテナが含まれています。設定は以下の通りです。

- **MySQLバージョン**: 8.0
- **ポート**: `3306`
- **環境変数**:
  - `MYSQL_ROOT_PASSWORD`: root
  - `MYSQL_DATABASE`: fuelphp

### アクセス情報
- **ホスト**: `localhost`
- **ポート**: `3306`（`compose.noport.yml` を足して起動した場合は、PCからはつなげません）
- **ユーザー名**: `root`
- **パスワード**: `root`
- **データベース名**: `fuelphp`
