/***
 add subscript and superscript buttons
 (c)Insolita
 ***/

if (typeof RedactorPlugins === 'undefined') var RedactorPlugins = {};

RedactorPlugins.subsup ={
		init: function ()
		{
			this.opts.langs['ru'] = $.extend({
				subname: 'Подстрочный индекс',
				supname: 'Надстрочный индекс'
			}, this.opts.langs['ru']);
			this.opts.langs['en'] = $.extend({
				subname: 'Subscript',
				supname: 'Superscript'
			}, this.opts.langs['en']);
			this.opts.curLang = this.opts.langs[this.opts.lang];
			this.buttonAdd('subs', this.opts.curLang.subname, this.txtSub);
			this.buttonAdd('sups', this.opts.curLang.supname, this.txtSup);
			this.buttonAwesome('subs', 'fa-subscript');
			this.buttonAwesome('sups', 'fa-superscript');
		},
		txtSub: function()
		{
			this.execCommand('subscript', false);
		},
		txtSup: function()
		{
			this.execCommand('superscript', false);
		}
};