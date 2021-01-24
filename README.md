# Laravelでtodoアプリ

## このプロジェクトの目的
- Laravelの基礎を定着させるために、基本的な機能を備えたtodoアプリをつくる
- 以前PHPのみで作成したtodoアプリと比較し、Laravelの有用性を確認する

## 実装したい機能
- ログイン、ログアウト、新規登録、パスワード再設定
- CRUD操作
- 検索機能

## 開発環境
  
        - PHP 8.0
        - Laravel 6.2
        - mySQL 8.0
- Laravelのバージョンの選定理由はLTSであることと、情報が手に入りやすいため

## データベース設計
- デフォルトのユーザーテーブル
- tasksテーブル
  
        - id, user_id, body, created_at, updated_at
- commentsテーブル  

        - id, task_id, body, created_at, updated_at

## 工夫した点・苦労した点
- ルーティングをresourceを使ってすっきりさせた
- CSRF対策を怠り419エラーに
- useし忘れで関数が使用できない
- ルーティングに苦戦

## PHPと比較したLaravelの優位性
- 認証機能の実装が簡単
- 様々な関数がすぐに使える
- レコードを直感的に取り出せる
