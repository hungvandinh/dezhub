var Lock = function () {

    return {
        //main function to initiate the module
        init: function () {

             $.backstretch([
		        "assets/img/bg/1.jpg"/*tpa=http://boot.local/preview/metronic_admin/assets/scripts/assets/img/bg/1.jpg*/,
		        "assets/img/bg/2.jpg"/*tpa=http://boot.local/preview/metronic_admin/assets/scripts/assets/img/bg/2.jpg*/,
		        "assets/img/bg/3.jpg"/*tpa=http://boot.local/preview/metronic_admin/assets/scripts/assets/img/bg/3.jpg*/,
		        "assets/img/bg/4.jpg"/*tpa=http://boot.local/preview/metronic_admin/assets/scripts/assets/img/bg/4.jpg*/
		        ], {
		          fade: 1000,
		          duration: 8000
		      });
        }

    };

}();