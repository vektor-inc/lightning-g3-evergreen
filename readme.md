# Lightning G3 Evergreen

## @wordpress/env 環境の起動方法
1. ```temp/themes/``` に lightning を設置
1. ```temp/plugins/``` に lightning-g3-pro-unit を設置
1. ```npm run wp-env start``` を実行

パッケージのインストール
```
$ npm install
```

sassの監視を開始します。
```
$ npm run watch:css
``` 

### インストール用などに出力

```
$ gulp dist
```

で出力できます。
出力先のディレクトリは gulp.js で指定していますので、プラグインのディレクトリ名に変更してください。
