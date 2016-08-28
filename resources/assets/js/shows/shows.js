let Vue    = require('vue');
let headerComponent = require('./components/header.vue');
import dataStore from '../stores/shows.js';

Vue.extend({
    data: {
        return {
            shows:{},
            search_input: {'input':''},
        }
    },
    computed:{
        shh: function(){
            return dataStore.data.shows;
        }
    },
    methods:{
        toggleShowBands: function(){
            band.showBands = !band.showBands;
        },
    },
    components:{
        headerComponent,
    },
    ready: function ready() {
    }

});

if(etnoc.shows){
    etnoc.shows.forEach(function(show){
        show.showBand = false;
    });

}