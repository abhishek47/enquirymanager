
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app',

    methods: {


    	deleteEnquiry(id)
    	{
    		var r = confirm("Are you sure, you want to delete the enquiry?");
			if (r == true) {
			    axios.post('/enquiries/delete/' + id, {
				    id: id,
				  })
				  .then(function (response) {
				  	$('#enquiry-' + id).hide(); 
				  	swal('Enquiry Deleted', '', 'success');
				    console.log(response);
				  })
				  .catch(function (error) {
				    console.log(error);
				  });
			} else {
			   
			}
    	},

    	updateEnquiryStatus(id, status)
    	{
    		axios.post('/enquiries/status/' + id + '/' + status, {
				    id: id, status: status
				  })
				  .then(function (response) {
				  	sm = status == 0 ? 'void' : (status == 1 ? 'sold' : 'cancelled');
				  	$('#status').html(sm);
				  	swal('Enquiry status updated to ' + sm + '!', '', 'success');
				    console.log(response);
				  })
				  .catch(function (error) {
				    console.log(error);
				  });
    	}



    }
});
