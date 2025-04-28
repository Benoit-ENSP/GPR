 $(document).ready(function() {
	 
	// Recuperation variable URL en javacrsipt
	
	
	function $_GET(param) {
	var vars = {};
	window.location.href.replace( location.hash, '' ).replace( 
		/[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
		function( m, key, value ) { // callback
			vars[key] = value !== undefined ? value : '';
		}
	);

	if ( param ) {
		return vars[param] ? vars[param] : null;	
	}
	return vars;
	}
	
	
	// AJAX index.php verfications des ID matériels et utilisateurs	
	
	

	
	
	// Formulaire materiel
	$("#indexMateriel").submit(function(){
				
				var id_materiel =$( "#num_materiel" ).val();
				var data = 'num_materiel='+id_materiel;
				
		
			 $.ajax({
                url: 'verif_materiel.php',
                method: 'post',
                data: data,
                success: function (data) {
	      
    				if(data.indexOf("false")!=-1){
					$.notify({
							message: 'Ce matériel n\'existe pas dans notre base de données ou est indisponible au prêt'
							},{
							type: 'danger'
						});
					$( "#num_materiel" ).val("");

					}
					else {
					indexMateriel.submit();	
					}
					},
	             error: function () {
	                
                }
            });
			return false;

		});
		
		
	// Formulaire utilisateur ///////////////////////////////
	$("#indexUser").submit(function(){
				
				var id_user =$( "#num_etudiant" ).val();
				var data = 'num_etudiant='+id_user;
				//alert(data);
				$.ajax({
                	url: 'verif_user.php',
					method: 'post',
					data: data,
					success: function (data) {
	      
    				if(data.indexOf("false")!=-1){
					$.notify({
							message: 'Cet utilisateur n\'existe pas dans notre base de données'
							},{
							type: 'danger'
						});
					$( "#num_etudiant" ).val("");

					}
					else {
					indexUser.submit();
						}
					},
	             error: function () {
	                
                }
            });
			return false;

		});
		
		
		   
     $(".del_fichier").click(function(){
	     
	if (confirm("Etes-vous sur de vouloir supprimer ce fichier ?"))
			{
			
			var id = $(this).attr('id');
			var num_user = $(this).attr('num');
			var data = 'id=' + id + "&num_user=" + num_user;
			//alert(data);
				$.ajax(
				{
					  type: "POST",
     			   	  url: "delete_fichiers.php",
        				datatype: "html",
        				data:data,
        					
        				success: function(data){
        				setTimeout(function(){
							location.reload(true);
						}, 500);
					}
				 });
				 			
				return false;				
			}
 		 });

// ----------- FIN AJAX index.php verfications des ID matériels et utilisateurs	
///////////////////////////////////////////////////////////////////////////////		



	// ON VIDE LA SESSION UTILSATEUR ///////////////////////////////////

     $(".testnum").click(function(){
	     
	if (confirm("Êtes-vous de vouloir vider la session utilisateur"))
			{
			
			var data = 'numOut=out';
				
				$.ajax(
				{
					  type: "POST",
     			   	  url: "ajax_function.php",
        				datatype: "html",
        				data:data,
        					
        				success: function(data){
        				setTimeout(function(){
							location.reload(true);
						}, 500);
					}
				 });
						
				return false;				
			}
 		 });	
	
	
		
		
// AJAX reservations.php verfications des ID matériels 
	$('#dataReservation').load('ajax_data_reservations.php');   

	
	// Formulaire materiel
	$("#reservationMateriel").submit(function(){
				
				var id_materiel =$( "#num_materiel" ).val();
				var data = 'num_materiel='+id_materiel;
		
			 $.ajax({
                url: 'verif_materiel.php',
                method: 'post',
                data: data,
                success: function (data) {
	      
    				if(data.indexOf("false")!=-1){
					$.notify({
							message: 'Ce matériel n\'existe pas dans notre base de données ou est déja emprunté'
							},{
							type: 'danger'
						});
					$( "#num_materiel" ).val("");

					}
					else {								
						var num =$( "#num_materiel" ).val();
						var data = 'num_materiel='+id_materiel;		
						setTimeout(function(){
						$('#calendar').fullCalendar( 'destroy' );
						$('#dataReservation').load('ajax_data_reservations.php?id_materiel='+id_materiel); 
						$('#formReservation').load('ajax_formreservation.php?id_materiel='+id_materiel);
			
						
						}, 500);
						}
					},
	             error: function () {
	                
                }
            });
			return false;

		});
	
	
// FIN AJAX reservations.php verfications des ID matériels 
///////////////////////////////////////////////////////////	

	 
	 
	//Formulaire emprunt
	var materiel = $_GET('num_materiel');
	//alert('mat='+materiel);
	$('#data').load('ajax_data_emprunt.php?id_materiel='+materiel);   
	       
	$("#emprunt").submit(function(){
				var num =$( "#num_user" ).val();
				var data = 'id_user=' + num +'&num_materiel='+materiel;
				var data_user = 'id_user='+num;
				//alert(data);
				$.ajax(
				{
					type: "POST",
     			   	url: "ajout_emprunt.php",
        			datatype: "html",
        			data: data,
        					
        				success: function(data){
			        	$.notify({
							message: 'EMPRUNT realisé avec succès'
							},{
							type: 'info'
						});
						setTimeout(function(){
						$('#data').load('ajax_data_emprunt.php?id_materiel='+materiel); }, 500);
						$( "#num_user" ).val("");
						}
       			 });
       			
			return false;
			

		});
		
	
	//ANNULER LA RESERVATION	
		$( "#annulResa" ).click(function() {
			var idResa =$( "#idResa" ).val();
			var userResa =$( "#userResa" ).val();
			var data = 'id_resa=' + idResa +'&id_user=' + userResa +'&num_materiel='+materiel;
				
				$.ajax(
				{
					type: "POST",
     			   	url: "ajax_annul_resa.php",
        			datatype: "html",
        			data: data,
        					
        				success: function(data){
			        	$.notify({
							message: 'ANNULATION realisé avec succès'
							},{
							type: 'success'
						});
						setTimeout(function(){
							location.reload(true);
						}, 500);
						}
       			 });
       			
			return false;


		});
		
		
	//VALIDER LA RESERVATION MATERIEL 
		$( "#validResa" ).click(function() {
			var idResa =$( "#idResa" ).val();
			var userResa =$( "#userResa" ).val();
			//alert(materiel);
			var data = 'id_resa=' + idResa +'&id_user=' + userResa +'&num_materiel='+materiel;
			//alert(data);	
				
				$.ajax(
				{
					type: "POST",
     			   	url: "ajax_valid_resa.php",
        			datatype: "html",
        			data: data,
        					
        				success: function(data){
			        	$.notify({
							message: 'EMPRUNT realisé avec succès'
							},{
							type: 'success'
						});
						setTimeout(function(){
							location.reload(true);
						}, 500);
						}
       			 });
 
			return false;
			


		});
		

	
	
	//Formulaire retour
	$("#retour").submit(function(){
			var num =$( "#num_user_retour" ).val();
			var data = 'num_user=' + num +'&id_materiel='+materiel;
			//alert(data);
			$.ajax(
				{
					type: "POST",
     			   	url: "retour_emprunt_materiel.php",
        			datatype: "html",
        			data: data,
        					
        				success: function(data){
	        				$.notify({
							message: 'RETOUR realisé avec succès'
							},{
							type: 'success'
						});
						setTimeout(function(){
						$('#data').load('ajax_data_emprunt.php?id_materiel='+materiel); }, 500);
						}
       			 });
			return false;
			});	


    //Setup Metis Menu
    $('#side-menu').metisMenu();

    //Setup Slim Scroll for Left Sidebar
    $('.side-nav-white').slimScroll({
        height: '250px'
    });


// FICHE UTILISATEUR
    	var idUser = $_GET('num_etudiant');
    	$('#dataEmpruntUser').load('ajax_data_user.php?id_user='+idUser);
    	 $('#dataResaUser').load('ajax_resa_user.php?id_user='+idUser); 
    	 
 
 //FICHE UTILSATEUR EMPRUNT AVEC SCAN ARTICLE
 
 
 $("#empruntMateriel").submit(function(){
				
				var num_materiel =$( "#num_materiel" ).val();
				var data = 'id_user=' + idUser +'&num_materiel='+num_materiel;
		
			 $.ajax({
                url: 'verif_dispo_materiel.php',
                method: 'post',
                data: data,
                success: function (retour){
	      
    				if(retour.indexOf("false")!=-1){
					$.notify({
							message: 'Ce matériel n\'existe pas dans notre base de données ou est déja emprunté'
							},{
							type: 'danger'
						});
					$( "#num_materiel" ).val("");

					}
					else {
						//alert(data);								
						$.ajax(
							{
								
								type: "POST",
								url: "ajout_emprunt.php",
								datatype: "html",
								data: data,
        					
        				success: function(data){
			        	$.notify({
							message: 'EMPRUNT realisé avec succès'
							},{
							type: 'success'
						});
						setTimeout(function(){
						$('#dataEmpruntUser').load('ajax_data_user.php?id_user='+idUser); }, 500);
						$( "#num_materiel" ).val("");
						}
       			 });	
						
						}
					},
	             error: function () {
	                
                }
            });
			return false;

		});
 
 
 /*
 
 $("#empruntMateriel").submit(function(){
				var num_materiel =$( "#num_materiel" ).val();
				var data = 'id_user=' + idUser +'&num_materiel='+num_materiel;
				//alert(data);
				$.ajax(
				{
					type: "POST",
     			   	url: "ajout_emprunt.php",
        			datatype: "html",
        			data: data,
        					
        				success: function(data){
			        	$.notify({
							message: 'EMPRUNT realisé avec succès'
							},{
							type: 'info'
						});
						setTimeout(function(){
						$('#dataEmpruntUser').load('ajax_data_user.php?id_user='+idUser); }, 500);
						$( "#num_materiel" ).val("");
						}
       			 });
       			
			return false;
			

		}); 
*/	
	
	//FICHE UTILSATEUR RETOUR AVEC SCAN ARTICLE
 $("#retourMateriel").submit(function(){
				var num_materiel =$( "#num_materiel_retour" ).val();
				var data = 'num_user=' + idUser +'&id_materiel='+num_materiel;
				//alert(data);
				$.ajax(
				{
					type: "POST",
     			   	url: "retour_emprunt_materiel.php",
        			datatype: "html",
        			data: data,
        					
        				success: function(data){
			        	$.notify({
							message: 'RETOUR realisé avec succès'
							},{
							type: 'success'
						});
						setTimeout(function(){
						$( "#num_materiel_retour" ).val("");
						$('#dataEmpruntUser').load('ajax_data_user.php?id_user='+idUser); }, 500);
						}
       			 });
       			
			return false;
			

		}); 
		
		
	// UPLOAD IMAGE
	$("#uploadconv").on('submit',(function(e) {
		e.preventDefault();
		$("#message").empty();
		$('#loading').show();
			$.ajax({
				url: "upload_conv.php", // Url to which the request is send
				type: "POST",             // Type of request to be send, called as method
				data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
				contentType: false,       // The content type used when sending data to the server.
				cache: false,             // To unable request pages to be cached
				processData:false, 
				       // To send DOMDocument or non processed data file it is set to false
				success: function(data)   // A function to be called if request succeeds
					{
					$.notify({
							message: 'UPLOAD realisé avec succès'
							},{
							type: 'success'
						});
					setTimeout(function(){
							location.reload(true);
						}, 500);
					}
					});
	}));   
		
	// UPLOAD IMAGE
	$("#uploadattest").on('submit',(function(e) {
		e.preventDefault();
		$("#message").empty();
		$('#loading').show();
			$.ajax({
				url: "upload_attest.php", // Url to which the request is send
				type: "POST",             // Type of request to be send, called as method
				data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
				contentType: false,       // The content type used when sending data to the server.
				cache: false,             // To unable request pages to be cached
				processData:false, 
				       // To send DOMDocument or non processed data file it is set to false
				success: function(data)   // A function to be called if request succeeds
					{
					$.notify({
							message: 'UPLOAD realisé avec succès'
							},{
							type: 'success'
						});
					setTimeout(function(){
							location.reload(true);
						}, 500);
					}
					});
	}));   
	
    //Setup Notify Welcome
    //ANIMATION PAGE D'ACCUEIL/////////////////////////////////////////
 	
   
    
    
   /*
    $.notify('Welcome to Deluxe Material Admin Template!', {
        type: 'black-shadow',
        allow_dismiss: false,
        placement: {
            from: "bottom",
            align: "right"
        },
        delay: 1500,
        animate: {
            enter: "animated fadeInUp",
            exit: "animated fadeOutDown"
        },
        offset: {
            x: 30,
            y: 30
        }
    });
    */

    //Click Animation
    $("body").on("click", ".animation", function (e) {
        
        // Get animation class from "data" attribute
        var animation = $(this).data("animation");

        // Apply animation once per click
        $(this).parents(".panel").addClass("animated " + animation).one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function () {
            $(this).removeClass("animated " + animation);
        });
        e.preventDefault();
    });

    //Counter number Dashboard
    $('.counter').counterUp({
            delay: 10,
            time: 1000
    });

    //Setup Clear Storage on Navigation
    $('.clear-storage').on('click', function(e){
        e.preventDefault();
        swal({
            title: "Are you sure?",
            text: "All your saved local storage values will be removed!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, clear it!",
            closeOnConfirm: false
        }, function() {
            swal("Deleted!", "Your local storage has been cleared.", "success");
        });
    });

    //Setup Show/Hide Sidebar on Navigation
    $('.toggle-sidebar').on('click', function(e){
        e.preventDefault();
        $('.navbar-header').toggleClass('hide-header');
        $('.side-nav-white').toggleClass('hide-sidebar');
        $('#page-wrapper').toggleClass('full-wrapper');
        $('.toggle-sidebar i').toggleClass('zmdi-arrow-right');       
    });

    //Setup Effect while click
    $('.effect, .btn, .navbar-left > li > a, #side-menu > li > a, .profile > li > a, .nav-level > li > a, .nav-second-level > li > a, li > .dropdown-toggle, .dropdown-messages > li > a, .dropdown-tasks > li > a, .dropdown-alerts > li > a').ripple({
        dragging: false,
        adaptPos: false,
        scaleMode: false
    });

    //Full screen
    var FullScreen = function() {
        this.$body = $("body"),
        this.$fullscreenBtn = $(".fullscreen")
    };

    //turn on full screen
    FullScreen.prototype.launchFullscreen  = function(element) {
      if(element.requestFullscreen) {
        element.requestFullscreen();
      } else if(element.mozRequestFullScreen) {
        element.mozRequestFullScreen();
      } else if(element.webkitRequestFullscreen) {
        element.webkitRequestFullscreen();
      } else if(element.msRequestFullscreen) {
        element.msRequestFullscreen();
      }
    },
    FullScreen.prototype.exitFullscreen = function() {
      if(document.exitFullscreen) {
        document.exitFullscreen();
      } else if(document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
      } else if(document.webkitExitFullscreen) {
        document.webkitExitFullscreen();
      }
    },

    //toggle screen
    FullScreen.prototype.toggle_fullscreen  = function() {
      var $this = this;
      var fullscreenEnabled = document.fullscreenEnabled || document.mozFullScreenEnabled || document.webkitFullscreenEnabled;
      if(fullscreenEnabled) {
        if(!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) {
          $this.launchFullscreen(document.documentElement);
        } else{
          $this.exitFullscreen();
        }
      }
    },

    //init 
    FullScreen.prototype.init = function() {
      var $this  = this;
      //bind
      $this.$fullscreenBtn.on('click', function() {
        $this.toggle_fullscreen();
      });
    },
     //init FullScreen
    $.FullScreen = new FullScreen, $.FullScreen.Constructor = FullScreen

    //initializing main application module
    var App = function() {
        this.pageScrollElement = "html, body", 
        this.$body = $("body")
    };
    
    //initilizing 
    App.prototype.init = function() {
        var $this = this;
        $.FullScreen.init();
    },
    $.App = new App, $.App.Constructor = App
    $.App.init();

    // Navbar custom
    $(window).bind("load resize", function() {
        var topOffset = 50;
        var width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        var height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    var element = $('ul.nav a').filter(function() {
     return this.href == url;
    }).addClass('active').parent();

    while(true){
        if (element.is('li')){
            element = element.parent().addClass('in').parent();
        } else {
            break;
        }
    }
});

