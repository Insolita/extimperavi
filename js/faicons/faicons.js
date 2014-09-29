/***
 add font-awesome icon inserter
 (c)Insolita
 ***/

if (typeof RedactorPlugins === 'undefined') var RedactorPlugins = {};

RedactorPlugins.faicons ={
	init: function ()
	{
		console.log('faicons init');
		this.opts.langs['ru'] = $.extend({
			faicons: 'Вставить иконку',
			faicons_size:'Размер',
			faicons_spin:'Анимация?',
			faicons_fixed:'Фикс.ширина?'
		}, this.opts.langs['ru']);
		this.opts.langs['en'] = $.extend({
			faicons: 'Insert Icon',
			faicons_size:'Size',
			faicons_spin:'Animate?',
			faicons_fixed:'Fixed width?'
		}, this.opts.langs['en']);
		this.opts.curLang = this.opts.langs[this.opts.lang];
		this.opts = $.extend({
			italicTag:'i',
			showedIconSize:'lg',
			showedCols:10,
			allowedIcons:[],
			allIcons:["","adjust","anchor","angellist","area-chart","at","archive","arrows","arrows-h","arrows-v","automobile","asterisk","ban","bank","bar-chart-o","barcode","bars","beer","bell","bell-o","bell-slash","bell-slash-o","bicycle","binoculars","birthday-cake","bolt","bomb","book","bookmark","bookmark-o","briefcase","bug","building","building-o","bullhorn","bullseye","bus","cab","calendar","calendar-o","camera","camera-retro","car","caret-square-o-down","caret-square-o-left","caret-square-o-right","cc","cc-amex","cc-discover","cc-mastercard","cc-paypal","cc-visa","caret-square-o-up","certificate","check","check-circle","check-circle-o","check-square","check-square-o","child","circle","circle-o","circle-o-notch","circle-thin","clock-o","cloud","cloud-download","cloud-upload","code","code-fork","coffee","cog","cogs","comment","comment-o","comments","comments-o","compass","copyright","credit-card","crop","crosshairs","cube","cubes","cutlery","dashboard","desktop","database","dot-circle-o","download","edit","ellipsis-h","ellipsis-v","envelope","envelope-o","envelope-square","eraser","exchange","exclamation","exclamation-circle","exclamation-triangle","external-link","external-link-square","eye","eyedropper","eye-slash","fax","female","fighter-jet","file-archive-o","file-audio-o","file-code-o","file-excel-o","file-image-o","file-movie-o","file-pdf-o","file-photo-o","file-picture-o","file-powerpoint-o","file-sound-o","file-video-o","file-word-o","file-zip-o","film","filter","fire","fire-extinguisher","flag","flag-checkered","flag-o","flash","flask","folder","folder-o","folder-open","folder-open-o","frown-o","futbol-o","gamepad","gavel","gear","gears","gift","glass","globe","graduation-cap","group","google-wallet","hdd-o","headphones","heart","heart-o","history","home","ils","image","inbox","info","info-circle","institution","ioxhost","key","keyboard-o","language","laptop","lastfm","leaf","legal","lemon-o","level-down","level-up","life-bouy","life-ring","life-saver","lightbulb-o","line-chart","location-arrow","lock","magic","magnet","mail-forward","mail-reply","mail-reply-all","male","map-marker","meanpath","meh-o","microphone","microphone-slash","minus","minus-circle","minus-square","minus-square-o","mobile","mobile-phone","money","moon-o","mortar-board","music","navicon","newspaper-o","paint-brush","paper-plane","paper-plane-o","paw","paypal","pencil","pencil-square","pencil-square-o","phone","phone-square","photo","picture-o","pie-chart","plane","plug","plus","plus-circle","plus-square","plus-square-o","power-off","print","puzzle-piece","qrcode","question","question-circle","quote-left","quote-right","random","refresh","reorder","reply","reply-all","retweet","road","rocket","rss","rss-square","search","search-minus","search-plus","send","send-o","share","share-alt","share-alt-square","share-square","share-square-o","shield","shopping-cart","sign-in","sign-out","signal","sitemap","sliders","slideshare","smile-o","sort","sort-alpha-asc","sort-alpha-desc","sort-amount-asc","sort-amount-desc","sort-asc","sort-desc","sort-down","sort-numeric-asc","sort-numeric-desc","sort-up","space-shuttle","spinner","spoon","square","square-o","star","star-half","star-half-empty","star-half-full","star-half-o","star-o","suitcase","sun-o","support","tablet","tachometer","tag","tags","tasks","taxi","terminal","thumb-tack","thumbs-down","thumbs-o-down","thumbs-o-up","thumbs-up","ticket","times","times-circle","times-circle-o","tint","toggle-down","toggle-left","toggle-right","toggle-up","toggle-on","toggle-off","trash","trash-o","tree","trophy","truck","tty","twitch","umbrella","university","unlock","unlock-alt","unsorted","upload","user","users","video-camera","volume-down","volume-off","volume-up","warning","wheelchair","wrench","wifi","yelp","bitcoin","btc","cny","dollar","eur","euro","gbp","inr","jpy","krw","rmb","rouble","rub","ruble","rupee","try","turkish-lira","usd","won","yen","align-center","align-justify","align-left","align-right","bold","chain","chain-broken","clipboard","columns","copy","cut","dedent","file","file-o","file-text","file-text-o","files-o","floppy-o","font","header","indent","italic","link","list","list-alt","list-ol","list-ul","outdent","paperclip","paragraph","paste","repeat","rotate-left","rotate-right","save","scissors","strikethrough","subscript","superscript","table","text-height","text-width","th","th-large","th-list","underline","undo","unlink","angle-double-down","angle-double-left","angle-double-right","angle-double-up","angle-down","angle-left","angle-right","angle-up","arrow-circle-down","arrow-circle-left","arrow-circle-o-down","arrow-circle-o-left","arrow-circle-o-right","arrow-circle-o-up","arrow-circle-right","arrow-circle-up","arrow-down","arrow-left","arrow-right","arrow-up","arrows-alt","caret-down","caret-left","caret-right","caret-up","chevron-circle-down","chevron-circle-left","chevron-circle-right","chevron-circle-up","chevron-down","chevron-left","chevron-right","chevron-up","hand-o-down","hand-o-left","hand-o-right","hand-o-up","long-arrow-down","long-arrow-left","long-arrow-right","long-arrow-up","backward","compress","eject","expand","fast-backward","fast-forward","forward","pause","play","play-circle","play-circle-o","step-backward","step-forward","stop","youtube-play","adn","android","apple","behance","behance-square","bitbucket","bitbucket-square","css3","delicious","digg","dribbble","dropbox","drupal","empire","facebook","facebook-square","flickr","foursquare","ge","git","git-square","github","github-alt","github-square","gittip","google","google-plus","google-plus-square","hacker-news","html5","instagram","joomla","jsfiddle","linkedin","linkedin-square","linux","maxcdn","openid","pagelines","pied-piper","pied-piper-alt","pied-piper-square","pinterest","pinterest-square","qq","ra","rebel","reddit","reddit-square","renren","skype","slack","soundcloud","spotify","stack-exchange","stack-overflow","steam","steam-square","stumbleupon","stumbleupon-circle","tencent-weibo","trello","tumblr","tumblr-square","twitter","twitter-square","vimeo-square","vine","vk","wechat","weibo","weixin","windows","wordpress","xing","xing-square","yahoo","youtube","youtube-square","ambulance","h-square","hospital-o","medkit","stethoscope","user-md"]
		}, this.opts);
		this.buttonAdd('iconic', this.opts.curLang.faicons, this.showIconList);
		this.buttonAwesome('iconic', 'fa-smile-o');
	},
	showIconList:function(){
 		var preinit = $.proxy(this.eventize, this);
		var iconlist=this.buildIconList();
		this.modalInit(this.opts.curLang.faicons, iconlist, 700, preinit);
	},
	buildIconList:function(){

		var table = $('<table></table>');
		var tr = $('<tr></tr>');
		var icons= this.opts.allowedIcons.length?this.opts.allowedIcons:this.opts.allIcons;
		var dcnt=(Math.floor(icons.length/this.opts.showedCols)+1)*this.opts.showedCols;
		for(var i = 0; i < dcnt; i++){
			if (i % this.opts.showedCols == 0 && i>0) {
				table.append(tr);
				tr = $('<tr></tr>');
			}
			var btn='';
			if(i<icons.length){
				btn = $(
					'<button class="btn btn-default btn-icon" data-redactor_faicon="1" value="'
					+ icons[i] + '" title="' + icons[i] + '">' +
					'<i class="fa fa-' + icons[i] + ' fa-lg fa-fw">' +
					'</i>&nbsp;</button>');
			}else{
				btn = $('<button class="btn btn-default btn-icon" value="">&nbsp;</button>');
			}
			var td = $('<td></td>').append(btn);
			tr.append(td);
		}
		table.append(tr);
		table.addClass('table table-bordered');
		return '' +
		'<section id="redactor_modal_faicons">' +
			'<div class="modal-body">' +
				'<div id="redactor_faicons_list" style="max-height: 300px; overflow: auto;">'+
					table.html()+
				'</div>'+
				'<br/>'+
				'<div class="row">' +
			        '<div class="col-xs-8">'+
						'<label>'+this.opts.curLang.faicons_size+'</label>' +
						'<select id="redactor_iconsizer" class="form-control">' +
						'<option value="">1x</option>' +
						'<option value="lg" selected>2x</option>' +
						'<option value="2x">3x</option>' +
						'<option value="3x">4x</option>' +
						'<option value="4x">5x</option>' +
						'<option value="5x">6x</option>' +
						'</select>' +
					'</div>'+
					'<div class="col-xs-4">'+
						'<div class="checkbox">'+
						'<label>'+this.opts.curLang.faicons_spin +
						'<input type="checkbox" id="redactor_iconspin">'+'</label>' +
						'</div>' +
						'<div class="checkbox">'+
						'<label>'+this.opts.curLang.faicons_fixed +
						'<input type="checkbox" id="redactor_iconfixed">'+'</label>' +
						'</div>' +
					'</div>' +
			       '</div>' +
			'</div>' +
		'</section>';
	},
	eventize: function()
	{
		var self = this;
		$(document).off('click', '[data-redactor_faicon]').on('click', '[data-redactor_faicon]', $.proxy(function (e) {
			e.preventDefault();
			var curricon = $(e.target).val();
			self.insertIcon(e, curricon);
		}, self));
	},
	insertIcon:function(e, curricon){
		var iconsize = $('#redactor_iconsizer').val();
		var isspin=$('#redactor_iconspin').is(":checked");
		var isfix=$('#redactor_iconfixed').is(":checked");
		var ins='<i class="fa fa-'+curricon;
		if(iconsize){
			ins+=' fa-'+iconsize;
		}
		if(isspin){
			ins+=' fa-spin';
		}
		if(isfix){
			ins+=' fa-fw';
		}
		ins+='">&nbsp;</i>&nbsp;';

		this.insertHtmlAdvanced(ins, true);
		this.modalClose();
	}

};