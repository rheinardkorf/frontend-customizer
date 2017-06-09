import Vue from 'vue'
import App from './App.vue'

/**
 * Vanilla version of $(document).ready()
 * @param fn
 */
function ready(fn) {
	if (document.readyState !== 'loading'){
		fn();
	} else {
		document.addEventListener('DOMContentLoaded', fn);
	}
}

ready(function(){
	let elId = 'fe-customize';
	let body = document.querySelector('body')
	let firstChild = body.firstChild
	let el = document.createElement('div')
	el.setAttribute('id',elId)
	body.insertBefore(el,firstChild)

	let appInstance = new Vue({
	  el: '#' + elId,
	  render: h => h(App)
	})

	// EVERYTHING BELOW THIS COMMENT IS JUST POKING AROUND.
	// ====================================================
	//	let titleElement = document.querySelector('.site-title')
	//
	//	let titleOld = titleElement.outerHTML,
	//		nodeName = titleElement.nodeName.toLocaleLowerCase(),
	//		titleTemplate = titleOld.replace( fec.title, '{{ title }}').replace(nodeName, nodeName + ' :contenteditable="contentEditable" @input="changed"')
	//
	//	new Vue({
	//		el: '.site-title',
	//		template: titleTemplate,
	//		data: {
	//			title: fec.title,
	//			contentEditable: true
	//		},
	//		methods: {
	//			changed: function( e ) {
	//				fec.title = e.target.textContent
	//			}
	//		}
	//	})
});

