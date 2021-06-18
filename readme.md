# Lightning G3 用デザインスキンサンプル

はじめに

### プラグインのフォルダ名とファイル名を変更

lightning-g3-skin-sample/lightning-g3-skin-sample.php となっているので、これを独自の名称に変更してください。

lightning-g3-skin- は残して sample だけ変更した方が何のプラグインかわかりやすいので良いと思います。
### プラグイン基本情報の変更

lightning-g3-skin-xxxxx.php の最初の情報をを書き換えます。

### プラグインを有効化できるか確認してみましょう

### スキンの情報

lightning-g3-skin-xxxxx.php の中に記載してあるスキンの情報を変更します。

```
add_filter( 'lightning_g3_skins', 'ltg3_add_skin_sample' );
function ltg3_add_skin_sample( $skins ) {

	$data = get_file_data( __FILE__, array( 'version' => 'Version' ) );

	// sample の部分が識別名です。好きな名前に変更してください。
	$skins['sample'] = array(
		// label が Lightning デザイン設定 のスキン選択プルダウンに表示される名称
		'label'                    => __( 'Sample Skin G3', 'lightning-g3-skin-sample' ),
		'css_url'                  => plugin_dir_url( __FILE__ ) . '/css/style.css',
		'css_path'                 => plugin_dir_path( __FILE__ ) . '/css/style.css',
		// プラグインディレクトリ名を変更
		'editor_css_path_relative' => '../../plugins/lightning-g3-skin-sample/css/editor.css',
		// スキン固有の処理を入れる場合（非推奨）
		'php_path'                 => plugin_dir_path( __FILE__ ) . '/functions.php',
		'js_path'                  => '',
		'version'                  => $data['version'],
		'bootstrap'                => '',
	);
	return $skins;
}
```
### 実際にスキンを切り替えて有効化してみましょう

### 一旦cssを削除してみましょう

css/editor.css と css/style.css の中身を全て削除・編集してデザインがかわるか確認してみましょう。
### readme.txt の変更

### 変数をさわってみよう

Lightningの _g3/assets/variables.scss をもってきて触ってみよう

### functions.php も使えます。

---
## ちょっと高度な変更
### sassで編集したい場合

一応sassの設定はしてありますので、以下のコマンドでパッケージのインストールはできます。

```
$ npm install
```

sassの監視を開始します。
```
$ npm run watch
``` 

### インストール用などに出力

```
$ gulp dist
```

で出力できます。
出力先のディレクトリは gulp.js で指定していますので、プラグインのディレクトリ名に変更してください。
