$(document).ready(function(){
	//Add todo
	$('.add-todo').on('click', function(e){
		e.preventDefault();

    let $target = $(e.target);
    let $form = $($target.parents('form:first'));
    let form = $form.get(0);
    if (form.checkValidity() === false) {
    	console.log("INVALID FORM");
    } else {
      $.ajax({
        type: $form.attr('method'),
        url: $form.attr('action'),
        data: $form.serialize(),
        dataType: 'json',
        success: function(response){
          console.log(response.todoRow);
          //add new todo to the top of the list
          $("#todolist").prepend(response.todoRow);
          //reset form
          $form.each(function(){
              this.reset();
          });
          form.classList.remove('was-validated');
        },
        error: function(err){
          console.log(err);
        }
      });
    }
    form.classList.add('was-validated');
  });
	
	//Start editing todo
	$('#todolist li').click(function(e) { 
		let li = $(this);
		
		alert($(this).text());
	});
  
});
