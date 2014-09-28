/*
 add subscript and superscript buttons
 (c)Insolita
 */
if (typeof RedactorPlugins === 'undefined') var RedactorPlugins = {};
RedactorPlugins.subsup = function()
{
	return {
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
			var sub_button = this.button.add('subscript', this.opts.curLang.subname);
			var sup_button = this.button.add('superscript', this.opts.curLang.supname);
			this.button.setAwesome('subscript', 'fa-subscript');
			this.button.setAwesome('superscript', 'fa-supercript');
			this.button.addCallback(sub_button, this.subsup.subscripter);
			this.button.addCallback(sup_button, this.subsup.supscripter);
		},
		subscripter: function()
		{
			this.inline.format('sub');
		},
		supscripter: function()
		{
			this.inline.format('sup');
		}
	};
};