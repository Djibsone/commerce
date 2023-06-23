//edit show modal user
$(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).attr('data-id');
    $('.userid').val(id);

    $.ajax({
      url: "../controllers/get_user.php",
      type: "post",
      data: {id:id},
      dataType: 'json',
      success: function(data){
        $('#edit_email').val(data.email);
        $('#edit_password').val(data.password);
        $('#edit_firstname').val(data.firstname);
        $('#edit_lastname').val(data.lastname);
        $('#edit_address').val(data.address);
        $('#edit_contact').val(data.contact_info);
      }
    });
  });

  //delete show modal user
  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).attr('data-id');
    $('.userid').val(id);

    $.ajax({
      url: "../controllers/get_user.php",
      type: "post",
      data: {id:id},
      dataType: 'json',
      success: function(data){
        $('.fullname').html(data.firstname+' '+data.lastname);
      }
    });
  });

  //update photo show modal user
  $(document).on('click', '.photo', function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $('.userid').val(id);

    $.ajax({
      url: "../controllers/get_user.php",
      type: "post",
      data: {id:id},
      dataType: 'json',
      success: function(data){
        $('.fullname').html(data.firstname+' '+data.lastname);
      }
    });
  });

  //edit show modal category
  $(document).on('click', '.edit', function(e){
  e.preventDefault();
  $('#edit').modal('show');
  var id = $(this).attr('data-id');
  $('.catid').val(id);

  $.ajax({
    url: "../controllers/get_category.php",
    type: "post",
    data: {id:id},
    dataType: 'json',
    success: function(data){
      $('#edit_name').val(data.name);
    }
  });
  });

  //delete show modal category
  $(document).on('click', '.btn-delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).attr('data-id');
    $('.catid').val(id);

    $.ajax({
      url: "../controllers/get_category.php",
      type: "post",
      data: {id:id},
      dataType: 'json',
      success: function(data){
        $('.catname').html(data.name);
      }
    });
  });

  //edit show modal product
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).attr('data-id');
    $('.prodid').val(id);

    $.ajax({
      url: "../controllers/get_products.php",
      type: "post",
      data: {id:id},
      dataType: 'json',
      success: function(data){
        //$('#edit_name').val(data.name);
        $('.name').html(data.prodname);
        $('#edit_name').val(data.prodname);
        $('#catselected').val(data.category_id).html(data.catname);
        $('#edit_price').val(data.price);
        $('#edit_description').html(data.description);
      }
    });
  });

  //delete product
  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    $('#delete').modal('show');
    var id = $(this).attr('data-id');
    $('.prodid').val(id);

    $.ajax({
      url: "../controllers/get_products.php",
      type: "post",
      data: {id:id},
      dataType: 'json',
      success: function(data){
        $('.name').html(data.prodname);
      }
    });
  });

  //edit show modal admin
  $(document).on('click', '.admin', function(e){
    e.preventDefault();
    $('#profile').modal('show');
    var id = $(this).attr('data-id');
    $('.adminid').val(id);

    $.ajax({
      url: "../controllers/get_user.php",
      type: "post",
      data: {id:id},
      dataType: 'json',
      success: function(data){
        $('#email').val(data.email);
        $('#password').val(data.password);
        $('#firstname').val(data.firstname);
        $('#lastname').val(data.lastname);
        $('#photo').val(data.photo);
      }
    });
  });

  //show modal description
  $(document).on('click', '.desc', function(e){
    e.preventDefault();
    $('#description').modal('show');
    var id = $(this).attr('data-id');
    $('.desid').val(id);

    $.ajax({
      url: "../controllers/get_products.php",
      type: "post",
      data: {id:id},
      dataType: 'json',
      success: function(data){
        $('.name').html(data.prodname);
        $('#desc').html(data.description);
      }
    });
  });

  //update photo show modal products
  $(document).on('click', '.photo', function(e){
    e.preventDefault();
    $('#edit_photo').modal('show');
    var id = $(this).attr('data-id');
    $('.prodid').val(id);

    $.ajax({
      url: "../controllers/get_products.php",
      type: "post",
      data: {id:id},
      dataType: 'json',
      success: function(data){
        $('.name').html(data.prodname);
      }
    });
  });

  //edit show modal user profil
  $(document).on('click', '.btn-edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).attr('data-id');
    $('.userid').val(id);

    $.ajax({
      url: "../controllers/get_user.php",
      type: "post",
      data: {id:id},
      dataType: 'json',
      success: function(data){
        $('#email').val(data.email);
        $('#password').val(data.password);
        $('#firstname').val(data.firstname);
        $('#lastname').val(data.lastname);
        $('#address').val(data.address);
        $('#contact').val(data.contact_info);
      }
    });
  });

  //transaction do
  $(document).on('click', '.transact', function(e){
		e.preventDefault();
		$('#transaction').modal('show');
		var id = $(this).attr('data-id');
    $('.transid').val(id);

		$.ajax({
			type: 'POST',
			url: '../controllers/get_sale.php',
			data: {id:id},
			dataType: 'json',
			success:function(data){
				$('#date').html(data.date);
				$('#transid').html(data.transaction);
				$('#detail').prepend(data.list);
				$('#total').html(data.total);
			}
		});
	});

  //delete show modal cart
  $(document).on('click', '.cart_delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).attr('data-id');
    $('.cartid').val(id);

    $.ajax({
      url: "../controllers/get_products.php",
      type: "post",
      data: {id:id},
      dataType: 'json',
      success: function(data){
        $('.productname').html(data.prodname);
      }
    });
  });

  //add panier
  $(document).on('click', '.add_cart', function(e){
  e.preventDefault();
    $.get($(this).attr('href'),{},function(data){
      if (data.error) {
        alert(data.error);
      } else {
        alert(data.message);
        location.href ='accueil.php';
        // if (confirm(data.message + '. Did you want to consult your cart ?')) {
        //   location.href ='cart_view.php';
        // } else {
          
        // }
      }
    }, 'json');
    return false;
  })(jQuery);

  //mirroir manify of products
  $(function(){
    $('.zoom').magnify();
  });

  //<-- Data Table Initialize -->
  $(function () {
    $('#example1').DataTable({
      responsive: true
    })
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

  //onabort(clavier)
  $(function(){
    //Initialize Select2 Elements
    $('.select2').select2()

    //CK Editor
    CKEDITOR.replace('editor1')
    CKEDITOR.replace('editor2')
  });

  //status user infonctionnel
  $(document).on('click', '.status', function(e){
    e.preventDefault();
    var form = $('#form_photo');
    var data_from = form.serialize()
  });
  
//});admin_profile

//file show user
//const photo = document.getElementById('photo');
const ig = document.getElementById('ig');

function readURL(photo) {
  if (photo.files && photo.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
        //document.getElementById('ig').src = e.target.result;
        ig.src = e.target.result;
    };
    reader.readAsDataURL(photo.files[0]);
  }
}

//quantity munis
/*$(document).on('click', '#minus', function(e){
  e.preventDefault();
  var quantity = $('#quantity').val();
		if(quantity > 1){
			quantity--;
		}
		$('#quantity').val(quantity);
});

//quantity add
$(document).on('click', '#add', function(e){
  e.preventDefault();
  var quantity = $('#quantity').val();
		quantity++;
		$('#quantity').val(quantity);
});*/