Clean Architectureのサンプルプロジェクト(php7)
====

php7でClean Architectureを試してみた際の検討用サンプルコードです。

## Requirement

php7.2 + Webサーバーソフトウェア(Apache等)

## Install


    cd /var/www/html
    git clone https://github.com/nakatatsu/clean-architecture-example-php.git
    
    # phpからDataディレクトリに書き込めるようにします。
    chown apache:apache ./clean-architecture-example-php/Data

※ 適宜自分の環境に合わせて読み替えて下さい。


## Usage

### ブラウザから確認

[ルートディレクトリ]/Public/index.php にブラウザでアクセスします。

### コマンドラインからユニットテストを起動

[ルートディレクトリ]/Tests/ に移動し、下記コマンドを実行します。

    php ./TestAll.php

## Licence

MIT License

## Author

[tricrow](http://www.tricrow.com)