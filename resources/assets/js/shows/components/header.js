let Vue    = require('vue');

Vue.component({
	props: ['name', 'date'],
	template: '<div>'+'<center><h3>{{ name }}</h3><i>{{ date }}</i></center>'+'</div>',
});